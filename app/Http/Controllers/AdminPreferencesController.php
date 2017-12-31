<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPreferencesController extends Controller
{
    public function adminjobpreferenceview(Request $request)
    {   

       if($request->session()->has('adminsession')){      
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/adminjobpreferenceview');
        $apiresponse =  $response->getBody();
        return view('adminpanel.addjobcontent')->with('users',$apiresponse);
       }
       else{
        return redirect('/admin/login');
       } 
    }

    public function editcategory(Request $request)
    {
        $textbox=$request->textbox;
        $textbox = array_filter($textbox);
        $client=new \GuzzleHttp\Client();
        $response=$client->request('POST', env('DBHOST').'api/editcategory',['form_params'=>['textbox'=>$textbox]]);
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response']){
            return redirect('/admin/addjobcontent');
          }

    }

    public function editfreelancertype(Request $request)
	{
        $freelancertype=$request->qualbox;
        $freelancertype = array_filter($freelancertype);
        $client=new \GuzzleHttp\Client();
        $response=$client->request('POST', env('DBHOST').'api/editfreelancertype',['form_params'=>['freelancertype'=>$freelancertype]]);
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response']){
            return redirect('/admin/addjobcontent');
          }
	}

	public function editjobsuccess(Request $request)
	{
        $jobbox=$request->jobbox;
        $jobbox = array_filter($jobbox);
        $client=new \GuzzleHttp\Client();
        $response=$client->request('POST', env('DBHOST').'api/editjobsuccess',['form_params'=>['jobbox'=>$jobbox]]);
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response']){
            return redirect('/admin/addjobcontent');
          }
	}

	public function editrisingtalent(Request $request)
	{
        $talentbox=$request->talentbox;
        $talentbox = array_filter($talentbox);
        $client=new \GuzzleHttp\Client();
        $response=$client->request('POST', env('DBHOST').'api/editrisingtalent',['form_params'=>['talentbox'=>$talentbox]]);
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response']){
          	return redirect('/admin/addjobcontent');
        }
	}

	public function edithoursbilledonrbs(Request $request)
	{
        $hourbox=$request->hourbox;
        $hourbox = array_filter($hourbox);
        $client=new \GuzzleHttp\Client();
        $response=$client->request('POST', env('DBHOST').'api/edithoursbilledonrbs',['form_params'=>['hourbox'=>$hourbox]]);
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response']){
           return redirect('/admin/addjobcontent');
        }
	}

	public function editlocation(Request $request)
	{
        $locationbox=$request->locabox;
        $locationbox = array_filter($locationbox);
        $client=new \GuzzleHttp\Client();
        $response=$client->request('POST', env('DBHOST').'api/editlocation',['form_params'=>['locationbox'=>$locationbox]]);
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response']){
           return redirect('/admin/addjobcontent');
        }
	}

	public function editenglishlevel(Request $request)
	{
        $englishbox=$request->engbox;
        $englishbox = array_filter($englishbox);
        $client=new \GuzzleHttp\Client();
        $response=$client->request('POST', env('DBHOST').'api/editenglishlevel',['form_params'=>['englishbox'=>$englishbox]]);
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response']){
           return redirect('/admin/addjobcontent');
        }
	}

	public function editgroup(Request $request)
	{
        $groupbox=$request->groupbox;
        $groupbox = array_filter($groupbox);
        $client=new \GuzzleHttp\Client();
        $response=$client->request('POST', env('DBHOST').'api/editgroup',['form_params'=>['groupbox'=>$groupbox]]);
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response']){
           return redirect('/admin/addjobcontent');
        }
	}
}
