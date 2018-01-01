@extends('layouts.master')
@section('title', 'RBS - Hire Freelancers &amp; Get Freelance Jobs Online')

	@section('header')
       <header class="navheader">
       		<div class="container">
       			<a class="logo" href="{{url('/')}}">
 					<img class="img-responsive" src="{{ URL::asset('/images/logo-rbs.png')}}" />
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
     @endsection
	@section('body')
<div class="chat">
<div class="container chatting">
<div class="panel panel-default">
  <div class="panel-body backcolor">
    <h3 class="panel-title text-center"><strong>Conversation with vishwes </strong></h3>
  </div>
  </div>
  <div class="row rowmarg">
  <div class="col-md-4"></div>
  <div class="col-md-4">
<img class="img-circle chatimg" src="{{ URL::asset('/images/tech2.jpg') }}" width="50px" height="50px">
<div class="imgcaption">
You
</div>
</div>
</div>
<div class="sendsection">
<div class="row"> 
<textarea type="textarea" class="col-md-11 chattxt"></textarea>
</div>
<div class="row">
<div class="col-md-12">
<button type="button" class="profsetbut chatbut">SEND MESSAGE</button>
</div>
</div>
</div>

<div class="row rowmarg">
<div class="col-md-2">
<img class="img-circle chatimg1" src="{{ URL::asset('/images/tech2.jpg') }}" width="50px" height="50px">
<div class="imgcaption1">You
</div>
</div>
<div class="col-md-8" >
<div class="panel panel-default">
  <div class="panel-body">
    <p class="msgcont">hi</p>
  </div>
  </div>
</div>
</div>

<div class="row rowmarg">
<div class="col-md-2">
<img class="img-circle chatimg1" src="{{ URL::asset('/images/tech2.jpg') }}" width="50px" height="50px">
<div class="imgcaption1">You
</div>
</div>
<div class="col-md-8" >
<div class="panel panel-default">
  <div class="panel-body">
    <p class="msgcont">You have sent a new reservation request to admin</p>
  </div>
  </div>
</div>
</div>

<div class="row rowmarg">
<div class="col-md-2"></div>
<div class="col-md-8" >
<div class="panel panel-default">
  <div class="panel-body">
    <p class="msgcont">..</p>
  </div>
  </div>
</div>
<div class="col-md-2">
<img class="img-circle chatimg1" src="{{ URL::asset('/images/tech1.jpg') }}" width="50px" height="50px">
<div class="imgcaption1">other one
</div>
</div>
</div>


</div>
</div>


@endsection

@section('footer')
    @include('freelancerfooter')
 @endsection
