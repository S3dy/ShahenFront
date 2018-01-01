@extends('layouts.master1')
@section('title', 'Log In - RBS')
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
                <a class="logo1 a-navbar" href="{{url('/')}}">
                    <img src="{{ URL::asset('/images/logo-rbs.png')}}" />
            </a>
          <div class="visible-md visible-lg desktop-navbar">

            <p class="nav navbar-nav navbar-right nav-pad-right gothamlightcus">
                <span></span>
                <a class="a" href="{{url('/')}}/signup">Sign up</a>
            </p>
          </div>
            </div>
       </header>
@endsection
@section('body')

    <div class="container">
    <div class="logincontainer">
        <div class="lcont1">
          @if(session('flag'))
        @if(session('flag') == 1)
       <div class="alert alert-danger ">
          <strong>Sorry!</strong> Your account is invalid!.
        </div>
        @endif
        @endif

          <center><div class="lgheadfont">Log in and get to work</div></center>
          <form action="login" method="post" id="loginform">
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          <input type="hidden" name="_jsEnabled" value="{{ true }}" />
          <div >
             <input type="text" class="textbo " id="name" name="email" value="<?php if(isset($name)) echo $name;?>" placeholder="Username or Email">
          </div>
          <span class="hider login-error error-color" id="loginmail"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
          <div>
            <input type="password" class="textbo l-password" id="loginpassword" name="password"  value="<?php if(isset($pass)) echo $pass; ?>" placeholder="Password">
          </div>
          <span class="hider login-error error-color" id="login-pass-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
          @if($flags == '1')
            <div style="padding:20px;margin-bottom:20px;border:2px solid red;border-radius:5px;background-color:white !important"><span style="color:red">!</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Invalid username,email or password</div>
          @endif
          <div class="logbuttondiv">
          <input id="lbutton" class="pull-left lub" type="submit" role="submit" value="Log In">
          
                          <div class="pull-left chechers checkbox form-group">
                            <label class="checkcss">
                              <input type="checkbox" name="rememberme" class="hide" name="Entry Level" value="remember"  onchange="selectchecker(this,1)">
                              <span class="customcheckbox"  ><i class="fa fa-check tick tick1 open" style="display:none" aria-hidden="true"></i></span>
                          <span class="rmetext">Remember me next time</span>
                          </label>
                       </div>
          </div>            

               </form>
          <div style="clear:left">
            <a class="a" id="a" href="{{url('/')}}/forgetpass">Forget password?</a>
          </div>
        </div>

        <div class="lcont2">
          <div class="or-divider1"><center><div class="o-mid1">OR</div></center></div>
        </div>
        <div class="lcont3">
          <a href="{{url('/')}}/ab/account-security/facebook"><div class="socialbox1">
          <i class="fa fa-facebook" aria-hidden="true"></i><p>Login with Facebook</p></div></a>
          <a href="{{url('/')}}/ab/account-security/twitter"><div class="socialbox2"><i class="fa fa-twitter" aria-hidden="true"></i><p>Login with Twitter</p></div></a>
          <a href="{{url('/')}}/ab/account-security/google"><div class="socialbox3"><i class="fa fa-google-plus" aria-hidden="true"></i><p>Login with Google+</p></div></a>

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
