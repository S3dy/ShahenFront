<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Mail\Mailable;

class MessageController extends Controller
{
    public function freelancermessage(Request $request)
	{
        if($request->session()->has('freelancer_id')){
        $freelancerid = $request->session()->get('freelancer_id');
        $providerid = $request->providerid;
        $proposalid = $request->proposalid;
        $message = $request->message;
        $jobid = $request->jobid;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', env('DBHOST').'api/freelancermessage', ['form_params' => ['providerid'=>$providerid,'freelancerid'=>$freelancerid,'proposalid'=>$proposalid,'message'=>$message]]);
        $apiresponse = $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        $response1 = $client->request('POST',env('DBHOST').'api/getprovideremail', ['form_params' =>
                    ['providerid'=>$providerid]]);
        $apiresponse =  $response1->getBody();
        $jsonresponse1=json_decode($apiresponse,true);
        $provideremail=$jsonresponse1['email'];
        $providername=$jsonresponse1['name'];
        //For Mail
                   $response = $client->request('POST', env('DBHOST').'api/emails');
                   $a =  $response->getBody();
                   $obj=json_decode($a,true);
                   $content=$obj[0]['MESSAGE FROM FREELANCER MAIL']['content'];
                   $header=$obj[0]['emailtemplate1'];
                   $footer=$obj[0]['emailtemplate2'];
                   $subject=$obj[0]['MESSAGE FROM FREELANCER MAIL']['subject'];
                   //return "ok";
               Mail::send('emails.messagefreelancer',['title' =>$content,'provider'=>$providername,'msg'=>$message,'header'=>$header,'footer'=>$footer], function ($message) use ($provideremail,$subject)
               {
                  //echo $objemail;
                  $message->from('productscog.ht@gmail.com', 'RBS');
                  $message->to("$provideremail")->subject("$subject");
               });
        return redirect('offerview/'.$proposalid.'/'.$jobid);
        }
        else{
            return redirect('ab/account-security/login');
        }
		

   	}

   	public function providermessage(Request $request)
	{
        if($request->session()->has('provider_id')){
        $providerid = $request->session()->get('provider_id');
        $freelancerid = $request->freelancerid;
        $proposalid = $request->proposalid;
        $message = $request->message;
        $jobid = $request->jobid;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', env('DBHOST').'api/providermessage', ['form_params' => ['providerid'=>$providerid,'freelancerid'=>$freelancerid,'proposalid'=>$proposalid,'message'=>$message]]);
        $apiresponse = $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        $response2 = $client->request('POST',env('DBHOST').'api/getfreelanceremail', ['form_params' =>
                    ['freelancerid'=>$freelancerid]]);
            $apiresponse1 =  $response2->getBody();
            $jsonresponse2=json_decode($apiresponse1,true);
            $freelanceremail=$jsonresponse2['email'];
            $freelancername=$jsonresponse2['name'];
            //For Mail
                   $response = $client->request('POST', env('DBHOST').'api/emails');
                   $a =  $response->getBody();
                   $obj=json_decode($a,true);
                   $content=$obj[0]['MESSAGE FROM PROVIDER MAIL']['content'];
                   $header=$obj[0]['emailtemplate1'];
                   $footer=$obj[0]['emailtemplate2'];
                   $subject=$obj[0]['MESSAGE FROM PROVIDER MAIL']['subject'];
                   //return "ok";
               Mail::send('emails.messageprovider',['title' =>$content,'freelancer'=>$freelancername,'msg'=>$message,'header'=>$header,'footer'=>$footer], function ($message) use ($freelanceremail,$subject)
               {
                  //echo $objemail;
                  $message->from('productscog.ht@gmail.com', 'RBS');
                  $message->to("$freelanceremail")->subject("$subject");
               });

         return redirect('providerofferview/'.$proposalid.'/'.$jobid);
        }
        else{
            return redirect('ab/account-security/login');
        }


   	}

}
