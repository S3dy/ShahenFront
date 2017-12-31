@extends('layouts.master1')
@php
  $data = json_decode($footerlink,true);
  echo "<title>".$data[0]['pagetitle']."</title>";
@endphp
@section('header')
 @php
   if(session()->has('role') and session()->has('role') == "freelancer"){ @endphp
      @include('freelancerheader')
    
    @php }else if(session()->has('role') and session()->has('role') == "provider"){ @endphp
      @include('providerheader')
    @php }else{ @endphp
        <header class="navheader">
          <div class="container">
            <a class="logo" href="{{url('/')}}">
          <img class="img-responsive" src="{{ URL::asset('public/images/logo-rbs.png')}}" />
          </a>
          <div class="visible-md visible-lg hidden-xs hidden-sm desktop-navbar">
            <ul class="nav navbar-nav navbar-left customnav">
            </ul>
            <ul class="nav navbar-nav navbar-right customnav">
                <li ><a href="{{url('/')}}/i/how-it-works/client/">HOW IT WORKS</a></li>
                <li><a href="{{url('/')}}/signup/" class="header-link-signup">SIGNUP</a></li>
                <li><a href="{{url('/')}}/ab/account-security/login" class="header-link-login"></span>LOGIN</a></li>
            </ul>
            </div>
            <div class="visible-sm visible-xs hidden-md hidden-lg nav-button">
              <span class="glyphicon glyphicon-menu-hamburger nav-button" aria-hidden="true"></span>
            </div>


          </div>
       </header>
     @php  }  @endphp 

@endsection
@section('body')

    <div class="container" style="padding-bottom:30px;">
          <div style="padding-bottom: 30px;font-size: 40px;font-weight: 600;" class="text-center">
          @php
            echo $data[0]['pagetitle'];
          @endphp  
          </div>
          <div>
          @php
            echo $data[0]['foottextarea'];
          @endphp
          </div>
          

    </div>


@endsection


@section('footer')
<footer class="footer-navbar">
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

</footer>
 @endsection
