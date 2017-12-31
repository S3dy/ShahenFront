<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Mail;
use App\Mail\Reminder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Input;


class ForgetPasswordController extends Controller 
{
	public function forgetpasswordmail(Request $request)
	{
            $rules = ['captcha' => 'required|captcha'];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails())
            {
                //echo '<p style="color: #ff0000;">Incorrect!</p>';
                //return view('CaptchaIncorrect');
                return redirect('forgetpass')->with('flags','1');
            }
            else
            {
                //echo '<p style="color: #00ff30;">Matched :)</p>';
                        $email=$request->email;
                        $myStr = str_random(60);
                        //$data = array('email' => $email, 'password' =>$myStr);
                        //$insertData = DB::collection('forget_password')->insert($data);
                         $client = new \GuzzleHttp\Client();
                          $response = $client->request('POST',env('DBHOST').'api/forgetpasswordmail', ['form_params' => 
                            ['email' => $email,'code' => $myStr]]);
                          $apiresponse =  $response->getBody();
                          $jsonresponse = json_decode($apiresponse,true);
                          if($jsonresponse['response'] =="Duplicate Email")
                          {
                              return redirect('forgetpass')->with('flags','2');
                          }
                           else
                           {
                             $name =$jsonresponse['response'];
                             $response = $client->request('POST', env('DBHOST').'api/emails');
                             $a =  $response->getBody();
                             $obj=json_decode($a,true);
                             $content=$obj[0]['FORGET PASSWORD MAIL']['content'];
                             $header=$obj[0]['emailtemplate1'];
                             $footer=$obj[0]['emailtemplate2'];
                             $subject=$obj[0]['FORGET PASSWORD MAIL']['subject'];
                             Mail::send('emails.forgetpassword', ['title' =>$content,'header'=>$header,'footer'=>$footer,'users' =>$myStr,'name'=>$name], function ($message) use ($request,$subject)
                                 {
                                    $message->from('productscog.ht@gmail.com', 'RBS');
                                    $message->to($request->email)->subject("$subject");
                                });
                             return view('EmailSentSuccess');

                           }
                 //         $email=$req->email;
                 // // $to_email = 'khmranjithkumar@gmail.com';
                 // Mail::to($email)->send(new Reminder);  
                      
            }


	}

    public function codecheck($id)
    {
        $code=$id;
        $client = new \GuzzleHttp\Client();
          $response = $client->request('POST',env('DBHOST').'api/codecheck', ['form_params' => 
            ['code' => $code]]);
           $apiresponse =  $response->getBody();
          if($apiresponse =="Code expired")
          {
            return view('CodeExpired');
          }
          elseif ($apiresponse)
           {
            return view('ResetPassword')->with('users',$apiresponse);
          }
    }
    public function passwordupdate(Request $request)
    {
      $email=$request->email;
      $pwd=$request->new_password;
      $rpwd=$request->re_password;
      if($pwd==$rpwd)
      {
        $client = new \GuzzleHttp\Client();
          $response = $client->request('POST',env('DBHOST').'api/passwordupdate', ['form_params' => 
            ['email' => $email,'pwd'=>$pwd]]);
         $apiresponse =  $response->getBody();
          if($apiresponse =="Successfull")
          {
            return view('PasswordUpdated');
          }

      }
    }    

}
