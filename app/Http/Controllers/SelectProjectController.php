<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SelectProjectController extends Controller
{
    public function index(Request $req,$id,$name)
    {
      if($req->session()->has('freelancer_name'))
      {
      //return $id;
      //return $job_name=$req->job_name;
        $free_name = $req->session()->get('freelancer_name');
        $client = new \GuzzleHttp\Client();
          $response = $client->request('POST',env('DBHOST').'api/select', ['form_params' =>
            ['word' => $id] ]);
        $s =  $response->getBody();
        $client = new \GuzzleHttp\Client();
          $response = $client->request('POST',env('DBHOST').'api/client_feed', ['form_params' =>
            ['word' => $id,'name'=>$name] ]);
        $a =  $response->getBody();
        // $obj=json_decode($a,true);
        // return $job=$obj[1]['job_name'];
        return view('freelancer.selectproject')->with('users',$s)->with('feed',$a);

      }
      else
      {
        return redirect('ab/account-security/login');
      }

    }
    public function prop(Request $req,$id)
    {
          if($req->session()->has('freelancer_name'))
            {
             $client = new \GuzzleHttp\Client();
             $response = $client->request('POST',env('DBHOST').'api/select', ['form_params' =>
                ['word'=>$id]]);
              $s =  $response->getBody();
              return view('freelancer.submitproposal')->with('users',$s);

            }
            else
            {
               return redirect('ab/account-security/login');
            }


    }
    public function pro_selectproject(Request $req,$id)
    {
            if($req->session()->has('provider_name'))
            {
              //return $id;
             $client = new \GuzzleHttp\Client();
             $response = $client->request('POST',env('DBHOST').'api/pro_select', ['form_params' =>
                ['word'=>$id]]);
              $s =  $response->getBody();
              return view('provider.posted_job_view')->with('users',$s);
              //return view('freelancer.submitproposal')->with('users',$s);

            }
            else
            {
               return redirect('ab/account-security/login');
            } 
    }
    public function admin_selectproject($id)
    {
              //return $id;
             $client = new \GuzzleHttp\Client();
             $response = $client->request('POST',env('DBHOST').'api/pro_select', ['form_params' =>
                ['word'=>$id]]);
             $s =  $response->getBody();
              return view('adminpanel.jobview')->with('v',$s);
    }
}
