<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyProfileViewController extends Controller
{
  public function profileView(Request $request)
  {
        if (session()->has('freelancer_id'))
        {
          $username = $request->session()->get('username');
        }
        else
        {
          return redirect('ab/account-security/login');
        }
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/myProfileList', ['form_params' =>
            ['username'=>$username] ]);
        $profileresponse =  $response->getBody();
        $obj=json_decode($profileresponse,true);
        if($obj[0]['freelancerprofile']['portfolios'])
        {
         $portfolio=$obj[0]['freelancerprofile']['portfolios'];
         $flag_port=$portfolio['flags'];
         $cert=$obj[0]['freelancerprofile']['certifications'];
         $flag_cert=$cert['flags'];
         $employment=$obj[0]['freelancerprofile']['employmenthistories'];
         $flag_emp=$employment['flags'];
         $school=$obj[0]['freelancerprofile']['educations'];
         $flag_school=$school['flags'];
         $other=$obj[0]['freelancerprofile']['otherexperience'];
         $flag_other=$other['flags'];
         return view('freelancer.freelancers')->with('users',$profileresponse)->with('flag_cert',$flag_cert)->with('flag_emp',$flag_emp)->with('flag_school',$flag_school)->with('flag_other',$flag_other)->with('flags','0')->with('flag_port',$flag_port);
        }

    }

    public function portfolioView(Request $request)
    {
        
      $id=$request->session()->get("freelancer_id");
      $username = $request->session()->get('username');
      $projecttitle=$request->projecttitle;
      $projectoverview=$request->projectoverview;
      $imagename=$request->imagename;
      $filename=$request->filename;
      $contract=$request->contract;
      $category=$request->category;
      $subcategory=$request->subcategory;
      $projecturl=$request->projecturl;
      $completiondate=$request->completiondate;
      $skills=$request->skills;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/viewportfolio', ['form_params' =>
            ['username'=>$username,'id'=>$id,'projecttitle'=>$projecttitle,'projectoverview'=>$projectoverview,'imagename'=>'','filename'=>'','contract'=>'','category'=>$category,'subcategory'=>'','projecturl'=>$projecturl,'completiondate'=>$completiondate,'skills'=>$skills]]);
      $portfolioresponse =  $response->getBody();
      $jsonresponse = json_decode($portfolioresponse,true);
      if($jsonresponse['port']=="inserted")
      {
            return "Inserted";
      }
      else
      {
            return "failed";
      }
    
    }
    public function certificateList(Request $request)
    {
      $id=$request->session()->get("freelancer_id");
      $username = $request->session()->get('username');
      $certificationname=$request->certificationname;
      $provider=$request->provider;
      $description=$request->description;
      $date=$request->date;
          $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/certificateview', ['form_params' =>
            ['username'=>$username,'id'=>$id,'certificationname'=>$certificationname,'provider'=>$provider,'description'=>$description,'date'=>$date] ]);
      $certificateresponse =  $response->getBody();
      $jsonresponse = json_decode($certificateresponse,true);
      if($jsonresponse['cert'])
      {
            return "CertificateAdded";
      }
    }
    public function employmentHistory(Request $request)
    {      
      $id=$request->session()->get("freelancer_id");
      $username = $request->session()->get('username');
      $company=$request->company;
      $city=$request->city;
      $location=$request->location;
      $title=$request->title;
      $role=$request->role;
      $startmonth=$request->startmonth;
      $startyear=$request->startyear;
      $endmonth=$request->endmonth;
      $endyear=$request->endyear;
      $description=$request->description;
   
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/employeedetails', ['form_params' =>
            ['id'=>$id,'username'=>$username,'company'=>$company,'city'=>$city,'location'=>$location,'title'=>$title,
            'role'=>$role,'description'=>$description,'startmonth'=>$startmonth,'startyear'=>$startyear,'endmonth'=>$endmonth,'endyear'=>$endyear,'currentstatus'=>'']]);
        $employment =  $response->getBody();
        $jsonresponse = json_decode($employment,true);
      if($jsonresponse['employment']=="inserted"){
            return "Details Updated";
      }
      else{
          return "failed";
      }
    }
    public function schooldetails(Request $request)
    {
      $id=$request->session()->get("freelancer_id");
      $username = $request->session()->get('username');
      $schoolname=$request->schoolname;
      $startdate=$request->startdate;
      $enddate=$request->enddate;
      $degree=$request->degree;
      $areaofstudy=$request->areaofstudy;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/schoolView', ['form_params' =>
            ['id'=>$id,'username'=>$username,'schoolname'=>$schoolname,'startdate'=>$startdate,'enddate'=>$enddate,'degree'=>$degree,'areaofstudy'=>$areaofstudy,'description'=>'']]);
      $schoolresponse =  $response->getBody();
      $jsonresponse = json_decode($schoolresponse,true);
      if($jsonresponse['school']=="inserted"){
            return "School Details Added";
      }
      else{
          return "failed";
      }
    }
    public function otherExperience(Request $request)
    {
        $id=$request->session()->get("freelancer_id");
        $username = $request->session()->get('username');
        $subject=$request->subject;
        $description=$request->description;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/experiencelist', ['form_params' =>
            ['id'=>$id,'username'=>$username,'subject'=>$subject,'description'=>$description]]);
        $experienceresponse =  $response->getBody();
        $jsonresponse = json_decode($experienceresponse,true);
        if($jsonresponse['experience']=="inserted"){
            return "Other Experiences Added";
        }
        else{
          return "failed";
        }
    }
    public function editJob(Request $request)
    {
      $id=$request->session()->get("freelancer_id");
      $username = $request->session()->get('username');
      $jobtitle=$request->jobtitle;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/editjobtitle', ['form_params' =>
            ['id'=>$id,'username'=>$username,'jobtitle'=>$jobtitle]]);
      $jobresponse =  $response->getBody();
      $jsonresponse = json_decode($jobresponse,true);
      if($jsonresponse['title'])
      {
         return "Title added";
      }
      else
      {
          return "failed";
      }

    }
    public function hourRate(Request $request)
    {
      $id=$request->session()->get("freelancer_id");
      $username = $request->session()->get('username');
      $hourate=$request->hourate;
      $receiverate=$request->receiverate;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/editrate', ['form_params' =>
            ['id'=>$id,'username'=>$username,'hourate'=>$hourate,'receiverate'=>$receiverate]]);
      $hourresponse =  $response->getBody();
      $jsonresponse = json_decode($hourresponse,true);
      if($jsonresponse['rate'])
      {
         return "Rate added";
      }
      else
      {
          return "failed";
      }
    }
    public function userSkills(Request $request)
    {
     
      $id=$request->session()->get("freelancer_id");
      $username = $request->session()->get('username');    
      $skills=$request->skills;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/skillList', ['form_params' =>
            ['id'=>$id,'username'=>$username,'skills'=>$skills] ]);
      $skillresponse =  $response->getBody();
      $jsonresponse = json_decode($skillresponse,true);
      if($jsonresponse['skill'])
      {
        return "added";
      }
      else
      {
        return "failed";
      }
    }
    public function editOverview(Request $request)
    {
      $id=$request->session()->get("freelancer_id");
      $username = $request->session()->get('username');  
      $overview=$request->overview;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/userOverview', ['form_params' =>
            ['id'=>$id,'overview'=>$overview]]);
      $overviewresponse =  $response->getBody();
      $jsonresponse = json_decode($overviewresponse,true);
      if($jsonresponse['description']=="inserted")
      {
        return "Description added";
      }
      else
      {
        return "failed";
      }

    }
public function freelancerProfilePicture(Request $request)
  {
        if ($request->hasFile('dp')) {
           if ($request->file('dp')->isValid()) {
                
                $path1 = $request->dp->path(); 
                $type  = pathinfo($path1, PATHINFO_EXTENSION);
                $data  = file_get_contents($path1);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);  

                $fileext1 = $request->dp->extension();
                $fileext2 = $fileext1;
                $img1 = $request->input('dp2'); 

                $id = $request->session()->get('freelancer_id');

                $fname=$request->session()->get('username'); 

                  
                   
                  $imgData = str_replace(' ','+',$base64);
                  $imgData =  substr($imgData,strpos($imgData,",")+1);
                  $imgData = base64_decode($imgData);
                  // Path where the image is going to be saved
                  $filename1 = $fname.'01.'.$fileext1;
                  $filePath =  '/profileimages/'.$filename1;

                  // Write $imgData into the image file
                  $file = fopen($filePath, 'w');
                  fwrite($file, $imgData);
                  fclose($file);


                  $imgData = str_replace(' ','+',$img1);
                  $imgData =  substr($imgData,strpos($imgData,",")+1);
                  $imgData = base64_decode($imgData);
                  // Path where the image is going to be saved
                  $filename2 = $fname.'02.'.$fileext2;
                  $filePath =  '/profileimages/'.$filename2;
                  // Write $imgData into the image file
                  $file = fopen($filePath, 'w');
                  fwrite($file, $imgData);
                  fclose($file);

             

                  
                $client = new \GuzzleHttp\Client();
                $response = $client->request('POST', env('DBHOST').'api/freelancerpicture', ['form_params' => ['id' => $id,'filename1'=>$filename1,'filename2'=> $filename2]]);
                $s =  $response->getBody();
                 if($s == "1"){
                  $dpses = $filename2;
                  $request->session()->put('dp',$dpses);
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