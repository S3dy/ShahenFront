<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Session;
use Mail;
use Illuminate\Mail\Mailable;

class SocialController extends Controller
{
	//Social Redirect Functions
    public function providersignupfacebook(Request $request)
    {
    	if($request->session()->has('provider_id')){
			return redirect('provideSession');
    	}
    	else if($request->session()->has('freelancer_id')){
    		return redirect('freeSession');
    	}
    	else{
    		$request->session()->put('provider','provider');
     	    return Socialite::driver('facebook')->redirect();
    	}

    }
    public function providersignuptwitter(Request $request)
    {
    	if($request->session()->has('provider_id')){
			return redirect('provideSession');
    	}
    	else if($request->session()->has('freelancer_id')){
    		return redirect('freeSession');
    	}
    	else{
    		$request->session()->put('provider','provider');
     	    return Socialite::driver('twitter')->redirect();
    	}
    }
    public function providersignupgoogle(Request $request)
    {
    	if($request->session()->has('provider_id')){
			return redirect('provideSession');
    	}
    	else if($request->session()->has('freelancer_id')){
    		return redirect('freeSession');
    	}
    	else{
    		$request->session()->put('provider','provider');
     	    return Socialite::driver('google')->redirect();
    	}
    }
    public function freelancersocialfacebook(Request $request)
    {
    	if($request->session()->has('provider_id')){
			return redirect('provideSession');
    	}
    	else if($request->session()->has('freelancer_id')){
    		return redirect('freeSession');
    	}
    	else{
    		$request->session()->put('freelancer','freelancer');
     	    return Socialite::driver('facebook')->redirect();
    	}
    }
    public function freelancersocialtwitter(Request $request)
    {
    	if($request->session()->has('provider_id')){
			return redirect('provideSession');
    	}
    	else if($request->session()->has('freelancer_id')){
    		return redirect('freeSession');
    	}
    	else{
    		$request->session()->put('freelancer','freelancer');
     	    return Socialite::driver('twitter')->redirect();
    	}
    }
    public function freelancersocialgoogle(Request $request)
    {
    	if($request->session()->has('provider_id')){
			return redirect('provideSession');
    	}
    	else if($request->session()->has('freelancer_id')){
    		return redirect('freeSession');
    	}
    	else{
    		$request->session()->put('freelancer','freelancer');
     	    return Socialite::driver('google')->redirect();
    	}
    }
    public function loginfacebook(Request $request)
    {
    	if($request->session()->has('provider_id')){
			return redirect('provideSession');
    	}
    	else if($request->session()->has('freelancer_id')){
    		return redirect('freeSession');
    	}
    	else{
    		$request->session()->put('login','login');
     	    return Socialite::driver('facebook')->redirect();
    	}
    }
    public function logintwitter(Request $request)
    {
    	if($request->session()->has('provider_id')){
			return redirect('provideSession');
    	}
    	else if($request->session()->has('freelancer_id')){
    		return redirect('freeSession');
    	}
    	else{
    		$request->session()->put('login','login');
     	    return Socialite::driver('twitter')->redirect();
    	}
    }
    public function logingoogle(Request $request)
    {
    	if($request->session()->has('provider_id')){
			return redirect('provideSession');
    	}
    	else if($request->session()->has('freelancer_id')){
    		return redirect('freeSession');
    	}
    	else{
    		$request->session()->put('login','login');
     	    return Socialite::driver('google')->redirect();
    	}
    }
    //Social CallBack Functions
    public function facebookcallback(Request $request)
    {
      if($request->error){
            return redirect('ab/account-security/login');
        }
      else{
			    if($request->session()->has('provider')){
		              $request->session()->forget('provider');
		              $SocialUser = Socialite::driver('facebook')->user();
		              $email=$SocialUser->getEmail();
		              if($email==""){
		                return redirect('/signup/create-account/client_direct')->with('flag','3');
		              }
		              $client = new \GuzzleHttp\Client();
		                $response = $client->request('POST',env('DBHOST').'api/providerfacebooksignup', ['form_params' => 
		                  ['facebookid' => $SocialUser->getId(),'name' => $SocialUser->getName(),'email'=>$SocialUser->getEmail()] ]);
		                $mailid = $SocialUser->getEmail();
		                $apiresponse =  $response->getBody();
		                $jsonresponse=json_decode($apiresponse,true);
		                if($jsonresponse['response']=="Register Failed")
		                {
		                    return redirect('/signup/create-account/client_direct')->with('flag','1');
		                }
		                else
		                {
					        $email=$jsonresponse['response']['email'];
					        $firstname=$jsonresponse['response']['firstname'];
					        $role=$jsonresponse['response']['role'];
					        $object_id=$jsonresponse['response']['_id'];
					        $profilepic = $jsonresponse['response']['profilepic'];
			                $request->session()->put('role',$role);
			                $request->session()->put('email',$email);
			                $request->session()->put('provider_id',$object_id);
			                $request->session()->put('firstname',$firstname);
			                $request->session()->put('prodp',$profilepic);
			                $client = new \GuzzleHttp\Client();
				            $response = $client->request('POST', env('DBHOST').'api/emails');
				            $s =  $response->getBody();
				            $obj=json_decode($s,true);
				            $content=$obj[0]['PROVIDER SIGN UP MAIL']['content'];
				            $header=$obj[0]['emailtemplate1'];
				            $footer=$obj[0]['emailtemplate2'];
				            $subject=$obj[0]['PROVIDER SIGN UP MAIL']['subject'];
				            Mail::send('emails.providersignupmail',['title' =>$content,'name'=>$firstname,'header'=>$header,'footer'=>$footer], function ($message) use ($mailid,$subject)
				             {
				                $message->from('productscog.ht@gmail.com', 'RBS');
				                $message->to("$mailid")->subject("$subject");
				             });
		                  	return redirect('/provideSession');
		                }
			    }
			    elseif($request->session()->has('freelancer')){
					  $request->session()->forget('freelancer');
		              $SocialUser = Socialite::driver('facebook')->user();
		              $email=$SocialUser->getEmail();
		              if($email==""){
		                return redirect('/signup/create-account/freelancer_direct')->with('flag','3');
		              }
		              $client = new \GuzzleHttp\Client();
		                $response = $client->request('POST',env('DBHOST').'api/freelancerfacebooksignup', ['form_params' => 
		                  ['facebookid' => $SocialUser->getId(),'name' => $SocialUser->getName(),'email'=>$SocialUser->getEmail()] ]);
		                $mailid = $SocialUser->getEmail();
		                $apiresponse =  $response->getBody();
		                $jsonresponse=json_decode($apiresponse,true);
		                if($jsonresponse['response']=="Register Failed")
		                {
		                    return redirect('/signup/create-account/freelancer_direct')->with('flag','1');
		                }
		                else
		                {
					        $username=$jsonresponse['response']['username'];
					        $role=$jsonresponse['response']['role'];
					        $object_id=$jsonresponse['response']['_id'];
					        $profilepic = $jsonresponse['response']['profilepic'];
			                $request->session()->put('role',$role);
			                $request->session()->put('freelancer_id',$object_id);
			                $request->session()->put('username',$username);
			                $request->session()->put('dp',$profilepic);
			                $client = new \GuzzleHttp\Client();
		                    $response = $client->request('POST', env('DBHOST').'api/emails');
		                    $a =  $response->getBody();
		                    $obj=json_decode($a,true);
		                    $content=$obj[0]['FREELANCER SIGN UP MAIL']['content'];
		                    $header=$obj[0]['emailtemplate1'];
		                    $footer=$obj[0]['emailtemplate2'];
		                    $subject=$obj[0]['FREELANCER SIGN UP MAIL']['subject'];
		                    Mail::send('emails.freelancersignupmail',['title' =>$content,'name'=>$username,'header'=>$header,'footer'=>$footer], function ($message) use ($mailid,$subject)
		                     {
		                        $message->from('productscog.ht@gmail.com', 'RBS');
		                        $message->to("$mailid")->subject("$subject");
		                     });
		                  	return redirect('/freeSession');
		                }

			    }
			    else{
					  $request->session()->forget('login');
		              $SocialUser = Socialite::driver('facebook')->user();
		              $client = new \GuzzleHttp\Client();
		                $response = $client->request('POST',env('DBHOST').'api/facebooklogin', ['form_params' => 
		                  ['facebookid' => $SocialUser->getId(),'name' => $SocialUser->getName(),'email'=>$SocialUser->getEmail()] ]);
		              $apiresponse =  $response->getBody();
		              $jsonresponse=json_decode($apiresponse,true);
				      if($jsonresponse['response']=="login failed"){
				      		return redirect('ab/account-security/login')->with('flag','1');
				      }
				      else{
				      			  $role=$jsonresponse['response']['role'];
								  $object_id=$jsonresponse['response']['_id'];
								  $profilepic = $jsonresponse['response']['profilepic'];
				          		  if ( $role == 'freelancer' )
						            {
						                $username=$jsonresponse['response']['username'];
						                // $request->session()->put('freelancer_name',$name);
						                $request->session()->put('role',$role);
						                $request->session()->put('freelancer_id',$object_id);
						                $request->session()->put('username',$username);
						                $request->session()->put('dp',$profilepic);
						                // return "freee";
						                return redirect('freeSession');
						            
						            }
						            elseif ( $role == 'provider' )
						            {
						                // $request->session()->put('freelancer_name',$name);
						                $email = $jsonresponse['response']['email'];
						                $firstname = $jsonresponse['response']['firstname'];
						                $request->session()->put('role',$role);
						                $request->session()->put('provider_id',$object_id);
						                $request->session()->put('email',$email);
						                $request->session()->put('prodp',$profilepic);
						                $request->session()->put('firstname',$firstname);
						                // return "provider";
						                return redirect('provideSession');
						            
						            }		
				      }
			    }
        }

    }
    public function twittercallback(Request $request)
    {
      if($request->error){
            return redirect('ab/account-security/login');
        }
      else{
			    if($request->session()->has('provider')){
		              $request->session()->forget('provider');
		              $SocialUser = Socialite::driver('twitter')->user();
		              $email=$SocialUser->getEmail();
		              if($email==""){
		                return redirect('/signup/create-account/client_direct')->with('flag','3');
		              }
		              $client = new \GuzzleHttp\Client();
		                $response = $client->request('POST',env('DBHOST').'api/providertwittersignup', ['form_params' => 
		                  ['twitterid' => $SocialUser->getId(),'name' => $SocialUser->getName(),'email'=>$SocialUser->getEmail()] ]);
		                $mailid = $SocialUser->getEmail();
		                $apiresponse =  $response->getBody();
		                $jsonresponse=json_decode($apiresponse,true);
		                if($jsonresponse['response']=="Register Failed")
		                {
		                    return redirect('/signup/create-account/client_direct')->with('flag','1');
		                }
		                else
		                {
					        $email=$jsonresponse['response']['email'];
					        $firstname=$jsonresponse['response']['firstname'];
					        $role=$jsonresponse['response']['role'];
					        $object_id=$jsonresponse['response']['_id'];
					        $profilepic = $jsonresponse['response']['profilepic'];
			                $request->session()->put('role',$role);
			                $request->session()->put('email',$email);
			                $request->session()->put('provider_id',$object_id);
			                $request->session()->put('firstname',$firstname);
			                $request->session()->put('prodp',$profilepic);
			                $client = new \GuzzleHttp\Client();
				            $response = $client->request('POST', env('DBHOST').'api/emails');
				            $s =  $response->getBody();
				            $obj=json_decode($s,true);
				            $content=$obj[0]['PROVIDER SIGN UP MAIL']['content'];
				            $header=$obj[0]['emailtemplate1'];
				            $footer=$obj[0]['emailtemplate2'];
				            $subject=$obj[0]['PROVIDER SIGN UP MAIL']['subject'];
				            Mail::send('emails.providersignupmail',['title' =>$content,'name'=>$firstname,'header'=>$header,'footer'=>$footer], function ($message) use ($mailid,$subject)
				             {
				                $message->from('productscog.ht@gmail.com', 'RBS');
				                $message->to("$mailid")->subject("$subject");
				             });
		                  	return redirect('/provideSession');
		                }
			    }
			    elseif($request->session()->has('freelancer')){
					  $request->session()->forget('freelancer');
		              $SocialUser = Socialite::driver('twitter')->user();
		              if($email==""){
		                return redirect('/signup/create-account/freelancer_direct')->with('flag','3');
		              }
		              $client = new \GuzzleHttp\Client();
		                $response = $client->request('POST',env('DBHOST').'api/freelancertwittersignup', ['form_params' => 
		                  ['twitterid' => $SocialUser->getId(),'name' => $SocialUser->getName(),'email'=>$SocialUser->getEmail()] ]);
		                $mailid = $SocialUser->getEmail();
		                $apiresponse =  $response->getBody();
		                $jsonresponse=json_decode($apiresponse,true);
		                if($jsonresponse['response']=="Register Failed")
		                {
		                    return redirect('/signup/create-account/freelancer_direct')->with('flag','1');
		                }
		                else
		                {
					        $username=$jsonresponse['response']['username'];
					        $role=$jsonresponse['response']['role'];
					        $object_id=$jsonresponse['response']['_id'];
					        $profilepic = $jsonresponse['response']['profilepic'];
			                $request->session()->put('role',$role);
			                $request->session()->put('freelancer_id',$object_id);
			                $request->session()->put('username',$username);
			                $request->session()->put('dp',$profilepic);
			                $client = new \GuzzleHttp\Client();
		                    $response = $client->request('POST', env('DBHOST').'api/emails');
		                    $a =  $response->getBody();
		                    $obj=json_decode($a,true);
		                    $content=$obj[0]['FREELANCER SIGN UP MAIL']['content'];
		                    $header=$obj[0]['emailtemplate1'];
		                    $footer=$obj[0]['emailtemplate2'];
		                    $subject=$obj[0]['FREELANCER SIGN UP MAIL']['subject'];
		                    Mail::send('emails.freelancersignupmail',['title' =>$content,'name'=>$username,'header'=>$header,'footer'=>$footer], function ($message) use ($mailid,$subject)
		                     {
		                        $message->from('productscog.ht@gmail.com', 'RBS');
		                        $message->to("$mailid")->subject("$subject");
		                     });
		                  	return redirect('/freeSession');
		                }
			    }
			    else{
					  $request->session()->forget('login');
		              $SocialUser = Socialite::driver('twitter')->user();
		              $client = new \GuzzleHttp\Client();
		                $response = $client->request('POST',env('DBHOST').'api/twitterlogin', ['form_params' => 
		                  ['twitterid' => $SocialUser->getId(),'name' => $SocialUser->getName(),'email'=>$SocialUser->getEmail()] ]);
		              $apiresponse =  $response->getBody();
		              $jsonresponse=json_decode($apiresponse,true);
				      if($jsonresponse['response']=="login failed"){
				      		return redirect('ab/account-security/login')->with('flag','1');
				      }
				      else{
				      			  $role=$jsonresponse['response']['role'];
							      $object_id=$jsonresponse['response']['_id'];
							      $profilepic = $jsonresponse['response']['profilepic'];
				          		  if ( $role == 'freelancer' )
						            {
						                $username=$jsonresponse['response']['username'];
						                // $request->session()->put('freelancer_name',$name);
						                $request->session()->put('role',$role);
						                $request->session()->put('freelancer_id',$object_id);
						                $request->session()->put('username',$username);
						                $request->session()->put('dp',$profilepic);
						                // return "freee";
						                return redirect('freeSession');
						            
						            }
						            elseif ( $role == 'provider' )
						            {
						                // $request->session()->put('freelancer_name',$name);
						                $email = $jsonresponse['response']['email'];
						                $firstname = $jsonresponse['response']['firstname'];
						                $request->session()->put('role',$role);
						                $request->session()->put('provider_id',$object_id);
						                $request->session()->put('email',$email);
						                $request->session()->put('prodp',$profilepic);
						                $request->session()->put('firstname',$firstname);
						                // return "provider";
						                return redirect('provideSession');
						            
						            }		
				      }
			    }
        }
    }
    public function googlecallback(Request $request)
    {
      if($request->error){
            return redirect('ab/account-security/login');
        }
      else{
			    if($request->session()->has('provider')){
		              $request->session()->forget('provider');
		              $SocialUser = Socialite::driver('google')->user();
		              $email=$SocialUser->getEmail();
		              if($email==""){
		                return redirect('/signup/create-account/client_direct')->with('flag','3');
		              }
		              $client = new \GuzzleHttp\Client();
		                $response = $client->request('POST',env('DBHOST').'api/providergooglesignup', ['form_params' => 
		                  ['googleid' => $SocialUser->getId(),'name' => $SocialUser->getName(),'email'=>$SocialUser->getEmail()] ]);
		                $mailid = $SocialUser->getEmail();
		                $apiresponse =  $response->getBody();
		                $jsonresponse=json_decode($apiresponse,true);
		                if($jsonresponse['response']=="Register Failed")
		                {
		                    return redirect('/signup/create-account/client_direct')->with('flag','1');
		                }
		                else
		                {
					        $email=$jsonresponse['response']['email'];
					        $firstname=$jsonresponse['response']['firstname'];
					        $role=$jsonresponse['response']['role'];
					        $object_id=$jsonresponse['response']['_id'];
					        $profilepic = $jsonresponse['response']['profilepic'];
			                $request->session()->put('role',$role);
			                $request->session()->put('email',$email);
			                $request->session()->put('provider_id',$object_id);
			                $request->session()->put('firstname',$firstname);
			                $request->session()->put('prodp',$profilepic);
			                $client = new \GuzzleHttp\Client();
				            $response = $client->request('POST', env('DBHOST').'api/emails');
				            $s =  $response->getBody();
				            $obj=json_decode($s,true);
				            $content=$obj[0]['PROVIDER SIGN UP MAIL']['content'];
				            $header=$obj[0]['emailtemplate1'];
				            $footer=$obj[0]['emailtemplate2'];
				            $subject=$obj[0]['PROVIDER SIGN UP MAIL']['subject'];
				            Mail::send('emails.providersignupmail',['title' =>$content,'name'=>$firstname,'header'=>$header,'footer'=>$footer], function ($message) use ($mailid,$subject)
				             {
				                $message->from('productscog.ht@gmail.com', 'RBS');
				                $message->to("$mailid")->subject("$subject");
				             });
		                  	return redirect('/provideSession');
		                }
			    }
			    elseif($request->session()->has('freelancer')){
					  $request->session()->forget('freelancer');
		              $SocialUser = Socialite::driver('google')->user();
		              if($email==""){
		                return redirect('/signup/create-account/freelancer_direct')->with('flag','3');
		              }
		              $client = new \GuzzleHttp\Client();
		                $response = $client->request('POST',env('DBHOST').'api/freelancergooglesignup', ['form_params' => 
		                  ['googleid' => $SocialUser->getId(),'name' => $SocialUser->getName(),'email'=>$SocialUser->getEmail()] ]);
		                $mailid = $SocialUser->getEmail();
		                $apiresponse =  $response->getBody();
		                $jsonresponse=json_decode($apiresponse,true);
		                if($jsonresponse['response']=="Register Failed")
		                {
		                    return redirect('/signup/create-account/freelancer_direct')->with('flag','1');
		                }
		                else
		                {
					        $username=$jsonresponse['response']['username'];
					        $role=$jsonresponse['response']['role'];
					        $object_id=$jsonresponse['response']['_id'];
					        $profilepic = $jsonresponse['response']['profilepic'];
			                $request->session()->put('role',$role);
			                $request->session()->put('freelancer_id',$object_id);
			                $request->session()->put('username',$username);
			                $request->session()->put('dp',$profilepic);
			                $client = new \GuzzleHttp\Client();
		                    $response = $client->request('POST', env('DBHOST').'api/emails');
		                    $a =  $response->getBody();
		                    $obj=json_decode($a,true);
		                    $content=$obj[0]['FREELANCER SIGN UP MAIL']['content'];
		                    $header=$obj[0]['emailtemplate1'];
		                    $footer=$obj[0]['emailtemplate2'];
		                    $subject=$obj[0]['FREELANCER SIGN UP MAIL']['subject'];
		                    Mail::send('emails.freelancersignupmail',['title' =>$content,'name'=>$username,'header'=>$header,'footer'=>$footer], function ($message) use ($mailid,$subject)
		                     {
		                        $message->from('productscog.ht@gmail.com', 'RBS');
		                        $message->to("$mailid")->subject("$subject");
		                     });
		                  	return redirect('/freeSession');
		                }
			    }
			    else{
					  $request->session()->forget('login');
		              $SocialUser = Socialite::driver('google')->user();
		              $client = new \GuzzleHttp\Client();
		                $response = $client->request('POST',env('DBHOST').'api/twitterlogin', ['form_params' => 
		                  ['googleid' => $SocialUser->getId(),'name' => $SocialUser->getName(),'email'=>$SocialUser->getEmail()] ]);
		              $apiresponse =  $response->getBody();
		              $jsonresponse=json_decode($apiresponse,true);
				      if($jsonresponse['response']=="login failed"){
				      		return redirect('ab/account-security/login')->with('flag','1');
				      }
				      else{
				      			  $role=$jsonresponse['response']['role'];
							      $object_id=$jsonresponse['response']['_id'];
							      $profilepic = $jsonresponse['response']['profilepic'];
				          		  if ( $role == 'freelancer' )
						            {
						                $username=$jsonresponse['response']['username'];
						                // $request->session()->put('freelancer_name',$name);
						                $request->session()->put('role',$role);
						                $request->session()->put('freelancer_id',$object_id);
						                $request->session()->put('username',$username);
						                $request->session()->put('dp',$profilepic);
						                // return "freee";
						                return redirect('freeSession');
						            
						            }
						            elseif ( $role == 'provider' )
						            {
						                // $request->session()->put('freelancer_name',$name);
						                $email = $jsonresponse['response']['email'];
						                $firstname = $jsonresponse['response']['firstname'];
						                $request->session()->put('role',$role);
						                $request->session()->put('provider_id',$object_id);
						                $request->session()->put('email',$email);
						                $request->session()->put('prodp',$profilepic);
						                $request->session()->put('firstname',$firstname);
						                // return "provider";
						                return redirect('provideSession');
						            
						            }		
				      }
			    }
        }
    }
}
