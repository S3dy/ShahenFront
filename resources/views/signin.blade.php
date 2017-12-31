@extends('layouts.master1')
@section('title','Create an Account - rbs')
 @section('header')
      <header class="navheader">
            <div class="container login-container">
                <a class="logo1 a-navbar" href="{{url('/')}}">
                    <img src="{{ URL::asset('public/images/logo-rbs.png')}}" />
            </a>
          <div class="visible-md visible-lg desktop-navbar">

            <p class="nav navbar-nav navbar-right nav-pad-right gothamlightcus">
                <span>Already have an account?</span>
                <a class="a" href="{{url('/')}}/ab/account-security/login">Log In</a>
            </p>
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
   <form action="providerregister" method="post" id="signin">
   <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
    <div class="row">
          @if(session('flag'))
        @if(session('flag') == 1)
       <div class="alert alert-danger ">
          <strong>Sorry!</strong> Your are exist user!!! Kindly Log In.
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
              <span>Create a Free Client Account</span>
          </h1>
          <p class="cust-pp gothamlight">
            Looking for work? <a href="{{ URL('/signup/create-account/freelancer_direct') }}" class="cust-a">Sign up as a freelancer</a>
          </p>
   <div class="fcont">
   <div class="eo-tabset">
                <div class="scontrol">
                   <div class="formheadnav remove-right " id="csign">
                        Company Sign UP
                   </div>
                   <div class="formheadnav" id="isign">
                      Individual Sign Up
                   </div>
                </div>
                <div class="form-group custom-form gothamlight clearall" id="sign-div">
                   <input type="text" name="firstname" id="fname" class="form-control" placeholder="First Name">
                </div>
                <span id="sign-show-fname" class="hider span-error">
                      First Name is required
                </span>
                <div class="form-group custom-form gothamlight" id="sign-div1">
                   <input type="text" name="lastname" id="lname" class="form-control  " placeholder="Last Name">
                </div>
                <span id="sign-show-lname" class="hider span-error">
                      Last Name is required
                </span>
                <div id="cc">
                <div class="form-group custom-form gothamlight" id="sign-div2">
                   <input type="text" name="companyname"  id="company" class="form-control " placeholder="Company Name">
                </div>
                <span id="sign-show-company" class="hider span-error">
                      Company Name is required
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
                        <div class="lists" ng-repeat = "n in names | filter:country " ng-click="setcountry(n.name)" >@{{n.name}}</div>

                    </div>
                </div>
                <div class="form-group custom-form gothamlight" id="sign-div3">
                   <input type="text" name="email" id="sign-email" class="up-dwn form-control " placeholder="Email" autocomplete="off">
                </div>
                <span id="valid-email" class="hider span-error">
                      This email is already in use <a href="{{url('/')}}/ab/account-security/login">Want to log in?</a>
                </span>
                <span id="sign-show-invalid" class="hider span-error">
                      Please enter a valid email address
                </span>
                <div class="form-group custom-form form-bottom gothamlight  " id="sign-div4">
                   <input type="Password" name="password" id="sign-password" class="form-control " placeholder="Password">
                </div>
                <span id="sign-show-password" class="hider span-error">
                      Password is required
                </span>
                <span id="sign-valid-password" class="hider span-error">
                      Too short. Use atleast 8 characters
                </span>
                <span id="sign-invalid-password" class="hider span-error">
                      Use at least 1 letter & number or symbol
                </span>
        </div>

        <div class="lcont2 fpad">
          <div class="or-divider1"><center><div class="o-mid1">OR</div></center></div>
        </div>

         <div class="lcont3 fpad1">
                <a href="{{url('/')}}/signup/create-account/provider/facebook"><div class="socialbox1">
<i class="fa fa-facebook" aria-hidden="true"></i><p>Signup with Facebook</p></div></a>
                <a href="{{url('/')}}/signup/create-account/provider/twitter"><div class="socialbox2"><i class="fa fa-twitter" aria-hidden="true"></i><p>Signup with Twitter</p></div></a>
                <a href="{{url('/')}}/signup/create-account/provider/google"><div class="socialbox3"><i class="fa fa-google-plus" aria-hidden="true"></i><p>Signup with Google+</p></div></a>
        </div>

 </div>
 </div>
    </div>

  <div>
        <div class="col-md-12 text-center ">
  <div style="padding-top:20px">
       
       <div class="signup-policy"><small class="cust-small">
        <input type="checkbox" id="check">
            Yes, I understand and agree to the <a id="a" href="{{URL('/')}}/legal/terms" target='_blank'>Rbs Terms of Service</a>, including the
            <a id="a" href="{{URL('/')}}/legal/legal" target='_blank' >User Agreement &
            Privacy Policy</a>.
        </small>
        </div>
        <div class="signup-policy">
        <span class="hider span-error-chck-new error-color" id="check-error">
          <i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i> 
          Please accept the rbs Terms of Service before continuing
        </span>
        </div>
 </div>
  <div>
   <div class="csda">
      <button class="slider btn btn-defualt bg-white" action="submit" >Get Started</button>
    </div>
  </div>
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
                    <p class="copyright" id="p"> © 2016 - 2017 RBS Global Inc.</p>
                    <a href="{{url('legal/terms')}}" onmouseout="this.style.color = '#7d7d7d'" class="footer-a">Terms of Service</a>
                    </br>

                </div>

            </div>

       </div>
     </div>

     </footer>
@endsection
