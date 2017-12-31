<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;



class RedirectController extends Controller
{
    public function homecheck(Request $req)
    {
    	if (session()->has('provider_name'))
    	 {
            return redirect('/postajob');
    		//return view('provider.postajob');
    	}
    	else if(session()->has('freelancer_name'))
    	{
    		return view('freelancer.searchonempty');
    	}
        else
        { 
           
            return view('home');

        }
    }
    public function signup(Request $req)
    {
       if (session()->has('provider_id'))
         {
            return redirect('provideSession');
            //return view('provider.postajob');
        }
        else if(session()->has('freelancer_id'))
        {
            return redirect('freeSession');
        }

        else
        {
            return view('signup');
        }
    }
    public function provider_signup_check(Request $req)
    {
        if (session()->has('provider_id'))
        {
            return redirect('provideSession');
            //return view('provider.postajob');
        }
        else if(session()->has('freelancer_id'))
        {
            return redirect('freeSession');
        }
        else
        {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET','https://restcountries.eu/rest/v1/all'); 
            $json = $response->getBody();
            return view('signin')->with("countries",$json);    
            
        }
    }
    public function freelancer_signup_check(Request $req)
    {
        if (session()->has('provider_id'))
         {
            return redirect('provideSession');
           // return view('provider.postajob');
        }
        else if(session()->has('freelancer_id'))
        {
            return redirect('freeSession');
        }
        else
        {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET','https://restcountries.eu/rest/v1/all'); 
            $json = $response->getBody();
            return view('freelancersignup')->with("countries",$json);    
        }
    }
    public function forget(Request $req)
    {
        if (session()->has('provider_name'))
         {
            return redirect('/postajob');
            //return view('provider.postajob');
        }
        else if(session()->has('freelancer_name'))
        {
            return view('freelancer.searchonempty');
        }
        else
        {
            return view('forgetpass');
        }
    }

    public function free_add_card(Request $req)
    {
        
        if($req->session()->has('freelancer_name'))
        {
            return view('freelancer.addcard')->with('flag','0');
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function free_bill_method(Request $req)
    {
        
        if($req->session()->has('freelancer_name'))
        {
            return redirect('/display_bill');
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function free_chang_pass(Request $req)
    {
        
        if($req->session()->has('freelancer_name'))
        {
            return view('freelancer.changepassword');
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function free_chat(Request $req)
    {
        
        if($req->session()->has('freelancer_name'))
        {
            return view('freelancer.freelancer_chat');
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function free_pro_set(Request $req)
    {
        
        if($req->session()->has('freelancer_name'))
        {
            $name = $req->session()->get('freelancer_name');
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST',env('DBHOST').'api/free2', ['form_params' =>
            ['name'=>$name]]);
            $s =  $response->getBody();
            return view('freelancer.profilesetting')->with('s',$s);
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function free_public_view(Request $req)
    {
        
        if($req->session()->has('freelancer_name'))
        {
            return redirect('/prof_other_view');
            return view('freelancer.publicview');
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function free_view_off(Request $req)
    {
        
        if($req->session()->has('freelancer_name'))
        {
            return view('freelancer.viewoffer');
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function pro_my_job(Request $req)
    {
        
        
            return redirect('/pro_job_view');
        
        
    }
    public function pro_my_jobfeed(Request $req)
    {
        
        if($req->session()->has('provider_name'))
        {
            return redirect('/postajob');
            //return view('provider.postajob');
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function pro_post_job(Request $req)
    {
        
        if($req->session()->has('provider_name'))
        {
            return redirect('/postajob');
            //return view('provider.postajob');
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function pro_chat(Request $req)
    {
        
        if($req->session()->has('provider_name'))
        {
            return view('provider.provider_chat');
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function pro_home(Request $req)
    {
        
        if($req->session()->has('provider_name'))
        {
            return view('provider.providerhome');
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function pro_prof(Request $req)
    {
        
        if($req->session()->has('provider_name'))
        {
            return view('provider.providerprofile');
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function pro_sel_lancer(Request $req)
    {
        
        if($req->session()->has('provider_name'))
        {
            return view('provider.selectfreelancer');
         } 
         else
        {
            return redirect('/ab/account-security/login');
        }  
      }


    public function free_proj_search(Request $req)
    {
        if($req->session()->has('freelancer_name'))
        {
            return view('freelancer.searchforprojects');

        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function pro_bill(Request $req)
    {
        
        if($req->session()->has('provider_name'))
        {
            return redirect('/pro_display_bill');
            return view('provider.provider_billing');
         } 
         else
        {
            return redirect('/ab/account-security/login');
        }  
      }
      public function pro_add_card(Request $req)
    {
        
        if($req->session()->has('provider_name'))
        {
            return view('provider.provider_addcard')->with('flag','0');;
         } 
         else
        {
            return redirect('/ab/account-security/login');
        }  
      }
}
