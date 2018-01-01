@extends('layouts.master1')
@section('title', 'Log In - Rbs')
@section('header')
<script>
function validateForm() {
  var x = document.getElementById('name').value;
  if (x == "") {
      alert("Name must be filled out");
      return false;
  }
}
</script>
 <header class="navheader loginnav">
            <div class="container login-container">
                <a class="logo2 a-navbar" href="{{url('/')}}">
                 <center><img src="{{ URL::asset('/images/logo-rbs.png')}}" /></center>
            </a>
            </div>
       </header>
@endsection
@section('body')

    <div class="container">
    <div class="logincontainer ">
    <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-9">
      <div class="text-center">
        <div class="lcont1" style="padding-bottom:100px;">
          <center><div class="lgheadfont">Admin Login</div></center>
          <form action="{{url('/')}}/adminlogincheck" method="post" id="loginform">
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          <input type="hidden" name="_jsEnabled" value="{{ true }}" />
          <div >
             <input type="text" class="textbo " id="name" name="name" placeholder="Username or Email">
          </div>
          <span class="hider login-error error-color" id="loginmail"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
          <div>
            <input type="password" class="textbo l-password" id="loginpassword" name="password" placeholder="Password">
          </div>
          <span class="hider login-error error-color" id="login-pass-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
          @if(session('status') == "loginfailure")
            <div style="padding:20px;margin-bottom:20px;border:2px solid red;border-radius:5px;background-color:white !important"><span style="color:red">!</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Invalid username,email or password</div>
          @endif
          <input id="lbutton" class="lub" type="submit" role="submit" value="Log In">

               </form>

        </div>
        </div>

      </div>
      </div>

    </div>
    </div>


@endsection


@section('footer')
<footer class="footer-navbar">
     <div class="container">
       <div class="row">
            <div>
                <div class="col-md-12 text-center  footer-margin">
                    <p class="copyright" id="p"> © 2016 - 2017 Sha7en LLC.</p>
                    <a href="{{url('legal/terms')}}" onmouseout="this.style.color = '#7d7d7d'" class="footer-a">Terms of Service</a>
                    </br>

                </div>

            </div>

       </div>
     </div>

     </footer>
 @endsection
