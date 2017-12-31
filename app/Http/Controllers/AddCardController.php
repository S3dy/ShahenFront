<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
class addcardController extends Controller
{
 public function cardInsert(Request $request)
  {

        \Stripe\Stripe::setApiKey(env('secret_key'));

          $id=$request->session()->get("freelancer_id");
          $username= $request->session()->get('username');
          $role= $request->session()->get('role');
          $country = "US";
          $currency = "USD";
          $holder_name=$request->holder_name;
          $holder_type=$request->holder_type;
          $routing_number=$request->routing_number;
          $account_number=$request->account_number;
          $client = new \GuzzleHttp\Client();
          $response1 = $client->request('POST',env('DBHOST').'api/freelancercheck', ['form_params' =>
                ['id'=>$id,'username'=>$username, 'role'=>$role] ]);
          $res =  $response1->getBody();
          $obj=json_decode($res,true);
          $email = $obj['email'];
          $customerid = $obj['customerid'];
          $token = $request->token;
          $client = new \GuzzleHttp\Client();
          $response1 = $client->request('POST',env('DBHOST').'api/freelancercustomercheck', ['form_params' =>
                ['customerid'=> $customerid, 'account_number'=> $account_number, 'routing_number' => $routing_number ] ]);
          $responsecheck =  $response1->getBody();

          if($responsecheck  == "exists")
          {
             return view('freelancer.addcard')->with('flag','2');
          }
          $account = \Stripe\Account::retrieve($customerid);
          $s = $account->external_accounts->create(array("external_account" => $token));
          
          $response1 = $client->request('POST',env('DBHOST').'api/freelancercustomercheck', ['form_params' =>
                ['customerid'=> $customerid, 'account_number'=> $account_number, 'routing_number' => $routing_number ] ]);
          $responsecustomer =  $response1->getBody();
          if($responsecustomer  == "exists")
          {
             return view('freelancer.addcard')->with('flag','2');
          }
          $response = $client->request('POST',env('DBHOST').'api/cardInsert', ['form_params' =>
            ['currency'=>$currency,'country'=>$country, 'holder_name'=>$holder_name, 'holder_type'=>$holder_type, 'routing_number'=>$routing_number,'account_number'=>$account_number,'username'=>$username, 'role'=>$role,'id'=>$id,'customerid'=>$customerid,'bankid'=>$s['id']] ]);
          $responseinsert =  $response->getBody();
          if($responseinsert=="success")
          {
            return redirect('displayBill');
            return view('freelancer.addcard')->with('flag','1');
          }
          else
          {
            return view('freelancer.addcard')->with('flag','2');
          }
   
   }
   public function createCustomerId(Request $request)
   {

         \Stripe\Stripe::setApiKey ( env('secret_key') );
         $id=$request->session()->get("freelancer_id");
         $username= $request->session()->get('username');
         $client = new \GuzzleHttp\Client();
         $response1 = $client->request('POST',env('DBHOST').'api/freelancercheck', ['form_params' =>
            ['id'=>$id,'username'=>$username] ]);
         $res =  $response1->getBody();
         $obj=json_decode($res,true);
         $email = $obj['email'];
         $customerid = $obj['customerid'];
         $firstName = $obj['firstname'];
         $lastName = $obj['lastname'];
         if($customerid == "")
         {
           $customer =\Stripe\Account::create(
              array(
                "country" => "US",
                "email" => $email,
                "managed" => true,
                "tos_acceptance" => array(
                  "date" => time(),
                  "ip" => $_SERVER['REMOTE_ADDR']
                ),
                "legal_entity" =>array(
                    "dob" =>array(
                       "day" =>  10,
                       "month" => 01,
                       "year" => 1986 
                      ),
                     "personal_id_number" => 123456789,
                    "first_name" => $firstName,
                    "last_name"  => $lastName,
                    "type" => "individual",
                    "ssn_last_4" => 6789,
                    "address" => array(
                        "line1" => "1234 Main Street",
                        "postal_code" => 94111,
                        "city" => "San Francisco",
                        "state" =>  "CA"
                      )                    
                  )
              ));

             
            $client = new \GuzzleHttp\Client();
            $response1 = $client->request('POST',env('DBHOST').'api/freelancercustomer', ['form_params' =>
             ['id'=>$id,'username'=>$username,'customerid'=>$customer['id'] ] ]);
            $responseid =  $response1->getBody();
            return redirect('/addCard');     
        }
       return redirect('/addCard');
     }

     public function freelancerBillMethod(Request $request)
     {
        
        if($request->session()->has('freelancer_id'))
        {
            
            $id = $request->session()->get('freelancer_id');
            $username = $request->session()->get('username');

            return redirect('/displayBill');
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
     }
     public function displayBill(Request $request)
     {
        $username=$request->session()->get('username');
        $id=$request->session()->get("freelancer_id");

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/displaybill', ['form_params' =>
                ['id'=>$id,'username'=>$username]]);
        $responsebill =  $response->getBody();
        $response1 = $client->request('POST',env('DBHOST').'api/accountView', ['form_params' =>
                ['id'=>$id,'username'=>$username]]);
        $responseaccount =  $response1->getBody();
        $decode=json_decode($responseaccount,true);
          $account=$decode['AccountDetails']['username'];
          if($account!="") $acct="true";
          else $acct="false";
        return view('freelancer.billingmethod')->with('users',$responsebill)->with('flags','1')->with('acct',$acct)->with('users1',$decode);

     }
      public function addAccountDetails(Request $request)
      {  
         \Stripe\Stripe::setApiKey(env('secret_key'));

         $username= $request->session()->get('username');
         $id=$request->session()->get("freelancer_id");
         $firstName=$request->firstName;
         $lastName=$request->lastName;
         $personalId=$request->personalId;
         $date=$request->date;
         $month=$request->month;
         $country = $request->country;
         $type = $request->type;
         $year=$request->year;
         $ssnNumber=$request->ssnNumber;
         $address=$request->address;
         $postal=$request->postal;
         $city=$request->city;
         $state=$request->state;

         $cusid=$request->customerid;

         
        
          
        $username=$request->session()->get('username');
        $id = $request->session()->get("freelancer_id");
        
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/freelancercheck', ['form_params' =>
        ['id'=>$id,'username'=>$username]]);
        $response = $response->getBody();
       
        $response = json_decode($response,true);
        $email = $response['email'];

        \Stripe\Stripe::setApiKey(env('secret_key'));
        if($cusid=="0"){
                  try{
                $customer = \Stripe\Account::create(
                      array(
                        
                        "email" => $email,
                        "managed" => true,
                        "country"=>$country,
                        "tos_acceptance" => array(
                          "date" => time(),
                          "ip" => $_SERVER['REMOTE_ADDR']
                        ),
                       
                        "legal_entity" =>array(
             
                            "dob" =>array(
                               "day" => $date,
                               "month" =>$month,
                               "year" => $year 
                              ),
                           
                            "personal_id_number" => $personalId,
                            "first_name" => $firstName,
                            "last_name"  => $lastName,
                            "ssn_last_4" => $ssnNumber,
                            "type" => $type,
                           
                            "address" => array(
                                "line1" => $address,
                                "postal_code" => $postal,
                                "city" => $city,
                                "state" =>  $state
                              )
                          )
                      ));
                $message = $customer->message;
                $customerid = $customer->id;

                $fp = fopen($_FILES['idfile']['tmp_name'], 'r');
                $file_obj = \Stripe\FileUpload::create(
                    array(
                      "purpose" => "identity_document",
                      "file" => $fp
                    ),
                    array(
                      "stripe_account" => $customerid
                    )
                  );
                $file = $file_obj->id;

                $account = \Stripe\Account::retrieve($customerid);
                $account->legal_entity->verification->document = $file;
                $account->save();

                

                }catch(\Stripe\Error\Card $e){
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);

                }catch (\Stripe\Error\RateLimit $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (\Stripe\Error\InvalidRequest $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (\Stripe\Error\Authentication $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (\Stripe\Error\ApiConnection $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (\Stripe\Error\Base $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (Exception $e) {
                  return back()->with('flag','3');
                    return back();
                }  
        }
        else{

                  try{
                $customer = \Stripe\Account::create(
                      array(
                        
                        "email" => $email,
                        "managed" => true,
                        "country"=>$country,
                        "tos_acceptance" => array(
                          "date" => time(),
                          "ip" => $_SERVER['REMOTE_ADDR']
                        ),
                       
                        "legal_entity" =>array(
             
                            "dob" =>array(
                               "day" => $date,
                               "month" =>$month,
                               "year" => $year 
                              ),
                           
                            "personal_id_number" => $personalId,
                            "first_name" => $firstName,
                            "last_name"  => $lastName,
                            "ssn_last_4" => $ssnNumber,
                            "type" => $type,
                           
                            "address" => array(
                                "line1" => $address,
                                "postal_code" => $postal,
                                "city" => $city,
                                "state" =>  $state
                              )
                          )
                      ));
                $message = $customer->message;
                $customerid = $customer->id;

                $fp = fopen($_FILES['idfile']['tmp_name'], 'r');
                $file_obj = \Stripe\FileUpload::create(
                    array(
                      "purpose" => "identity_document",
                      "file" => $fp
                    ),
                    array(
                      "stripe_account" => $customerid
                    )
                  );
                $file = $file_obj->id;

                $account = \Stripe\Account::retrieve($customerid);
                $account->legal_entity->personal_id_number = $personalId;
                $account->legal_entity->verification->document = $file;
                $account->save();


                

                }catch(\Stripe\Error\Card $e){
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);

                }catch (\Stripe\Error\RateLimit $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (\Stripe\Error\InvalidRequest $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (\Stripe\Error\Authentication $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (\Stripe\Error\ApiConnection $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (\Stripe\Error\Base $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (Exception $e) {
                    return back()->with('flag','3');
                    return back();
                } 
        }


        $var=\Stripe\Account::retrieve($customerid);
        $message=$var->legal_entity->verification->status;

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/AddAccountDetails', ['form_params' =>
            ['id'=>$id,
            'username'=>$username,
            'firstName'=>$firstName,
            'lastName'=>$lastName,
            'personalId'=>$personalId,
            'type'=>$type,
            'date'=>$date,
            'month'=>$month,
            'year'=>$year,
            'ssnNumber'=>$ssnNumber,
            'address'=>$address,
            'postal'=>$postal,
            'city'=>$city,
            'state'=>$state,
            'country'=>$country,
            'customerid'=>$customer->id,
            'message'=>$message
            ] ] );

        $responsedetails =  $response->getBody();
        
        if($responsedetails)
        {

          return redirect('displayBill')->with('flags','1');
        }
    }

    public function freelancerAddCard(Request $request)
    {
        
        if($request->session()->has('freelancer_id'))
        {
             $id = $request->session()->get('freelancer_id');
             $username = $request->session()->get('username');
             return view('freelancer.addcard')->with('flag','0');
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function freelancereditaccount(Request $request)
    {
      $id = $request->session()->get('freelancer_id');
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/freelancereditaccount', ['form_params' =>
            ['id'=>$id] ] );
        $responsedetails =  $response->getBody();
        $decode=json_decode($responsedetails,true);
        return view('freelancer.AddAccountDetails')->with('users',$decode)->with('flag','0');
    }
    public function freelanceraddaccount(Request $request)
    {
        if($request->session()->has('freelancer_id'))
        {
              $id = $request->session()->get('freelancer_id');
              $client = new \GuzzleHttp\Client();
              $response = $client->request('POST',env('DBHOST').'api/freelancereditaccount', ['form_params' =>
                  ['id'=>$id] ] );
              $responsedetails =  $response->getBody();
              $decode=json_decode($responsedetails,true);
              return view('freelancer.AddAccountDetails')->with('users',$decode)->with('flag','0');
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function ProviderAddAccountDetails(Request $request)
    {
         \Stripe\Stripe::setApiKey(env('secret_key'));

         $id=$request->session()->get("provider_id");
         $firstName=$request->firstName;
         $lastName=$request->lastName;
         $personalId=$request->personalId;
         $date=$request->date;
         $month=$request->month;
         $country = $request->country;
         $type = $request->type;
         $year=$request->year;
         $ssnNumber=$request->ssnNumber;
         $address=$request->address;
         $postal=$request->postal;
         $city=$request->city;
         $state=$request->state;

         $cusid=$request->customerid;

         
        $id = $request->session()->get("provider_id");
        
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/providercheck', ['form_params' =>
        ['id'=>$id]]);
        $response = $response->getBody();
       
        $response = json_decode($response,true);
        $email = $response['email'];

        \Stripe\Stripe::setApiKey(env('secret_key'));
        if($cusid=="0"){
                  try{
                $customer = \Stripe\Account::create(
                      array(
                        
                        "email" => $email,
                        "managed" => true,
                        "country"=>$country,
                        "tos_acceptance" => array(
                          "date" => time(),
                          "ip" => $_SERVER['REMOTE_ADDR']
                        ),
                       
                        "legal_entity" =>array(
             
                            "dob" =>array(
                               "day" => $date,
                               "month" =>$month,
                               "year" => $year 
                              ),
                           
                            "personal_id_number" => 123456789,
                            "first_name" => $firstName,
                            "last_name"  => $lastName,
                            "ssn_last_4" => $ssnNumber,
                            "type" => $type,
                           
                            "address" => array(
                                "line1" => $address,
                                "postal_code" => $postal,
                                "city" => $city,
                                "state" =>  $state
                              )
                          )
                      ));
                $message = $customer->message;
                $customerid = $customer->id;

                $fp = fopen($_FILES['idfile']['tmp_name'], 'r');
                $file_obj = \Stripe\FileUpload::create(
                    array(
                      "purpose" => "identity_document",
                      "file" => $fp
                    ),
                    array(
                      "stripe_account" => $customerid
                    )
                  );
                $file = $file_obj->id;

                $account = \Stripe\Account::retrieve($customerid);
                $account->legal_entity->verification->document = $file;
                $account->save();

                

                }catch(\Stripe\Error\Card $e){
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                }catch (\Stripe\Error\RateLimit $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (\Stripe\Error\InvalidRequest $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (\Stripe\Error\Authentication $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (\Stripe\Error\ApiConnection $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (\Stripe\Error\Base $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (Exception $e) {
                    return back()->with('flag','3');
                    return back();
                }  
        }
        else{

                  try{
                $customer = \Stripe\Account::create(
                      array(
                        
                        "email" => $email,
                        "managed" => true,
                        "country"=>$country,
                        "tos_acceptance" => array(
                          "date" => time(),
                          "ip" => $_SERVER['REMOTE_ADDR']
                        ),
                       
                        "legal_entity" =>array(
             
                            "dob" =>array(
                               "day" => $date,
                               "month" =>$month,
                               "year" => $year 
                              ),
                           
                            "personal_id_number" => 123456789,
                            "first_name" => $firstName,
                            "last_name"  => $lastName,
                            "ssn_last_4" => $ssnNumber,
                            "type" => $type,
                           
                            "address" => array(
                                "line1" => $address,
                                "postal_code" => $postal,
                                "city" => $city,
                                "state" =>  $state
                              )
                          )
                      ));
                $message = $customer->message;
                $customerid = $customer->id;

                $fp = fopen($_FILES['idfile']['tmp_name'], 'r');
                $file_obj = \Stripe\FileUpload::create(
                    array(
                      "purpose" => "identity_document",
                      "file" => $fp
                    ),
                    array(
                      "stripe_account" => $customerid
                    )
                  );
                $file = $file_obj->id;

                $account = \Stripe\Account::retrieve($customerid);
                $account->legal_entity->personal_id_number = $personalId;
                $account->legal_entity->verification->document = $file;
                $account->save();


                

                }catch(\Stripe\Error\Card $e){
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                }catch (\Stripe\Error\RateLimit $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (\Stripe\Error\InvalidRequest $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (\Stripe\Error\Authentication $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (\Stripe\Error\ApiConnection $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (\Stripe\Error\Base $e) {
                    $body = $e->getJsonBody();
                    $err  = $body['error']['message'];
                    return back()->with('message',$err);
                } catch (Exception $e) {
                    return back()->with('flag','3');
                    return back();
                } 
        }


       $var=\Stripe\Account::retrieve($customerid);
        $message=$var->legal_entity->verification->status;

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',env('DBHOST').'api/ProviderAddAccountDetails', ['form_params' =>
            ['id'=>$id,
            'firstName'=>$firstName,
            'lastName'=>$lastName,
            'personalId'=>$personalId,
            'type'=>$type,
            'date'=>$date,
            'month'=>$month,
            'year'=>$year,
            'ssnNumber'=>$ssnNumber,
            'address'=>$address,
            'postal'=>$postal,
            'city'=>$city,
            'state'=>$state,
            'country'=>$country,
            'customerid'=>$customer->id,
            'message'=>$message
            ] ] );

        $responsedetails =  $response->getBody();
        
        if($responsedetails)
        {
          return redirect('providerbilling')->with('flags','1');
        }
    }
    public function provideraddaccount(Request $request)
    {
        if($request->session()->has('provider_id'))
        {
              $id = $request->session()->get('provider_id');
              $client = new \GuzzleHttp\Client();
              $response = $client->request('POST',env('DBHOST').'api/providereditaccount', ['form_params' =>
                  ['id'=>$id] ] );
              $responsedetails =  $response->getBody();
              $decode=json_decode($responsedetails,true);
              return view('provider.AddAccountDetails')->with('users',$decode)->with('flag','0');
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function provideraddcard(Request $request)
    {
        if($request->session()->has('provider_id'))
        {
            return view('provider.provider_addcard')->with('flag','0');
        }
        else
        {
            return redirect('/ab/account-security/login');
        }
    }
    public function provideraddcarddetails(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('secret_key'));

          $id=$request->session()->get("provider_id");
          $role= $request->session()->get('role');
          $country = "US";
          $currency = "USD";
          $holder_name=$request->holder_name;
          $holder_type=$request->holder_type;
          $routing_number=$request->routing_number;
          $account_number=$request->account_number;
          $client = new \GuzzleHttp\Client();
          $response1 = $client->request('POST',env('DBHOST').'api/providercheck', ['form_params' =>
                ['id'=>$id,'role'=>$role] ]);
          $res =  $response1->getBody();
          $obj=json_decode($res,true);
          $email = $obj['email'];
          $customerid = $obj['customerid'];
          $token = $request->token;
          $client = new \GuzzleHttp\Client();
          $response1 = $client->request('POST',env('DBHOST').'api/providercustomercheck', ['form_params' =>
                ['customerid'=> $customerid, 'account_number'=> $account_number, 'routing_number' => $routing_number ] ]);
          $responsecheck =  $response1->getBody();

          if($responsecheck  == "exists")
          {
             return view('provider.provider_addcard')->with('flag','2');
          }
          $account = \Stripe\Account::retrieve($customerid);
          $s = $account->external_accounts->create(array("external_account" => $token));
          $response1 = $client->request('POST',env('DBHOST').'api/providercustomercheck', ['form_params' =>
                ['customerid'=> $customerid, 'account_number'=> $account_number, 'routing_number' => $routing_number ] ]);
          $responsecustomer =  $response1->getBody();
          if($responsecustomer  == "exists")
          {
             return view('provider.provider_addcard')->with('flag','2');
          }
          $response = $client->request('POST',env('DBHOST').'api/providercardInsert', ['form_params' =>
            ['currency'=>$currency,'country'=>$country, 'holder_name'=>$holder_name, 'holder_type'=>$holder_type, 'routing_number'=>$routing_number,'account_number'=>$account_number,'role'=>$role,'id'=>$id,'customerid'=>$customerid,'bankid'=>$s['id']] ]);
          $responseinsert =  $response->getBody();
          if($responseinsert=="success")
          {
            return redirect('/providerbilling');
            return view('provider.provider_addcard')->with('flag','1');
          }
          else
          {
            return view('provider.provider_addcard')->with('flag','2');
          }
    }
    public function providermakedefault(Request $request)
    {
       $providerid=$request->session()->get('provider_id');
       $accountid=$request->acc_id;
            $client = new \GuzzleHttp\Client();
            $response1 = $client->request('POST',env('DBHOST').'api/providermakedefault', ['form_params' =>
             ['accountid'=>$accountid,'providerid'=>$providerid] ]);
        $res =  $response1->getBody();
        if($res=="success")
        {
          return back();
        }
    }

}
