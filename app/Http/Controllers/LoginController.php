<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Cookie;
use Illuminate\Cookie\CookieJar;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    public function login(Request $request,CookieJar $cookieJar)
    {
    	$email = $request->email;
    	$password = $request->password;
    	$client = new \GuzzleHttp\Client();
    	$response = $client->request('POST',env('DBHOST').'api/login', ['form_params' =>
          	['email'=>$email,'password'=>$password] ]);
    	$loginresponse = $response->getBody();
    	$decode=json_decode($loginresponse,true);
        $role=array_get($decode,'role');
        $object_id=array_get($decode,'_id');
        $profilepic = $decode['profilepic'];
    	// return$a=$decode['ObjectId'];
    	// return $strId = $decode['_id']->{'$id'};
    	if($loginresponse=="Login failed"){
    		return view('login')->with('flags','1');
    	}
    	else{
    		$obj = json_decode($loginresponse);
    		// $role = $obj{$role};
            $rememberme = $request->rememberme;

    		if ( $role == 'freelancer' )
            {
                $username=array_get($decode,'username');
                // $request->session()->put('freelancer_name',$name);
                $request->session()->put('role',$role);
                $request->session()->put('freelancer_id',$object_id);
                $request->session()->put('username',$username);
                $request->session()->put('dp',$profilepic);
                // return "freee";
                if($rememberme == "remember") {
                     $cookieJar->queue(cookie('remembering_rbs_name', $email, 2200));
                     $cookieJar->queue(cookie('remembering_rbs_password', $password, 2200));
                }else{
                   Cookie::forget('remembering_rbs_name');
                   \Cookie::queue(\Cookie::forget('remembering_rbs_name'));
                    Cookie::forget('remembering_rbs_password');
                   \Cookie::queue(\Cookie::forget('remembering_rbs_password'));
                }
                return redirect('freeSession');
            
            }
            if ( $role == 'provider' )
            {
                // $request->session()->put('freelancer_name',$name);
                $email = $decode['email'];
                $firstname = $decode['firstname'];
                $request->session()->put('role',$role);
                $request->session()->put('provider_id',$object_id);
                $request->session()->put('email',$email);
                $request->session()->put('prodp',$profilepic);
                $request->session()->put('firstname',$firstname);
                // return "provider";
                if($rememberme == "remember") {
                     $cookieJar->queue(cookie('remembering_rbs_name', $email, 2200));
                     $cookieJar->queue(cookie('remembering_rbs_password', $password, 2200));
                }else{
                   Cookie::forget('remembering_rbs_name');
                   \Cookie::queue(\Cookie::forget('remembering_rbs_name'));
                    Cookie::forget('remembering_rbs_password');
                   \Cookie::queue(\Cookie::forget('remembering_rbs_password'));
                }               
                return redirect('provideSession');
            }

    	}
    }
    public function userLogout(Request $request)
    { 
               
        if($request->session()->has('freelancer_id'))
        {
          $request->session()->forget('freelancer_id');
         
          $request->session()->forget('role');
          $request->session()->forget('username');
          $request->session()->forget('dp');
          return redirect('ab/account-security/login');
        }
        else if($request->session()->has('provider_id'))
        {
          $request->session()->forget('provider_id');
          $request->session()->forget('role');
          $request->session()->forget('email');
          $request->session()->forget('prodp');
          $request->session()->forget('firstname');
          return redirect('ab/account-security/login');
        }
        else
        {
          return redirect('ab/account-security/login');
        }

    }
    public function freelancerSession(Request $request)
    {
        if($request->session()->has('freelancer_id'))
        {
            return redirect('searchresult?search=&category=All+Categories&sortby=New&page=1');
        }
        else
        {
            return redirect('ab/account-security/login');
        }

    }
    public function providerSession(Request $request)
    {
        if($request->session()->has('provider_id'))
        {
            return redirect('postajob');
        }
        else
        {
            return redirect('ab/account-security/login');
        }

    }


}
