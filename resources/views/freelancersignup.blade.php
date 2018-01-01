@extends('layouts.master1')
@section('title', 'Create an Account - rbs')
 @section('header')
      <header class="navheader">
            <div class="container login-container">
                <a class="logo1 a-navbar" href="{{url('/')}}">
                    <img src="{{ URL::asset('/images/logo-rbs.png')}}" />
            </a>
          <div class="visible-md visible-lg hidden-xs hidden-sm desktop-navbar">

            <p class="nav navbar-nav navbar-right nav-pad-right gothamlightcus">
                <span>Already have an account?</span>
               <strong> <a class="a" href="{{url('/')}}/ab/account-security/login">Log In</a></strong>
            </p>
          </div>
          <div class="visible-xs visible-sm nav-button-color">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

          </div>
            </div>
       </header>
       <script>
          app.controller('doc',function($scope,$window,$http){
            $scope.names = @php echo $countries = $countries; @endphp;
            $scope.c = "India";
            $scope.setcountry = function(s){
              $scope.c = s;
            }
            $scope.redirect = function(s){
             $window.location.href=s;
            }
      });
</script>
@endsection       
@section('body')


 <div class="container">
  <form action="freelancerregister" method="post" id="freelancersignin">
  <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
    <div class="row">
              @if(session('flag'))
        @if(session('flag') == 1)
       <div class="alert alert-danger ">
          <strong>Sorry!</strong> Your are exist user!!! Kindly Log In.
        </div>
        @endif
        @if(session('flag') == 2)
       <div class="alert alert-danger ">
          <strong>Sorry!</strong> Your captcha is incorrect.Kindly try again.!!!
        </div>
        @endif
        @if(session('flag') == 3)
       <div class="alert alert-danger ">
          <strong>Sorry!</strong> Email address not found!!!
        </div>
        @endif
        @endif
        <div class="col-md-12 text-center cust-margin">
          <h1 class="cust-h1 gothamlight">
              <span>Create a Free Freelancer Account</span>
          </h1>
          <p class="cust-pp gothamlight">
            Looking to hire? <a href="{{ URL::asset('signup/create-account/client_direct') }}" class="cust-a">Sign up as a client</a>
          </p>
<div class="fcont">

<div class="eo-tabset">

                <div class="form-group custom-form gothamlight" id="freesign-div1">
                   <input type="text" id="fstname" name="firstname" class="form-control" placeholder="First Name">
                <span id="f" class="hider span-error">
                    First name is required </span>
                    </div>


                <div class="form-group custom-form gothamlight" id="freesign-div2">
                   <input type="text" id="lstname" name="lastname" class="form-control  " placeholder="Last Name">
                <span id="l" class="hider span-error">
                    Last name is required
                 </span>
                 </div>
                <div class="form-group custom-form gothamlight" id="freesign-div3">
                   <input type="text" id="eml" name="email"  class="form-control" placeholder="Email" autocomplete="off">
                   <span id="valid-email" class="hider span-error">
                         This email is already in use <a href="{{url('/')}}/ab/account-security/login">Want to log in?</a>
                   </span>
                <span id="e" class="hider span-error">
                    Please enter a valid email address
                 </span>
                 </div>
  <div class="dropdwn gothamlight" >
      <div id="dropdwn" >
        <span class="textvalue">@{{c}}</span>
        <input type="hidden" name="country" value="@{{c}}">
        <span class="dropicon downarrow"><i class="fa fa-angle-down " aria-hidden="true"></i></span>
      </div>
      <div class="list1" id="selector"><i class="fa fa-globe fa-4x" aria-hidden="true"></i>
        <input type="text" ng-model="country">
       </div>
        <div class="optionlist" >
            <div class="lists" ng-repeat = "n in names | filter:country" ng-click="setcountry(n.name)" >@{{n.name}}</div>

        </div>
  </div>
  <div class="form-group custom-form gothamlight" id="freesign-div4">
                   <input type="text" id="uname" name="username" class="up-dwn form-control " placeholder="Username">
                <span id="u" class="hider span-error">
                    User name is required
                    </span>
                    <span id="valid-username" class="hider span-error">
                          This username alreasy exists! <a href="{{url('/')}}/ab/account-security/login">Want to log in?</a>
                    </span>
                 </div>
                <div class="form-group custom-form gothamlight" id="freesign-div5">
                   <input type="Password" id="pass" name="password" class="form-control " placeholder="Password">
                <span id="p" class="hider span-error">
                    Password is required
                    </span>
                <span id="free-valid-password" class="hider span-error">
                      Too short. Use atleast 8 characters
                </span>
                <span id="free-invalid-password" class="hider span-error">
                      Use at least 1 letter & number or symbol
                </span>
                 </div>

  <div class="form-group custom-form form-bottom gothamlight  " id="freesign-div6">
     <input type="text" id="captcha" name="captcha" class="up-dwn form-control" placeholder="Type the letters below">
  </div>
  <span id="c" class="hider span-error">
    This field is required
  </span>
  <div class="captchaclass"> {!! Captcha::img(); !!}</div>
 </div>
 <div class="lcont2 fpad">
          <div class="or-divider1"><center><div class="o-mid1">OR</div></center></div>
        </div>

         <div class="lcont3 fpad1">
           <a href="{{url('/')}}/signup/create-account/freelancer/facebook"><div class="socialbox1">
<i class="fa fa-facebook" aria-hidden="true"></i><p>Signup with Facebook</p></div></a>
           <a href="{{url('/')}}/signup/create-account/freelancer/twitter"><div class="socialbox2"><i class="fa fa-twitter" aria-hidden="true"></i><p>Signup with Twitter</p></div></a>
           <a href="{{url('/')}}/signup/create-account/freelancer/google"><div class="socialbox3"><i class="fa fa-google-plus" aria-hidden="true"></i><p>Signup with Google+</p></div></a>

        </div>
    </div>
    </div>
    </div>
    <div class="col-md-12 text-center">
    <div class="signup-policy">
         <small class="cust-small" style="clear:both">
         <input type="checkbox" id="free-check">
                Yes, I understand and agree to the <a id="a" href="{{URL('/')}}/terms/terms" target='_blank'>rbs Terms of Service</a>, including the
                <a id="a" href="{{URL('/')}}/legal/legal" target='_blank'>User Agreement &
                Privacy Policy</a>.
         </small>
    </div>        
    <div class="signup-policy">  
       <span class="hider span-error-chck-new error-color" id="free-check-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i> Please accept the rbs Terms of Service before continuing</span>
    </div>

 </div>
  <div class="col-md-12 text-center">
         <div class="csda">
            <button class="slider btn btn-defualt bg-white" role="submit">Get Started</button>
          </div>
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
                    <p class="copyright" id="p"> © 2016 - 2017 Sha7en LLC.</p>
                    <a href="{{url('legal/terms')}}" onmouseout="this.style.color = '#7d7d7d'" class="footer-a">Terms of Service</a>
                    </br>

                </div>

            </div>

       </div>
     </div>

     </footer>
@endsection
