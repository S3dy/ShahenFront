<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Mail;
use Illuminate\Mail\Mailable;

class RegisterController extends Controller
{
    public function freelancerregister(Request $request)
    {
          $rules = ['captcha' => 'required|captcha'];
          $validator = Validator::make(Input::all(), $rules);
          if ($validator->fails()){
              return redirect('signup/create-account/freelancer_direct')->with('flag','2');
              //return view('CaptchaIncorrect');
          }
          else{
    	    $firstname=$request->firstname;
          $lastname=$request->lastname;
          $country=$request->country;
          $username=$request->username;
          $email=$request->email;
          $password=$request->password;
          $role="freelancer";
          $client = new \GuzzleHttp\Client();
          $response = $client->request('POST',env('DBHOST').'api/freelancerregister', ['form_params' => 
          	['firstname' => $firstname,'lastname' => $lastname,'username' => $username,'country' => $country,'email'=>$email,'password'=>
          	$password,'role'=>$role] ]);
          $freelancerresponse =  $response->getBody();
          if($freelancerresponse=="Email already exist"){
            return redirect('signup/create-account/freelancer_direct')->with('flag','1');
          }
          elseif ($freelancerresponse=="Username already exist"){
            return redirect('signup/create-account/freelancer_direct')->with('flag','1');
          }
          elseif ($freelancerresponse=="Register failed"){
            return redirect('signup/create-account/freelancer_direct');
          }
          else{
            $jsonresponse=json_decode($freelancerresponse,'true');
            $id=$jsonresponse['id'];
            $role=$jsonresponse['role'];
            $username=$jsonresponse['username'];
            $profilepic=$jsonresponse['profilepic'];
            $request->session()->put('role',$role);
            $request->session()->put('freelancer_id',$id);
            $request->session()->put('prodp',$profilepic);
            $request->session()->put('username',$username);
            //For Email
              $client = new \GuzzleHttp\Client();
                     $response = $client->request('POST', env('DBHOST').'api/emails');
                     $a =  $response->getBody();
                     $obj=json_decode($a,true);
                     $content=$obj[0]['FREELANCER SIGN UP MAIL']['content'];
                     $header=$obj[0]['emailtemplate1'];
                     $footer=$obj[0]['emailtemplate2'];
                     $subject=$obj[0]['FREELANCER SIGN UP MAIL']['subject'];
                     Mail::send('emails.freelancersignupmail',['title' =>$content,'name'=>$username,'header'=>$header,'footer'=>$footer], function ($message) use ($request,$subject)
                     {
                        $message->from('productscog.ht@gmail.com', 'RBS');
                        $message->to($request->email)->subject("$subject");
                     });
            return redirect('freeSession');
          }
    	  }
   	}
    public function providerregister(Request $request)
    {
    	$firstname = $request->firstname;
    	$lastname = $request->lastname;
    	$companyname = $request->companyname;
    	$country = $request->country;
    	$email = $request->email;
    	$password = $request->password;
    	$role = "provider";
    	$client = new \GuzzleHttp\Client();
    	$response=$client->request('POST',env('DBHOST').'api/providerregister',['form_params'=>['firstname'=>$firstname,'lastname'=>$lastname,'companyname'=>$companyname,'country'=>$country,'email'=>$email,'password'=>$password,'role'=>$role]]);
    	$providerresponse = $response->getBody();
      if($providerresponse=="RegisterFailed"){
          return redirect('/signup/create-account/client_direct')->with('flag','1');
      }
      else{
      $jsonresponse=json_decode($providerresponse,'true');
      $id=$jsonresponse['id'];
      $email=$jsonresponse['email'];
      $role=$jsonresponse['role'];
      $firstname=$jsonresponse['firstname'];
      $profilepic=$jsonresponse['profilepic'];
      $request->session()->put('role',$role);
      $request->session()->put('provider_id',$id);
      $request->session()->put('email',$email);
      $request->session()->put('prodp',$profilepic);
      $request->session()->put('firstname',$firstname);
      //For Email
               $client = new \GuzzleHttp\Client();
               $response = $client->request('POST', env('DBHOST').'api/emails');
               $s =  $response->getBody();
               $obj=json_decode($s,true);
               $content=$obj[0]['PROVIDER SIGN UP MAIL']['content'];
               $header=$obj[0]['emailtemplate1'];
               $footer=$obj[0]['emailtemplate2'];
               $subject=$obj[0]['PROVIDER SIGN UP MAIL']['subject'];

               Mail::send('emails.providersignupmail',['title' =>$content,'name'=>$firstname,'header'=>$header,'footer'=>$footer], function ($message) use ($request,$subject)
               {
                  $message->from('productscog.ht@gmail.com', 'RBS');
                  $message->to($request->email)->subject("$subject");
               });
      return redirect('provideSession');
      }

    }
}
