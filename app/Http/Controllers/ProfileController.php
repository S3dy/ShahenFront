<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
	public function viewProfile(Request $request)
	{
		  $freelancer_id=$request->session()->get("freelancer_id");
      $username = $request->session()->get('username');
     	$Visibility=$request->Visibility;
      $ProjectPreference=$request->ProjectPreference;
    	$ExperienceLevel=$request->ExperienceLevel;
    	$client = new \GuzzleHttp\Client();
    	$response = $client->request('POST', env('DBHOST').'api/profileView', ['form_params' => ['id'=>$freelancer_id,'username'=>$username,'Visibility'=>$Visibility,'ProjectPreference'=>$ProjectPreference,'ExperienceLevel'=>$ExperienceLevel]]);
      $view =  $response->getBody();
      $jsonresponse = json_decode($view,true);
      if($jsonresponse['message']=="success")
      {
            return "Inserted";
      }

  }
  public function profileList(Request $request)
  {  
        if($request->session()->has('freelancer_id'))
        {
            
            $id = $request->session()->get('freelancer_id');
            $username = $request->session()->get('username');
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST',env('DBHOST').'api/ProfileSettings', ['form_params' =>
            ['username'=>$username]]);
            $viewresponse =  $response->getBody();
            return view('freelancer.profilesetting')->with('s',$viewresponse);
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
}