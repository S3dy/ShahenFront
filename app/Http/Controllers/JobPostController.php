<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Mail\Mailable;

class JobPostController extends Controller
{
    public function postjobview(Request $request)
    {
      if($request->session()->has('provider_id')){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/postjobview');
        $apiresponse = $response->getBody();
        // $obj=json_decode($apiresponse,true); 
        // return$value=$obj[0]['category'][0];
        return view('provider.postajob')->with('users',$apiresponse);
      }
      else{
        return redirect('ab/account-security/login');
      }

    }

    public function jobpost(Request $request)
    {
      if($request->session()->has('provider_id')){
      $id = $request->session()->get('provider_id');
      $jobname = trim($request->jobname);
      $category = $request->projectcategory;
      $howmanyfreelancer = $request->hireone;
      $skills = $request->skills;
      $payment = $request->pay;
      $budget = $request->budget;
      $experiencelevel = $request->experiencelevel;
      $visibleduration = $request->visibleduration;
      $timecommitment = $request->timecommitment;
      $help = $request->help;
      $freelancerdoing = $request->freelancerdoing;
      $qualities = $request->qualities;
      $visibility = $request->visibility;
        $freelancertype = $request->freelancertype;
        $jobsuccessscore = $request->jobsuccessscore;
        $risingtalent = $request->risingtalent;
        $hoursbilledonrbs = $request->hoursbilledonrbs;
        $location = $request->location;
        $englishlevel = $request->englishlevel;
        $group = $request->group;
        $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/jobpost', ['form_params' =>
              ['id'=>$id,'jobname'=>$jobname,'category'=>$category,'howmanyfreelancer'=>$howmanyfreelancer,'skills'=>$skills,'payment'=>$payment,'experiencelevel'=>$experiencelevel,'visibleduration'=>$visibleduration,'timecommitment'=>$timecommitment,'help'=>$help,'freelancerdoing'=>$freelancerdoing,'qualities'=>$qualities,'visibility'=>$visibility,'freelancertype'=>$freelancertype,'jobsuccessscore'=>$jobsuccessscore,'risingtalent'=>$risingtalent,'hoursbilledonrbs'=>$hoursbilledonrbs,'location'=>$location,'englishlevel'=>$englishlevel,'group'=>$group,'budget'=>$budget]]);
      $apiresponse =  $response->getBody();
      $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse){
            return back()->with('flag','1');
        }else{
            return back()->with('flag','0');
        }
      }
      else{
        return redirect('ab/account-security/login');
      }

        
    }

    public function myjobview(Request $request)
    {
        if($request->session()->has('provider_id')){

            $id=$request->session()->get('provider_id');
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST',env('DBHOST').'api/myjobview', ['form_params' =>
                ['id'=>$id]]);
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if ($jsonresponse=="empty"){

            return view('provider.myjob')->with('users',$jsonresponse)->with('flags','0');    
        }
        else{

            return view('provider.myjob')->with('users',$jsonresponse)->with('flags','1');    
        }

        }
        else{

            return redirect('/ab/account-security/login');
        }
    }

    public function projectdetails(Request $request,$id)
    {
            if($request->session()->has('provider_id')){

             $client = new \GuzzleHttp\Client();
             $response = $client->request('POST',env('DBHOST').'api/jobdetailsview', ['form_params' =>
                ['jobid'=>$id]]);
              $apiresponse =  $response->getBody();
              $jsonresponse = json_decode($apiresponse,true);
              return view('provider.posted_job_view')->with('users',$jsonresponse);
              //return view('freelancer.submitproposal')->with('users',$s);

            }
            else{

               return redirect('ab/account-security/login');
            } 
    }

    public function selectproject(Request $request,$jobid,$providerid)
    {
      if($request->session()->has('freelancer_id'))
      {
        $client = new \GuzzleHttp\Client();
          $response = $client->request('POST',env('DBHOST').'api/selectproject', ['form_params' =>
            ['jobid' => $jobid] ]);
        $apiresponse1 =  $response->getBody();
        $jsonresponse1 = json_decode($apiresponse1,true);
          $response = $client->request('POST',env('DBHOST').'api/feedback', ['form_params' =>
            ['jobid' => $jobid,'providerid'=>$providerid] ]);
        $apiresponse2 =  $response->getBody();
        $jsonresponse2 = json_decode($apiresponse2,true);
        // $obj=json_decode($a,true);
        // return $job=$obj[1]['job_name'];
        return view('freelancer.selectproject')->with('users',$jsonresponse1)->with('users1',$jsonresponse2);

      }
      else
      {
        return redirect('ab/account-security/login');
      }

    }

    public function providerongoingprojects(Request $request)
    {
        if($request->session()->has('provider_id')){
        $providerid = $request->session()->get("provider_id");    
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/providerongoingprojects',['form_params'=>['providerid'=>$providerid]]);
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        return view('provider.ProviderOngoingProjects')->with('users',$jsonresponse);
      }
      else{
        return redirect('ab/account-security/login');
      }
    }

    public function freelancerongoingprojects(Request $request)
    {
        if($request->session()->has('freelancer_id')){
          //return $request->session()->get("dp");
        $freelancerid = $request->session()->get("freelancer_id");    
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/freelancerongoingprojects',['form_params'=>['freelancerid'=>$freelancerid]]);
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        return view('freelancer.ongoingproj')->with('users',$jsonresponse);
      }
      else{
        return redirect('ab/account-security/login');
      }
    }

    public function completeproject(Request $request)
        {
          //return "ok";
          $providerid = $request->providerid;
          $jobid = $request->jobid;
          $proposalid = $request->proposalid;
          $freelancerid = $request->session()->get('freelancer_id');
          $client = new \GuzzleHttp\Client();
             // $response = $client->request('POST', env('DBHOST').'api/getProEmail',['form_params' =>
             //      ['provider_name'=>$providerid] ]);
          $response = $client->request('POST',env('DBHOST').'api/completeproject', ['form_params' =>
                   ['freelancerid'=>$freelancerid,'jobid'=>$jobid,'providerid'=>$providerid,'proposalid'=>$proposalid] ]);
          $apiresponse =  $response->getBody();
          $jsonresponse = json_decode($apiresponse,true);
          if($jsonresponse['response']=="updated"){
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
                   $content=$obj[0]['PROJECT COMPLETED MAIL']['content'];
                   $header=$obj[0]['emailtemplate1'];
                   $footer=$obj[0]['emailtemplate2'];
                   $subject=$obj[0]['PROJECT COMPLETED MAIL']['subject'];
                   $content1=$obj[0]['PROJECT COMPLETED MAIL FREELANCER']['content'];
                   $subject1=$obj[0]['PROJECT COMPLETED MAIL FREELANCER']['subject'];
                   //return "ok";
               Mail::send('emails.projectcompletemail',['title' =>$content,'name'=>$providername,'header'=>$header,'footer'=>$footer], function ($message) use ($provideremail,$subject)
               {
                  //echo $objemail;
                  $message->from('productscog.ht@gmail.com', 'RBS');
                  $message->to("$provideremail")->subject("$subject");
               });
               Mail::send('emails.projectcompletemailfreelancer',['title' =>$content1,'name'=>$freelancername,'header'=>$header,'footer'=>$footer], function ($message) use ($freelanceremail,$subject1)
               {
                  //echo $objemail;
                  $message->from('productscog.ht@gmail.com', 'RBS');
                  $message->to("$freelanceremail")->subject("$subject1");
               });
             return "updated";
          }
             // $response2 = $client->request('POST', env('DBHOST').'api/getEmail',['form_params' =>
             //      ['freelancer_name'=>$name] ]);
             // $objemail1 =  $response2->getBody();
              //$data=array('emails'=>$objemail);
              //return $data['emails'];
          //          $client = new \GuzzleHttp\Client();
          //          $response = $client->request('POST', env('DBHOST').'api/emails');
          //          $a =  $response->getBody();
          //          $obj=json_decode($a,true);
          //          $content=$obj[0]['PROJECT COMPLETED MAIL']['content'];
          //          $header=$obj[0]['email_temp1'];
          //          $footer=$obj[0]['email_temp2'];
          //          $subject=$obj[0]['PROJECT COMPLETED MAIL']['subject'];
          //          $content1=$obj[0]['PROJECT COMPLETED MAIL FREELANCER']['content'];
          //          $subject1=$obj[0]['PROJECT COMPLETED MAIL FREELANCER']['subject'];
          //          //return "ok";
          //      Mail::send('emails.projectcompletemail',['title' =>$content,'job'=>$jobname,'name'=>$providername,'header'=>$header,'footer'=>$footer], function ($message) use ($objemail,$subject)
          //      {
          //         //echo $objemail;
          //         $message->from('productscog.ht@gmail.com', 'RBS');
          //         $message->to("$objemail")->subject("$subject");
          //      });
          //      Mail::send('emails.projectcompletemailfreelancer',['title' =>$content1,'job'=>$jobname,'name'=>$name,'header'=>$header,'footer'=>$footer], function ($message) use ($objemail1,$subject1)
          //      {
          //         //echo $objemail;
          //         $message->from('productscog.ht@gmail.com', 'RBS');
          //         $message->to("$objemail1")->subject("$subject1");
          //      });
          //           //return "ok";
          // $client = new \GuzzleHttp\Client();
          // $response1 = $client->request('POST',env('DBHOST').'api/mess_free', ['form_params' =>
          //         ['freelancer_name'=>$name,'job_name'=>$jobname,'provider_name'=>$providername] ]);
          // $s =  $response1->getBody();
          // return $s;
        }
    
}
