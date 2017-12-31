<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Mail\Mailable;

class PaymentController extends Controller
{
    public function makepayment(Request $request)
    {
        if($request->session()->has('provider_id')){
        $providerid = $request->session()->get("provider_id");
        $jobid = $request->jobid;
        $bidvalue = $request->bidvalue;
        $proposalid = $request->proposalid;
        $freelancerid = $request->freelancerid;
        // $client = new \GuzzleHttp\Client();
        // $response = $client->request('POST',env('DBHOST').'api/makepayment', ['form_params' =>['jobid'=>$jobid,'providerid'=>$providerid,'bidvalue'=>$bidvalue,'proposalid'=>$proposalid]]);
        // $apirespponse = $response->getBody();
        // $jsonresponse = json_decode($apirespponse,true);
        return view('provider.trans')->with('jobid',$jobid)->with('bidvalue',$bidvalue)->with('proposalid',$proposalid)->with('freelancerid',$freelancerid);
        }
        else{
            return redirect('ab/account-security/login');
        }
    }

    public function providerpayment(Request $request)
    {
        if($request->session()->has('provider_id')){
        if (session()->has('provider_id')){
           $providerid = $request->session()->get('provider_id');
        }
        $freelancerid = $request->freelancerid;
        $bidvalue=$request->bidvalue;
        $payamount = $request->payamount;
        $originalamount=$request->bidvalue;
        $s = ( ($payamount + 0.3 ) / (1-0.029) );
        $calc=number_format($s,2,'.','')*100;
        $answer = intval($calc);
        $token=$request->stripeToken;
        $jobid=$request->jobid;
        $proposalid=$request->proposalid;
        $client = new \GuzzleHttp\Client();
        $response22 = $client->request('POST', env('DBHOST').'api/paymentcheck', ['form_params' => ['proposalid' => $proposalid,'payamount'=>$payamount,'bidvalue'=>$bidvalue]]);
        $a =  $response22->getBody();
        $decode=json_decode($a,'true');
        if($decode['response']=="failed"){
           return redirect('providerofferview/'.$proposalid.'/'.$jobid)->with('flags','6');
           //return "failed";
        }
        elseif($decode['response']=='false'){
          return redirect('providerofferview/'.$proposalid.'/'.$jobid)->with('flags','7');
        }
        else{
           $key=env('secret_key');
           \Stripe\Stripe::setApiKey ("$key");
           try {
                \Stripe\Charge::create ( array (
                "amount" =>$calc,
                "currency" => "usd",
                "source" => $token, // obtained with Stripe.js
                "description" => "Test payment."
                ) );
                $response = $client->request('POST', env('DBHOST').'api/makepayment', ['form_params' => ['providerid'=>$providerid,'jobid'=>$jobid,'proposalid'=>$proposalid,'bidvalue'=>$bidvalue,'freelancerid'=>$freelancerid,'payamount'=>$payamount]]);
                $a =  $response->getBody();
                $response1 = $client->request('POST',env('DBHOST').'api/getprovideremail', ['form_params' =>
                        ['providerid'=>$providerid]]);
                $apiresponse =  $response1->getBody();
                $jsonresponse1=json_decode($apiresponse,true);
                $provideremail=$jsonresponse1['email'];
                $providername=$jsonresponse1['name'];
                $response = $client->request('POST', env('DBHOST').'api/emails');
                    $s =  $response->getBody();
                    $obj=json_decode($s,true);
                    $content=$obj[0]['PAYMENT FROM PROVIDER MAIL']['content'];
                    $header=$obj[0]['emailtemplate1'];
                    $footer=$obj[0]['emailtemplate2'];
                    $subject=$obj[0]['PAYMENT FROM PROVIDER MAIL']['subject'];
                    Mail::send('emails.paymentfromprovider',['title' =>$content,'name'=>$providername,'header'=>$header,'footer'=>$footer], function ($message) use ($provideremail,$subject)
                         {
                            //echo $objemail;
                            $message->from('productscog.ht@gmail.com','RBS');
                            $message->to("$provideremail")->subject("$subject");
                         });
                    return redirect('providerofferview/'.$proposalid.'/'.$jobid)->with('flags','2');
                  } 
                  catch ( \Exception $e ) {
                    return redirect('providerofferview/'.$proposalid.'/'.$jobid)->with('flags','5');
                     //return $e;
                    //echo "failed";
                  }


            }
        }
       else{
        return redirect('ab/account-security/login');
       }
              
    }

    public function providerpaymentmessage(Request $request)
    {
        if($request->session()->has('provider_id')){
          $id=$request->session()->get("provider_id");
          $client = new \GuzzleHttp\Client();
          $response = $client->request('POST', env('DBHOST').'api/providerpaymentmessage', ['form_params' => ['providerid' => $id]]);
          $apiresponse =  $response->getBody();
          $jsonresponse = json_decode($apiresponse,true);
          return view('provider.provider_paymentsuccess')->with('users',$jsonresponse);
        }
        else{
            return redirect('ab/account-security/login');
        }

    }

    public function providerbilling(Request $request)
    {
        if($request->session()->has('provider_id')){
            $id = $request->session()->get('provider_id');
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', env('DBHOST').'api/providerdisplaybill', ['form_params' => ['providerid' => $id]]);
            $apiresponse = $response->getBody();;
            $response1 = $client->request('POST',env('DBHOST').'api/provideraccountView', ['form_params' =>
                    ['id'=>$id]]);
            $responseaccount =  $response1->getBody();
            $decode=json_decode($responseaccount,true);
              $account=$decode['customerid'];
              if($account!="0") $acct="true";
              else $acct="false";
            return view('provider.provider_billing')->with('flags','1')->with('users',$apiresponse)->with('acct',$acct)->with('users1',$decode);
        }
        else{
            return redirect('ab/account-security/login');
        }
    }
    public function makedefault(Request $request)
    {
       $freelancerid=$request->session()->get('freelancer_id');
       $accountid=$request->cust_id;
            $client = new \GuzzleHttp\Client();
            $response1 = $client->request('POST',env('DBHOST').'api/makedefault', ['form_params' =>
             ['accountid'=>$accountid,'freelancerid'=>$freelancerid] ]);
        $res =  $response1->getBody();
        if($res=="success")
        {
          return back();
        }
    }
    public function freelancerpaymentmessage(Request $request)
    {
        if($request->session()->has('freelancer_id')){
          $id=$request->session()->get("freelancer_id");
          $client = new \GuzzleHttp\Client();
          $response = $client->request('POST', env('DBHOST').'api/freelancerpaymentmessage', ['form_params' => ['freelancerid' => $id]]);
          $apiresponse =  $response->getBody();
          $jsonresponse = json_decode($apiresponse,true);
          return view('freelancer.paymentsuccess')->with('users',$jsonresponse);
        }
        else{
            return redirect('ab/account-security/login');
        }
    }

}
