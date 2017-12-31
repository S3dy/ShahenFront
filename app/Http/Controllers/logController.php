<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Cookie;
use Illuminate\Cookie\CookieJar;

class logController extends Controller
{
	public function check(Request $req, CookieJar $cookieJar)
	{
          

          $email=$req->email;
          $password=$req->password;
          $client = new \GuzzleHttp\Client();
          $response = $client->request('POST',env('DBHOST').'api/log', ['form_params' =>
          	['email'=>$email,'password'=>$password] ]);
          $s =  $response->getBody();

          if($s=="Login failed")
          {

            return view('login')->with('flags','1');
         }
          else
          {
            $obj=json_decode($s);

            $name=$obj->{'fname'};
						$who=$obj->{'who'};

            $rememberme = $req->rememberme;



						if($who=="Provider")
            {
              //  return "Provider Login";
                $p = $obj->{'prof_pic1'};
                $req->session()->put('provider_name',$name);
                $req->session()->put('prodp',$p);

                // if($rememberme == "remember") {
                //   Cookie::queue('remembering_rbs_provider_name', $name, 8000);
                //   Cookie::queue('remembering_rbs_propd', $p, 8000);
                // }

                if($rememberme == "remember") {
                     $cookieJar->queue(cookie('remembering_rbs_name', $email, 2200));
                     $cookieJar->queue(cookie('remembering_rbs_password', $password, 2200));
                }else{
                   Cookie::forget('remembering_rbs_name');
                   \Cookie::queue(\Cookie::forget('remembering_rbs_name'));
                    Cookie::forget('remembering_rbs_password');
                   \Cookie::queue(\Cookie::forget('remembering_rbs_password'));
                }
                return redirect('/postajob');
            }
            elseif($who=="Freelancer")
            {
            //  return "Freelancer Login";
              $dp = $obj->{'prof_pic2'};
              
              $req->session()->put('freelancer_name',$name);
              $req->session()->put('dp',$dp);

             if($rememberme == "remember") {
                     $cookieJar->queue(cookie('remembering_rbs_name', $email, 2200));
                     $cookieJar->queue(cookie('remembering_rbs_password', $password, 2200));

                }else{
                   Cookie::forget('remembering_rbs_name');
                   \Cookie::queue(\Cookie::forget('remembering_rbs_name'));
                    Cookie::forget('remembering_rbs_password');
                   \Cookie::queue(\Cookie::forget('remembering_rbs_password'));
                }
              
                return redirect('search_result?search=&category=All+Categories&sortby=New');
            }
          }
    }


    public function log_out(Request $req,CookieJar $cookieJar)
    { 
        $req->session()->forget('dp');
        $req->session()->forget('prodp');
       
        if($req->session()->has('freelancer_name'))
        {
          $req->session()->forget('freelancer_name');
          return redirect('ab/account-security/login');
        }
        elseif($req->session()->has('provider_name'))
        {
          $req->session()->forget('provider_name');
          return redirect('ab/account-security/login');
        }
        else
        {
          return redirect('ab/account-security/login');
        }

    }
    public function make(Request $req)
    {
        if($req->session()->has('freelancer_name'))
        {
          $req->session()->forget('freelancer_name');
          return redirect('ab/account-security/login');
        }
        else if($req->session()->has('provider_name'))
        {
          $req->session()->forget('provider_name');
          return redirect('ab/account-security/login');
        }
        else
        {
          return redirect('ab/account-security/login')->with('flags','0');
        }
    }
    public function sessionCheck(Request $req)
    {
        if($req->session()->has('freelancer_name'))
        {
          //$req->session()->forget('freelancer_name');
          //return redirect('/ab/find-work/');
          //dd($req->cookie('remembering_rbs_freelancer_name'), $req->cookie('remembering_rbs_dp'));
          return view('freelancer.searchonempty');
        }
        elseif($req->session()->has('provider_name'))
        {
          //$req->session()->forget('provider_name');
          return redirect('/postajob');
          //return view('provider.postajob');
        }
        else
        {
          return redirect('ab/account-security/login');
          //return view('login')->with('flags','0');
        }
    }
    public function login(Request $req,CookieJar $cookieJar)
    {

         
         

        // if($req->cookie('remembering_rbs_name')) {


          // $client = new \GuzzleHttp\Client();
          // $response = $client->request('POST',env('DBHOST').'api/remember', ['form_params' =>
          //   ['email'=>$req->cookie('remembering_rbs_name')] ]);
          //  $s =  $response->getBody();
          //  return $s." ".$req->cookie('remembering_rbs_name') ;
          //     if($s=="Login failed"){
          //         return view('login')->with('flags','1');
          //      }else{
          //       $obj=json_decode($s);
          //       $name=$obj->{'fname'};
          //       $who=$obj->{'who'};
          //     if($who=="Provider"){
          //         $p = $obj->{'prof_pic1'};
          //         $req->session()->put('provider_name',$name);
          //         $req->session()->put('prodp',$p);
          //         return redirect('/postajob');
          //     }elseif($who=="Freelancer"){
          //      $dp = $obj->{'prof_pic2'}; 
          //      $req->session()->put('freelancer_name',$name);
          //       return redirect('/ab/find-work/');
          //   }
          // }
         
         // }

          
        // else{

        if($req->session()->has('freelancer_name'))
        {
          

          return view('freelancer.searchonempty');
        }
        elseif($req->session()->has('provider_name'))
        {
          //$req->session()->forget('provider_name');
          return redirect('/postajob');
          //return view('provider.postajob');
        }
        else
        {
            if($req->cookie('remembering_rbs_name')){
              $a = $req->cookie('remembering_rbs_name');
              $b = $req->cookie('remembering_rbs_password');
              return view('login')->with('flags','0')->with('name',$a)->with('pass',$b);
            } 

            else  return view('login')->with('flags','0');

            return view('login')->with('flags','0');
        }
      // }
    }
}
