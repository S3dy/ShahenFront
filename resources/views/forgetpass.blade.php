@extends('layouts.master1')
@section('title', 'Forget Password - rbs')
@section('header')

<header class="navheader">
            <div class="container login-container">
                <a class="logo1 a-navbar" href="{{url('/')}}">
                    <img src="{{ URL::asset('/images/logo-rbs.png')}}" />
            </a>
          <div class="visible-md visible-lg desktop-navbar">

            <p class="nav navbar-nav navbar-right nav-pad-right gothamlightcus">
                <span>Already have an rbs account?  </span>
                <a class="a" id="a" href="{{url('/')}}/ab/account-security/login"> Log In</a>
            </p>
          </div>
            </div>
       </header>
@endsection
@section('body')

	    <div class="container">
			<h1 class="cust-h1 gothamlight passttle">
                @if(session('flags'))
        @if(session('flags') == 1)
       <div class="alert alert-danger" style="margin-top: 0px !important;font-size: 14px !important;font-weight: 500 !important" >
          <strong>Sorry!</strong> Your captcha is incorrect!.Please try again!!.
        </div>
        @endif
                @if(session('flags') == 2)
       <div class="alert alert-danger" style="margin-top: 0px !important;font-size: 14px !important;font-weight: 500 !important" >
          <strong>Sorry!</strong> Your Email doesnot exist!.
        </div>
        @endif
        @endif
			              <span>We'll help you remember your password</span>
			          </h1>
			<form id="forget" action="{{ URL::asset('send_info') }}" method="post" >
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
			<div class="form-group custom-form eminput">
			<label class="olabel">Email Address </label>
			<input type="text" name="email" value maxlength="1000" id="forget-mail"  class="emform " autofocus="true">
			</div>
      <span class="hider forget-error arrow_box" id="forget-invalid"><i class="fa fa-exclamation error-icon" aria-hidden="true"></i>Please enter a valid email address.</span>
			<div class="form-group custom-form capinput">
			<label class="olabel">Enter the Code Shown</label>
			<input type="text" name="captcha" id="captcha-input" class="emform1"><br>
      <span id="forget-captcha" class="hider forget-error1 arrow_box1"><i class="fa fa-exclamation error-icon" aria-hidden="true"></i>This field is required.</span>
     <div class="oCaptchaImage" id="recaptcha"> {!! Captcha::img(); !!}</div>
     
			<!-- <img height="67" class="oCaptchaImage" width="194" alt="captcha" src="/captcha.php"><br> -->
			<input type="submit" id="valid" name="submit" class="cust-btn-primary btn text-capitalize m-0 retpass" value="Retrive Password">
			</div>
			</form>

		</div>



@endsection

 @section('footer')
     <footer class="footer-navbar">
     <div class="container">
       <div class="row">
            <div>
                <div class="col-md-12 text-center  footer-margin">

                    <p class="copyright" id="p"> © 2015 - 2016 Sha7en LLC.</p>


                </div>

            </div>

       </div>
     </div>

     </footer>
@endsection
