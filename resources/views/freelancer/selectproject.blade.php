@extends('layouts.masterforfreelancer')
@section('title', 'Freelance Web Design Jobs online - rbs')
@section('header')
@include('freelancerheader')
@endsection
@section('body')
<?php
$obj = $users;
$obj1=$users1;
?>
<div class="jobview">
	<div class="container jobcont ">
		<h1 class="dis"><?php print $obj[0]['projectname']; ?></h1>
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-4 marb">
						<span class="fa fa-clock-o pull-left clock" aria-hidden="true"></span>
						<span class="h hour"><?php print $obj[0]['paytype']; ?></span>
						<span class="l pull-left">    Hours to be determined</span>
						<span class="pull-left l"><?php print $obj[0]['duration']; ?></span>
					</div>
					<div class="col-md-8 marb">
						<span class="glyphicon glyphicon-usd pull-left dolar" aria-hidden="true"></span>
						<span class="h hour pull-left"><?php  print $obj[0]['experiencelevel']; ?>@php if($obj[0]['experiencelevel']=="Entry Level") { echo " $"; } elseif($obj[0]['experiencelevel']=="Intermediate Level"){ echo " $$"; } else { echo " $$$"; }  @endphp</span><br>
						<span class="l1 pull-left"> I am looking for freelancers with </span><br>
						<span class="pull-left l1 ">the lowest rates </span>
					</div>
				</div>
				<div class="card jo">
					<div class="dethead">
						<h class="detil">Details</h><br>
					</div>
					<p class="det"><?php print $obj[0]['helps']; ?></p>
					<div class="pjob mute det">
						<div class="marg1"> <!-- <span class="text-muted "><strong class="m-sm-right"> Project Stage :</strong></span> Fully specified </div>
						<div class="marg1"> <span class="text-muted"><strong class="m-sm-right"> Devices :</strong></span> ipad,Windows Phone ,Android ,iphone </div>
						<div class="marg1"> <span class="text-muted"><strong class="m-sm-right"> Ongoing project :</strong></span> Developer </div>
						<div class="marg1"> <span class="text-muted"><strong class="m-sm-right">Project Type :</strong></span> Ongoing project </div>
						<div class="marg1"> --> <span class="text-muted"> <strong class="m-sm-right">Other Skills:</strong></span> <span class="chip qual"><?php print $obj[0]['skills']; ?></span><!--  <span class="chip qual">HTML</span> <span class="chip qual">CSS</span> <span class="chip qual">HTML</span> --> </div>
					</div>
					<p class="det">Bid Amount: <?php print $obj[0]['budgetamount']; ?> $</p>
				</div><br>		

						<!--<div class="card jo1">
						<div class="row">

						<div class="col-md-6">
							<h5>Preferred Qualifications</h5>
							<div class="pjob mute">
									<p class="linemgn">
									<?php
									//$q=$obj['Freelancer Preferences'];
									//$w=$q['Preferred Qualification'];
									//$e=$w['qua_job_succ'];
									//$f=$w['qua_ris'];
									?>
									<span class="text-muted ">Job Success Store :</span><?php //print $e;?> <span>  <i class="fa fa-exclamation-circle icoon" aria-hidden="true"></i></span></p>
									<p class="linemgn">
										<span class="text-muted "> Rising Talent:</span><?php //print $f;?><span><i class="fa fa-exclamation-circle icoon" aria-hidden="true"></i></span>
									</p>
								</div>
							</div>
							<div class="col-md-6">
								<h5> Activity on this Job</h5>
								<div class="pjob mute">
									<p class="linemgn">
										<span class="text-muted ">Proposals :</span> 5 to 10 <span><i class="fa fa-question-circle-o icoon" aria-hidden="true" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="This range includes relevant proposals but does not include proposals that are withdrawn, declined, or archived. Please note tha all proposals are accesible to the clients on their applicant pages."></i></span><br></p>
										<p class="linemgn">
											<span class="text-muted "> Last viewed by client :</span> 2 hours ago<span> <i class="fa fa-question-circle-o icoon" aria-hidden="true" data-toggle="popover" data-trigger="hover" d data-placement="top" data-content="This is when th eclient last reviewed or interacted with the applicants for this job."></i></span><br></p>
											<p class="linemgn">
												<span class="text-muted "> Interviewing:</span> 0 <br></p>
												<p class="linemgn">
													<span class="text-muted "> Invites sent :</span>0<br></p>
													<p class="linemgn">
														<span class="text-muted "> Unanswered invites:</span> 0 </p>
													</div>
												</div>
											</div>
										</div>-->
										<div class="card jo">
											<h class="detil">Client's Work History and Feedback</h>
											<?php
											$max=sizeof($obj1);
											$i=0;
											//echo $obj1[0]['job_name'];
											while($i<$max){
											?>
											
											<h2 class="feedtit">{{$obj1[$i]['projectname']}}</h2>
											<input type="hidden" value="{{$obj1[$i]['providerfeedback']['total']}}" name="">
												<div class="rate flleft" style="pointer-events: none">
													<fieldset class="rating1">
														<input type="radio" id="star5" name="rating1" value="5" disabled <?php if($obj1[$i]['providerfeedback']['total']==5){ echo "checked"; } ?>  /><label class = "full" for="star5"></label>
														<input type="radio" id="star4half" name="rating1" value="4.5" disabled <?php if($obj1[$i]['providerfeedback']['total']==4.5){ echo "checked"; } ?> /><label class="half" for="star4half"></label>
														<input type="radio" id="star4" name="rating1" value="4" disabled <?php if($obj1[$i]['providerfeedback']['total']==4){ echo "checked"; } ?>/><label class = "full" for="star4"></label>
														<input type="radio" id="star3half" name="rating1" value="3.5" disabled <?php if($obj1[$i]['providerfeedback']['total']==3.5){ echo "checked"; } ?> /><label class="half" for="star3half"></label>
														<input type="radio" id="star3" name="rating1" value="3" disabled <?php if($obj1[$i]['providerfeedback']['total']==3){ echo "checked"; } ?> /><label class = "full" for="star3"></label>
														<input type="radio" id="star2half" name="rating1" value="2.5" disabled <?php if($obj1[$i]['providerfeedback']['total']==2.5){ echo "checked"; } ?> /><label class="half" for="star2half"></label>
														<input type="radio" id="star2" name="rating1" value="2" disabled <?php if($obj1[$i]['providerfeedback']['total']==2){ echo "checked"; } ?> /><label class = "full" for="star2"></label>
														<input type="radio" id="star1half" name="rating1" value="1.5" disabled <?php if($obj1[$i]['providerfeedback']['total']==1.5){ echo "checked"; } ?> /><label class="half" for="star1half"></label>
														<input type="radio" id="star1" name="rating1" value="1" disabled <?php if($obj1[$i]['providerfeedback']['total']==1){ echo "checked"; } ?> /><label class = "full" for="star1"></label>
														<input type="radio" id="starhalf" name="rating1" value="0.5" disabled <?php if($obj1[$i]['providerfeedback']['total']==0.5){ echo "checked"; } ?> /><label class="half" for="starhalf"></label>
													</fieldset>
												</div>
											
													<div class="flleft">
														<span><p class="feedcont flleft"><?php if($obj1[$i]['freelancerfeedback']['comment']==""){ echo "No Comments"; } else { echo $obj1[$i]['freelancerfeedback']['comment'];   } ?></p></span>
													</div>
												
												<br class="hidden-xs">
												<div class="clear mrbot">
													<div class="flleft">
														<span>	<p class="clear feedcont">To Freelancer: {{$obj1[$i]['freelancerfeedback']['freelancername']}} </p></span>
													</div>
													<div class="rate flleft mrlft" style="pointer-events: none;">
														<span>	<fieldset class="rating2">
															<input type="radio" id="star5" name="rating2" class="flleft" value="5" disabled <?php if($obj1[$i]['freelancerfeedback']['total']==5){ echo "checked"; } ?> /><label class = "full" for="star5"></label>
															<input type="radio" id="star4half" name="rating2" value="4.5" disabled <?php if($obj1[$i]['freelancerfeedback']['total']==4.5){ echo "checked"; } ?> /><label class="half" for="star4half"></label>
															<input type="radio" id="star4" name="rating2" value="4" disabled <?php if($obj1[$i]['freelancerfeedback']['total']==4){ echo "checked"; } ?>/><label class = "full" for="star4"></label>
															<input type="radio" id="star3half" name="rating2" value="3.5" disabled <?php if($obj1[$i]['freelancerfeedback']['total']==3.5){ echo "checked"; } ?> /><label class="half" for="star3half"></label>
															<input type="radio" id="star3" name="rating2" value="3" disabled <?php if($obj1[$i]['freelancerfeedback']['total']==3){ echo "checked"; } ?>/><label class = "full" for="star3"></label>
															<input type="radio" id="star2half" name="rating2" value="2.5" disabled <?php if($obj1[$i]['freelancerfeedback']['total']==2.5){ echo "checked"; } ?> /><label class="half" for="star2half"></label>
															<input type="radio" id="star2" name="rating2" value="2" disabled <?php if($obj1[$i]['freelancerfeedback']['total']==2){ echo "checked"; } ?> /><label class = "full" for="star2"></label>
															<input type="radio" id="star1half" name="rating2" value="1.5" disabled <?php if($obj1[$i]['freelancerfeedback']['total']==1.5){ echo "checked"; } ?> /><label class="half" for="star1half"></label>
															<input type="radio" id="star1" name="rating2" value="1"  disabled <?php if($obj1[$i]['freelancerfeedback']['total']==1){ echo "checked"; } ?>/><label class = "full" for="star1"></label>
															<input type="radio" id="starhalf" name="rating2" value="0.5"  disabled <?php if($obj1[$i]['freelancerfeedback']['total']==0.5){ echo "checked"; } ?>/><label class="half" for="starhalf"></label>
														</fieldset></span>
													</div>
												</div>
											
												<br class="hidden-xs">
												<hr>
												<?php $i++; } ?>
											</div>
										</div>
										<div class="col-md-3">
											<!--<div class="panel ins">
													<div class="panel-body align">
														You cannot submit proposals on rbs at this time. Please check your email or our <a href="#">help page</a> for more information.
													</div>
											</div>-->
											<a href="{{URL('/submitproposal/'.$obj[0]['jobid'])}}" class="profsetbut">Submit A Proposal</a>
											<hr>
											<!--	<div class="jobseg">
												<span class="abt">About the Client</span><br>
											</div>
											<div class="jobseg">
												<span class="abt">India</span><br>
												<span class="col3">04.43 PM</span>
											</div>
											<div class="jobseg">
												<span class="abt">1 Job posted</span><br>
												<span class="col3">0% Hire Rate, 2 Open Jobs</span>
											</div>
											<span class="col3">Member Since Dec 22,2016</span>-->
										</div>
									</div>
								</div>
							</div>
							@endsection
							@section('footer')
							<style>
								 .rating1:not(:checked) > label:hover, .rating1:not(:checked) > label:hover ~ label {
   										 color: #ddd !important;
										}
										 .rating2:not(:checked) > label:hover, .rating2:not(:checked) > label:hover ~ label { color: #ddd !important; }
   							
							</style>
							<script>
								$( document ).ready(function() {
								$("input[type=radio]").attr('disabled', true);
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