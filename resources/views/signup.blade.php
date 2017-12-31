@extends('layouts.master1')
@section('title', 'Create an Account - rbs')

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
      
@endsection

@section('body')

    <div class="container sgup"  >
        <div class="row  m-xlg-bottom">
        <div class="col-md-12 m-lg-bottom">
        <hgroup class="gothamlight">
            <div class="text-center sp-headfont">Let's get started!</div>
            <div class="text-center sp-headfont">First, tell us what you're looking for.</div>
        </hgroup>
        </div>
        <div class=" hidden-xs">&nbsp;</div>
        <div class="p-bottom visible">&nbsp;</div>
        <div class="col-md-12 text-center margin-top-50">
        <div class="col-md-4 col-md-offset-1">
        <div>
            <div class="muted">
                <div>
                    <img src="{{ URL::asset('public/images/icon-client.jpg')}}" />
                </div>
                <div class="user-selection gothamlight color-black">I want to hire a freelancer</div>
            </div>
            <p class="p-font p-m-bottom gothamlight signup-p">
                        Find, collaborate with,
                        <br>
                        and pay an expert.
            </p>
            <a class="cust-btn-primary btn text-capitalize m-0 padd" href="{{url('/')}}/signup/create-account/client_direct">Hire</a>
        </div>
        </div>
            <div class="col-md-2"><div class="or-divider"><div class="o-mid">OR</div></div></div>
        <div class="col-md-4">
           <div>
            <div class="muted">
                <div>
                    <img src="{{ URL::asset('public/images/icon-client1.jpg')}}" />
                </div>
                <div class="user-selection gothamlight color-black">I'm looking for online work</div>
            </div>
            <p class="p-font p-m-bottom gothamlight signup-p">
                        Find freelance projects and
                        <br>
                        grow your business.
            </p>
            <a class="cust-btn-primary btn text-capitalize m-0 padd" href="{{url('/')}}/signup/create-account/freelancer_direct">Work</a>
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
                    <p class="copyright" id="p"> © 2016 - 2017 RBS Global Inc.</p>
                    <a href="{{url('legal/terms')}}" onmouseout="this.style.color = '#7d7d7d'" target='_blank' class="footer-a">Terms of Service</a>
                    </br>

                </div>

            </div>

       </div>
     </div>

     </footer>

@endsection
