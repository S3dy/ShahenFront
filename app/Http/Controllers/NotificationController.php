<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function freelancernotification(Request $request)
    {
        if (session()->has('freelancer_id')){

            $id = $request->session()->get('freelancer_id');
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST',env('DBHOST').'api/freelancernotification', ['form_params' =>
                    ['id'=>$id]]);
            $apiresponse =  $response->getBody();
            $jsonresponse = json_decode($apiresponse,true);
            return view('freelancer.freelancer_message')->with('flags','1')->with('users',$jsonresponse);
        }
        else{
            return redirect('ab/account-security/login');
        }

    }

    public function providernotification(Request $request)
    {
    	if (session()->has('provider_id')){

            $id = $request->session()->get('provider_id');
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST',env('DBHOST').'api/providernotification', ['form_params' =>
                    ['id'=>$id]]);
            $apiresponse =  $response->getBody();
            $jsonresponse = json_decode($apiresponse,true);
             return view('provider.message')->with('flags','1')->with('users',$jsonresponse);
        }
        else{
            return redirect('ab/account-security/login');
        }
    }

    public function freelancernotificationcount(Request $request)
    {
        $id = $request->session()->get('freelancer_id');
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/freelancernotificationcount', ['form_params' =>
                    ['id'=>$id]]);
        return$apiresponse =  $response->getBody();
        
    }

    public function providernotificationcount(Request $request)
    {
        $id = $request->session()->get('provider_id');
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/providernotificationcount', ['form_params' =>
                    ['id'=>$id]]);
        return$apiresponse =  $response->getBody();
                
    }
}
