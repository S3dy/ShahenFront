<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailManagementController extends Controller
{
    public function viewmailcontent(Request $request)
    {
        
       if($request->session()->has('adminsession')){  
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/viewmailcontent');
        $apiresponse =  $response->getBody();
        $obj=json_decode($apiresponse,true);
        $content=$obj[0]['PROVIDER SIGN UP MAIL']['content'];
        $subject=$obj[0]['PROVIDER SIGN UP MAIL']['subject'];
        return view('adminpanel.mailcontent')->with('users',$content)->with('users1',$subject);
       }
       else{
        return redirect('/admin/login');
       } 

    }

    public function emailadminview(Request $request)
    {
        $options=$request->options;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/viewmailcontent',['form_params'=>['options'=>$options]]);
        return$apiresponse =  $response->getBody();
    }

    public function editmailcontent(Request $request)
    {
        $emailfor=$request->options;
        $subject=$request->subject;
        $emailcontent=$request->emailcontent;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', env('DBHOST').'api/editmailcontent', ['form_params' => ['emailfor'=>$emailfor,'emailcontent'=>$emailcontent,'subject'=>$subject]]);
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response']=="inserted"){
           return redirect('/admin/mailcontent');
        }
        else{
            return redirect('/admin/mailcontent');   
        }

    }

    public function emailtemplateview(Request $request)
    {
       if($request->session()->has('adminsession')){  
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/viewmailcontent');
        $apiresponse =  $response->getBody(); 
        return view('adminpanel.emailtemplate')->with('users',$apiresponse);
       }
       else{
        return redirect('/admin/login');
       } 
    }

    public function editmailtemplate(Request $request)
    {
    	$emailtemplate1=$request->emailtemplate1;
    	$emailtemplate2=$request->emailtemplate2;
   		$client = new \GuzzleHttp\Client();
		$response = $client->request('POST',env('DBHOST').'api/editmailtemplate', ['form_params' =>['emailtemplate1'=>$emailtemplate1,'emailtemplate2'=>$emailtemplate2]]);
		//return $response;
		$apiresponse =  $response->getBody();
		$jsonresponse = json_decode($apiresponse,true);
		if($jsonresponse['response']){
			return back();
		}
        else{
            return back();
        }

    }



}
