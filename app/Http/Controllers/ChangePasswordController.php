<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChangePasswordController extends Controller
{

    public function providersocialpasswordcheck(Request $request)
      {
        if($request->session()->has('provider_id'))
        {
            $providerid = $request->session()->get('provider_id');
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST',env('DBHOST').'api/providersocialpasswordcheck', ['form_params'=>['providerid'=>$providerid] ]);
            $apiresponse =  $response->getBody();
            if($apiresponse=="true")
            {
                return view('provider.providerchangepassword')->with('flag','0');
            }
            else
            {
                return view('provider.providerchangepassword')->with('flag','1');
            }
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
      }

    public function providersocialchangepassword(Request $request)
    {
      $providerid = $request->session()->get('provider_id');
      $newpassword = $request->newpassword;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/providersocialchangepassword', ['form_params' =>
            ['providerid'=>$providerid,'newpassword'=>$newpassword]]);
      $apiresponse =  $response->getBody();
      $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'] =="Password Updated Successfully"){
            return redirect('providerchangepassword')->with('flags','2');
        }
        else{
          return redirect('providerchangepassword')->with('flags','3');
        }
    }

    public function providerchangepassword(Request $request)
    {
    	$providerid = $request->session()->get('provider_id');
    	$oldpassword = $request->oldpassword;
    	$newpassword = $request->newpassword;
    	$client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/providerchangepassword', ['form_params' =>
          	['providerid'=>$providerid,'oldpassword'=>$oldpassword,'newpassword'=>$newpassword]]);
      $apiresponse =  $response->getBody();
      $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'] =="Password Updated Successfully"){
            return "Password Updated Successfully";
        }
        elseif($jsonresponse['response'] =="Kindly Check Your password"){
        return "wrong old password";
        }
    	  else{
    		return "Password Didn't match";
    	  }
    }

    public function freelancersocialpasswordcheck(Request $request)
      {
        if($request->session()->has('freelancer_id'))
        {
            $freelancerid = $request->session()->get('freelancer_id');
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST',env('DBHOST').'api/freelancersocialpasswordcheck', ['form_params'=>['freelancerid'=>$freelancerid] ]);
            $apiresponse =  $response->getBody();
            if($apiresponse=="true")
            {
                return view('freelancer.changepassword')->with('flag','0');
            }
            else
            {
                return view('freelancer.changepassword')->with('flag','1');
            }
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
      }

      public function freelancersocialchangepassword(Request $request)
    {
      $freelancerid = $request->session()->get('freelancer_id');
      $newpassword = $request->newpassword;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/freelancersocialchangepassword', ['form_params' =>
            ['freelancerid'=>$freelancerid,'newpassword'=>$newpassword]]);
      $apiresponse =  $response->getBody();
      $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'] =="Password Updated Successfully"){
            return redirect('freelancerchangepassword')->with('flags','2');
        }
        else{
          return redirect('freelancerchangepassword')->with('flags','3');
        }
    }

    public function freelancerchangepassword(Request $request)
    {
      $freelancerid = $request->session()->get('freelancer_id');
      $oldpassword = $request->oldpassword;
      $newpassword = $request->newpassword;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/freelancerchangepassword', ['form_params' =>
            ['freelancerid'=>$freelancerid,'oldpassword'=>$oldpassword,'newpassword'=>$newpassword]]);
      $apiresponse =  $response->getBody();
      $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'] =="Password Updated Successfully"){
            return "Password Updated Successfully";
        }
        elseif($jsonresponse['response'] =="Kindly Check Your password"){
        return "wrong old password";
        }
        else{
        return "Password Didn't match";
        }
    }


}
