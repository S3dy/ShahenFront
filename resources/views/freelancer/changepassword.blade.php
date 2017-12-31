@extends('layouts.masterforfreelancer')
@section('title', 'Change Password')
@section('header')
  @include('freelancerheader')
@endsection
@section('body')
<?php $a=Session::get('freelancer_name');?>
<div class="container fpagecont pad100">
  <div class="row">
    <div class="col-md-3 m-t-10">
      <h4 class="contact-h4">Billing</h4>
      <ul class="contact-ul">
        <li><a href="{{ URL::asset('/displayBill/')}}" class="contact-a">Billing Methods</a></li>
      </ul>
      <h4 class="contact-h4">User Settings</h4>
      <ul class="contact-ul">

        <li><a href="{{ URL::asset('/myprofile')}}" class="contact-a">My Profile</a></li>
        <li><a href="{{ URL::asset('/ProfileSession')}}" class="contact-a">Profile Settings</a></li>
        <li class="active"><a href="{{ URL::asset('freelancerchangepassword')}}" class="contact-a">Change Password</a></li>
      </ul>
    </div>
    <div class="col-md-9">
            @if(session('flags') == "2")
              <div class="alert alert-success" id="alert_successbydynamic" role="alert">
                <a href="#" class="alert-link">Your Password is updated successfully.</a>
              </div>
            @endif
            @if(session('flags') == "3")
              <div class="alert alert-danger" id="alert_successbydynamic" role="alert">
                <a href="#" class="alert-link">Your Password not updated.</a>
              </div>
            @endif
        <h1 class="contact-h1 contact-m-bottom">Change Password</h1>
        @if($flag==1)
        <div class="card card-block m-0 contact-cust-card">
            <h3 class="contact-h3 contact-m-bottom">Change Password</h3>
            <div class="contact-m-bottom contact-body">
              <div class="alert custom-alert-danger fontsize15 hider" id="wrong_pass">
                  <span class="padleft30"><i class="fa fa-exclamation alertcolor" aria-hidden="true"></i></span>
                  <span class="padleft50">Please fix the errors below.</span>
              </div>
              <div class="alert custom-alert-success fontsize15 hider" id="correct_pass">
                 <span class="padleft30"><i class="fa fa-check successcolor" aria-hidden="true"></i></span>
                 <span class="padleft50">Your Password has been changed.</span>
              </div>
              <div class="contact-m-20">
                Your password must contain the following:
              </div>
              <ol class="contact-ul-padding">
                <li class="contact-m-10">At least 8 characters in length (a strong password has at least 14 characters)</li>
                <li class="contact-m-bottom">At least 1 letter and at least 1 number or symbol</li>
              </ol>
            </div>
            <form id="change_pass_form">
            <input type="hidden" name="name" id="nam" value="<?php echo $a?>">
             <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
              <div class="contact-m-bottom">
                <label class="contact-h3">Old password</label>
                <div>
                  <input type="password" name="old-password" id="old-password" class="contact-textbox">
                </div>
                <span class="hider contact-error error-color" id="old-pass-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                <span class="hider contact-error error-color" id="no-old-pass-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Your old password was incorrect.Please try again.</span>
              </div>
              <div class="contact-m-bottom">
                <label class="contact-h3">New password</label>
                <div>
                  <input type="password" name="change-password" id="change-password" class="contact-textbox">
                </div>
                <span class="hider contact-error error-color" id="change-pass-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required</span>
                <span class="hider contact-error error-color" id="change-short-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Too short - password should be at least 8 characters</span>
                <span class="hider contact-error error-color" id="change-letter-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Make sure to use 1 letter and 1 number or symbol</span>
              </div>
              <div class="contact-m-bottom">
                <label class="contact-h3">Confirm new password</label>
                <div>
                  <input type="password" name="conform-password" id="conform-password" class="contact-textbox">
                </div>
                <span class="hider contact-error error-color" id="conform-pass-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required</span>
                <span class="hider contact-error error-color" id="conform-match-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Passwords do not match</span>
              </div>
              <div class="contact-m-bottom">
                <input type="submit" id="valid" name="submit" class="cust-btn-primary btn text-capitalize m-0 retpass" value="Save New Password">
                <span>
                <a href="" id="change_pass_cancel" class="cust-a contact-ul-padding" onclick="reset1()">Reset</a></span>
              </div>
            </form>
        </div>
        @endif
        @if($flag==0)
        <div class="card card-block m-0 contact-cust-card">
            <h3 class="contact-h3 contact-m-bottom">Change Password</h3>
            <div class="contact-m-bottom contact-body">
              <!-- <div class="alert custom-alert-danger fontsize15 hider" id="wrong_pass">
                  <span class="padleft30"><i class="fa fa-exclamation alertcolor" aria-hidden="true"></i></span>
                  <span class="padleft50">Please fix the errors below.</span>
              </div>
              <div class="alert custom-alert-success fontsize15 hider" id="correct_pass">
                 <span class="padleft30"><i class="fa fa-check successcolor" aria-hidden="true"></i></span>
                 <span class="padleft50">Your Password has been changed.</span>
              </div> -->
              <div class="contact-m-20">
                Your password must contain the following:
              </div>
              <ol class="contact-ul-padding">
                <li class="contact-m-10">At least 8 characters in length (a strong password has at least 14 characters)</li>
                <li class="contact-m-bottom">At least 1 letter and at least 1 number or symbol</li>
              </ol>
            </div>
            <form id="change_pass_form3" action="{{url('/')}}/freelancersocialchangepassword" method="post">
            <input type="hidden" name="name" id="nam" value="<?php echo $a?>">
             <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
              <div class="contact-m-bottom">
                <label class="contact-h3">New password</label>
                <div>
                  <input type="password" name="newpassword" id="social-change-password" class="contact-textbox">
                </div>
                <span class="hider contact-error error-color" id="social-change-pass-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required</span>
                <span class="hider contact-error error-color" id="social-change-short-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Too short - password should be at least 8 characters</span>
                <span class="hider contact-error error-color" id="social-change-letter-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Make sure to use 1 letter and 1 number or symbol</span>
              </div>
              <div class="contact-m-bottom">
                <label class="contact-h3">Confirm new password</label>
                <div>
                  <input type="password" name="conformpassword" id="social-conform-password" class="contact-textbox">
                </div>
                <span class="hider contact-error error-color" id="social-conform-pass-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required</span>
                <span class="hider contact-error error-color" id="social-conform-match-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Passwords do not match</span>
              </div>
              <div class="contact-m-bottom">
                <input type="submit" id="valid" name="submit" class="cust-btn-primary btn text-capitalize m-0 retpass" value="Save New Password">
                <span>
                <a href="" id="change_pass_cancel2" class="cust-a contact-ul-padding" onclick="reset4()">Cancel</a></span>
              </div>
            </form>
        </div>
        @endif
    </div>
  </div>
</div>

@endsection


@section('footer')
  <script>
     $( document ).ready(function() {
       var request = $.ajax({
         url: "{{URL('/')}}/footer" ,
       type: "GET",       
    });
    request.done(function(msg){
       $('#dynamicfooter').html(msg);
   });
});
  </script>
  <div id="dynamicfooter"></div>
@endsection

