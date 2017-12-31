@extends('layouts.master')
@section('title', 'my profile')
@section('header')

<style>
.active{background-color: #4CAF50;}

.button {
    background-color: white;
    border: 1px solid #A9A5A4 !important;
    color:  #A9A5A4;
        cursor: pointer;
    height: 25px;
    width:150px;

}

.fpagecont ul li a {
    font-family: "Gotham";
    font-weight: normal !important;
    font-size: 12px;
    line-height: 20px !important;
    color: #494949;
    text-transform: uppercase;
    padding-top: 25px!important;
}
.dropdown-menu
{
  line-height: 10px!important;
  width: 338px!important;
  margin-top: -14px!important;
  border: 0px;
  height: 217px!important;
}
.dropdown-menu:after, .dropdown-menu:before {
	bottom: 97%;
	left: 16%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}

.dropdown-menu:after {
	border-color: rgba(136, 183, 213, 0);
	border-bottom-color: #fff;
	border-width: 11px;
	margin-left: -9px;
}
.dropdown-menu:before {
	border-color: rgba(194, 225, 245, 0);
	border-bottom-color: #e0e0e0;
	border-width: 16px;
	margin-left: -14px;
}

.livalue
{
  padding-top: 13px!important;
  padding-left: 15px!important;
  padding-right: 13px!important;
  padding-bottom: 13px!important;
  font-family: "Gotham";
    font-weight: normal !important;
    font-size: 12px;
    color:  #A9A5A4;
     border:1px solid #A9A5A4;
    border-bottom: 1px solid white;



}
.livalue2
{
  padding-top: 13px!important;
  padding-bottom: 13px!important;
  padding-left: 14px!important;
  font-family: "Gotham";
    font-weight: normal !important;
    font-size: 14px;
    color:  #A9A5A4;
     border:1px solid #A9A5A4;
     border-bottom: 1px solid white;
}


.livalue2:hover
{
  color:#37a000;
  border: 2px solid #37a000;
}
.menu1
{
width: 200px!important;
height: 250px!important;
top:71px;
}
.menuli
{
  padding-top: 15px!important;
  padding-bottom: 15px!important;
  padding-left: 15px!important;
  font-family: "Gotham";
    font-weight: normal !important;
    font-size: 14px;
    color:  #A9A5A4;
    border:1px solid #A9A5A4;
    border-bottom: 1px solid white;
}
.arrow-white {
        border-bottom: 10px solid #fff;
        margin-top: 1px
    }
.menuli:hover
{
  color:#37a000;
  border: 2px solid #37a000;
}

.button:hover
{
  color:#37a000;
  border: 2px solid #37a000!important;
}

.dropdown:hover .menu1{
    display: block;
}
.online
{
  background-color: #37a000;
  color:white;
}
</style>
<header class="navheader">

   <div class="container fpagecont">

     <ul class="nav navbar-nav navbar-left ">
        <a class="logo" href="{{url('/')}}">
             <img class="img-responsive" src="{{ URL::asset('public/images/upwork-logo.svg')}}" />
            </a>

          <li class="dropdown" style="line-height: 30px!important">
          <a href="#"  class="dropdown-toggle" data-trigger="hover" data-toggle="dropdown">FIND WORK </a>
     <ul class="dropdown-menu menu1" >
                <li class="menuli"  style="border-left:4px solid  #37a000;">Find Works</li>
                <li class="menuli">Saved Joobs</li>
                <li class="menuli">Proposal</li>
                <li class="menuli">Profile</li>
                <li class="menuli">My Stats</li>
                <li class="menuli">Tests</li>
              </ul>
               </li>

               </ul>


     <ul class="nav navbar-nav navbar-right ">
          <li><div class="osearch"><i class="icon1 fa fa-search" aria-hidden="true"></i><i class="icon2 fa fa-angle-down" aria-hidden="true"></i>
            <input type ="text" placeholder="Find Job" ></div></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" title="Adithya Nj" aria-haspopup="true">
              <img src="https://odesk-prod-portraits.s3.amazonaws.com/Users:adithyanj:PortraitUrl?AWSAccessKeyId=1XVAX3FNQZAFC9GJCFR2&amp;Expires=2147483647&amp;Signature=UMJx0TDlBH0di%2BU%2FJf4xMB80XZ4%3D&amp;1482228375785481" class="avatar avatar-xs">
              <span class="organization-selector">Adithya Nj</span><span data-ng-show="unreadIndicator" class="badge badge-circle ng-hide"></span><span><i class="namesection fa fa-angle-down" aria-hidden="true"></i></span></a>
              <ul class="dropdown-menu">
                <li class="livalue">
                <button class="button" id="online">Online</button><button class="button" id="Offline">Offline</button>
              </li>
                <li class="livalue2" style="border-left:4px solid  #37a000;">
              <img src="https://odesk-prod-portraits.s3.amazonaws.com/Users:adithyanj:PortraitUrl?AWSAccessKeyId=1XVAX3FNQZAFC9GJCFR2&amp;Expires=2147483647&amp;Signature=UMJx0TDlBH0di%2BU%2FJf4xMB80XZ4%3D&amp;1482228375785481" class="avatar avatar-xs" style="margin-top: 10px;margin-right: 15px">
              <span style="margin-top: 15px;color:green;margin-right: 20px">Adithya Nj</span><span data-ng-show="unreadIndicator" class="badge badge-circle ng-hide"></span>
              <div style="margin-left:50px!important">Freelancers</div>
              </li>
                <li class="livalue2"><i class="fa fa-cog" aria-hidden="true"></i> Settings</li>
                <li class="livalue2"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</li>


              </ul>

              </li>
            </li>
     </ul>
</div>
</header>
@endsection

@section('body')
<div class="profile">
<div class="container fpagecont">
  <div class = "subcontainer">

    <div class="alert alert-danger borbox" role="alert">
      <span class=""><i class="alert-icons fa fa-exclamation" aria-hidden="true"></i><span>
        <p>We’ve reviewed your profile and currently our marketplace doesn’t have opportunities for your area of expertise.
        <br><br>
    If you have more relevant skills or experience to add, you can update and re-submit your profile. You can find more information regarding our decision <a href="#">here</a>.</p>

     <button class="cbtn cbtn-default " >Resubmit profile</button>
    </div>
</div>

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
				<img src="public/images/tech1.jpg" width="100" height="100" class="img-circle">
			</div>
			<div class="col-md-7 ">
			 	<span class="holder"> Adithya Nj</span> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
			 </div>
			 <div class="col-md-3">
			 	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
			 	<span class="namespec"> $15.00 </span> <span class="spec">/hr </span>
			 </div>
			 <br class="hidden-xs">
			<div class="col-md-7">
				 <h4><span class="captn">Full stack web and mobile developer</span></h4>
			 <div></div>
			 	<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><span class> <h>madurai,India	-local time </h></span>
			 <div class="laabel">
			 	<p><span class="label label-default">AngularJS</span>
			 	<span class="label label-default">Ionic Framework</span>
				 <span class="label label-default">HTML5</span>
				 <span class="label label-default">psd to html</span>
			 	<span class="label label-default">CSS</span></p>
			 </div>
			<a href="#">more <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a>
		  </div>
		</div>
		 <div class="hr text-center">
			 <hr>
			 <span class="glyphicon glyphicon-play-circle"><h> Place video </h></span>
			 <hr>
		</div>
			<div class="overview ">
			  <h2>Overview</h2>
			</div>
			<div class="overcont">
			   <p>I am web and mobile application developer  with 2+ years experiance.my activity involves in analyzing the requirements,building the prototype,developing the UI and backend for the application.</p>
			</div>
		</div>
		  <br class="hidden-xs">

		<div class="card profcont">

		  <span class="port"><h2>Portfolio  <span ><button type="button" class="btn btn-primary btn-lg"  data-toggle="modal" data-target="#myModal"></h2></span></span>
		    <p>No items to display.</p>
		</div>


		 <div class="card profcont">
			<span class="port"> <h2>Certifications <span ><button type="button" class="btn btn-primary btn-lg"  data-toggle="modal" data-target="#Certificates"></h2></span></span>
			 <p>No items to display.</p>
		</div>


		<div class="card profcont">
			<span class="port"> <h2>Employment History <span ><button type="button" class="btn btn-primary btn-lg"  data-toggle="modal" data-target="#Employment"></h2></span></span>
			 <p>No items to display.</p>
		</div>

		<div class="card profcont">
			<span class="port"> <h2>Education <span ><button type="button" class="btn btn-primary btn-lg"  data-toggle="modal" data-target="#Education"></h2></span></span>
			 <p>No items to display.</p>
		</div>

		<div class="card profcont">
		 	<span class="port"><h2>Other Experiences  <span ><button type="button" class="btn btn-primary btn-lg"  data-toggle="modal" data-target="#otherex"></h2></span></span>
		 	<p>No items to display.</p>
		</div>
    </div>

    	<div class="col-md-3 profileset">
    		<button class="profsetbut" type="button"> Profile Settings</button>
      	<div class="viewcap">
      		<a href="#">View my profile as others see it</a>
      	</div>
    		<hr class="viewhr">
    		<h5 class="avail">Availability</h5>
    	<div class="viewp">
    		<p>Available </p>
    		<p>More than 30 hrs/week</p>
    		<p>Response time</p>
    	</div>
    	<h5 class="avail">Profile Link</h5>

    	<form><input name="disabled" value="http://www.upwork.com" disabled> </form>
    	<div class="viewcap">
    		<a href="#">copy link</a>
    	</div>
    	<div class="lang">
    		<h5> Languages</h5>
    		<h>English: Conversational</h>
    	</div>
    	</div>
</div>
</div>

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Project</h4>
      </div>
      <div class="modal-body modalport">
        <div class="row ">
        <div class="col-md-6">
        <div class="form-group mdl">
        <label class="head">Project Title</label>
        <input type="text" name="project title" class="form-control">
        </div>
        <div class="form-group mdl">
        <label class="head">Project Overview</label>
        <textarea class="form-control textar" maxlength="4000" rows="9" id="comment"></textarea>
        </div>
        <div class="form-group mdl">
        <label class="head">Thumbnail Image</label>
        <div class="upbox">
        <p>drag or <a href="#">upload</a> project thumbnail</p>
        </div>
        </div>
         <div class="form-group mdl">
        <label class="head">Project Files</label>
        <div class="upbox">
        <p>drag or <a href="#">upload</a> project files</p>
        </div>
        </div>
        </div>
       <div class="col-md-6">
       <div class="form-group mdl">
       	 <label class="head">Was this project done on Upwork</label>
       	 <select name="Select A Contract" class="form-control">
       	 	<option value="Select a contract">Select a contract</option>
       	 </select>
       	 </div>
       	 <div class="form-group mdl">
       	 <label class="head">Category</label>
       	 <select name="Select a catogory" class="form-control">
       	 	<option value="Select a catogory">Select A Category</option>
       	 	<option value="Select a catogory">Web,Mobile & Software Dev</option>
       	 	<option value="Select a catogory">IT & Networking</option>
       	 	<option value="Select a catogory">Data Science & Analytics</option>
       	 	<option value="Select a catogory">Engineering & Architecture</option>
       	 	<option value="Select a catogory">Design & Creative</option>
       	 	<option value="Select a catogory">Writing</option>
       	 	<option value="Select a catogory">Translation</option>
       	 	<option value="Select a catogory">Legal</option>
       	 	<option value="Select a catogory">Admin Support</option>
       	 	<option value="Select a catogory">Customer Service</option>
       	 	<option value="Select a catogory">Sales & Marketing</option>
       	 	<option value="Select a catogory">Accounting & Consulting</option>
       	 </select>
       	 </div>
       	 <div class="form-group mdl">
       	 <select name="Select a catogory" class="form-control" >
       	 <option value="Select a catogory">Select A Category</option>
       	 </select>
       	 </div>
       	 <div class="form-group mdl">
        <label class="head">Project URL (optional)</label>
        <input type="text" name="project URL" class="form-control">
        </div>
        <div class="form-group mdl">
        <label class="head">Completion Date (optional)</label>
        <input type="date" name="Completion date" class="form-control">
        </div>
        <div class="form-group mdl">
        <label class="head">Skills (optional)</label>
        <input type="text" name="skills" placeholder="type here" class="form-control">
        </div>
       </div>
        </div>
      </div>
      <div class="modalfoot">
      <p> Make sure you have copyright permissions to any work you add to this project</p>
      <div class="footb">
      	<button class="profsetbut" type="button"> Publish Project</button>
        <a data-dismiss="modal" href="#">Cancel</a>
      </div>
    </div>
  </div>
</div>
</div>


<div class="modal fade" id="Certificates" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="certificatesLabel"> AddCertification</h4>
      </div>
      <div class="modal-body modalport">
       <div class="form-group mdl">

       	 <select name="Select Certifications" class="form-control">
       	 	<option value="Select a">Select Your Certifications</option>
       	 </select>
       	 </div>
      </div>
      <div class="modalfoot">
       <div class="footb">
      	<button class="profsetbut" type="button"> Add Certification</button>
        <a data-dismiss="modal" href="#">Cancel</a>
      </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Employment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="EmploymentLabel"> Add Employment</h4>
      </div>
      <div class="modal-body modalport">
       <div class="form-group mdl">
       <label class="head">company</label>
       	<input type="text" name="company" class="form-control">
       	 </div>
     <div class="form-group mdl">
       <label class="head">Location</label>
       <div class="row">
       <div class="col-md-7">
	       	<input type="text" name="Location" placeholder="city" class="form-control">
	       	</div>
       		<div class="col-md-4">
       		 <select name="Select Country"  class="form-control">
       	 	<option value="Select">Country</option>
       	 	</select>
       	</div>
       	</div>
      </div>
       	 <div class="form-group mdl">
       <label class="head">Title</label>
       	<input type="text" name="title" class="form-control">
       	 </div>
       	 <div class="form-group mdl">
       <label class="head">Role</label>
       <div class="row">
       <div class="col-md-4">
	       <select name="Select role"  class="form-control">
       	 	<option value="Select">Please select..</option>
       	 	</select>
       	</div>
       	</div>
       	</div>
		<div class="form-group ">
	       <label class="head">Period</label>
	       <div class="row">
	       <div class="col-md-6">
		       <select name="Select period"  class="form-control">
       	 	<option value="Select">Month</option>
       	 	</select>
       	</div>
       	<div class="col-md-6">
		       <select name="Select period"  class="form-control">
       	 	<option value="Select">Year</option>
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
		       <select name="Select period"  class="form-control">
       	 	<option value="Select">Month</option>
       	 	</select>
       	</div>
       	<div class="col-md-6">
		       <select name="Select period"  class="form-control">
       	 	<option value="Select">Year</option>
       	 	</select>
       	</div>
       	</div>
       	</div>
       	<input type="checkbox"  name="checkbox"> I currently work here
       	<div class="form-group mdl descrip">
       <label class="head">Description (optional)</label>
       	<textarea class="form-control textar" maxlength="1000" rows="5"></textarea>
       	 </div>
      </div>
      <div class="modalfoot">
       <div class="footb">
      	<button class="profsetbut" type="button"> Save</button>
      	<button class="empbut" type="button"> Save And Add More</button>
        <a data-dismiss="modal" class="can" href="#">Cancel</a>
      </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Education" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="EducationLabel"> Add Education</h4>
      </div>
      <div class="modal-body modalport">
       <div class="form-group mdl">
       <label class="head">School</label>
       	<input type="text" name="company" class="form-control">
       	 </div>
     <div class="form-group mdl">
       <label class="head">Days Attended</label>
       <div class="row">
       <div class="col-md-6">
       		<select name="Select from"  class="form-control">
       	 	<option value="Select">From</option>
       	 	</select>
	      </div>
       		<div class="col-md-6">
       		 <select name="Select year"  class="form-control">
       	 	<option value="Select">To (Or Expected Graduation Year)</option>
       	 	</select>
       	</div>
       	</div>
      </div>
       	 <div class="form-group mdl">
       <label class="head">Degree</label>
       	<input type="text" name="degree" class="form-control">
       	 </div>
       	 <div class="form-group mdl">
       <label class="head">Area of Study(optional)</label>
       	<input type="text" name="area of study" class="form-control">
       	 </div>

       	<div class="form-group mdl descrip">
       <label class="head">Description (optional)</label>
       	<textarea class="form-control textar" maxlength="1000" rows="5"></textarea>
       	 </div>

      </div>
      <div class="modalfoot">
       <div class="footb">
      	<button class="profsetbut" type="button"> Save</button>
      	<button class="empbut" type="button"> Save And Add More</button>
        <a data-dismiss="modal" class="can" href="#">Cancel</a>
      </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="otherex" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="otherexLabel"> Add Other Experiences</h4>
      </div>
      <div class="modal-body modalport">
       <div class="form-group mdl">
       <label class="head">Subject</label>
       	<input type="text" name="company" class="form-control">
       	 </div>
       	 	<div class="form-group mdl descrip">
       <label class="head">Description (optional)</label>
       	<textarea class="form-control textar" maxlength="4000" rows="10"></textarea>
       	 </div>
       	 </div>
       	 <div class="modalfoot">
       <div class="footb">
      	<button class="profsetbut" type="button"> Save</button>
      	<button class="empbut" type="button"> Save And Add More</button>
        <a data-dismiss="modal" class="can" href="#">Cancel</a>
      </div>
      </div>
    </div>
  </div>
</div>


@endsection
@section('footer')
<div class="freefoot">
 <div class="container">
 <div class="row">
   <div class="col-md-3">
     <ul class="text short content list">
     <li><h class="freefootelmnt">About Us </h></li>
     <li><h class="freefootelmnt">Blog </h></li>
     <li><h class="freefootelmnt">Feedback </h></li>
     <br clear="hidden-xs">
     <li><h class="freefootelmnt serbor">Service Code</h></li>
   </ul>
   </div>
   <div class="col-md-3">
     <ul class="text-short content list">
       <li><h class="freefootelmnt">Community </h></li>
       <li><h class="freefootelmnt">Trust  & Safety</h></li>
       <li><h class="freefootelmnt">Help & Support </h></li>
     </ul>
   </div>
   <div class="col-md-3">
     <ul class="text-short content list">
       <li><h class="freefootelmnt">Terms of Service </h></li>
       <li><h class="freefootelmnt">Privacy Policy</h></li>
       <li><h class="freefootelmnt">Desktop App </h></li>
     </ul>
   </div>
   <div class="col-md-3">
     <ul class="text-short content list">
       <li><h class="freefootelmnt">Cookie Policy </h></li>
         <li><h class="freefootelmnt">Enterprise Solutions</h></li>
         <li><h class="freefootelmnt">Hiring Headquarters</h></li>
         <li> <h class="freefootelmnt">Mobile</h></li>
       </ul>
     </div>
     </div>
       <br clear="hidden-xs">
     <div class="row">
     <div class="col-md-12">
        <center>
         <div class="foot-social" >
           <div class="icons firsticon"><i class="fa fa-google-plus" ></i></div>
           <div class="icons"><i class="fa fa-twitter" aria-hidden="true"></i></div>
          <div class="icons"><i class=" fa fa-facebook" aria-hidden="true"></i></div>
           <div class="icons"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
       </div>
       </center>
     </div>
     </div>
     <div class="endfoot text-center">
       <p>© 2015 - 2016 Upwork Global Inc.</p>
     </div>
   </div>
  </div>

@endsection
