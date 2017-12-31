@extends('layouts.masterforfreelancer')
@section('title', 'My Jobs - rbs')
@section('header')
  @include('providerheader')
@endsection
@section('body')

<div class="container pagepad" >
<?php $a=Session::get('provider_name');?>
   <div>
     <h1 class="job-feed-b-10">Welcome to rbs <span>, <?php echo $a; ?></span></h1>
   </div>
   <div class="row">
     <div class="col-md-8">
       <div class="card card-block m-0 job-feed-card proposal-m-b">
                  <form action="{{url('/')}}/jobfeed" method="post">
                   <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                   <input type="hidden" name="provider_name" value="<?php echo $a; ?>">
                    <div class="job-feed-b-40 job-feed-t-20">
                      <label class="job-feed-label">Tell us what you want to get done</label>
                      <div>
                      <input class="job-feed-input" id="jobf" type="textbox" name="job_feed_input" placeholder="EXAMPLE: I need a php developer to update my ecommerce website">
                      </div>
                    </div>
                     <span class="hider login-error error-color" id="feedjob"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                    <div class="job-feed-b-40">
                      <label class="job-feed-label">What kind of project do you have?</label>
                      <div class="row">
                        <div class="col-md-4">
                           <label> <div class="text-center job-feed-tag feed-border" id="on_going"><input type="radio" name="on_g" hidden="hidden" value="ONGOING PROJECT" checked="checked"></label>
                              <span class="job-feed-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                              <p class="job-feed-p job-feed-changep">ONGOING PROJECT</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label><div class="text-center job-feed-tag feed-border" id="one_time"><input type="radio" name="on_g" hidden="hidden"  value="ONE-TIME PROJECT"></label>
                              <span class="job-feed-icon"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
                              <p class="job-feed-p job-feed-changep">ONE-TIME PROJECT</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                           <label><div class="text-center job-feed-tag feed-border" id="not_sure"><input type="radio" name="on_g" hidden="hidden"  value="I'M NOT SURE">
                              <span class="job-feed-icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i></span>
                              <p class="job-feed-p job-feed-change-p">I'M NOT SURE</p>
                            </div></label>
                        </div>
                      </div>
                    </div>
                    <div class="job-feed-b-40">
                      <label class="job-feed-label">How many freelancers do you need to hire?</label>
                      <div class="row">
                        <div class="col-md-4">
                            <label><div class="text-center job-feed-tag feed-border" id="need_one"><input type="radio" name="how_many" hidden="hidden"  value="I ONLY NEED ONE" checked="checked"></label>
                              <span class="job-feed-icon"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                              <p class="job-feed-p job-feed-change-hire">I ONLY NEED ONE</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label><div class="text-center job-feed-tag feed-border" id="need_more"><input type="radio" name="how_many" hidden="hidden"  value="I NEED MORE THAN ONE"></label>
                              <span class="job-feed-icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                              <p class="job-feed-p job-feed-change-hire">I NEED MORE THAN ONE</p>
                            </div>
                        </div>
                      </div>
                    </div>
                    <input type="submit" id="job-feed"  class="cust-btn-primary btn text-capitalize m-0 retpass feed-bottom" value="Continue Job Post">
                   <!--  <a href="{{URL('/postajob')}}" class="feed-a cust-btn-primary btn text-capitalize m-0 retpass feed-bottom"><span class="feed-sapn"><input type="submit" name="sear">  Search Freelancers</span></a> -->

                    <!--<a href="" class="feed-a"><span class="feed-sapn">Search Freelancers</span></a>-->
                  </form>
              </div>
     </div>
     <div class="col-md-4">
       <div>
         <h1 class="job-feed-b-10 feed-top feed-m-l-10">How it  works</h1>
         <div class="row job-feed-b-40">
           <div class="col-md-2">
             <h1 class="job-feed-b-10 feed-top feed-m-l-10 feed-p-0">1</h1>
           </div>
           <div class="col-md-10" data-toggle="collapse" data-target="#great_freelancer">
             <strong class="feed-strong">
               Find a greate freelancer

               <span class="glyphicon glyphicon-menu-down feed-down" aria-hidden="true"></span>

             </strong>
             <div id="great_freelancer" class="collapse feed-float">
                  Describe what you need, including your budget and timeline.<a href="#">Learn more</a>
              </div>
           </div>
         </div>
         <div class="row job-feed-b-40">
           <div class="col-md-2">
             <h1 class="job-feed-b-10 feed-top feed-m-l-10 feed-p-0">2</h1>
           </div>
           <div class="col-md-10" data-toggle="collapse" data-target="#get_started">
             <strong class="feed-strong">
               Hire and get started
               <span class="glyphicon glyphicon-menu-down feed-down" aria-hidden="true"></span>
             </strong>
             <div id="get_started" class="collapse feed-float">
                  Evaluate applicants, find a match and make an offer.<a href="#">Learn more</a>
              </div>
           </div>
         </div>
         <div class="row job-feed-b-40">
           <div class="col-md-2">
             <h1 class="job-feed-b-10 feed-top feed-m-l-10 feed-p-0">3</h1>
           </div>
           <div class="col-md-10" data-toggle="collapse" data-target="#work_together">
             <strong class="feed-strong">
               Work together
               <span class="glyphicon glyphicon-menu-down feed-down" aria-hidden="true"></span>
             </strong>
             <div id="work_together" class="collapse feed-float">
                  Chat, share files, and get project updates on the go. <a href="#">Learn more</a>
              </div>
           </div>
         </div>
         <div class="row job-feed-b-40">
           <div class="col-md-2">
             <h1 class="job-feed-b-10 feed-top feed-m-l-10 feed-p-0">4</h1>
           </div>
           <div class="col-md-10" data-toggle="collapse" data-target="#Pay_job">
             <strong class="feed-strong">
               Pay for a job well done
               <span class="glyphicon glyphicon-menu-down feed-down" aria-hidden="true"></span>
             </strong>
             <div id="Pay_job" class="collapse feed-float">
                  Monitor and review work done. Pay easily with peace of mind. <a href="#">Learn more</a>
              </div>
           </div>
         </div>
         <hr class="cust-hr">
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
