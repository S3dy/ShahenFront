<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProviderProfileController extends Controller
{
    public function providerprofileview(Request $request)
    {
      if (session()->has('provider_id')){
        $id=$request->session()->get('provider_id');
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/providerprofileview', ['form_params' =>
              ['id'=>$id] ]);
        $apiresponse =  $response->getBody();
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET','https://restcountries.eu/rest/v1/all'); 
        $json = $response->getBody();
        return view('provider.providerprofile')->with('sdata',$apiresponse)->with('country',$json);
      }
      else{
        return redirect('/ab/account-security/login');
      }
    }

    public function providerfirstname(Request $request)
    {
      $id=$request->session()->get('provider_id');
      $firstname=$request->firstname;
      $lastname=$request->lastname;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/providerfirstname', ['form_params' =>
            ['id'=>$id,'firstname'=>$firstname,'lastname'=>$lastname] ]);
      $request->session()->put('firstname',$firstname);
      return $apiresponse =  $response->getBody();

    
    }

    public function companydetail(Request $request)
    {
      $id=$request->session()->get('provider_id');
      $companyname=$request->companyname;
      $website=$request->website;
      $tagline=$request->tagline;
      $description=$request->description;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/companydetail', ['form_params' =>
            ['id'=>$id,'companyname'=>$companyname,'website'=>$website,'tagline'=>$tagline,'description'=>$description] ]);
      return $apiresponse =  $response->getBody();
    
    }

    public function companyaddress(Request $request)
    {
      $id=$request->session()->get('provider_id');
      $country=$request->country;
      $address=$request->address;
      $city=$request->city;
      $zipcode=$request->zipcode;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/companyaddress', ['form_params' =>
            ['id'=>$id,'country'=>$country,'address'=>$address,'city'=>$city,'zipcode'=>$zipcode] ]);
      $apiresponse =  $response->getBody();
      $decode=json_decode($apiresponse,true);
      return $decode['country'];
    
    }

    public function timezone(Request $request)
    {
      $id=$request->session()->get('provider_id');
      $zone=$request->zone;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/timezone', ['form_params' =>
            ['id'=>$id,'zone'=>$zone] ]);
      return $apiresponse =  $response->getBody();
 
    }

    public function phone(Request $request)
    {
      $id=$request->session()->get('provider_id');
      $phoneid=$request->phoneid;
      $number=$request->number;
      $phone=$phoneid." ".$number;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/phone', ['form_params' =>
            ['id'=>$id,'phone'=>$phone] ]);
      return $apiresponse =  $response->getBody();

    
    }

   public function providerdisplaypicture(Request $request)
  {
        if ($request->hasFile('dp')) {
          if ($request->file('dp')->isValid()) {
                
                $path1 = $request->dp->path(); 
                $type  = pathinfo($path1, PATHINFO_EXTENSION);
                $data  = file_get_contents($path1);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);  
                $fileext1 = $request->dp->extension();
                $img1 = $request->input('dp2'); 

                $id = $request->session()->get('provider_id');
                $fname = $request->session()->get('email'); 

                $imgData = str_replace(' ','+',$base64);
                $imgData =  substr($imgData,strpos($imgData,",")+1);
                $imgData = base64_decode($imgData);
                  // Path where the image is going to be saved
                $filename1 = $fname.'01.'.$fileext1;
                $filePath =  'public/profileimages/'.$filename1;

                  // Write $imgData into the image file
                $file = fopen($filePath, 'w');
                fwrite($file, $imgData);
                fclose($file);


                $imgData = str_replace(' ','+',$img1);
                $imgData =  substr($imgData,strpos($imgData,",")+1);
                $imgData = base64_decode($imgData);
                  // Path where the image is going to be saved
                $filename2 = $fname.'02.'.$fileext1;
                $filePath =  'public/profileimages/'.$filename2;
                  // Write $imgData into the image file
                $file = fopen($filePath, 'w');
                fwrite($file, $imgData);
                fclose($file);

                
                $client = new \GuzzleHttp\Client();
                $response = $client->request('POST', env('DBHOST').'api/providerdisplaypicture', ['form_params' => ['id' => $id,'img'=>$filename1,'img1'=> $filename2 ]]);
                $apiresponse =  $response->getBody();
                $jsonresponse = json_decode($apiresponse,true);
                 if($jsonresponse['response'] =="1"){
                  $dp = $filename2;
                  $request->session()->put('prodp',$dp);
                  return back()->with('dpflag','1');
                 } 
                 else return back()->with('dpflag','0');
           
            }else{
               return back()->with('dpflag','0');
            }
          }else{
            return back()->with('dpflag','0');
          }
  
  return back()->with('dpflag','0');
  }
}