@extends('layouts.master1')
@section('title', 'Email sent success')
@section('header')
 <header class="navheader">
            <div class="container login-container">
                <a class="logo1 a-navbar" href="{{url('/')}}">
                    <img src="{{ URL::asset('public/images/logo-rbs.png')}}" />
            </a>
          <div class="visible-md visible-lg desktop-navbar">

            <p class="nav navbar-nav navbar-right nav-pad-right gothamlightcus">
                <span></span>
                <a class="a" href="{{url('/')}}/ab/account-security/login">LogIn</a>
            </p>
          </div>
            </div>
       </header>
@endsection
@section('body')
<div class="row">
  <div class="col-md-12 eml_col">
    <h1 class="email_scss text-center ">
      We emailed you a link and instructions for updating your password.
    </h1>
    <div>
      <p class="eml_p text-center p_10">It should be there momentarily. Please check your email and click the link in the message.</p>  
    </div>
    <div class="pad_l_210">
    <a href="{{url('/')}}/ab/account-security/login" class="cust-btn-pri btn text-capitalize m-0 retpass">Continue to Log in</a>
  </div>  
  </div>
  
</div>
@endsection


@section('footer')
<footer class="footer">
     <div class="container">
       <div class="row">
            <div>
                <div class="col-md-12 text-center  footer-margin">
                    <p class="copyright" id="p"> © 2015 - 2016 Sha7en LLC.</p>
                    <a href="{{url('legal/terms')}}" onmouseout="this.style.color = '#7d7d7d'" class="footer-a">Terms of Service</a>
                    </br>

                </div>

            </div>

       </div>
     </div>

     </footer>
 @endsection
