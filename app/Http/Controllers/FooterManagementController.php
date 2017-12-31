<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class FooterManagementController extends Controller
{
    public function footer(Request $request)
    {
      
    	  $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', env('DBHOST').'api/footer');
        $footer =  $response->getBody();
        return  view('dynamicfooter')->with('footer',$footer);
    }

    public function footerlink(Request $r)
    {
       	$client = new \GuzzleHttp\Client();
        $response = $client->request('POST', env('DBHOST').'api/footerlink',['form_params' => ['footerlink'=>$r->linkname]]);
        $footerlink =  $response->getBody();
        return view('test')->with('footerlink',$footerlink);
}

    public function adminfooterview(Request $request)
    {
      if($request->session()->has('adminsession')){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/adminfooterview');
        $adminfooterview =  $response->getBody();
        return view('adminpanel.addfooter')->with('users',$adminfooterview);
      }
      else{
        return redirect('/admin/login');
      }  
    }

    public function addfootercontentview(Request $request)
    {
      if($request->session()->has('adminsession')){
        return view('adminpanel.addfootcontent');
      }
      else{
        return redirect('/admin/login');
      }  
    }

    public function addfooter(Request $req)
      {
          $footselect=$req->footselect;
          $footchange=$req->footchange;
          $pagetitle=$req->pagetitle;
          $foottype=$req->foottype;
          $footurl=$req->footurl;
          $foottextarea=$req->foottextarea;
          $footname=$req->footname;
          $client = new \GuzzleHttp\Client();
          $response = $client->request('POST', env('DBHOST').'api/addfooter', ['form_params' => ['footselect'=>$footselect,'footchange'=>$footchange,'pagetitle'=>$pagetitle,'foottype'=>$foottype,'footurl'=>$footurl,'foottextarea'=>$foottextarea,'footname'=>$footname]]);
          $apiresponse =  $response->getBody();
          $jsonresponse = json_decode($apiresponse,true);
         if($jsonresponse['response']=="inserted"){
          return redirect('/admin/addfooter');
         }
         
         else{
            return redirect('/admin/addfootcontent')->with('flag','1');
         }
      }

      public function editfooterview(Request $request,$id)
      {
        if($request->session()->has('adminsession')){  
          $client = new \GuzzleHttp\Client();
          $response = $client->request('POST', env('DBHOST').'api/editfooterview', ['form_params' => ['id'=>$id]]);
          $apiresponse =  $response->getBody();
          return view('adminpanel.EditFootContent')->with('users',$apiresponse)->with('id',$id);
        }
        else{
          return redirect('/admin/login');
        }  
      }

      public function editfooter(Request $request)
      {
          $footselect=$request->footselect;
          $pagetitle=$request->pagetitle;
          $footchange=$request->footchange;
          $foottype=$request->foottype;
          $footurl=$request->footurl;
          $foottextarea=$request->foottextarea;
          $footname=$request->footname;
          $id=$request->id;
          $client = new \GuzzleHttp\Client();
          $response = $client->request('POST', env('DBHOST').'api/editfooter', ['form_params' => ['footselect'=>$footselect,'footchange',$footchange,'pagetitle'=>$pagetitle,'foottype'=>$foottype,'footurl'=>$footurl,'foottextarea'=>$foottextarea,'footname'=>$footname,'id'=>$id]]);
         $apiresponse =  $response->getBody();
         $jsonresponse = json_decode($apiresponse,true);

        if($jsonresponse['response']=="inserted"){
          
          return redirect('/admin/addfooter');

         }
         else{
          
          return redirect('/admin/addfooter');

         }
      }

      public function deletefooter($id)
      {
          $client = new \GuzzleHttp\Client();
          $response = $client->request('POST', env('DBHOST').'api/deletefooter', ['form_params' => ['id'=>$id]]);
          $apiresponse =  $response->getBody();
          $jsonresponse = json_decode($apiresponse,true);
         if($jsonresponse['response']=="deleted")
         {
           return redirect('/admin/addfooter');
         }
      }

      public function customlinksview(Request $request)
      {
        if($request->session()->has('adminsession')){  
          $client = new \GuzzleHttp\Client();
          $response = $client->request('POST',env('DBHOST').'api/customlinksview');
          $apiresponse =  $response->getBody();
          return view('adminpanel.sitelinks')->with('users',$apiresponse);
        }
        else{
          return redirect('/admin/login');
        }
      }

      public function editsitelinks(Request $request)
      {

          if($request->splitter == "social"){
             $google=$request->google;
             $facebook=$request->facebook;
             $twitter=$request->twitter;
             $linkedin=$request->linkedin;
             $youtube=$request->youtube;
             if($request->googlestatus){
                $googlestatus="1";
             }

             else{
                $googlestatus="0";
             }

             if($request->facebookstatus){
                $facebookstatus="1";
             }

             else{
                $facebookstatus="0";
             }

              if($request->twitterstatus){
                $twitterstatus="1";
             }

             else{
                $twitterstatus="0";
             }

              if($request->linkedinstatus){
                $linkedinstatus="1";
             }

             else{
                $linkedinstatus="0";
             }

              if($request->youtubestatus){
                $youtubestatus="1";
             }

             else{
                $youtubestatus="0";
             }

            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', env('DBHOST').'api/customlinkssocial', ['form_params' => ['google'=>$google,'facebook'=>$facebook,'twitter'=>$twitter,'linkedin'=>$linkedin,'youtube'=>$youtube,'googlestatus'=>$googlestatus,'facebookstatus'=>$facebookstatus,'twitterstatus'=>$twitterstatus,'linkedinstatus'=>$linkedinstatus,'youtubestatus'=>$youtubestatus]]);
            $apiresponse =  $response->getBody();
            $jsonresponse = json_decode($apiresponse,true);
            if($jsonresponse['response']=="inserted")
            {
              return redirect('/admin/sitelinks');
            }
          }elseif($request->splitter == "mobile"){

             $android=$request->android;
             $ios=$request->ios;
             if($request->androidstatus){
              $androidstatus="1";
             }

             else{
              $androidstatus="0";
             }

             if($request->iosstatus){
              $iosstatus="1";
             }

             else{
              $iosstatus="0";
             }

            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', env('DBHOST').'api/customlinksmobile', ['form_params' => ['android'=>$android,'ios'=>$ios,'androidstatus'=>$androidstatus,'iosstatus'=>$iosstatus]]);
            $apiresponse =  $response->getBody();
            $jsonresponse = json_decode($apiresponse,true);
            if($jsonresponse['response']=="inserted")
            {
              return redirect('/admin/sitelinks');
            }
          }
          else{

          }
          return redirect('/admin/sitelinks');
        }

}