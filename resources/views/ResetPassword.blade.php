@extends('layouts.master')
@section('title', 'Update your password - rbs')
@section('header')
<header class="navheader">
            <div class="container login-container">
                <a class="logo1 a-navbar" href="{{url('/')}}">
                    <img src="{{ URL::asset('public/images/logo-rbs.png')}}" />
            </a>
          <div class="visible-md visible-lg desktop-navbar">

            <p class="nav navbar-nav navbar-right nav-pad-right gothamlightcus">
                <span>Already have an rbs account?  </span>
                <a class="a" id="a" href="{{url('/')}}/ab/account-security/login"> Log In</a>
            </p>
          </div>
            </div>
       </header>

@section('body')
	<div class="head">
	    <div class="container">
			<h1 class="cust-h1 gothamlight passttle">
			              <span>Update your password.</span>
			          </h1>
			<form id="reset" action="{{ URL::asset('resetpassword') }}" method="post">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
			<div class="form-group custom-form eminput">
			<label class="olabel">New Password</label>
			<input type="password" name="new_password" value maxlength="1000" id="new_password"  class="emform " autofocus="true">
			</div>
      <span class="hider forget-error arrow_box2" id="new-pass-error"><i class="fa fa-exclamation error-icon" aria-hidden="true"></i>Value is required and can't be empty</span>
			<div class="form-group custom-form capinput">
			<label class="olabel">Re-type Password</label>
			<input type="password" name="re_password" id="re_password" class="emform"><br>
      <input type="hidden" name="email" value="<?php echo $users; ?>">
      <span id="re-pass-error" class="hider forget-error arrow_box2"><i class="fa fa-exclamation error-icon" aria-hidden="true"></i>Value is required and can't be empty</span>
     <span id="same-pass-error" class="hider forget-error arrow_box2"><i class="fa fa-exclamation error-icon" aria-hidden="true"></i>Please enter the same value again.</span>

			<input type="submit" id="update" name="submit" class="cust-btn-primary btn text-capitalize m-0 retpass" value="Update Password">
			</div>
			</form>

		</div>
	</div>


@endsection

 @section('footer')
     <footer class="footer-navbar">
     <div class="container">
       <div class="row">
            <div>
                <div class="col-md-12 text-center  footer-margin">
                    <p class="copyright" id="p"> © 2015 - 2016 RBS Global Inc.</p>
                    <a href="#" id="a" onmouseout="this.style.color = '#7d7d7d'" class="footer-a">Cookie Policy</a>

                </div>

            </div>

       </div>
     </div>

     </footer>
@endsection
