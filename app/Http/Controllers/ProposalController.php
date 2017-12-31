<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Mail\Mailable;

class ProposalController extends Controller
{
    public function submitproposalview(Request $request,$jobid)
    {	
        if($request->session()->has('freelancer_id')){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/submitproposalview', ['form_params' =>['jobid'=>$jobid]]);
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        return view('freelancer.submitproposal')->with('users',$jsonresponse);
        }
        else{

        return redirect('ab/account-security/login');
        }


    }

    public function saveproposal(Request $request)
    {
       if($request->session()->has('freelancer_id')){
        $freelancerid = $request->session()->get('freelancer_id');
        $providerid = $request->providerid;
        $jobname = $request->jobname;
        $jobid = $request->jobid;
        $duration = $request->duration;
        $cover = $request->cover;
        $uxdescription = $request->uxdescription;
        $uidescription = $request->uidescription;
        $uxuidescription = $request->uxuidescription;
        $tools = $request->tools;
        $youreceive = $request->youreceive;
        $bidvalue = $request->bidvalue;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/saveproposal', ['form_params' =>
                ['freelancerid'=>$freelancerid,'providerid'=>$providerid,'jobname'=>$jobname,'jobid'=>$jobid,'duration'=>$duration,'cover'=>$cover,'uxdescription'=>$uxdescription,'uidescription'=>$uidescription,'uxuidescription'=>$uxuidescription,'tools'=>$tools,'youreceive'=>$youreceive,'bidvalue'=>$bidvalue]]);
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'] =="failed"){

            return back()->with('flag','failure');
        }
        elseif($jsonresponse['response'] =="failed1"){

            return back()->with('flag','1');
        }
        else{
        //For Mail
            $response1 = $client->request('POST',env('DBHOST').'api/getprovideremail', ['form_params' =>
                    ['providerid'=>$providerid]]);
            $apiresponse =  $response1->getBody();
            $jsonresponse1=json_decode($apiresponse,true);
            $provideremail=$jsonresponse1['email'];
            $providername=$jsonresponse1['name'];
            $response2 = $client->request('POST',env('DBHOST').'api/getfreelanceremail', ['form_params' =>
                    ['freelancerid'=>$freelancerid]]);
            $apiresponse1 =  $response2->getBody();
            $jsonresponse2=json_decode($apiresponse1,true);
            $freelanceremail=$jsonresponse2['email'];
            $freelancername=$jsonresponse2['name'];
            $response = $client->request('POST', env('DBHOST').'api/emails');
                   $a =  $response->getBody();
                   $obj=json_decode($a,true);
                   $content=$obj[0]['SUBMIT PROPOSAL MAIL']['content'];
                   $header=$obj[0]['emailtemplate1'];
                   $footer=$obj[0]['emailtemplate2'];
                   $subject=$obj[0]['SUBMIT PROPOSAL MAIL']['subject'];
                   $content1=$obj[0]['SUBMIT PROPOSAL MAIL FREELANCER']['content'];
                   $subject1=$obj[0]['SUBMIT PROPOSAL MAIL FREELANCER']['subject'];
                   //return "ok";
               Mail::send('emails.submitproposalmail',['title' =>$content,'name'=>$providername,'header'=>$header,'footer'=>$footer], function ($message) use ($provideremail,$subject)
               {
                  //echo $objemail;
                  $message->from('productscog.ht@gmail.com', 'RBS');
                  $message->to("$provideremail")->subject("$subject");
               });
               Mail::send('emails.submitproposalmailfreelancer',['title' =>$content1,'name'=>$freelancername,'header'=>$header,'footer'=>$footer], function ($message) use ($freelanceremail,$subject1)
               {
                  //echo $objemail;
                  $message->from('productscog.ht@gmail.com', 'RBS');
                  $message->to("$freelanceremail")->subject("$subject1");
               });
            return back()->with('flag','success');
        }
       }
       else{
        return redirect('ab/account-security/login');
       }

    }

    public function providerofferview($id,$jobid,Request $request)
    {
      if($request->session()->has('provider_id')){
        $providerid = $request->session()->get('provider_id');
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/providerofferview',['form_params'=>['proposalid'=>$id]]);
        $apiresponse = $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        $providerid1=$jsonresponse[0]['providerid'];
        if($providerid==$providerid1){
          $response1 = $client->request('POST',env('DBHOST').'api/projectselect',['form_params'=>['jobid'=>$jobid]]);
          $apiresponse1 = $response1->getBody();
          $jsonresponse1 = json_decode($apiresponse1,true);
          $response2 = $client->request('POST',env('DBHOST').'api/providermessageview',['form_params'=>['proposalid'=>$id]]);
          $apiresponse2 = $response2->getBody();
          $jsonresponse2 = json_decode($apiresponse2,true);
          return view('provider.providerviewoffer')->with('users',$jsonresponse)->with('id',$id)->with('users1',$jsonresponse1)->with('users2',$jsonresponse2);
        }
        else{
          return redirect('ab/account-security/login');
        }

      }
      else{
        return redirect('ab/account-security/login');
      }
       
    }



    public function acceptproposal(Request $request)
    {
        $jobid = $request->jobid;
        $proposalid = $request->proposalid;
        $freelancerid=$request->freelancerid;
        $client = new \GuzzleHttp\Client();
        $response1 = $client->request('POST',env('DBHOST').'api/proposalcheck',['form_params'=>['jobid'=>$jobid,'proposalid'=>$proposalid]]);
        $apiresponse1 = $response1->getBody();
        $jsonresponse1 = json_decode($apiresponse1,true);
        if($jsonresponse1['response']=="false"){
            return "false";
        }
        else{
            $response = $client->request('POST',env('DBHOST').'api/acceptproposal',['form_params'=>['jobid'=>$jobid,'proposalid'=>$proposalid]]);
            $apiresponse = $response->getBody();
            $jsonresponse = json_decode($apiresponse,true);
            if($jsonresponse['response'] == "accept"){
            $response2 = $client->request('POST',env('DBHOST').'api/getfreelanceremail', ['form_params' =>
                    ['freelancerid'=>$freelancerid]]);
            $apiresponse1 =  $response2->getBody();
            $jsonresponse2=json_decode($apiresponse1,true);
            $freelanceremail=$jsonresponse2['email'];
            $freelancername=$jsonresponse2['name'];
            $response = $client->request('POST', env('DBHOST').'api/emails');
                   $a =  $response->getBody();
                   $obj=json_decode($a,true);
                   $content=$obj[0]['ACCEPT PROPOSAL MAIL']['content'];
                   $header=$obj[0]['emailtemplate1'];
                   $footer=$obj[0]['emailtemplate2'];
                   $subject=$obj[0]['ACCEPT PROPOSAL MAIL']['subject'];
                   //return "ok";
                   Mail::send('emails.acceptproposalmail',['title' =>$content,'name'=>$freelancername,'header'=>$header,'footer'=>$footer], function ($message) use ($freelanceremail,$subject)
                   {
                      $message->from('productscog.ht@gmail.com', 'RBS');
                      $message->to("$freelanceremail")->subject("$subject");
                   });
                return "proposal accepted";
            }
            else{
                return "proposal not accepted";
            }
        }
    }

    public function declineproposal(Request $request)
    {
      if($request->session()->has('provider_id')){
        $providerid=$request->session()->get('provider_id');
        $freelancerid=$request->freelancerid;
        $proposalid = $request->proposalid;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/declineproposal',['form_params'=>['proposalid'=>$proposalid]]);
        $apiresponse = $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'] == "decline"){
            $response1 = $client->request('POST',env('DBHOST').'api/getprovideremail', ['form_params' =>
                    ['providerid'=>$providerid]]);
            $apiresponse =  $response1->getBody();
            $jsonresponse1=json_decode($apiresponse,true);
            $provideremail=$jsonresponse1['email'];
            $providername=$jsonresponse1['name'];
            $response2 = $client->request('POST',env('DBHOST').'api/getfreelanceremail', ['form_params' =>
                    ['freelancerid'=>$freelancerid]]);
            $apiresponse1 =  $response2->getBody();
            $jsonresponse2=json_decode($apiresponse1,true);
            $freelanceremail=$jsonresponse2['email'];
            $freelancername=$jsonresponse2['name'];

            $response = $client->request('POST', env('DBHOST').'api/emails');
                   $a =  $response->getBody();
                   $obj=json_decode($a,true);
                   $content=$obj[0]['DECLINE PROPOSAL MAIL']['content'];
                   $header=$obj[0]['emailtemplate1'];
                   $footer=$obj[0]['emailtemplate2'];
                   $subject=$obj[0]['DECLINE PROPOSAL MAIL']['subject'];
                   $content1=$obj[0]['DECLINE PROPOSAL MAIL PROVIDER']['content'];
                   $subject1=$obj[0]['DECLINE PROPOSAL MAIL PROVIDER']['subject'];
                   //return "ok";
               Mail::send('emails.declineproposalmail',['title' =>$content,'name'=>$freelancername,'header'=>$header,'footer'=>$footer], function ($message) use ($freelanceremail,$subject)
               {
                  //echo $objemail;
                  $message->from('productscog.ht@gmail.com','RBS');
                  $message->to("$freelanceremail")->subject("$subject");
               });
               Mail::send('emails.declineproposalmailprovider',['title' =>$content1,'name'=>$providername,'header'=>$header,'footer'=>$footer], function ($message) use ($provideremail,$subject1)
               {
                  //echo $objemail;
                  $message->from('productscog.ht@gmail.com','RBS');
                  $message->to("$provideremail")->subject("$subject1");
               });
            return "proposal declined";
        }
      }
      else{
         return "failed";
      }
        
    }

    public function freelancerofferview($id,$jobid,Request $request)
    {
      if($request->session()->has('freelancer_id')){
        $freelancerid=$request->session()->get('freelancer_id');
        $proposalid = $id;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/freelancerofferview',['form_params'=>['proposalid'=>$proposalid]]);
        $apiresponse = $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        $freelancerid1=$jsonresponse[0]['freelancerid'];
        if($freelancerid==$freelancerid1){
          $response1 = $client->request('POST',env('DBHOST').'api/projectselect',['form_params'=>['jobid'=>$jobid]]);
          $apiresponse1 = $response1->getBody();
          $jsonresponse1 = json_decode($apiresponse1,true);
          $response2 = $client->request('POST',env('DBHOST').'api/freelancermessageview',['form_params'=>['proposalid'=>$proposalid]]);
          $apiresponse2 = $response2->getBody();
          $jsonresponse2 = json_decode($apiresponse2,true);
          return view('freelancer.viewoffer')->with('users',$jsonresponse)->with('id',$id)->with('users1',$jsonresponse1)->with('users2',$jsonresponse2);
        }
        else{
          return redirect('ab/account-security/login');
        }
      }
      else{
         return redirect('ab/account-security/login');
      }

    }

    public function startproject(Request $request)
    {
      if($request->session()->has('freelancer_id')){
        $freelancerid = $request->session()->get("freelancer_id");
        $jobid = $request->jobid;
        $proposalid = $request->proposalid;
        $providerid=$request->providerid;
        $client = new \GuzzleHttp\Client();
        $response1 = $client->request('POST',env('DBHOST').'api/accountcheck',['form_params'=>['freelancerid'=>$freelancerid]]);
        $apiresponse1 = $response1->getBody();
        $jsonresponse1 = json_decode($apiresponse1,true);
        if($jsonresponse1['response']=="failed"){
            return redirect('displayBill')->with('flag','5');
        }
        else{
        $response = $client->request('POST',env('DBHOST').'api/startproject',['form_params'=>['jobid'=>$jobid,'proposalid'=>$proposalid,'freelancerid'=>$freelancerid]]);
        $apiresponse = $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        return back();
        }
      }
      else{
        return redirect('ab/account-security/login');
      }

    }

    public function proposalcount(Request $request)
    {
      if($request->session()->has('freelancer_id')){
        $freelancerid = $request->session()->get("freelancer_id");
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/proposalcount',['form_params'=>['freelancerid'=>$freelancerid]]);
        $apiresponse = $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        return view('freelancer.myproposalactive')->with('users',$jsonresponse);
      }
      else{
        return redirect('ab/account-security/login');
      }
    }
    public function providercomplete(Request $request)
    {
        $jobid=$request->jobid;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/providercomplete',['form_params'=>['jobid'=>$jobid]]);
        $apiresponse = $response->getBody();
        return back();
    }
}
