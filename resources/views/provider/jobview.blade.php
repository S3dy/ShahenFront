@extends('layouts.master')
@section('title', 'my profile')
@section('header')
	@include('providerheader')
@endsection

@section('body')
<?php
$json = $users;
$obj = json_decode($json);
?>

<div class="jobview">
<div class="container jobcont ">
		<h1 class="dis"><?php print $obj->{'job_name'}; ?></h1>
		<div class="row">
			<div class="col-md-12 iconcol">
				<span class="glyphicon glyphicon-pencil ic"></span><span><a  class="option" href="#"> Edit Posting</span></a>
				<span class="fa fa-times ic" aria-hidden="true"> <a class="option" href="#"> Remove posting </span></a>
				<span class="glyphicon glyphicon-pushpin ic"><a class="option" href="#"> Repost job</span></a>
				<span class="fa fa-globe ic" aria-hidden="true"> <a class="option" href="#"> Make Public </span></a>
			</div>
		   </div>
		   <div class="row">
			<div class="col-md-9">
				<div>
				<div class="chip chipmob qual">
				<?php print $obj->{'category'}; ?>
				</div>
				<span ><small class="text-muted">  posted 5 hours ago </small> </span>
				</div>
				<div class="row">
				<div class="col-md-4 marb">
					<span class="fa fa-clock-o pull-left clock" aria-hidden="true"></span>
					<span class="h hour">Hourly</span>
					<span class="l pull-left">    Hours to be determined</span>
					<span class="pull-left l"><?php print $obj->{'how_long'}; ?></span>
				</div>
				<div class="col-md-8 marb">
					<span class="glyphicon glyphicon-usd pull-left dolar" aria-hidden="true"></span>
					<span class="h hour pull-left"><?php print $obj->{'experience'}; ?></span><br>
					<span class="l1 pull-left"> I am looking for freelancers with </span><br>
					<span class="pull-left l1 ">the lowest rates </span>
				</div>
				</div>

					<div class="card jo">
						<div class="dethead">
							<h class="detil">Details</h><br>
						</div>
						<div class="chip jov dethead ">
							<?php print $obj->{'how_many_freelancer'}; ?>
						</div>
						<div class="des1">
							<h class="one">Description</h>
						</div>
							<p class="subhead dethead"><?php print $obj->{'description'}; ?></p>
						<div class="des1">
							<h class="one">Freelancer will need to deliver</h>
						</div>
							<p class="subhead dethead"> <?php print $obj->{'need_deliver'}; ?></p>
						<div class="des1">
							<h class="one">Qualities needed to be successful</h>
						</div>
							<p class="subhead dethead"><?php print $obj->{'qualities'}; ?></p>
							<div class="pjob mute">
							<div class="marg1"> <span class="text-muted "><strong class="m-sm-right"> Project Stage :</strong></span> Fully specified </div>
							<div class="marg1"> <span class="text-muted"><strong class="m-sm-right"> Project type :</strong></span> i am not sure </div>
							<div class="marg1"> <span class="text-muted"><strong class="m-sm-right"> Devices:</strong></span> Android, iphone </div>
							</div>
						</div>

						<div class="card jo1">
							<h5> Activity on this Job</h5>
							<div class="pjob mute">
							<span class="text-muted marg">Proposals :</span> 5 to 10 <span><i class="fa fa-question-circle-o icoon" aria-hidden="true" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="This range includes relevant proposals but does not include proposals that are withdrawn, declined, or archived. Please note tha all proposals are accesible to the clients on their applicant pages."></i></span> <br>
							<span class="text-muted marg  "> Last viewed by client :</span> 2 hours ago<span> <i class="fa fa-question-circle-o icoon" aria-hidden="true" data-toggle="popover" data-trigger="hover" d data-placement="top" data-content="This is when th eclient last reviewed or interacted with the applicants for this job."></i></span><br>
							<span class="text-muted marg"> Interviewing:</span> 0 <br>
							<span class="text-muted marg"> Invites sent :</span>0<br>
							<span class="text-muted marg"> Unanswered invites:</span> 0
							</div>
							<h4>Bid range - High $25.00 | Avg $13.11 | Low $4.00</h4>
						</div>

						<div class="card jo">
						<h4 class="clijob">Other open jobs this client (1)</h4>
						<a href="#"><?php print $obj->{'job_name'}; ?></a><p>- Hourly</p>
						</div>
				</div>
					<div class="col-md-3">
						<hr>
						<div class="jobseg">
						<span class="abt">About the Client</span><br>
						<span class="col3">Payment method not verified</span>
						</div>
						<div class="jobseg">
						<span class="abt">India</span><br>
						<span class="col3">04.43 PM</span>
						</div>
						<div class="jobseg">
						<span class="abt">1 Job posted</span><br>
						<span class="col3">0% Hire Rate, 2 Open Jobs</span>
						</div>
						<span class="col3">Member Since Nov 22,2016</span>
					</div>
				</div><!-- row -->


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
