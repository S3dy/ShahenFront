@extends('layouts.master')
@section('title', 'RBS - Hire Freelancers &amp; Get Freelance Jobs Online')

	@section('header')
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
     @endsection
	@section('body')
		 <?php
	 $json=$homepage;
	 $homepage=json_decode($json,true);
	 ?>
	 <div class="side-menu">
	 		</br></br>
	 	</div>
	 <section class="banner" style="background-image:url({{url::asset($homepage[0]['homepage']['banner1']['image'])}})">
	

    <div class="container ">
	    	<div class="row">
	    	  <div class=" col-md-10 col-md-offset-1 text-center jumbotron bg-cloud jumbotron-xlg ">
	    	  	<h1><span class="text-grass "><?php echo $homepage[0]['homepage']['banner1']['greenbold'];?> </span> </br>

	    	  		<span class="text-grey">
	    	  		<?php echo $homepage[0]['homepage']['banner1']['blackbold'];?> </span>
	    	  	</h1>

	    	  	<p class="text-long"><?php echo $homepage[0]['homepage']['banner1']['subcontent'];?></p>


	    	  	<div class="csd">
	 	    	  <a href="{{url('/signup')}}" class="slider btn btn-defualt bg-white" role="button">Get Started</a>
	 	   	  </div>

	    	  </div>
	          </div>
	    </div>
	 </section>
	 <section class="banner1">
	   <div class="container text-center">
	 	 <h2 class="banner2head"><?php echo $homepage[0]['homepage']['howitswork']['headcontent']; ?></h2>
	 	 <div class="row m-b-80 col-sm-4 col-lg-3 col-lg-offset-0 col-sm-offset-1 ">
	 	 	<article class="text-block">
	 	 	  <header>
	 	 	    <div class="banner-icon" style="background-image:url({{url::asset($homepage[0]['homepage']['howitsworktitleone']['image'])}});  background-repeat: no-repeat !important;background-position: center;"></div>
	 	 	    <hr>
	 	 	  </header>
	 	 	  <h3 class="text-uppercase m-b-40"><?php echo $homepage[0]['homepage']['howitsworktitleone']['heading']; ?></h3>
	 	 	  <p class="text-short">
	 	 	  	<?php echo $homepage[0]['homepage']['howitsworktitleone']['content']; ?>
	 	 	  </p>
	 	 	</article>
	 	 </div>
	 	 <div class="row m-b-80 col-sm-4 col-lg-3 col-lg-offset-0 col-sm-offset-1 ">
	 	 	<article class="text-block">
	 	 	  <header>
	 	 	   <div class="banner-icon"  style="background-image:url({{url::asset($homepage[0]['homepage']['howitsworktitletwo']['image'])}});  background-repeat: no-repeat !important;background-position: center;"></div>
	 	 	    <hr>
	 	 	  </header>
	 	 	   <h3 class="text-uppercase m-b-40"><?php echo $homepage[0]['homepage']['howitsworktitletwo']['heading']; ?></h3>
	 	 	  <p class="text-short">
	 	 	  	<?php echo $homepage[0]['homepage']['howitsworktitletwo']['content']; ?>
	 	 	  </p>
	 	 	</article>
	 	 </div>
	 	 <div class="row m-b-80 col-sm-4 col-lg-3 col-lg-offset-0 col-sm-offset-1 ">
	 	 	<article class="text-block">
	 	 	  <header>
	 	 	    <div class="banner-icon"  style="background-image:url({{url::asset($homepage[0]['homepage']['howitsworktitlethree']['image'])}});  background-repeat: no-repeat !important;background-position: center;"></div>
	 	 	    <hr>
	 	 	  </header>
	 	 	   <h3 class="text-uppercase m-b-40"><?php echo $homepage[0]['homepage']['howitsworktitlethree']['heading']; ?></h3>
	 	 	  <p class="text-short">
	 	 	  	<?php echo $homepage[0]['homepage']['howitsworktitlethree']['content']; ?>
	 	 	  </p>
	 	 	</article>
	 	 </div>
	 	 <div class="row m-b-80 col-sm-4 col-lg-3 col-lg-offset-0 col-sm-offset-1 ">
	 	 	<article class="text-block">
	 	 	  <header>
	 	 	    <div class="banner-icon" style="background-image:url({{url::asset($homepage[0]['homepage']['howitsworktitlefour']['image'])}});  background-repeat: no-repeat !important;background-position: center;" ></div>
	 	 	    <hr>
	 	 	  </header>
	 	 	   <h3 class="text-uppercase m-b-40"><?php echo $homepage[0]['homepage']['howitsworktitlefour']['heading']; ?></h3>
	 	 	  <p class="text-short">
	 	 	  	<?php echo $homepage[0]['homepage']['howitsworktitlefour']['content']; ?>
	 	 	  </p>
	 	 	</article>
	 	 </div>
	   </div>
	 </section>
	 <section class="video-footer bg-video">
	 		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

    <div class="item active" >
          <div>
    <div class="container m-t-80 m-b-80">
      <div class="row">
        <div class="col-sm-6 col-md-push-6 col-md-6 col-sm-push-6">
           <div class="videoimage">
            <img class="img" src="{{URL::asset($homepage[0]['homepage']['sliders']['image1'])}}">

          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-md-pull-6 col-sm-pull-6">
           <i class="icon-quote"></i>
          <p class="m-b-30">
                  <?php echo $homepage[0]['homepage']['sliders']['content1']; ?>
          </p>
          <p class="m-b-40">

          </p>
          <div class="cs">

          </div>
        </div>
      </div>
      </div>
    </div>

    </div>

    <div class="item">
          <div>
    <div class="container m-t-80 m-b-80">
      <div class="row">
        <div class="col-sm-6 col-md-push-6 col-md-6 col-sm-push-6">
           <div class="videoimage">
            <img class="img" src="{{URL::asset($homepage[0]['homepage']['sliders']['image2'])}}">

          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-md-pull-6 col-sm-pull-6">
           <i class="icon-quote"></i>
          <p class="m-b-30">
                  <?php echo $homepage[0]['homepage']['sliders']['content2']; ?>
          </p>
          <p class="m-b-40">

          </p>
          <div class="cs">

          </div>
        </div>
      </div>
      </div>
    </div>

    </div>

  </div>

  <!-- Controls -->
  <a class="left carousel-control carousel-left" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control carousel-left" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	 </section>
	 <section class="section-logo-bar bg-ash ">
	 	<div class="container">
	 		<h4><?php echo $homepage[0]['homepage']['banner2']['heading']; ?></h4>
	 		<div class="logobar m-b-60 compimg" style="background-image:url({{url::asset($homepage[0]['homepage']['banner2']['image'])}})"></div>
	 	</div>
	 </section>
	 <section class="text-center bg-grass p-b-4">
	 	<div class="container">
	 	  <div class="row">
	 	    <div class=" col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" >
	 	   	 <h2 class=" m-t-80 m-b-40 c-white c-h2" ><?php echo $homepage[0]['homepage']['banner3']['content']; ?></h2>
	 	     <div class="css">
	 	    	  <a href="{{url('/signup')}}" class="custom-btns btn btn-defualt" role="button">Get Started</a>
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
