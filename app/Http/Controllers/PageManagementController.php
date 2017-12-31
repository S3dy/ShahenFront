<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PageManagementController extends Controller
{
    public function homepage(Request $request)
    {	

    	$client = new \GuzzleHttp\Client();
        $response = $client->request('POST', env('DBHOST').'api/homepage');
        $homepage =  $response->getBody();
        // $json=json_decode($homepage,true);
        // return$json[0]['homepage']['banner1']['image'];
        return view('home')->with('homepage',$homepage);
       }

    public function howitworkspage(Request $request)
    {	
    	$client = new \GuzzleHttp\Client();
        $response = $client->request('POST', env('DBHOST').'api/homepage');
        $howitworkspage =  $response->getBody();
        // $json=json_decode($homepage,true);
        // return$json[0]['homepage']['banner1']['image'];
        return view('howitworks')->with('howitworkspage',$howitworkspage);
       } 



    public function homepageadminview(Request $request)
    {
       if($request->session()->has('adminsession')){ 
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/homepage');
        $apiresponse =  $response->getBody();
        return view('adminpanel.addimgbanner')->with('users',$apiresponse);
       } 
       else{
        return redirect('admin/login');
       } 
    }

    public function editbanner1(Request $request)
    {
        if($request->photo){
            $file=$request->file('photo');
            $destinationPath = 'public/images';
            $ext=$file->getClientOriginalExtension();
            $file->move($destinationPath,"HomePageBanner".'.'.$ext);
            $name="HomePageBanner";
            $upload=$destinationPath.'/'.$name.'.'.$ext;
        }
        else
        {
            $upload=$request->img;
        }
        $greenboldcontent=$request->greenbold;
        $blackboldcontent=$request->blackbold;
        $subcontent=$request->subcontent;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/editbanner1', ['form_params' =>
            ['greenbold'=>$greenboldcontent,'blackbold'=>$blackboldcontent,'subcontent'=>$subcontent,'image'=>$upload]]);
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'])
        {
            return back();
        }
    }

    public function edithowitworkheading(Request $request)
    {

       if($request->session()->has('adminsession')){ } else{
        return redirect('admin/login');
       }     
        $heading=$request->headcontent;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/edithowitworkheading', ['form_params' =>
            ['headcontent'=>$heading]]);
        //return $response;
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'])
        {
            return back();
        }
    }

     public function edithowitworktitleone(Request $request)
    {
        /*return "hi";*/

        if($request->photo)
        {
            $file=$request->file('photo');
            $destinationPath = 'public/images';
            $ext=$file->getClientOriginalExtension();
            $file->move($destinationPath,"titleone_img".'.'.$ext);
            $name="titleone_img";
            $upload=$destinationPath.'/'.$name.'.'.$ext;
        }
        else
        {
            $upload=$request->img;
        }
        $heading=$request->cont1_head;
        $content=$request->cont1_cont;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/edithowitworktitleone', ['form_params' =>
            ['heading'=>$heading,'content'=>$content,'image'=>$upload]]);
        //return $response;
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'])
        {
            return back();
        }
    }



     public function edithowitworktitletwo(Request $request)
    {
        
        if($request->photo)
        {
            $file=$request->file('photo');
            $destinationPath = 'public/images';
            $ext=$file->getClientOriginalExtension();
            $file->move($destinationPath,"titletwo_img".'.'.$ext);
            $name="titletwo_img";
            $upload=$destinationPath.'/'.$name.'.'.$ext;
        }
        else
        {
            $upload=$request->img;
        }
        $heading=$request->heading;
        $content=$request->content;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/edithowitworktitletwo', ['form_params' =>
            ['heading'=>$heading,'content'=>$content,'image'=>$upload]]);
        //return $response;
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'])
        {
            return back();
        }
    }


     public function edithowitworktitlethree(Request $request)
    {
        
        if($request->photo)
        {
            $file=$request->file('photo');
            $destinationPath = 'public/images';
            $ext=$file->getClientOriginalExtension();
            $file->move($destinationPath,"titlethree_img".'.'.$ext);
            $name="titlethree_img";
            $upload=$destinationPath.'/'.$name.'.'.$ext;
        }
        else
        {
            $upload=$request->img;
        }
        $heading=$request->heading;
        $content=$request->content;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/edithowitworktitlethree', ['form_params' =>
            ['heading'=>$heading,'content'=>$content,'image'=>$upload]]);
        //return $response;
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'])
        {
            return back();
        }
    }


      public function edithowitworktitlefour(Request $request)
    {
        if($request->photo)
        {
            $file=$request->file('photo');
            $destinationPath = 'public/images';
            $ext=$file->getClientOriginalExtension();
            $file->move($destinationPath,"titlefour_img".'.'.$ext);
            $name="titlefour_img";
            $upload=$destinationPath.'/'.$name.'.'.$ext;
        }
        else
        {
            $upload=$request->img;
        }
        $heading=$request->heading;
        $content=$request->content;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/edithowitworktitlefour', ['form_params' =>
            ['heading'=>$heading,'content'=>$content,'image'=>$upload]]);
        //return $response;
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'])
        {
            return back();
        }
    }

      public function edithowitworkslidder(Request $request)
    {
        if($request->photo1)
        {
        $file1=$request->file('photo1');
        $destinationPath1 = 'public/images';
        $ext1=$file1->getClientOriginalExtension();
        $file1->move($destinationPath1,"slider_img1".'.'.$ext1);
        $name1="slider_img1";
        $upload1=$destinationPath1.'/'.$name1.'.'.$ext1;
        }
        else
        {
            $upload1=$request->img1;
        }
        $sliddercontent1=$request->content1;
        if($request->photo2)
        {
            $file2=$request->file('photo2');
            $destinationPath2 = 'public/images';
            $ext2=$file2->getClientOriginalExtension();
            $file2->move($destinationPath2,"slider_img2".'.'.$ext2);
            $name2="slider_img2";
            $upload2=$destinationPath2.'/'.$name2.'.'.$ext2;
        }
        else
        {
            $upload2=$request->img2;
        }
        $sliddercontent2=$request->content2;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/edithowitworkslidder', ['form_params' =>
            ['content1'=>$sliddercontent1,'image1'=>$upload1,'content2'=>$sliddercontent2,'image2'=>$upload2]]);      
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'])
        {
            return back();
        }
    }

      public function editbanner2(Request $request)
    {
        if($request->photo)
        {
            $file=$request->file('photo');
            $destinationPath = 'public/images';
            $ext=$file->getClientOriginalExtension();
            $file->move($destinationPath,"widebanner_img".'.'.$ext);
            $name="widebanner_img";
            $upload=$destinationPath.'/'.$name.'.'.$ext;
        }
        else
        {
            $upload=$request->img;
        }
        $heading=$request->heading;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/editbanner2', ['form_params' =>
            ['heading'=>$heading,'image'=>$upload]]);
        //return $response;
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'])
        {
            return back();
        }
    }


       public function editbanner3(Request $request)
    {
        if($request->session()->has('adminsession')){ 
            $content=$request->content;
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST',env('DBHOST').'api/editbanner3', ['form_params' =>
                ['content'=>$content]]);
            //return $response;
            $apiresponse =  $response->getBody();
            $jsonresponse = json_decode($apiresponse,true);
            if($jsonresponse['response'])
            {
                return back();
            }    
        } 
        else{
        return redirect('admin/login');
       }
        
    }

    public function howitworksadminview(Request $request)
    {
       if($request->session()->has('adminsession')){  
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/homepage');
        $apiresponse =  $response->getBody();
        return view('adminpanel.addhomecontent')->with('users',$apiresponse);
       }
       else{
        return redirect('admin/login');
       }     
    }

    public function edithowitworkpagebanner(Request $request)
    {
        if($request->photo)
        {
            $file=$req->file('photo');
            $destinationPath = 'public/images';
            $ext=$file->getClientOriginalExtension();
            $file->move($destinationPath,"section1_banner".'.'.$ext);
            $name="section1_banner";
            $upload=$destinationPath.'/'.$name.'.'.$ext;
        }
        else
        {
            $upload=$request->img;
        }
        $heading=$request->heading;
        $content=$request->content;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/edithowitworkpagebanner', ['form_params' =>['heading'=>$heading,'content'=>$content,'image'=>$upload]]);
        //return $response;
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'])
        {
            return back();
        }
    }

    public function edithowitworkpagecontent(Request $request)
    {
        if($request->photo1)
        {
            $file1=$request->file('photo1');
            $destinationPath1 = 'public/images';
            $ext1=$file1->getClientOriginalExtension();
            $file1->move($destinationPath1,"section2_image1".'.'.$ext1);
            $name1="section2_image1";
            $upload1=$destinationPath1.'/'.$name1.'.'.$ext1;
        }
        else
        {
            $upload1=$request->img1;
        }
        if($request->photo2)
        {
            $file2=$request->file('photo2');
            $destinationPath2 = 'public/images';
            $ext2=$file2->getClientOriginalExtension();
            $file2->move($destinationPath2,"section2_image2".'.'.$ext2);
            $name2="section2_image2";
            $upload2=$destinationPath2.'/'.$name2.'.'.$ext2;
        }
        else
        {
            $upload2=$request->img2;
        }
        if($request->photo3)
        {
            $file3=$request->file('photo3');
            $destinationPath3 = 'public/images';
            $ext3=$file3->getClientOriginalExtension();
            $file3->move($destinationPath3,"section2_image3".'.'.$ext3);
            $name3="section2_image3";
            $upload3=$destinationPath3.'/'.$name3.'.'.$ext3;
        }
        else
        {
            $upload3=$request->img3;
        }
        if($request->photo4)
        {
            $file4=$request->file('photo4');
            $destinationPath4 = 'public/images';
            $ext4=$file4->getClientOriginalExtension();
            $file4->move($destinationPath4,"section2_image4".'.'.$ext4);
            $name4="section2_image4";
            $upload4=$destinationPath4.'/'.$name4.'.'.$ext4;
        }
        else
        {
            $upload4=$request->img4;
        }

        $heading1=$request->title1;
        $content1=$request->content1;
        $heading2=$request->title2;
        $content2=$request->content2;
        $heading3=$request->title3;
        $content3=$request->content3;
        $heading4=$request->title4;
        $content4=$request->content4;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/edithowitworkpagecontent', ['form_params' =>['title1'=>$heading1,'content1'=>$content1,'title2'=>$heading2,'content2'=>$content2,'title3'=>$heading3,'content3'=>$content3,'title4'=>$heading4,'content4'=>$content4,'image1'=>$upload1,'image2'=>$upload2,'image3'=>$upload3,'image4'=>$upload4]]);
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'])
        {
            return back();
        }
    }

    public function edithowitworkpagegreenbanner(Request $request)
    {
       if($request->session()->has('adminsession')){       
        $content=$request->content;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/edithowitworkpagegreenbanner', ['form_params' =>['content'=>$content]]);
        //return $response;
        $apiresponse =  $response->getBody();
        $jsonresponse = json_decode($apiresponse,true);
        if($jsonresponse['response'])
        {
            return back();
        }
       }
       else{
        return redirect('admin/login');
       } 
    }

    
    
}

    