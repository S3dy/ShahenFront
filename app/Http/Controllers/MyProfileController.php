<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyProfileController extends Controller
{
    public function view(Request $req)
    {
        if (session()->has('freelancer_name'))
        {
            $name = $req->session()->get('freelancer_name');
        }
        elseif (session()->has('provider_name'))
         {
            $name = $req->session()->get('provider_name');
        }
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/prof_view', ['form_params' =>
            ['name'=>$name]]);
      $s =  $response->getBody();
      return view('MyProfile')->with('users',$s);

    }
    public function portfolio(Request $req)
    {
     // return "hello";
      $name=$req->name;
    	$title=$req->proj_title;
    	$description=$req->proj_description;
    	// $image=$req->proj_image;
    	// $files=$req->proj_files;
    	$contract=$req->proj_contract;
    	$category=$req->proj_category;
    	$sub_category=$req->proj_subcategory;
    	$url=$req->proj_url;
    	$date=$req->proj_date;
      $skills=$req->proj_skills;

    	  // $file = $req->file('proj_image');
       //  $destinationPath = '/ranjit';
       //  $file->move($destinationPath,$file->getClientOriginalName());
       //  $upload=$destinationPath.'/'.$file->getClientOriginalName();
       //  $file1 = $req->file('proj_files');
       //  $destinationPath1 = '/uploads';
       //  //$ext=$file1->getClientOriginalExtension();
       //  $file1->move($destinationPath1,$file1->getClientOriginalName());
       //  $upload1=$destinationPath1.'/'.$file1->getClientOriginalName();


          $client = new \GuzzleHttp\Client();
          // $response = $client->request('POST','http://192.168.0.107/api/port', ['form_params' =>
          // 	['name'=>$name,'title'=>$title,'description'=>$description,'image'=>$upload,'file'=>$upload1,'contract'=>$contract,'category'=>$category,'sub_category'=>$sub_category,'url'=>$url,'date'=>$date,'skills'=>$skills]]);
           $response = $client->request('POST',env('DBHOST').'api/port', ['form_params' =>
            ['name'=>$name,'title'=>$title,'description'=>$description,'contract'=>$contract,'category'=>$category,'sub_category'=>$sub_category,'url'=>$url,'date'=>$date,'skills'=>$skills]]);
         $s =  $response->getBody();
         if($s)
         {
          $msg = "Inserted";
          return $msg;
        }
      //return response()->json(array('msg'=> $msg), 200);
         // $obj=$s;
         // return $obj['portfolio'];
         // return $name=json_decode($s); 
          //return view('portfolio')->with('users',$s);
          //$obj=json_decode($s);
         // return $name1=array_pluck($s,'portfolio.title');
         // echo $s->{'portfolio.name'};
         // return $name=array_get($s,'portfolio.name');


    }
    public function certificate(Request $req)
    {
    	$name=$req->name;
    	$certificate=$req->cername;
      $provider=$req->provider;
      $description=$req->description;
      $date=$req->date;
    	$client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/cert', ['form_params' =>
          	['name'=>$name,'certificate'=>$certificate,'provider'=>$provider,'description'=>$description,'date'=>$date] ]);
      $s =  $response->getBody();
      if($s=="Certificate Added")
      {
        return "CertificateAdded";
      }
    }
    public function employment(Request $req)
    {
    	$name=$req->name;
    	$cmpny_name=$req->cmpny_name;
    	$city=$req->city;
    	$country=$req->country;
    	$title=$req->title;
    	$role=$req->role;
      $from_mnth=$req->from_mnth;
      $from_year=$req->from_year;
      $to_mnth=$req->to_mnth;
      $to_year=$req->to_year;
    	$edu_desc=$req->edu_desc;
       	$client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/emp', ['form_params' =>
          	['name'=>$name,'cmpny_name'=>$cmpny_name,'city'=>$city,'country'=>$country,'title'=>$title,
          	'role'=>$role,'edu_desc'=>$edu_desc,'from_mnth'=>$from_mnth,'from_year'=>$from_year,'to_mnth'=>$to_mnth,'to_year'=>$to_year] ]);
        $s =  $response->getBody();
        if($s=="Employment Details Added")
        {
          return "Details Updated";
        }

    }
    public function school(Request $req)
    {
    	$name=$req->name;
      $school_name=$req->school_name;
    	$school_from=$req->school_from;
    	$school_to=$req->school_to;
    	$degree_name=$req->degree_name;
    	$area_of_study=$req->area_of_study;
    	$school_desc=$req->school_desc;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/school', ['form_params' =>
          	['name'=>$name,'school_name'=>$school_name,'school_from'=>$school_from,'school_to'=>$school_to,'degree_name'=>$degree_name,'area_of_study'=>$area_of_study,'school_desc'=>$school_desc] ]);
       $s =  $response->getBody();
       if($s=="School Details Added")
       {
         return "School Details Added";
       }

    }
    public function otherExp(Request $req)
    {
        $name=$req->name;
        $subject=$req->subj;
        $desc=$req->other_desc;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/other', ['form_params' =>
            ['name'=>$name,'subject'=>$subject,'desc'=>$desc] ]);
       $s =  $response->getBody();
       if($s=="Other Experiences Added")
       {
         return "Other Experiences Added";
       }
    }
    public function avail(Request $req)
    {
      $name=$req->name;
      $avail=$req->avail;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/avail', ['form_params' =>
            ['name'=>$name,'avail'=>$avail] ]);
       $s =  $response->getBody();
       if($s=="Availability added")
       {
         return "Availability added";
       }
    }
    public function lang(Request $req)
    {
      $name=$req->name;
      $lang=$req->lang;
      $proficiency=$req->proficiency;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/lang', ['form_params' =>
            ['name'=>$name,'lang'=>$lang,'proficiency'=>$proficiency] ]);
       $s =  $response->getBody();
       if($s=="Language added")
       {
        return "Language added";
       }

    }
    public function settings(Request $req)
    {
      $name=$req->name;
      $visibility=$req->visibility;
      $proj_preference=$req->proj_preference;
      $exp_level=$req->exp_level;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/settings', ['form_params' =>
            ['name'=>$name,'visibility'=>$visibility,'proj_preference'=>$proj_preference,'exp_level'=>$exp_level] ]);
       $s =  $response->getBody();
       if($s=="settings added successfully")
       {
        return "settings added successfully";
       }
    }
    public function video(Request $req)
    {
      $name=$req->name;
      $video_link=$req->video_lin;
      $video_type=$req->video_typ;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/video', ['form_params' =>
            ['name'=>$name,'video_link'=>$video_link,'video_type'=>$video_type] ]);
       $s =  $response->getBody();
       if($s=="Video added")
       {
        return "Video added";
       }

    }
    public function desc(Request $req)
    {
      $name=$req->name;
      $desc=$req->desc;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/desc', ['form_params' =>
            ['name'=>$name,'desc'=>$desc] ]);
       $s =  $response->getBody();
       if($s="Description added")
       {
        return "Description added";
       }

    }
    public function titl(Request $req)
    {
      $name=$req->name;
      $titl=$req->titl;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/titl', ['form_params' =>
            ['name'=>$name,'titl'=>$titl] ]);
       $s =  $response->getBody();
       if($s=="Title added")
       {
        return "Title added";
       }

    }
    public function rate(Request $req)
    {
      $name=$req->name;
      $hour=$req->hour_rate;
      $rate=$req->you_receive;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/rate', ['form_params' =>
            ['name'=>$name,'hour_rate'=>$hour,'you_receive'=>$rate] ]);
       return $s =  $response->getBody();
       if($s=="Rate added")
       {
        return "Rate added";
       }

    }
    public function profileview(Request $req)
    {
       if (session()->has('freelancer_name'))
        {
            $name = $req->session()->get('freelancer_name');
        }
        else
        {
          return redirect('ab/account-security/login');
        }
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/profview', ['form_params' =>
            ['name'=>$name] ]);
       $s =  $response->getBody();
       $obj=json_decode($s,true);
       if($obj[0]['portfolio'])
       {
       $portfolio=$obj[0]['portfolio'];
       $flag_port=$portfolio['flags'];
       $cert=$obj[0]['certificate'];
       $flag_cert=$cert['flags'];
       $employment=$obj[0]['employment'];
       $flag_emp=$employment['flags'];
       $school=$obj[0]['school'];
       $flag_school=$school['flags'];
       $other=$obj[0]['otherExperiences'];
       $flag_other=$other['flags'];
         return view('freelancer.freelancers')->with('users',$s)->with('flag_cert',$flag_cert)->with('flag_emp',$flag_emp)->with('flag_school',$flag_school)->with('flag_other',$flag_other)->with('flags','0')->with('flag_port',$flag_port);
       }

    //return view('freelancer.freelancers')->with('users',$s);

    }
    public function profile_other_view(Request $req)
    {
       if (session()->has('freelancer_name'))
        {
            $name = $req->session()->get('freelancer_name');
        }
        else
        {
          return redirect('ab/account-security/login');
        }
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/profview', ['form_params' =>
            ['name'=>$name] ]);
       $s =  $response->getBody();
       $obj=json_decode($s,true);
       if($obj[0]['portfolio'])
       {
       $portfolio=$obj[0]['portfolio'];
       $flag_port=$portfolio['flags'];
       $cert=$obj[0]['certificate'];
       $flag_cert=$cert['flags'];
       $employment=$obj[0]['employment'];
       $flag_emp=$employment['flags'];
       $school=$obj[0]['school'];
       $flag_school=$school['flags'];
       $other=$obj[0]['otherExperiences'];
       $flag_other=$other['flags'];
         return view('freelancer.publicview')->with('users',$s)->with('flag_cert',$flag_cert)->with('flag_emp',$flag_emp)->with('flag_school',$flag_school)->with('flag_other',$flag_other)->with('flags','0')->with('flag_port',$flag_port);
       }

    //return view('freelancer.freelancers')->with('users',$s);

    }
 public function skills(Request $req)
    {
      $name=$req->freelancer_name;
     $skills=$req->skills;
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST',env('DBHOST').'api/skills', ['form_params' =>
            ['name'=>$name,'skills'=>$skills] ]);
       return $s =  $response->getBody();
       if($s=="added")
       {
        return "added";
      }

    }


}
