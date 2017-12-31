<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function jobsearch(Request $request)
    {
       if($request->session()->has('freelancer_id')){
            $word=$request->search;
            $sortby=$request->sortby;
            $page=$request->page;
            $category=$request->category;
            $request1 = array();
            $request1['form_params']['level'] = $request->level; 
            $request1['form_params']['length'] = $request->length; 
            $request1['form_params']['duration'] = $request->duration; 
            $request1['form_params']['word'] = $word;
            $request1['form_params']['sortby'] = $sortby;
            $request1['form_params']['page'] = $page;
            $request1['form_params']['category'] = $category;

           
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST',env('DBHOST').'api/jobsearch',$request1);
            $apiresponse1 =  $response->getBody();
            $json=json_decode($apiresponse1,true);
            $response1 = $client->request('POST',env('DBHOST').'api/jobsearchtotal',$request1);
            $apiresponse2 =  $response1->getBody();
            $decode=json_decode($apiresponse2,true);
            $jsonresponse1=json_decode($apiresponse1,true);
            $max=sizeof($decode);
            $response2 = $client->request('POST',env('DBHOST').'api/categoryview');
            $apiresponse3 =  $response2->getBody();
            //$jsonresponse2 = json_decode($apiresponse2,true);
            $jsonresponse3 = json_decode($apiresponse3,true);
             //$obj=json_decode($s);
             //return view('freelancer.searchforprojects')->with('users',$s);
             //$obj=json_decode($s);
             //$title=$obj->{'title'};
             if($jsonresponse1=="")
             {
                return view('freelancer.searchforprojects')->with('users',$jsonresponse1)->with('max1',$max)->with('users2',$jsonresponse3);;
             }
             elseif($jsonresponse3=="")
             {
                return view('freelancer.searchforprojects')->with('users',$jsonresponse3)->with('max1',$max)->with('users2',$jsonresponse3);;
                //return view('freelancer.searchforprojects')->with('users',$s)->with('users1',$a);
               // return view('search')->with('users',$s)->with('flags','1');
             }
             else
             {
                 return view('freelancer.searchforprojects')->with('users',$jsonresponse1)->with('max1',$max)->with('users2',$jsonresponse3);
             }
            // $col=DB::collection('cmpny_sign_up')->where('fname','like', "%$word%")->get();
            // $col1=DB::collection('cmpny_sign_up')->where('email','like', "%$word%")->get();
            // return view('search')->with('users',$col)->with('flags','1')->with('users1',$col1);

        }
        else
        {
            return redirect('ab/account-security/login');
        }

    }
    public function test(Request $request)
    {

            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST',env('DBHOST').'api/test');
            $apiresponse1 =  $response->getBody();
            $decode=json_decode($apiresponse1,true);

            $id=$decode[0]['_id'];
            // return implode(" ",$id);
            echo var_dump($id);
    }
}
