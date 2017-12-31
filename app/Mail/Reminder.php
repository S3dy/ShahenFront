<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class Reminder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $req)
    {
        $email=$req->email;
        $myStr = str_random(60);
        //$data = array('email' => $email, 'password' =>$myStr);
        //$insertData = DB::collection('forget_password')->insert($data);
         $client = new \GuzzleHttp\Client();
          $response = $client->request('POST','http://192.168.0.107/api/mail', ['form_params' => 
            ['email' => $email,'code' => $myStr]]);
          return $s =  $response->getBody();
          if($s=="Duplicate Email")
          {
              return "Email does not exist";
          }
           else
           {
               return $this->from('productscog.ht@gmail.com')
                           ->view('emails.welcome')->with('users',$myStr);
           }
        //return $this->view('view.name');
    }
}
