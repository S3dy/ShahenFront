<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Mail\Mailable;

class adminController extends Controller 
{
    	  public function providerlist(Request $request)
    	  {
          if($request->session()->has('adminsession')){
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', env('DBHOST').'api/adminproviderlist');
            $providerlist =  $response->getBody();
            $jsonresponse=json_decode($providerlist,true);
            return view('adminpanel.provider')->with('users',$jsonresponse);
          }
    		  else{
            return redirect('/admin/login');
          }
        }
    	 public function freelancerlist(Request $request)
    	 {
          if($request->session()->has('adminsession')){
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', env('DBHOST').'api/adminfreelancerlist');
            $freelancerlist =  $response->getBody();
            $jsonresponse=json_decode($freelancerlist,true);
            return view('adminpanel.adminpanel')->with('users',$jsonresponse);
          }
          else{
            return redirect('/admin/login');
          }
    		    
        }

      public function joblist(Request $request)
    	{
          if($request->session()->has('adminsession')){
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', env('DBHOST').'api/adminjoblist');
            $joblist =  $response->getBody();
            $jsonresponse=json_decode($joblist,true);
            return  view('adminpanel.job')->with('users',$jsonresponse);
          }
    		  else{
            return redirect('/admin/login');
          }  
        }

      public function jobselect(Request $request,$id)
    	{
          if($request->session()->has('adminsession')){
            $jobid=$id;
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', env('DBHOST').'api/adminjobselect', ['form_params' =>
                    ['jobid'=>$jobid]]);
            $job =  $response->getBody();
            $jsonresponse=json_decode($job,true);
            return view('adminpanel.jobview')->with('job',$jsonresponse);
          }
          else{
            return redirect('/admin/login');
          }  
    		    
        }


      public function financelist(Request $request)
    	{
    	    if($request->session()->has('adminsession')){
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', env('DBHOST').'api/finance');
            $financelist =  $response->getBody();
            if($financelist=="empty"){
                return view('adminpanel.finance')->with('users','empty');
            }
            else{
                $jsonresponse=json_decode($financelist,true);
                return view('adminpanel.finance')->with('users',$jsonresponse);
            }
          }
          else{
            return redirect('/admin/login');
          }   	

      }
      public function adminapprove(Request $request)
      {
            $proposalid=$request->proposalid;
            $bidvalue=$request->bidvalue;
            $amount=$bidvalue;
            $jobid=$request->jobid;
            $status=$request->status;
            $freelancerid=$request->freelancerid;
            $paymentid=$request->paymentid;
            if($status=="Completed"){
                $client = new \GuzzleHttp\Client();
                $completeamount = $client->request('POST', env('DBHOST').'api/completeamount', ['form_params' => ['proposalid' => $proposalid]]);
                $comp =  $completeamount->getBody();
                $object=json_decode($comp,true); 
                $amount=$object['amount'];
            } 
            \Stripe\Stripe::setApiKey ( env('secret_key') );
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', env('DBHOST').'api/freelancerbankdetails', ['form_params' => ['freelancerid' => $freelancerid]]);
            $a =  $response->getBody();
            $obj=json_decode($a,true);
            $acc_no = $obj['accountnumber'];
            $cusid = $obj['customerid'];
            $bank_id=$obj['bankid'];
             try{
               $result =  \Stripe\Transfer::create(array(
                "amount" => $amount * 100,
                "currency" => "usd",
                "destination" => $cusid
              ));
               }catch(\Stripe\Error\Card $e){
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return redirect('/finance')->with('flags','2')->with('err',$err);
                }catch (\Stripe\Error\RateLimit $e) {
                    $body = $e->getJsonBody();
                    return $err  = $body['error']['message'];
                    return redirect('/finance')->with('flags','2')->with('err',$err);
                } catch (\Stripe\Error\InvalidRequest $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return redirect('/finance')->with('flags','2')->with('err',$err);
                } catch (\Stripe\Error\Authentication $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return redirect('/finance')->with('flags','2')->with('err',$err);
                } catch (\Stripe\Error\ApiConnection $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return redirect('/finance')->with('flags','2')->with('err',$err);
                } catch (\Stripe\Error\Base $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return redirect('/finance')->with('flags','2')->with('err',$err);
                } catch (Exception $e) {
                    return redirect('/finance')->with('flags','2');
                    return back();
                }
             if($result['status']=="paid"){
              try{
                  $result =  \Stripe\Transfer::create(
                    array(
                      "amount" =>  100* $amount,
                      "currency" => "usd",
                      "destination" => $bank_id
                    ),
                    array("stripe_account" => $cusid)
                  );
                }
              catch(\Exception $ex){
                //return $e;
                return redirect('/finance')->with('flags','2');
              }
             }
         $a = $result['id'];
         $authorization = "Authorization: Bearer ".env('secret_key');
         $auth2 = "Stripe-Account: ".$cusid;
        // return $result['id'];
          $curl = curl_init(); 
          curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json',$authorization,$auth2 ));
          curl_setopt($curl,CURLOPT_URL,"https://api.stripe.com/v1/transfers/$a");
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
          $d=curl_exec($curl);
          curl_close($curl);
          $response=json_decode($d,true);
          if($response['status'] == "paid" ){
            //else{
            if($status=="Completed"){
                  $client = new \GuzzleHttp\Client();
                  $response = $client->request('POST', env('DBHOST').'api/completeapprove', ['form_params' =>['proposalid'=>$proposalid,'jobid'=>$jobid,'status'=>$status]]);
                  $finance =  $response->getBody();
                  $jsonresponse=json_decode($finance,true);
                  if($jsonresponse['response']=="updated"){
                    $amount=$jsonresponse['amount'];
                    $response2 = $client->request('POST',env('DBHOST').'api/getfreelanceremail', ['form_params' =>['freelancerid'=>$freelancerid]]);
                    $apiresponse1 =  $response2->getBody();
                    $jsonresponse2=json_decode($apiresponse1,true);
                    $freelanceremail=$jsonresponse2['email'];
                    $freelancername=$jsonresponse2['name'];
                    $response = $client->request('POST', env('DBHOST').'api/emails');
                    $s =  $response->getBody();
                    $obj=json_decode($s,true);
                    $content=$obj[0]['PAYMENT TO FREELANCER MAIL']['content'];
                    $header=$obj[0]['emailtemplate1'];
                    $footer=$obj[0]['emailtemplate2'];
                    $subject=$obj[0]['PAYMENT TO FREELANCER MAIL']['subject'];
                    Mail::send('emails.paymenttofreelancer',['title' =>$content,'name'=>$freelancername,'header'=>$header,'footer'=>$footer], function ($message) use ($freelanceremail,$subject)
                         {
                            //echo $objemail;
                            $message->from('productscog.ht@gmail.com','RBS');
                            $message->to("$freelanceremail")->subject("$subject");
                         });
                    // return redirect('/finance')->with('flags','1');
                  }
            }
            if($status!="Completed"){
                  $client = new \GuzzleHttp\Client();
                  $response = $client->request('POST', env('DBHOST').'api/singleapprove', ['form_params' =>
                          ['proposalid'=>$proposalid,'jobid'=>$jobid,'status'=>$status,'paymentid'=>$paymentid]]);
                  $finance =  $response->getBody();
                  $jsonresponse=json_decode($finance,true);
                  if($jsonresponse['response']=="updated"){
                    $response2 = $client->request('POST',env('DBHOST').'api/getfreelanceremail', ['form_params' =>
                            ['freelancerid'=>$freelancerid]]);
                    $apiresponse1 =  $response2->getBody();
                    $jsonresponse2=json_decode($apiresponse1,true);
                    $freelanceremail=$jsonresponse2['email'];
                    $freelancername=$jsonresponse2['name'];
                    $response = $client->request('POST', env('DBHOST').'api/emails');
                    $s =  $response->getBody();
                    $obj=json_decode($s,true);
                    $content=$obj[0]['PAYMENT TO FREELANCER MAIL']['content'];
                    $header=$obj[0]['emailtemplate1'];
                    $footer=$obj[0]['emailtemplate2'];
                    $subject=$obj[0]['PAYMENT TO FREELANCER MAIL']['subject'];
                    Mail::send('emails.paymenttofreelancer',['title' =>$content,'name'=>$freelancername,'header'=>$header,'footer'=>$footer], function ($message) use ($freelanceremail,$subject)
                         {
                            //echo $objemail;
                            $message->from('productscog.ht@gmail.com','RBS');
                            $message->to("$freelanceremail")->subject("$subject");
                         });
                    
                  }
                }
            //}
                 return redirect('/finance')->with('flags','1');
          }

          else{
            //return "ok";
             return redirect('/finance')->with('flags','2');
          }
            
      }
      public function completeprojects(Request $request)
      {
          if($request->session()->has('adminsession')){
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', env('DBHOST').'api/completeprojectlist');
            $completeprojectlist =  $response->getBody();
            $jsonresponse=json_decode($completeprojectlist,true);
            if($jsonresponse=="empty"){
              return  view('adminpanel.comproj')->with('users',"ok");
            }
            else{
              return  view('adminpanel.comproj')->with('users',$jsonresponse);
            }
          }
          else{
            return redirect('/admin/login');
          }  

      }

      public function adminlogin(Request $request)
      {
        return view('adminpanel.login');
      }

      public function adminlogincheck(Request $request)
      {
        $username = $request->name;
        $password = $request->password;
        if( ($username == "admin") && ($password == "adminpassword")){
          $request->session()->put('adminsession', '53444');
          return redirect('/admin');
        }else{
          return redirect('/admin/login')->with('status','loginfailure');
        }
    }

    public function adminlogout(Request $request)
    {
          if($request->session()->has('adminsession')){
            $request->session()->forget('adminsession');
            return redirect('/admin/login');
          }
          else{
            return redirect('/admin/login');
          }
    }
    public function freelanceraccountview(Request $request,$id)
    {
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST', env('DBHOST').'api/freelanceraccountview', ['form_params' => ['id'=>$id]]);
      $s =  $response->getBody();
      $obj=json_decode($s);
      if($obj==[])
      {
        return view('adminpanel.freelanceraccountview')->with('flags','0');
      }
      else
      {
        return view('adminpanel.freelanceraccountview')->with('users',$s)->with('flags','1');
      }
    }

}