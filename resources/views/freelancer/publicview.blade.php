@extends('layouts.masterforfreelancer')
@section('title', 'my profile')
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
<?php $ses=Session::get('freelancer_name');?>
<?php

    $json = $users;
    $obj = json_decode($json,true);
   ?>



<div class="profile">
<div class="container fpagecont">
  <!--<div class = "subcontainer">

    <div class="alert alert-danger borbox" role="alert">
      <span class=""><i class="alert-icons fa fa-exclamation" aria-hidden="true"></i><span>
        <p>We’ve reviewed your profile and currently our marketplace doesn’t have opportunities for your area of expertise.
        <br><br>
    If you have more relevant skills or experience to add, you can update and re-submit your profile. You can find more information regarding our decision <a href="#">here</a>.</p>

     <button class="cbtn cbtn-default " >Resubmit profile</button>
    </div>
</div>-->

              <?php
              $q=$obj[0]['certificate'];
              $a=$q['certificate'];
              $b=$q['provider'];
              $c=$q['description'];
              $d=$q['date'];
              ?>

<div class="row">
<div class="col-md-3">
<h1 class="my"> My Profile</h1>
</div>
</div>

<div class="row">
  <div class="col-md-9">
    <div class="card myprof">
      <div class="row inner">
        <div class="col-md-2">
        <img src="/images/tech1.jpg"  width="100" height="100" class="img-circle ">
      </div>
      <div class="col-md-7 holhover">
        <span id="hol" type="button" class="holder"> <?php echo $ses; ?></span>
        <span id="hol" type="button"  class="holder"> </span> 
       </div>
       <div class="col-md-3">
       <span id="hol"  class="namespec"> 15<span class="spec">/hr</span></span> 

       </div>
       <br class="hidden-xs">
      <div class="col-md-10 contmargbtm">
        <span class="captn"><h4><?php print $obj[0]['title']?></h4></span>
       <div></div>
        <span class="glyphicon glyphicon-map-marker madumark" aria-hidden="true"></span><span class="cityname"> <h>madurai,India.</h></span>
       <div class="laablecont">
        <a><span class="chip laable">AngularJS</span>
        <span class="chip laable">Ionic Framework</span>
         <span class="chip laable">HTML5</span>
         <span class="chip laable">psd to html</span>
        <span class="chip laable">CSS</span></a>
        
       </div><br>
       <!--<div class="more">
      <a href="#">more <div class="glyphicon glyphicon-menu-down " aria-hidden="true"></div></a></div>-->
    </div>
    </div>
    <!--  <div class="hr text-center">

       <span class="plbut">
       <a class="holink1"><span class="glyphicon glyphicon-play-circle plbut"></span><span class="plvid" data-toggle="modal" data-target="#video"> <h> Place video </h></span></a> <span type="button" class="glyphicon glyphicon-pencil icon vidicn" aria-hidden="true" data-toggle="modal" data-target="#video"></span>
       </span>

       <span class="plbut">
       <a class="holink1"><span class="glyphicon glyphicon-play-circle plbut"></span><span class="plvid" data-toggle="modal" data-target="#playvideo"> <h> show video </h></span></a> <span type="button" class="glyphicon glyphicon-pencil icon vidicn" aria-hidden="true" data-toggle="modal" data-target="#playvideo"></span>
       </span>

    </div> -->

      <div class="overview">
        <span class="ovw" >Overview </span>
      </div><br>
      <div class="overcont">

         <p>@if($obj[0]['description'])<?php print $obj[0]['description']; ?>@endif</p> @if(!$obj[0]['description'])<p> No overview </p>@endif
      </div>
    </div>
      <br class="hidden-xs">
<?php
$hh=$obj[0]['portfolio'];
$title=$hh['title'];
 ?>
    <div class="card profcont">

      <div class="port">
       <span class="poflio">Portfolio </span>
       </div><br>
      <div class="overcont">
        <!-- <img src="" width="313" height="240" class="portdisp" data-toggle="modal" data-target="#myModal"> -->
        <div></div>
    <div class="my-profile-chg-div" >
        @if($title)<div class="my-profile-chng"><?php print $title ?></div> @endif

        @if(!$title)<span class="my-profile-chng">Title</span>@endif
        </div>
        <div class="clrlft">
        <p> Project Overview</p>
        @if($flag_port==0)<p>No items to display.</p>@endif
        </div>
        </div>
    </div>


     <div class="card profcont">
       <div class="port">
          
            <span class="poflio">Certifications</span>
          
       </div>
       <br>
      @if($flag_cert ==1)
      <div class="overcont1" id="cert11">
        <div class="overcont" id="cert1">
            <div class="row">
                <div class="col-md-2">
                    <i class="fa fa-file-o certfile" aria-hidden="true"></i>
                </div>
                <div class="col-md-9">
                    <div class="my-profile-chg-div" >
                     <div  id="cert" class="my-profile-chng"><?php  print $b ?><!-- <span type="button" class="glyphicon glyphicon-pencil icon carticon1" aria-hidden="true" data-toggle="modal" data-target="#Certificates"></span> --></div>

                    </div>
                    <div class="clrlft">
                  <p>
                    <span id="earn">earned <?php  print $d ?></span>
                                      </p>
                  </div>
                </div>
              </div>
        </div>
       </div>
        @endif

        <div class=" overcont   @if($flag_cert == 1) hider  @endif " id="c">
        <p>No items to display.</p>
        </div>

    </div>



     <?php
       $e=$obj[0]['employment'];
       $f=$e['cmpny_name'];
       $g=$e['title'];
       $h=$e['edu_desc'];
       $i=$e['from_mnth'];
       $j=$e['from_year'];
       $k=$e['to_mnth'];
       $l=$e['to_year'];
     ?>
    <div class="card profcont">
     <div class="port">
       <span class="poflio">Employment History</span>
       </div><br>
       @if($flag_emp==1)
       <div class="overcont1" id="cc1">
      <div class="overcont" id="cc">
         <div class="my-profile-chg-div">
         <div>
        <span class="my-profile-chng emmp" id="title"><?php print $g ?></span><span class="my-profile-chng emmp"> | </span><span class="my-profile-chng emmp" id="cer"><?php print $f ?></span>
        </div>

        </div>
        <div class="clrlft">
        <p><span id="from"><?php print $i ?></span><span id="frye"><?php print $j ?> </span><span>- </span><span id="to"><?php print $k?></span> <span id="toyr"> <?php print $l?></span><span>- </span><span id="des1"><?php print $h ?></span>

        </p>
        </div>

        </div>
        </div>
        @endif

        <div class=" overcont @if($flag_emp == 1) hider  @endif " id="c1">
        <p>No items to display.</p>
        </div>

    </div>
      <?php
      $m=$obj[0]['school'];
      $n=$m['school_name'];
      $o=$m['school_from'];
      $p=$m['school_to'];
      $s=$m['degree_name'];
      $r=$m['area_of_study'];
      ?>

    <div class="card profcont">
     <div class="port">
       <span class="poflio">Education</span>
       </div><br>
       @if($flag_school==1)
       <div class="overcont1" id="ccq11">
      <div class="overcont" id="cc1">
        <div class="my-profile-chg-div">
      <div>
        <span class="my-profile-chng edudiv" id="bac"><?php print $s ?></span><span class="my-profile-chng edudiv" id="cse"><?php print $r ?></span> <span class="my-profile-chng edudiv"> | </span><span class="my-profile-chng edudiv" id="col"><?php print $n ?></span>
       
        </div>
        </div>

        <div class="clrlft">
        <p><span id="year"><?php print $o?></span><span>- </span><span id="toyr"><?php print $p ?></span></p>
        </div>

        </div>
        </div>
        @endif

        <div class=" overcont @if($flag_school == 1) hider  @endif " id="c2">
        <p>No items to display.</p>
        </div>


    </div>

      <?php
      $aa=$obj[0]['otherExperiences'];
      $sub=$aa['subject'];
      ?>

    <div class="card profcont">
     <div class="port">
        <span class="poflio">Other Experiences</span>
       </div><br>
       @if($flag_other==1)
      <div class="overcont1" id="cc21">
      <div class="overcont" id="cc2">
        <div class="my-profile-chg-div">
      <div class="my-profile-chng expe" id="name"><?php print $sub ?>
      <span type="button" class="glyphicon glyphicon-pencil icon expeicon1" aria-hidden="true" data-toggle="modal" data-target="#otherex"></span>
        <span class="fa fa-trash-o expeicon2" id="bin3" aria-hidden="true"></span>
        </div>
      </div>
      <div class="clrlft">
      <span>Description</span>
      </div>
        </div>
        </div>
        @endif

        <div class="overcont @if($flag_other == 1) hider  @endif " id="c3">
        <p>No items to display.</p>
        </div>


    </div>
      </div>

     
</div>
</div>

</div>
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
