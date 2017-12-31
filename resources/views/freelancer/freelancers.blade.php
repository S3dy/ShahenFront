@extends('layouts.masterforfreelancer')
@section('title', 'My Profile')
@section('header')
  @include('freelancerheader')
 @endsection

@section('body')
<?php $ses=Session::get('username');?>
<?php 

    $json = $users;
    $obj = json_decode($json,true);
   ?>



<div class="profile">
<div class="container fpagecont">
<div class="spinner freelancerprofileupdate" style="visibility: hidden; z-index:2000;">
            <div id="floatingBarsG">
              <div class="blockG" id="rotateG_01"></div>
              <div class="blockG" id="rotateG_02"></div>
              <div class="blockG" id="rotateG_03"></div>
              <div class="blockG" id="rotateG_04"></div>
              <div class="blockG" id="rotateG_05"></div>
              <div class="blockG" id="rotateG_06"></div>
              <div class="blockG" id="rotateG_07"></div>
              <div class="blockG" id="rotateG_08"></div>
            </div>
    </div>
   @if(session('dpflag'))
        @if(session('dpflag') == "1")<div class="alert alert-success" role="alert">
  <a href="#" class="alert-link">Profile picture has been updated</a>
</div>
 @else
<div class="alert alert-danger" role="alert">
  <a href="#" class="alert-link">Unfortunately,Profile picture has not updated</a>
</div>
 @endif

      @endif
  <!-- <div class = "subcontainer">

    <div class="alert alert-danger borbox" role="alert">
      <span class=""><i class="alert-icons fa fa-exclamation" aria-hidden="true"></i><span>
        <p>We’ve reviewed your profile and currently our marketplace doesn’t have opportunities for your area of expertise.
        <br><br>
    If you have more relevant skills or experience to add, you can update and re-submit your profile. You can find more information regarding our decision <a href="#">here</a>.</p>

     <button class="cbtn cbtn-default">Resubmit profile</button>
    </div>
</div> -->

              <?php
              $q=$obj[0]['freelancerprofile']['certifications'];
              $a=$q['certificationname'];
              $b=$q['provider'];
              $c=$q['description'];
              $d=$q['date'];
              ?>
     

<div id="">
<div class="row ">
<div class="col-md-3">
<h1 class="my"> My Profile</h1>
</div>
</div>

<div class="row">
	<div class="col-md-9">
		<div class="card myprof">
			<div class="row inner">
				<div class="col-md-2">
				<img src="<?php if($obj[0]['profilepic'] !=""){ echo URL::asset('/public/profileimages/'.$obj[0]['profilepic']); } else {echo URL::asset('public/images/default.jpg'); } ?>" data-toggle="modal" data-target="#dp" width="100" height="100" class="img-circle ">
			</div>
			<div class="col-md-7 holhover">
			 	<a class="holink1"><span id="hol" type="button" data-toggle="modal" data-target="#editname" class="holder"> <?php echo $ses; ?></span></a> <span  id="pencil" class="glyphicon glyphicon-pencil icon nameicn" type="button" data-toggle="modal" data-target="#editname" aria-hidden="true" ></span>
			 	<a class="holink1"><span id="hol" type="button" data-toggle="modal" data-target="#editname" class="holder"> </span></a> </span>
			 </div>
            <?php
              $free=$obj[0]['freelancerprofile'];
              $titl=$free['jobtitle'];
              $skil=$free['skills'];
              $hour=$free['hourate'];
              $receive=$free['receiverate'];
              $over=$free['overview'];
              ?>
			 <div class="col-md-3">
		       <a class="holink1"><span id="hol" type="button" data-toggle="modal" data-target="#rate" class="namespec"><?php if($hour=="") {echo 0;} else {echo $hour;}   ?><span class="spec">/hr</span></span></a> <span  id="pencil" class="glyphicon glyphicon-pencil icon rateicn" aria-hidden="true" data-toggle="modal" data-target="#rate" ></span>


			 </div>
			 <br class="hidden-xs">
			 <div class="col-md-10 contmargbtm">
        <span class="captn"><h4><?php print $free['jobtitle']?></h4></span>
       <div></div>
			 	<span class="glyphicon glyphicon-map-marker madumark" aria-hidden="true"></span><span class="cityname"> <h><?php if($obj[0]['country']=="") {echo " ";} else {echo $obj[0]['country'];}   ?>.</h></span>
			 <div class="laablecont" data-toggle="modal" data-target="#myskills">
			   <a><span class="chip laable"><?php if($free['skills']=="") {echo "Add Skills";} else {echo $free['skills'];}   ?></span><!-- <span class="chip laable">AngularJS</span>
        
			 	<span class="chip laable">Ionic Framework</span>
				 <span class="chip laable">HTML5</span>
				 <span class="chip laable">psd to html</span>
			 	<span class="chip laable">CSS</span> --></a>
        <span type="button" class="glyphicon glyphicon-pencil icon laableicn" aria-hidden="true" ></span>
			 </div><br>
       <!--<div class="more">
			<a href="#">more <div class="glyphicon glyphicon-menu-down " aria-hidden="true"></div></a></div>-->
    </div>
		</div>

<!-- 		 <div class="hr text-center">

       <span class="plbut">
			 <a class="holink1"><span class="glyphicon glyphicon-play-circle plbut"></span><span class="plvid" data-toggle="modal" data-target="#video"> <h> Place video </h></span></a> <span type="button" class="glyphicon glyphicon-pencil icon vidicn" aria-hidden="true" data-toggle="modal" data-target="#video"></span>
       </span>

       <span class="plbut">
       <a class="holink1"><span class="glyphicon glyphicon-play-circle plbut"></span><span class="plvid" data-toggle="modal" data-target="#playvideo"> <h> show video </h></span></a> <span type="button" class="glyphicon glyphicon-pencil icon vidicn" aria-hidden="true" data-toggle="modal" data-target="#playvideo"></span>
       </span>


		</div> -->
<?php
$hh=$obj[0]['freelancerprofile']['portfolios'];
$projecttitle=$hh['projecttitle'];
$projectoverview=$hh['projectoverview'];
$category=$hh['category'];
$completiondate=$hh['completiondate'];
$projecturl=$hh['projecturl'];
$skills=$hh['skills'];
 ?>

	<div class="overview">
       <a class="holink1"> <span class="ovw" data-toggle="modal" data-target="#oview">Overview </span></a><span type="button" class="glyphicon glyphicon-pencil icon overvicn" aria-hidden="true" data-toggle="modal" data-target="#oview"></span>
      </div><br>
      <div class="overcont">

         <p>@if($over)<?php print $over; ?>@endif</p> @if(!$over)<p> No overview </p>@endif
      </div>
    </div>
      <br class="hidden-xs">

    <div class="card profcont poort">

      <div class="port">
       <a class="holink1"> <span class="poflio" data-toggle="modal" data-target="#myModal">Portfolio </span></a>  @if($projecttitle=="") <span type="button" class="glyphicon glyphicon-plus-sign polioicn" aria-hidden="true" data-toggle="modal" data-target="#myModal"></span>@else
        <span type="button" class="glyphicon glyphicon-pencil polioicn" aria-hidden="true" data-toggle="modal" data-target="#myModal"></span>
       @endif
       </div><br>
      <div class="overcont">

       <!--  <img src="" width="313" height="240" class="portdisp" data-toggle="modal" data-target="#myModal"> -->
        <div></div>
    <div class="my-profile-chg-div" >

        @if($projecttitle)<div class="my-profile-chng poort"><?php print $projecttitle ?><!-- <span class="fa fa-trash-o porticon2" id="bin4" aria-hidden="true"></span> --></div> @endif
        @if(!$projecttitle)<span class="my-profile-chng">Title</span>@endif
        </div>
        <div class="clrlft">
        <p> {{$hh['projectoverview']}}</p>
        @if($flag_port==0)<p>No items to display.</p>@endif
        </div>
        </div>
    </div>



		 <div class="card profcont caarti">
       <div class="port">
          <a class="holink1">
            <span class="poflio" data-toggle="modal" data-target="#Certificates">Certifications</span>
          </a>
           @if($flag_cert !=1)
          <span type="button" class="glyphicon glyphicon-plus-sign polioicn" aria-hidden="true" data-toggle="modal" data-target="#Certificates"></span>
          @else
           <span type="button" class="glyphicon glyphicon-pencil polioicn" aria-hidden="true" data-toggle="modal" data-target="#Certificates"></span>
          @endif
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
                     <div  id="cert" class="my-profile-chng" data-toggle="modal" data-target="Certificates"><?php  print $b ?><!-- <span type="button" class="glyphicon glyphicon-pencil icon carticon1" aria-hidden="true" data-toggle="modal" data-target="#Certificates"></span> --><!-- <span class="fa fa-trash-o carticon2" id="bin" aria-hidden="true"></span> --></div>

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
       $e=$obj[0]['freelancerprofile']['employmenthistories'];
       $f=$e['company'];
       $g=$e['title'];
       $h=$e['description'];
       $i=$e['startmonth'];
       $j=$e['startyear'];
       $k=$e['endmonth'];
       $l=$e['endyear'];
       $sd=$e['city'];
       $ds=$e['location'];
     ?>
     
		<div class="card profcont employ">
     <div class="port">
       <a class="holink1"> <span class="poflio" data-toggle="modal" data-target="#Employment">Recent Employment</span></a>  @if($flag_emp!=1) <span type="button" class="glyphicon glyphicon-plus-sign polioicn" aria-hidden="true" data-toggle="modal" data-target="#Employment"></span> @else
        <span type="button" class="glyphicon glyphicon-pencil polioicn" aria-hidden="true" data-toggle="modal" data-target="#Employment"></span>
        @endif
       </div><br>
       @if($flag_emp==1)
       <div class="overcont1" id="cc1">
      <div class="overcont" id="cc">
         <div class="my-profile-chg-div">
         
        <span class="my-profile-chng emmp" id="title"><?php print $g ?></span><span class="my-profile-chng emmp"> | </span><span class="my-profile-chng emmp" id="cer"><?php print $f ?><!-- <span  id="pencil" class="glyphicon glyphicon-pencil icon empicon1" aria-hidden="true" data-toggle="modal" data-target="#Employment" ></span><span class="fa fa-trash-o empicon2" id="bin1" aria-hidden="true"></span> --></span>

        </div>
        <div class="clrlft">
        <p><span id="from"><?php print $i ?></span> <span id="frye"><?php print $j ?> </span><span>- </span><span id="to"><?php print $k?></span> <span id="toyr"> <?php print $l?></span><span>- </span><span id="des1"><?php print $h ?></span>

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
      $m=$obj[0]['freelancerprofile']['educations'];
      $n=$m['schoolname'];
      $o=$m['startdate'];
      $p=$m['enddate'];
      $s=$m['degree'];
      $r=$m['areaofstudy'];
      ?>

		<div class="card profcont educat">
     <div class="port">
       <a class="holink1"> <span class="poflio" data-toggle="modal" data-target="#Education">Education</span></a> @if($flag_school!=1) <span class="glyphicon glyphicon-plus-sign polioicn" aria-hidden="true" data-toggle="modal" data-target="#Education"></span> @else
        <span class="glyphicon glyphicon-pencil polioicn" aria-hidden="true" data-toggle="modal" data-target="#Education"></span> 
       @endif
       </div><br>
       @if($flag_school==1)
       <div class="overcont1" id="ccq11">
      <div class="overcont" id="cc1">
        <div class="my-profile-chg-div">
      <div>
        <span class="my-profile-chng edudiv" id="bac"><?php print $s ?></span><span class="my-profile-chng edudiv" id="cse"><?php print $r ?></span> <span class="my-profile-chng edudiv"> | </span><span class="my-profile-chng edudiv" id="col"><?php print $n ?>
       <!-- <span class="fa fa-trash-o eduicon2" id="bin2" aria-hidden="true"></span> --></span>
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
      $aa=$obj[0]['freelancerprofile']['otherexperience'];
      $sub=$aa['subject'];
      $des=$aa['description'];
      ?>

		<div class="card profcont experr">
     <div class="port">
       <a class="holink1"> <span class="poflio" data-toggle="modal" data-target="#otherex">Other Experiences</span></a> 
       @if($flag_other != 1) <span class="polioicn"  data-toggle="modal" data-target="#otherexs"> <i class="icon glyphicon glyphicon-plus-sign"></i></span>@else
      <span class="polioicn"  data-toggle="modal" data-target="#otherexs"> <i class="icon glyphicon glyphicon-pencil " style="color:#37a000;"></i></span>
      @endif

       </div><br>
       @if($flag_other==1)
      <div class="overcont1" id="cc21">
      <div class="overcont" id="cc2">
        <div class="my-profile-chg-div">
      <div class="my-profile-chng expe" id="name">
        <?php echo $sub; ?>
        </div>
      </div>
      <div class="clrlft">
      <span></span>
      </div>
        </div>
        </div>
        @endif

        <div class="overcont @if($flag_other == 1) hider  @endif " id="c3">
        <p>No items to display.</p>
        </div>


    </div>
		 	</div>

    	<div class="col-md-3 profileset">
      <div>
    		<a style="color:white" class="profsetbut" href="{{URL('ProfileSession')}}"> Profile Settings</a><br>
        </div>

      	<!-- <div class="viewcap" >
      		<a href="{{ URL('/freelancers/view')}}">View my profile as others see it</a>
      	</div>
    		<hr class="viewhr">
    		<span class="avail">Availability</span><span class="glyphicon glyphicon-pencil icon availicn" data-toggle="modal" data-target="#Availability"></span>
    	<div class="viewp">

    		<p>Available </p>
    		<p>More than 30 hrs/week</p>
    		<p>Response time</p>
    	</div>
    	<h5 class="avail">Profile Link</h5>

    	<form><input name="disabled" value="http://www.rbs.com" disabled> </form>
    	<div class="viewcap">
    		<a href="#">copy link</a>
    	</div>
    	<div class="lang">
    		<h5> Languages</h5>
    		<h>English: Conversational</h>
    	</div>
    	</div> -->
</div>
</div>
</div>
</div>



<div class="modal fade bckcolor" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" keyboard="false" data-backdrop="static">
  <div class="modal-dialog custom-model-dialog" role="document">
    <div class="modal-content" id="porthide">
    <form id="form_port1">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Project</h4>
      </div>
      <div class="modal-body modalport">
        <div class="row ">
        <div class="col-md-6">
        <div class="form-group mdl">
        <label class="head">Project Title</label>
        <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php echo $ses ?>" id="nam">
        <input type="text" id="pr"  name="protit" class="form-control" value="{{$hh['projecttitle']}}">
        <span id="err" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
        </div>
        <div class="form-group mdl">
        <label class="head">Project Overview</label>
        <textarea class="form-control textar" id="pr1" maxlength="4000" rows="9" id="comment">{{$hh['projectoverview']}}</textarea>
        <span id="err1" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
        </div>
       <!--  <div class="form-group mdl">
        <label class="head">Thumbnail Image</label>
        <div class="upbox">
        <p>drag or <a data-toggle="modal" data-target="#thumbnail" class="thumb">upload</a> project thumbnail</p>
        </div>
        </div> -->
<!--          <div class="form-group mdl">
        <label class="head">Project Files</label>
        <div class="upbox">
        <p>drag or <a href="#">upload</a> project files</p>
        </div>
        </div> -->
        </div>
       <div class="col-md-6">
       <!-- <div class="form-group mdl">
         <label class="head">Was this project done on rbs</label>
         <select name="Select A Contract" id="proj_cont" class="form-control opt">
          <option value="Select a contract">Select a contract</option>
         </select>
         </div> -->
         <div class="form-group mdl">
         <label class="head">Category</label>
         <select name="Select a catogory" id="cat" class="form-control opt">
          <option value="Select a category">Select A Category</option>
          <option <?php if($hh['category']=="Web,Mobile & Software Dev"){ echo "selected='selected'";} ?> value="Web,Mobile & Software Dev">Web,Mobile & Software Dev</option>
          <option <?php if($hh['category']=="IT & Networking"){ echo "selected='selected'";} ?> value="IT & Networking">IT & Networking</option>
          <option <?php if($hh['category']=="Data Science & Analytics"){ echo "selected='selected'";} ?> value="Data Science & Analytics">Data Science & Analytics</option>
          <option <?php if($hh['category']=="Engineering & Architecture"){ echo "selected='selected'";} ?> value="Engineering & Architecture">Engineering & Architecture</option>
          <option <?php if($hh['category']=="Design & Creative"){ echo "selected='selected'";} ?> value="Design & Creative">Design & Creative</option>
          <option <?php if($hh['category']=="Writing"){ echo "selected='selected'";} ?> value="Writing">Writing</option>
          <option <?php if($hh['category']=="Translation"){ echo "selected='selected'";} ?> value="Translation">Translation</option>
          <option <?php if($hh['category']=="Legal"){ echo "selected='selected'";} ?> value="Legal">Legal</option>
          <option <?php if($hh['category']=="Admin Support"){ echo "selected='selected'";} ?> value="Admin Support">Admin Support</option>
          <option <?php if($hh['category']=="Customer Service"){ echo "selected='selected'";} ?> value="Customer Service">Customer Service</option>
          <option <?php if($hh['category']=="Sales & Marketing"){ echo "selected='selected'";} ?> value="Sales & Marketing">Sales & Marketing</option>
          <option <?php if($hh['category']=="Accounting & Consulting"){ echo "selected='selected'";} ?> value="Accounting & Consulting">Accounting & Consulting</option>
         </select>
         <span id="errcat" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Category is required.
        </span>
         </div>
<!--           <div class="form-group mdl">
         <select name="Select a catogory" id="proj_scat" class="form-control opt" >
         <option   value="Select a catogory">Select A Category</option>
         </select>

         </div> -->
         <div class="form-group mdl">
        <label class="head">Project URL (optional)</label>
        <input type="text" id="pr2" name="URL" class="form-control" value="{{$hh['projecturl']}}">
        <span id="err2" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field should be valid url.
        </span>
        </div>
        <div class="form-group mdl">
        <label class="head">Completion Date (optional)</label>
        <input type="date" id="proj_dat" name="Completion date" class="form-control" value="{{$hh['completiondate']}}">
        </div>
        <div class="form-group mdl">
        <label class="head">Skills (optional)</label>
        <input type="text" id="proj_sk" name="skills" placeholder="type here" class="form-control" value="{{$hh['skills']}}">
        </div>
       </div>
        </div>
      </div>
      <div class="modalfoot">
      <p> Make sure you have copyright permissions to any work you add to this project</p>
      <div class="footb" style="padding-bottom: 40px">
        <span style="float: left;"><button class="profsetbut" id="form_port" click="add_category()" data-dismiss="modal"  type="button" > Publish Project</button></span>
        <span style="float: left;padding-top: 10px">
        <a data-dismiss="modal" class="can" href="#">Cancel</a></span>
      </div>
    </div>
    </form>
  </div>
</div>
</div>


<div class="modal fade bckcolor" id="Certificates" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="certificatehide">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="otherexLabel"> Add </h4>
      </div>
      <div class="modal-body modalport">

       <div class="form-group mdl">
       <label class="head">Certification name</label>
        <input type="text" id="sub" name="cert" class="form-control" value="{{$a}}">
        <span id="errsub" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
         </div>
         <div class="form-group mdl">
       <label class="head">Provider</label>
        <input type="text" id="prov" name="cert" class="form-control" value="{{$b}}">
        <span id="errprov" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
         </div>
          <div class="form-group mdl descrip">
       <label class="head">Description </label>
        <textarea class="form-control textar" id="certdes" maxlength="5000" rows="9">{{$c}}</textarea>
        <span id="errcertdes" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
         </div>
         <div class="form-group mdl">
       <label class="head">Date Earned</label>
        <input type="date" id="d1" min='1899-01-01' max='2000-13-13' name="cert" class="form-control " value="{{$d}}">

         </div>
         </div>
         <div class="modalfoot" style="margin-bottom: 20px;">
       <div class="footb">

        <button class="profsetbut" id="certbut" data-dismiss="modal" type="button" value="submit"> Save</button>
        <!--<button class="empbut" type="submit" value="submit"> Save And Add More</button>-->
        <a data-dismiss="modal" style="float: left;margin-top: 10px;" class="can" href="#">Cancel</a>
      </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bckcolor" id="Employment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog custom-model-dialog" role="document">
    <div class="modal-content" id="employhide">
    <form id="add_employment">
    <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
    <input type="hidden" name="name" value="<?php echo $ses ?>" id="nam">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="EmploymentLabel"> Add Employment</h4>
      </div>
      <div class="modal-body modalport">

       <div class="form-group mdl">
       <label class="head">Company</label>
        <input type="text" id="pr3" name="company" class="form-control" value="{{$e['company']}}">
         <span id="err3" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
         </div>
     <div class="form-group mdl">
       <label class="head">Location</label>
       <div class="row">
       <div class="col-md-7">
          <input type="text" id="lo" name="Location" placeholder="city" class="form-control" value="{{$e['city']}}">
           <span id="errlo" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
          </div>
          <div class="col-md-4">
           <select name="Select Country" id="coun"  class="form-control opt">
          <option value="Select">Country</option>
          <option <?php if($e['location']=="Algeria"){ echo "selected='selected'";} ?> value="Algeria">Algeria</option>
          <option <?php if($e['location']=="America"){ echo "selected='selected'";} ?> value="America">America</option>
          <option <?php if($e['location']=="Australia"){ echo "selected='selected'";} ?> value="Australia">Australia</option>
          <option <?php if($e['location']=="Brazil"){ echo "selected='selected'";} ?> value="Brazil">Brazil</option>
          <option <?php if($e['location']=="Canada"){ echo "selected='selected'";} ?> value="Canada">Canada</option>
          </select>
        </div>
        </div>
      </div>
         <div class="form-group mdl">
       <label class="head">Title</label>
        <input type="text" id="tit" name="title" class="form-control" value="{{$e['title']}}">
         <span id="errtit" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
         </div>
         <div class="form-group mdl">
       <label class="head">Role</label>
       <div class="row">
       <div class="col-md-4">
         <select name="Select role" id="rol"  class="form-control opt">
          <option value="Select">Please select..</option>
          <option  <?php if($e['role']=="Intern"){ echo "selected='selected'";} ?> value="Intern">Intern</option>
          <option <?php if($e['role']=="Individual Contributor"){ echo "selected='selected'";} ?> value="Individual Contributor">Individual Contributor</option>
          <option <?php if($e['role']=="Lead"){ echo "selected='selected'";} ?> value="Lead">Lead</option>
          <option <?php if($e['role']=="Manager"){ echo "selected='selected'";} ?> value="Manager">Manager</option>
          <option <?php if($e['role']=="Executive"){ echo "selected='selected'";} ?> value="Executive">Executive</option>
          <option <?php if($e['role']=="Owner"){ echo "selected='selected'";} ?> value="Owner">Owner</option>
          </select>
        </div>
        </div>
        </div>
    <div class="form-group ">
         <label class="head">Period</label>
         <div class="row">
         <div class="col-md-6">
           <select name="Select period" id="from_mnth"  class="form-control opt">
              <option value="Select">Month</option>
              <option <?php if($e['startmonth']=="01"){ echo "selected='selected'";} ?> label="January" value="01">January</option>
              <option <?php if($e['startmonth']=="02"){ echo "selected='selected'";} ?> label="February" value="02">February</option>
              <option <?php if($e['startmonth']=="03"){ echo "selected='selected'";} ?> label="March" value="03">March</option>
              <option <?php if($e['startmonth']=="04"){ echo "selected='selected'";} ?> label="April" value="04">April</option>
              <option <?php if($e['startmonth']=="05"){ echo "selected='selected'";} ?> label="May" value="05">May</option>
              <option <?php if($e['startmonth']=="06"){ echo "selected='selected'";} ?> label="June" value="06">June</option>
              <option <?php if($e['startmonth']=="07"){ echo "selected='selected'";} ?> label="July" value="07">July</option>
              <option <?php if($e['startmonth']=="08"){ echo "selected='selected'";} ?> label="August" value="08">August</option>
              <option <?php if($e['startmonth']=="09"){ echo "selected='selected'";} ?> label="September" value="09">September</option>
              <option <?php if($e['startmonth']=="10"){ echo "selected='selected'";} ?> label="October" value="10">October</option>
              <option <?php if($e['startmonth']=="11"){ echo "selected='selected'";} ?> label="November" value="11">November</option>
              <option <?php if($e['startmonth']=="12"){ echo "selected='selected'";} ?> label="December" value="12">December</option>
          </select>
        </div>
        <div class="col-md-6">
           <select name="to_per" id="from_year"  class="form-control opt">
          <option value="Select">Year</option>
          <?php
          for ($i=2017; $i > 1940 ; $i--) { 
            if($e['startyear']==$i){
              echo '<option selected="selected" label="'.$i.'" value="'.$i.'">'.$i.'</option>';
            }
            else{
              echo '<option label="'.$i.'" value="'.$i.'">'.$i.'</option>';
            }
          }
          ?>
          </select>
        </div>
        </div>
        </div>
        <div class="text-center">
        <h> through </h>
        </div>
        <div class="thro">
         <div class="row">
         <div class="col-md-6">
           <select name="Select period" id="to_mnth"  class="form-control opt">
              <option value="Select">Month</option>
              <option <?php if($e['endmonth']=="01"){ echo "selected='selected'"; } ?> label="January" value="01">January</option>
              <option <?php if($e['endmonth']=="02"){ echo "selected='selected'"; } ?> label="February" value="02">February</option>
              <option <?php if($e['endmonth']=="03"){ echo "selected='selected'"; } ?> label="March" value="03">March</option>
              <option <?php if($e['endmonth']=="04"){ echo "selected='selected'"; } ?> label="April" value="04">April</option>
              <option <?php if($e['endmonth']=="05"){ echo "selected='selected'"; } ?> label="May" value="05">May</option>
              <option <?php if($e['endmonth']=="06"){ echo "selected='selected'"; } ?> label="June" value="06">June</option>
              <option <?php if($e['endmonth']=="07"){ echo "selected='selected'"; } ?> label="July" value="07">July</option>
              <option <?php if($e['endmonth']=="08"){ echo "selected='selected'"; } ?> label="August" value="08">August</option>
              <option <?php if($e['endmonth']=="09"){ echo "selected='selected'"; } ?> label="September" value="09">September</option>
              <option <?php if($e['endmonth']=="10"){ echo "selected='selected'"; } ?> label="October" value="10">October</option>
              <option <?php if($e['endmonth']=="11"){ echo "selected='selected'"; } ?> label="November" value="11">November</option>
              <option <?php if($e['endmonth']=="12"){ echo "selected='selected'"; } ?> label="December" value="12">December</option>
          </select>
        </div>
        <div class="col-md-6">
           <select name="Select period" id="to_yr"  class="form-control opt">
                <option value="Select">Year</option>
               <?php
          for ($i=2017; $i > 1940 ; $i--) { 
            if($e['endyear']==$i){
              echo '<option selected="selected" label="'.$i.'" value="'.$i.'">'.$i.'</option>';
            }
            else{
              echo '<option label="'.$i.'" value="'.$i.'">'.$i.'</option>';
            }
          }
          ?>
          </select>
        </div>
        </div>
        </div>
        <!-- <input type="checkbox"  name="checkbox"> I currently work here -->
        <div class="form-group mdl descrip">
       <label class="head">Description (optional)</label>
        <textarea class="form-control textar" id="e_desc" maxlength="1000" rows="5">{{$e['description']}}</textarea>
         </div>

      </div>
      <div class="modalfoot" style="margin-bottom: 20px;">
       <div class="footb">
        <button class="profsetbut" id="empform"  data-dismiss="modal"  type="button" value="submit"> Save</button>
        <!-- <button class="empbut" type="submit" value="submit"> Save And Add More</button> -->
        <a data-dismiss="modal" style="float: left;margin-top: 10px;" class="can" href="#">Cancel</a>
      </div>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade bckcolor" id="Education" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog custom-model-dialog" role="document">
    <div class="modal-content" id="eduhide">
    <form id="add_education">
    <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
    <input type="hidden" name="name" value="<?php echo $ses ?>" id="nam">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="EducationLabel"> Add Education</h4>
      </div>
      <div class="modal-body modalport">

       <div class="form-group mdl">
       <label class="head">School</label>
        <input type="text" id="scool" name="school" class="form-control" value="{{$n}}">
        <span id="errscool" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
         </div>
     <div class="form-group mdl">
       <label class="head">Days Attended</label>
       <div class="row">
       <div class="col-md-6">
           <select name="Select from" id="sc_from"  class="form-control opt">
            <option value="From">From</option>
            <?php 
            for ($i=2017; $i > 1940 ; $i--) { 
              if($i==$o){
                echo '<option label="'.$i.'" value="'.$i.'" selected="selected">'.$i.'</option>';
              }
            else{
             echo '<option label="'.$i.'" value="'.$i.'">'.$i.'</option>';
            }
            }
            ?>
            </select>
          <span id="frm_scool" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
        </div>
          <div class="col-md-6">
           <select name="Select year" id="sc_to"  class="form-control opt">
             <option value="To (Or Expected Graduation Year)">To (Or Expected Graduation Year)</option>
            <?php 
            for ($i=2024; $i > 1940 ; $i--) { 
              if($i==$p){
                echo '<option label="'.$i.'" value="'.$i.'" selected="selected">'.$i.'</option>';
              }
            else{
             echo '<option label="'.$i.'" value="'.$i.'">'.$i.'</option>';
            }
            }
            ?>
            </select>
          <span id="to_scool" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
        </div>
        </div>
      </div>
         <div class="form-group mdl">
       <label class="head">Degree</label>
        <input type="text" name="degree" id="deg_name" class="form-control" value="{{$s}}">
        <span id="degree_error" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
         </div>
         <div class="form-group mdl">
       <label class="head">Area of Study(optional)</label>
        <input type="text" name="area of study" id="area_study" class="form-control" value="{{$r}}">
         </div>

        <!-- <div class="form-group mdl descrip">
       <label class="head">Description (optional)</label>
        <textarea class="form-control textar" id="sc_desc" maxlength="1000" rows="5"></textarea>
         </div> -->

      </div>
      <div class="modalfoot" style="margin-bottom: 20px;">
       <div class="footb">
        <button class="profsetbut" data-dismiss="modal" id="add_edu_btn" type="submit" value="submit"> Save</button>
        <!-- <button class="empbut" value="submit"> Save And Add More</button> -->
        <a data-dismiss="modal" style="float: left;margin-top: 10px;" class="can" href="#">Cancel</a>
      </div>
      </div>
      </form>
    </div>
  </div>
</div>



<div class="modal fade bckcolor" id="editname" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modaldialog modvid custom-model-dialog" role="document">
    <div class="modal-content" id="freelancerhide">
    <form>
            <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php echo $ses ?>" id="nam">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="otherexLabel"> Edit Name & Job Title</h4>
      </div>
      <div class="modal-body modalport">

       <div class="form-group mdl">
       <label class="head">Display Name</label><br>
         <input type="radio" name="full name" value="name" checked> Show my full name (e.g.john Smith)<br>
         <input type="radio" name="full name" value="name"> Show only my first name and last initial (e.g.John S.)<br>
         </div>
          <div class="form-group mdl">
       <label class="head">Job Title </label>
       <div class="row">
       <div class="col-md-8">
       <input type="text" id="job" name="jobtitle" class="form-control" placeholder="EXAMPLE:Desktop C# Developer" value="{{$free['jobtitle']}}">
        <span id="errjob" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
        </div>
        </div>
         </div>
         </div>
         <div class="modalfoot">
       <div class="footb" style="padding-bottom: 40px">
        <span style="float: left;"><button class="profsetbut" id="tite" type="button" value="submit"> Save</button></span>
        <span style="float: left;padding-top: 10px" >
        <a data-dismiss="modal" class="can" href="#">Cancel</a>
      </span>
      </div>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade bckcolor" id="rate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modaldialog custom-model-dialog" role="document">
    <div class="modal-content" id="hourlyratehide">
    <form>
        <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php echo $ses ?>" id="nam">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="otherexLabel"> Change Hourly Rate</h4>
      </div>
      <div class="modal-body modalport">
      <p class="rate">Please note that your new hourly rate will only apply to new contracts. </p>
      <div class="row">
      <div class="col-md-6">
      <label class="head hourly">Hourly Rate</label>
      <p class="descri">This is the amount the client will see</p>
       </div>
       <script type="text/javascript">
         function sub() {
            f=$("#hr_rate").val();
            if(f>0){
          a=parseInt($("#hr_rate").val()) * (80/100);
          $("#you_receive").val(a.toFixed(2));
          $("#you_receive").val(a.toFixed(2));
          // $("#receive_val").val(Number($("#bit_val").val()) -30.00 );
          }
        }
       </script>
       <div class="col-md-6 disp">
       <span class="glyphicon glyphicon-usd dollar float-left" aria-hidden="true" style="float: left;padding-top: 6px"></span><span><input type="text" onkeyup="sub()" value="{{ $hour }}" name="amount" id="hr_rate"  class="form-control amount float-left"  style="float: left;margin-left: 10px;"></span><span class="float-left"  style="float: left;padding-top: 10px;font-weight: 500;padding-left: 11px">/hr</span>
       </div>
       </div>
       <hr class="rate-hr">
       

       </div>
       
         <div class="modalfoot">
       <div class="footb" style="padding-bottom: 40px"> 
       <span style="float: left;"> <button class="profsetbut" onclick="getrate()"  type="button" value="submit"> Save</button></span>
       <span style="float: left;padding-top: 10px">
        <a data-dismiss="modal" class="can" href="#">Cancel</a></span>
      </div>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade bckcolor" id="myskills" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modaldialog modskill custom-model-dialog" role="document">
    <div class="modal-content" id="skillshide">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="otherexLabel"> My Skills</h4>
      </div>
      <div class="modal-body modalport">

       <div class="form-group ">
       <label class="head">Enter skills</label>
        <input type="text"  name="skills" id="skill" class="form-control" value="{{ $free['skills'] }}">
        <!-- <div class="chip">
          John Doe
          <span class="closebtn" onclick="this.parentElement.style.display='none'">&times;</span>
          </div> -->
         </div>
          <!-- <p class="rate">Add up to 10 skills. Reorder your skills by dragging tags to a new position. Remove skills by deleting tags.</p> -->
         </div>
         <div class="modalfoot">
         <div  style="padding-bottom: 40px">
         <span style="float: left;">
        <button class="profsetbut" onclick="getSkills()"  type="button" value="submit"> Save</button></span>
        <span style="float: left;padding-top: 10px">
        <a data-dismiss="modal" class="can" href="#">Cancel</a></span>
     </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bckcolor" id="video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modaldialog modvid custom-model-dialog" role="document">
  <div class="modaldialog modvid" role="document">
  <form>
          <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php echo $ses ?>" id="nam">
    <div class="modal-content">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="otherexLabel"> Add Video</h4>
      </div>
      <div class="modal-body modalport">

       <div class="form-group mdl">
       <label class="head">Pase the link of your Youtube video here</label>
        <input type="text"  name="link" id="vd_link" class="form-control">
        <p class="vid"><a href="#">Does your video meet rbs's guidelines?</a></p>
         </div>

          <div class="form-group mdl">
          <select name="Select type" id="vd_ty"  class="form-control opt">
          <option value="what type of video is this">-What Type OF Video Is This</option>
          <option value="me talking about my skills and experience">Me Talking About My Skills And Experience</option>
          <option value="visual samples of my work">Visual Samples Of My Work </option>
          <option value="somethimg else">Something Else</option>
          </select>
         </div>
         </div>
         <div class="modalfoot">
        <button class="profsetbut"  type="button" id="vid" onclick="getvid()" value="submit"> Save</button>
        <a data-dismiss="modal" class="can" href="#">Cancel</a>
      </div>
    </div>
    </form>
  </div>
</div>
</div>

<div class="modal fade bckcolor" id="oview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modaldialog custom-model-dialog" role="document">
    <div class="modal-content" id="hideover">
    <form>
        <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php echo $ses ?>" id="nam">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="otherexLabel"> Overview</h4>
      </div>
      <div class="modal-body modalport">
      <p class="rate">Use this space to show clients you have the skills and experience they're looking for.</p>
      <ul class="dotli rate">
      <li><p>Describe your strengths and skills</p></li>
      <li><p>Highlight projects, accomplishments and education</p></li>
      <!--<li><p>Keep it short and make sure error-free <a class="pull-right" href="#">Learn more</a></p></li>-->
      </ul>

       <div class="form-group mdl">
       <textarea class="form-control textar" id="overv" maxlength="5000" rows="9" id="comment">{{$over}}</textarea>
       <span id="erroverv" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
        <span id="erroverv1" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Too short . An effective overview needs to be at least 100 characters.
        </span>
       </div>

         </div>
         <div class="modalfoot">
        <button class="profsetbut" type="button" id="ove" value="submit"> Save</button>
        <a data-dismiss="modal" class="can" style="float:left;margin-top:10px; "href="#">Cancel</a>
      </div>
      <br><br>
      </form>
    </div>
  </div>
</div>



<div class="modal fade bckcolor" id="playvideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="video">
    <div class="modal-content">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="otherexLabel"> Video</h4>
      </div>
      <div class="modal-body modalvid">
      <video width="550" height="335" controls>
      <source src="">
       </video>
         </div>
    </div>
  </div>
</div>


<div class="modal fade bckcolor" id="thumbnail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="otherexLabel"> Project thumbnail</h4>
      </div>
      <div class="modal-body modalport">
              <div class="slctthumb"><p>Select one file:</p>
                   <form id="form1" runat="server">
                    <input type='file' class="imaage" id="imgInp" />
                    <img id="blah" class="imaage" src="#" alt="your image" height="300" width="500" />
                      </form>
                 </div>

                  <button class="profsetbut" type="submit">Save</button>
                  <a data-dismiss="modal" class="can" href="#">Cancel</a>

         </div>

    </div>
  </div>
</div>

<div class="modal fade bckcolor" id="dp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog custom-model-dialog" role="document">
    <div class="modal-content">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="otherexLabel">Edit Portrait</h4>
      </div>
      <div class="modal-body modaldpbdy">
        <form enctype ="multipart/form-data" action="{{URL('/')}}/fileupload" method="post">
        <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="dp2" value="@{{myCroppedImage}}">
             <div class="row">
                  <div class="col-md-7 ">
                      <div class="cropArea">
                        <img-crop image="myImage" result-image="myCroppedImage"></img-crop>
                      </div>
                      
                       <div><p class="slctimg"> Select an image file: </p><input type="file" name="dp" id="fileInput" accept="image/*" /></div>
              </div>

                <div class="col-md-5 imgfl">
                  <div><p class="imgtit">Your profile portrait</p></div>
                  <div class="cropimg"><img ng-src="@{{myCroppedImage}}" class="img-circle circleimg text-center" height="100" width="100" /></div>
                  <p class="imgcont">Must be an actual picture of you! Logos, clip-art, group pictures, and digitally-altered images not allowed.</p>

                 <div class="imgbut ">
                  <button class="imgsetbut" type="submit">Save</button>
                  <a data-dismiss="modal" class="imgcan" href="#">Cancel</a>
                  </div>
                  </div>
                  </div>
                  </form>
                </div>
         </div>

    </div>
  </div>


<div class="modal fade bckcolor" id="otherex" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog custom-model-dialog" role="document">
    <div class="modal-content" id="exphide">
    <form>
    <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
    <input type="hidden" name="name" value="<?php echo $ses ?>" id="nam">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="otherexLabel"> Add Other Experiences</h4>
      </div>
      <div class="modal-body modalport">

       <div class="form-group mdl">
       <label class="head">Subject</label>
        <input type="text" id="subject" name="company" class="form-control" value="<?php print $sub ?>">
        <span id="errsub" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
         </div>
          <div class="form-group mdl descrip">
       <label class="head">Description </label>
        <textarea class="form-control textar" id="des" maxlength="4000" rows="10"><?php print $des ?></textarea>
        <span id="errdes" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
         </div>
         </div>
         <div class="modalfoot" style="margin-bottom: 20px;">
       <div class="footb">
        <button class="profsetbut" id="otherex1" data-dismiss="modal" type="submit" value="submit"> Save</button>
        <!-- <button class="empbut" type="submit" value="submit"> Save And Add More</button> -->
        <a data-dismiss="modal" style="float: left;margin-top: 10px;" class="can" href="#">Cancel</a>
      </div>
      </div>
      </form>
    
  </div>
</div>
</div>


<div class="modal fade bckcolor" id="otherexs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog custom-model-dialog" role="document">
    <div class="modal-content">
    <form>
    <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
    <input type="hidden" name="name" value="<?php echo $ses ?>" id="nam">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="otherexLabel"> Add Other Experiences</h4>
      </div>
      <div class="modal-body modalport">

       <div class="form-group mdl">
       <label class="head">Subject</label>
        <input type="text" id="subject" name="company" class="form-control">
        <span id="errsub" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
         </div>
          <div class="form-group mdl descrip">
       <label class="head">Description </label>
        <textarea class="form-control textar" id="des" maxlength="4000" rows="10"></textarea>
        <span id="errdes" class="hide eror">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
         </div>
         </div>
         <div class="modalfoot">
       <div class="footb">
        <button class="profsetbut" id="otherex1" data-dismiss="modal" type="submit" value="submit"> Save</button>
        <button class="empbut" type="submit" value="submit"> Save And Add More</button>
        <a data-dismiss="modal" class="can" href="#">Cancel</a>
      </div>
      </div>
      </form>
    
  </div>
</div>
</div>




<div class="modal fade bckcolor" id="Availability" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="otherexLabel"> Change Availability</h4>
      </div>
      <div class="modal-body modalport">
              <div class="row">
              <div class="col-md-5">
              <p class="availcont">Are you available to take on new work? Knowing when you are available helps Upwork find the right jobs for you.</p>
              <a class="availhref" href="#">How do we use this info</a>

              </div>
              <div class="col-md-7">
              <p class="availcont">i am currently</p>
              <button class="avbut">Available</button>
              <button class="avbut"> Not Available</button>
              <div class="raddiv">
              <input type="radio" class="radcont" name=""><p>More than 30 hrs/ Weeks</p> <br>
              <input type="radio" class="radcont" name=""><p>Less than 30 hrs/ Weeks </p><br>
              <input type="radio" class="radcont" name=""><p>As Needed - Open to Offers </p><br>

              </div>


              </div>
              </div>
                  <button class="profsetbut" type="submit">Save</button>
                  <a data-dismiss="modal" class="can" href="#">Cancel</a>

         </div>

    </div>
  </div>
</div>
<script type="text/javascript">
  var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("d1").setAttribute("max", today);
</script>

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
