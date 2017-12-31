<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });


use App\Http\Middleware\freelancer;
use App\Http\Middleware\admins;
use App\Http\Middleware\providers;


Route::get('/loggedin','logController@make');

Route::get('/logout','logController@log_out');

Route::get('/ab/account-security/logout','logController@log_out');

Route::get('/ab/account-security/login','logController@login')->middleware(freelancer::class);





//Route::get('/signup/create-account/freelancer_direct','RedirectController@freelancer_signup_check')->middleware(freelancer::class);

Route::get('/ab/find-work/','logController@sessionCheck');

Route::get('/forgetpass','RedirectController@forget');

Route::get('/jobs/browse','RedirectController@free_proj_search');

Route::get('freelancers','MyProfileController@profileview');

Route::get('/admindup', function () {
    return view('adminpanel.admindup');
});

//Ajax call Web Routes
Route::post('/port','MyProfileController@portfolio');
Route::post('/cert','MyProfileController@certificate');
Route::post('/emp','MyProfileController@employment');
Route::post('/school','MyProfileController@school');
Route::post('/other','MyProfileController@otherExp');
Route::post('/vid','MyProfileController@video');
Route::post('/desc','MyProfileController@desc');
Route::post('/titl','MyProfileController@titl');
Route::post('/rate','MyProfileController@rate');


/*redirect*/
Route::get('/addcard','RedirectController@free_add_card');

Route::get('/billingmethod','RedirectController@free_bill_method');

// Route::get('/display_bill','paymentController@display_bill');

Route::get('ab/account-security/change-password','RedirectController@free_chang_pass');

Route::get('/freelancer_chat','RedirectController@free_chat');

Route::get('/freelancers/settings/','RedirectController@free_pro_set');

Route::get('/freelancers/view','RedirectController@free_public_view');

Route::get('/viewoffer','RedirectController@free_view_off');
  
Route::get('/provider_chat','RedirectController@pro_chat');

Route::get('ab/jobs-home/','RedirectController@pro_home');

Route::get('/selectfreelancer','RedirectController@pro_sel_lancer');

Route::get('/provider_addcard','RedirectController@pro_add_card');

Route::get('prof_other_view','MyProfileController@profile_other_view');

//Delete freelancer profile
Route::post('/delport','MyProfileController@delport');

Route::post('/delcert','MyProfileController@delcert');

Route::post('/delemp','MyProfileController@delemp');

Route::post('/delschool','MyProfileController@delschool');

Route::post('/delother','MyProfileController@delother');

Route::post('/skills','MyProfileController@skills');

Route::get('adminjob',function(){
   return view('adminpanel.jobview');
});

Route::get('/admin/addfooter2',function(){
  return view ('adminpanel.addfooter2');
})->middleware(admins::class);

Route::get('chat',function(){
   return view('chat');
});

Route::get('test',function(){
   return view('test');
});

Route::get('/freefoot',function(){
   return view('freefoot');
});

Route::get('/ajax',function(){
  return view('test1');
});

Route::get('/createcustomer',function(){
 return view ('createcustomer');
});

Route::get('/createbank',function(){
 return view ('createbankaccount');
});

Route::get('/fortest',function(){
  return view('Fortest');
});

Route::get('/tester',function(){
  return view('tester');
});


/*Db changes*/

Route::get('/','PageManagementController@homepage')->middleware(freelancer::class);

Route::get('/i/how-it-works/client/','PageManagementController@howitworkspage')->middleware(freelancer::class);

Route::get('/signup/','RedirectController@signup')->middleware(freelancer::class);

Route::get('/signup/create-account/client_direct','RedirectController@provider_signup_check')->middleware(freelancer::class);

Route::get('/signup/create-account/freelancer_direct','RedirectController@freelancer_signup_check')->middleware(freelancer::class);

Route::get('/ab/account-security/login','logController@login')->middleware(freelancer::class);

Route::get('/footer','FooterManagementController@footer');

Route::get('/legal/{linkname}','FooterManagementController@footerlink');

Route::get('/terms/{linkname}','FooterManagementController@footerlink');

Route::get('/blog/{linkname}','FooterManagementController@footerlink');

Route::get('/about/{linkname}','FooterManagementController@footerlink');

Route::get('/about','FooterManagementController@footerlink');

Route::get('/legal','FooterManagementController@footerlink');

Route::get('/terms','FooterManagementController@footerlink');

Route::get('/about','FooterManagementController@footerlink');



Route::post('/signup/create-account/freelancerregister','RegisterController@freelancerregister');

Route::post('/signup/create-account/providerregister','RegisterController@providerregister');

Route::post('/ab/account-security/login','LoginController@login');

Route::get('admin/addfooter','FooterManagementController@adminfooterview');

Route::post('/admin/addfooter','FooterManagementController@addfooter');

Route::get('/admin/edit/{id}','FooterManagementController@editfooterview');

Route::post('/admin/editfooter','FooterManagementController@editfooter');

Route::get('/admin/delete/{id}','FooterManagementController@deletefooter');

Route::get('/admin/sitelinks','FooterManagementController@customlinksview');

Route::post('/admin/uploadsitelinks','FooterManagementController@editsitelinks');

Route::get('/admin/addimgbanner','PageManagementController@homepageadminview');

Route::post('/img_content','PageManagementController@editbanner1');

Route::post('/Howitworks_heading','PageManagementController@edithowitworkheading');

Route::post('/howitworks_titleone','PageManagementController@edithowitworktitleone');

Route::post('/howitworks_titletwo','PageManagementController@edithowitworktitletwo');

Route::post('/howitworks_titlethree','PageManagementController@edithowitworktitlethree');

Route::post('/howitworks_titlefour','PageManagementController@edithowitworktitlefour');

Route::post('/howitworks_slidder','PageManagementController@edithowitworkslidder');

Route::post('/howitworks_widebanner','PageManagementController@editbanner2');

Route::post('/howitworks_greenbanner','PageManagementController@editbanner3');

Route::get('/admin/addhomecontent','PageManagementController@howitworksadminview');

Route::post('/howitworkspage_banner','PageManagementController@edithowitworkpagebanner');

Route::post('/howitworkspage_title1','PageManagementController@edithowitworkpagecontent');

Route::post('/howitworkspage_greenbanner','PageManagementController@edithowitworkpagegreenbanner');

Route::get('/admin/mailcontent','EmailManagementController@viewmailcontent');

Route::post('/admin/emailcontent','EmailManagementController@emailadminview');

Route::post('admin_email','EmailManagementController@editmailcontent');

Route::get('/admin/emailtemplate','EmailManagementController@emailtemplateview');

Route::post('/editemailtemplate','EmailManagementController@editmailtemplate');

Route::get('/admin/addjobcontent','AdminPreferencesController@adminjobpreferenceview');

Route::post('/admin/addcatagory','AdminPreferencesController@editcategory');

Route::post('/admin/addqual','AdminPreferencesController@editfreelancertype');

Route::post('/admin/addjobsuccess','AdminPreferencesController@editjobsuccess');

Route::post('/admin/addtalent','AdminPreferencesController@editrisingtalent');

Route::post('/admin/addhour','AdminPreferencesController@edithoursbilledonrbs');

Route::post('/admin/addlocation','AdminPreferencesController@editlocation');

Route::post('/admin/addeng','AdminPreferencesController@editenglishlevel');

Route::post('/admin/addgroup','AdminPreferencesController@editgroup');

Route::get('/freeSession','LoginController@freelancerSession');

Route::get('/provideSession','LoginController@providerSession');

Route::get('/UserAccountLogout','LoginController@userLogout');

Route::get('/postajob','JobPostController@postjobview');

Route::get('/providerprofile','ProviderProfileController@providerprofileview');

Route::post('/providerfirstname','ProviderProfileController@providerfirstname');

Route::post('/companydetail','ProviderProfileController@companydetail');

Route::post('/companyaddress','providerprofileController@companyaddress');

Route::post('/timezone','ProviderProfileController@timezone');

Route::post('/phone','ProviderProfileController@phone');

Route::post('fileuploadprovider','ProviderProfileController@providerdisplaypicture');

Route::post('/jobpost','JobPostController@jobpost');

Route::get('/myjob','JobPostController@myjobview');

Route::get('/projectdetails/{id}','JobPostController@projectdetails');

Route::get('/searchresult','SearchController@jobsearch');

Route::get('/selectproject/{jobid}/{providerid}','JobPostController@selectproject');

Route::get('submitproposal/{jobid}','ProposalController@submitproposalview');

Route::post('saveproposal','ProposalController@saveproposal');

Route::get('freelancermessage','NotificationController@freelancernotification');

Route::get('providermessage','NotificationController@providernotification');

/*ksc team*/


Route::post('/viewSettings','ProfileController@viewProfile');

Route::get('/ProfileSession','ProfileController@profileList');

Route::get('/myprofile','MyProfileViewController@profileView');

Route::post('/viewSkill','MyProfileViewController@userSkills');

Route::get('/viewList','MyProfileViewController@profilelistView');

Route::post('/portfolio','MyProfileViewController@portfolioView');

Route::post('/userscertificate','MyProfileViewController@certificateList');

Route::post('/employee','MyProfileViewController@employmentHistory');

Route::post('/schooldetails','MyProfileViewController@schooldetails');

Route::post('/experience','MyProfileViewController@otherExperience');

Route::post('/editjob','MyProfileViewController@editJob');

Route::post('/editrate','MyProfileViewController@hourRate');

Route::post('/editDescription','MyProfileViewController@editOverview');

Route::post('fileupload','MyProfileViewController@freelancerProfilePicture');

Route::post('/setcutomerid','AddCardController@createCustomerId');

// add card 
Route::get('/addCard','AddCardController@freelancerAddCard');


Route::post('/setup','AddCardController@createCustomerId');

//bank card details
Route::post('/addcardinsert','AddCardController@cardInsert');

//billingmethod

Route::get('/billingMethod','AddCardController@freelancerBillMethod');

Route::get('/displayBill','AddCardController@displayBill');

// Route::get('/AddAccount',function()
// {
//   return view('freelancer.AddAccountDetails')->with('flag','0');
// });

Route::post('/AddAccountDetails','AddCardController@addAccountDetails');

Route::get('/providerofferview/{id}/{jobid}','ProposalController@providerofferview');

Route::post('providerofferview/acceptproposal','ProposalController@acceptproposal');

Route::post('providerofferview/declineproposal','ProposalController@declineproposal');

Route::get('offerview/{id}/{jobid}','ProposalController@freelancerofferview');

Route::post('/startproject','ProposalController@startproject');

Route::post('/payment','PaymentController@makepayment');

Route::post('providerpayment','PaymentController@providerpayment');

Route::get('/providerongoingprojects','JobPostController@providerongoingprojects');

Route::get('/ongoingproj','JobPostController@freelancerongoingprojects');

Route::post('/completeproject','JobPostController@completeproject');

Route::get('/providerfeedbackview/{jobid}/{id}','FeedbackController@providerfeedbackview');

Route::post('/providerfeedback','FeedbackController@providerfeedback');

Route::get('/freelancerfeedbackview/{jobid}/{id}','FeedbackController@freelancerfeedbackview');

Route::post('/freelancerfeedback','FeedbackController@freelancerfeedback');

Route::post('/freelancerchat','MessageController@freelancermessage');

Route::post('/providerchat','MessageController@providermessage');

Route::get('providerchangepassword','ChangePasswordController@providersocialpasswordcheck');

Route::post('providersocialchangepassword','ChangePasswordController@providersocialchangepassword');

Route::post('providerpasswordupdate','ChangePasswordController@providerchangepassword');

Route::get('freelancerchangepassword','ChangePasswordController@freelancersocialpasswordcheck');

Route::post('freelancersocialchangepassword','ChangePasswordController@freelancersocialchangepassword');

Route::post('freelancerpasswordupdate','ChangePasswordController@freelancerchangepassword');

Route::get('/admin/provider','adminController@providerlist');

Route::get('/admin','adminController@freelancerlist');

Route::get('/admin/job','adminController@joblist');

Route::get('/finance','adminController@financelist');

Route::get('/jobselect/{id}','adminController@jobselect')->middleware(admins::class);

//Social Functions
Route::get('/signup/create-account/provider/facebook','SocialController@providersignupfacebook');

Route::get('/signup/create-account/provider/twitter','SocialController@providersignuptwitter');

Route::get('/signup/create-account/provider/google','SocialController@providersignupgoogle');

Route::get('/signup/create-account/freelancer/facebook','SocialController@freelancersocialfacebook');

Route::get('/signup/create-account/freelancer/twitter','SocialController@freelancersocialtwitter');

Route::get('/signup/create-account/freelancer/google','SocialController@freelancersocialgoogle');

Route::get('/ab/account-security/facebook','SocialController@loginfacebook');

Route::get('/ab/account-security/twitter','SocialController@logintwitter');

Route::get('/ab/account-security/google','SocialController@logingoogle');

Route::get('/signup/create-account/facebook/callback','SocialController@facebookcallback');

Route::get('/signup/create-account/twitter/callback','SocialController@twittercallback');

Route::get('/signup/create-account/google/callback','SocialController@googlecallback');

Route::post('/adminapprove','adminController@adminapprove');

Route::get('/completeprojects','adminController@completeprojects');

// Route::get('/test','SearchController@test');

Route::get('ab/proposals','ProposalController@proposalcount');

Route::get('/providerpaymentmessage', 'PaymentController@providerpaymentmessage');

Route::get('/providerbilling','PaymentController@providerbilling');

Route::get('/freelancerpaymentmessage', 'PaymentController@freelancerpaymentmessage');

Route::post('/makedefault','PaymentController@makedefault');

Route::get('/freelancernotification','NotificationController@freelancernotificationcount');

Route::get('/freelancernotification','NotificationController@freelancernotificationcount');

Route::get('/providernotification','NotificationController@providernotificationcount');

Route::get('/freelancereditaccount','AddCardController@freelancereditaccount');

Route::get('/add_account','AddCardController@freelanceraddaccount');

Route::post('/providercomplete','ProposalController@providercomplete');


Route::get('/testing','TestController@testing');

Route::get('/admin/login','adminController@adminlogin');

Route::post('/adminlogincheck','adminController@adminlogincheck');

Route::get('/adminlogout','adminController@adminlogout');

Route::post('/ProviderAddAccountDetails','AddCardController@ProviderAddAccountDetails');

Route::get('/provider_add_account','AddCardController@provideraddaccount');

Route::post('/createprovider','AddCardController@provideraddcard');

Route::post('/provideraddcard','AddCardController@provideraddcarddetails');

Route::post('/providermakedefault','AddCardController@providermakedefault');

Route::get('admin/addfootcontent','FooterManagementController@addfootercontentview');

Route::get('/freelanceraccountview/{id}','adminController@freelanceraccountview');

Route::post('/send_info','ForgetPasswordController@forgetpasswordmail');

Route::get('/code/{id}','ForgetPasswordController@codecheck');

Route::post('resetpassword','ForgetPasswordController@passwordupdate');
