@extends('layouts.master')
@section('title', 'How It Works - rbs')
@section('header')
       <header class="navheader">
       		<div class="container">
       			<a class="logo" href="{{url('/')}}">
 					<img class="img-responsive" src="{{ URL::asset('public/images/logo-rbs.png')}}" />
       		</a>
          <div class="visible-md visible-lg desktop-navbar">
            <ul class="nav navbar-nav navbar-left customnav">

            </ul>
            <ul class="nav navbar-nav navbar-right customnav">
                <li ><a href="{{url('/')}}/i/how-it-works/client/">HOW IT WORKS</a></li>
                <li><a href="{{url('/')}}/signup" class="header-link-signup">SIGNUP</a></li>
                <li><a href="{{url('/')}}/ab/account-security/login" class="header-link-login"></span>LOGIN</a></li>
            </ul>
          </div>
       		</div>
       </header>
     @endsection
	@section('body')

						<?php
                          $json=$howitworkspage;
                          $how=json_decode($json,true);
                          ?>
	 <section class="banner-page section-video  with-nav bg-cloud jumbotron " style="background-image:url({{url::asset($how[0]['howitworks']['howitsworkpageimgbanner']['image'])}})">
	    <div class="container ">
	    	<div class="row">
	    	  <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 text-center">
	    	  	<div class="hiw-head"><?php echo $how[0]['howitworks']['howitsworkpageimgbanner']['heading']; ?></div>
	    	  	<p class="hiw-font text-long"><?php echo $how[0]['howitworks']['howitsworkpageimgbanner']['content']; ?></p>
	    	  	<div class="csd">
	 	    	  <a class="slider btn btn-defualt bg-white" href="{{url('/')}}/signup" role="button">Get Started</a>
	 	   	  </div>

	    	  </div>
	          </div>
	    </div>
	 </section>
	 <section class="subnavigation  text-with-faq ">
	 	<div class="container">
	 	  <div class="row " >

	 	  	  <div class="col-md-6 ">
	 	  	  	 <h2 class="m-b-40  m-t-80 h2font"><?php echo $how[0]['howitworks']['howitsworkpagecontentsection']['title1']; ?></h2>
	 	  	  	<div>
	 	  	  		<?php echo $how[0]['howitworks']['howitsworkpagecontentsection']['content1']; ?>
	 	  	  	</div>
	 	  	  </div>
	 	  	  <div class="text-with-image col-md-6">
	 	  	    <img src="{{ URL::asset($how[0]['howitworks']['howitsworkpagecontentsection']['image1'])}}">
	 	  	  </div>
	 	  </div>
	 	    <div class="row " >
	 	      <div class="text-with-image col-md-6">
	 	  	    <img src="{{ URL::asset($how[0]['howitworks']['howitsworkpagecontentsection']['image2'])}}">
	 	  	  </div>

	 	  	  <div class="col-md-6 ">
	 	  	  	 <h2 class="m-b-40  m-t-80 h2font"><?php echo $how[0]['howitworks']['howitsworkpagecontentsection']['title2']; ?></h2>
	 	  	  	<div>
	 	  	  		<?php echo $how[0]['howitworks']['howitsworkpagecontentsection']['content2']; ?>
	 	  	  	</div>
	 	  	  </div>

	 	  </div>
	 	    <div class="row " >

	 	  	  <div class="col-md-6 ">
	 	  	  	 <h2 class="m-b-40  m-t-80 h2font"><?php echo $how[0]['howitworks']['howitsworkpagecontentsection']['title3']; ?></h2>
	 	  	  	 <div>
	 	  	  	 	<?php echo $how[0]['howitworks']['howitsworkpagecontentsection']['content3']; ?>
	 	  	  	 </div>
	 	  	  </div>
	 	  	  <div class="text-with-image col-md-6">
	 	  	    <img src="{{ URL::asset('public/images/workh.svg')}}">
	 	  	  </div>
	 	  </div>
	 	  <div class="row " >
	 	  	  <div class="text-with-image col-md-6">
	 	  	    <img src="{{ URL::asset('public/images/pay.svg')}}">
	 	  	  	<br><br>
	 	  	  </div>

	 	  	  <div class="col-md-6 ">
	 	  	  	 <h2 class="m-b-40  m-t-80 h2font"><?php echo $how[0]['howitworks']['howitsworkpagecontentsection']['title4']; ?></h2>
	 	  	  	 <div>
	 	  	  	 	<?php echo $how[0]['howitworks']['howitsworkpagecontentsection']['content4']; ?>
	 	  	  	 </div>
	 	  	  </div>

	 	  </div>


	 	</div>
	 </section>

	 <section class="text-center bg-grass">
	 	<div class="container">
	 	  <div class="row">
	 	    <div class=" col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" >
	 	   	 <h2 class=" m-t-80 m-b-40 c-white"><?php echo $how[0]['howitworks']['howitsworkpagegreenbanner']['content']; ?></h2>
	 	     <div class="css">
	 	    	  <a class="custom-btns btn btn-defualt" href="{{url('/')}}/signup"  role="button">Get Started</a>
	 	   	  </div>
	 	   	  <br><br><br><br>
	 	    </div>
	 	  </div>
	 	</div>
	 </section>

	@endsection


@section('footer')
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
@endsection