<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function providerfeedbackview(Request $request,$jobid,$id)
    {
        if($request->session()->has('provider_id')){
    	    return view('provider.providerfeedback')->with('jobid',$jobid)->with('id',$id);
        }
        else{
            return redirect('ab/account-security/login');
        }
    }
    public function providerfeedback(Request $request)
    {
    	$jobid=$request->jobid;
    	$proposalid=$request->proposalid;
    	$rating1=$request->rating1;
    	$rating2=$request->rating2;
    	$rating3=$request->rating3;
    	$rating4=$request->rating4;
    	$rating5=$request->rating5;
    	$rating6=$request->rating6;
    	$content=$request->content;
    	$total=$request->total;
		$client = new \GuzzleHttp\Client();
	    $response = $client->request('POST',env('DBHOST').'api/providerfeedback', ['form_params' =>
	          	['jobid'=>$jobid,'rating1'=>$rating1,'rating2'=>$rating2,'rating3'=>$rating3,'rating4'=>$rating4,'rating5'=>$rating5,'rating6'=>$rating6,'content'=>$content,'total'=>$total]]);
	    $apiresponse =  $response->getBody();
	    $jsonresponse=json_decode($apiresponse,true);
	    if($jsonresponse['response']=="inserted"){
	    	return redirect('/providerofferview/'.$proposalid.'/'.$jobid)->with('flag','4');
	    }
    }
    public function freelancerfeedbackview($jobid,$id,Request $request)
    {
        if($request->session()->has('freelancer_id')){
            return view('freelancer.freelancerfeedback')->with('jobid',$jobid)->with('id',$id);
        }
        else{
            return redirect('ab/account-security/login');
        }
    	
    }
    public function freelancerfeedback(Request $request)
    {
        $freelancername = $request->session()->get("username"); 
    	$jobid=$request->jobid;
    	$proposalid=$request->proposalid;
    	$rating1=$request->rating1;
    	$rating2=$request->rating2;
    	$rating3=$request->rating3;
    	$rating4=$request->rating4;
    	$rating5=$request->rating5;
    	$rating6=$request->rating6;
    	$content=$request->content;
    	$total=$request->total;
		$client = new \GuzzleHttp\Client();
	    $response = $client->request('POST',env('DBHOST').'api/freelancerfeedback', ['form_params' =>
	          	['jobid'=>$jobid,'rating1'=>$rating1,'rating2'=>$rating2,'rating3'=>$rating3,'rating4'=>$rating4,'rating5'=>$rating5,'rating6'=>$rating6,'content'=>$content,'total'=>$total,'freelancername'=>$freelancername]]);
	    $apiresponse =  $response->getBody();
	    $jsonresponse=json_decode($apiresponse,true);
	    if($jsonresponse['response']=="inserted"){
	    	return redirect('/offerview/'.$proposalid.'/'.$jobid)->with('flag','4');
	    }
    }
}

