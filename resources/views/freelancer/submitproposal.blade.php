@extends('layouts.masterforfreelancer')
@section('title', 'Freelance Web Design Jobs online - rbs')
@section('header')
 @include('freelancerheader')
@endsection
@section('body')
<?php $a=Session::get('freelancer_name');?>
<?php
    $obj = $users;
 ?>
<div class="container containerspacing ">
  <div class="row">
    <div class="col-md-12">

      @if(session('flag'))
        @if(session('flag') == "success")
       <div class="alert alert-success ">
          <strong>Success!</strong> Your proposal has been submitted!.
        </div>
         @endif
         @if(session('flag')==1)
         <div class="alert alert-danger ">
           <strong>Sorry!</strong> This is your existing project!!!.
         </div>
         @endif
      @endif



        <h1 class="contact-h1 contact-m-bottom post-heading">Submit a Proposal</h1>
        <form  action="{{URL('saveproposal')}}" method="POST" id="sub_pro">

        <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php print $a ?>">
        <input type="hidden" name="providerid" value="<?php print $obj[0]['providerid']; ?>">
        <input type="hidden" name="jobname" value="<?php print $obj[0]['projectname']; ?>">
        <input type="hidden" name="jobid" value="<?php print $obj[0]['jobid']; ?>">
        <div class="card card-block m-0 contact-cust-card submit-p-row">

            <h3 class="post-h3 contact-m-20">Job Details</h3>
            <div class="row submit-m-70">
              <div class="col-md-9 submit-pad">
                <div><label class="post-label offer-b-10"><?php print $obj[0]['projectname']; ?></label></div>
                <p class="submit-para"><?php print $obj[0]['helps']; ?></p>
                <div>
                <!--  <a href="#" class="submit-an">View job posting</a>-->
                </div>
              </div>
              <div class="col-md-3">
                <div><?php print $obj[0]['experiencelevel']; ?><span class="glyphicon glyphicon-usd submit-icon" aria-hidden="true"></span><span class="glyphicon glyphicon-usd" aria-hidden="true"></span></div>
                <div><?php print $obj[0]['paytype']; ?> <span class="glyphicon glyphicon-tag submit-icon" aria-hidden="true"></span></div>
              </div>
            </div>
            <hr class="submit-hr submit-m-40">
            <div class="row">
            <div class="col-md-12">
              <div><label class="post-label offer-b-10">Propose Terms</label></div>
              <div>
                <div class=" submit-m-40"><h5 class="submit-h5">You are submitting proposal as  a Freelancer</h5></div>
<!--                 <div class="submit-f-size submit-f-wt">Requires 2 Connects <i class="fa fa-question-circle-o submit-icon" aria-hidden="true" data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="This is the number of Connects that will be deducted from your balance when you submit proposal. Learn more"></i></div>
                <div class="submit-f-size submit-f-300">When you submit a proposal, you'll have 58 Connects remaining. Your Connects reset on January, 21. </div> -->
                <div class="submit-m-40">
                 <!--  <a href="#" class="submit-an">Learn more</a> -->
                </div>
              </div>
            </div>

            </div>
            <div class="row">
              <div class="col-md-8">
                <!-- <small>The client's budget is <span id="bit_change_val">$150.00</span> US Dollars</small> -->
                <hr class="submit-col8-hr submit-m-b-10">
                <div class="row submit-m-b-30">
                <div class="col-md-6">

                    <div><h5 class="submit-h5">Bid</h5></div>
                    <div class=" submit-f-wt">This is the amount the client will see on your proposal</div>
                </div>
                      <div class="col-md-4 col-md-offset-1 submit-padding">
                      <div class="row">
                        <span class="glyphicon glyphicon-usd submit-icon submit-doller" aria-hidden="true"></span>
                    <span id="bit_span"><input type="text" name="bidvalue" class="submit-text text-right submit-f-wt submit-f-14 bid" id="bit_val" value="150.00" maxlength="12"></span>

                      </div>

                    </div>

                </div>
                  <span class="hider post-error error-color sub_pad" id="bid-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please enter Bid value greater than $50.</span>
                <hr class="submit-col8-hr submit-m-b-10">
                <div class="row submit-m-b-30">
                <div class="col-md-6 submit-p-15">

                    <div><h5 class="submit-h5">rbs Service Fee</h5></div>
                </div>
                      <div class="col-md-4 col-md-offset-1 submit-padding  submit-p-20">
                      <div class="row">
                        <span class="glyphicon glyphicon-usd submit-icon submit-doller" aria-hidden="true"></span>
                      <span class="submit-f-wt submit-f-14 submit-pad-l">-30.00</span>
                      </div>

                    </div>

                </div>
                <hr class="submit-col8-hr submit-m-b-10">
                <div class="row submit-m-40">
                <div class="col-md-6">

                    <div><h5 class="submit-h5">You'll Receive</h5></div>
                    <div class=" submit-f-wt">The estimated amount you'll receive after service fees.
                       <i class="fa fa-question-circle-o submit-icon" aria-hidden="true" data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Amount may vary slightly due to rounding. Learn more"></i>
                    </div>
                </div>
                      <div class="col-md-4 col-md-offset-1 submit-padding">
                      <div class="row">
                      <span class="glyphicon glyphicon-usd submit-icon submit-doller" aria-hidden="true"></span>
                      <span><input type="text" name="youreceive" class="submit-text text-right submit-f-wt submit-f-14" id="receive_val" value="120.00" disabled="disabled"  style="background-color: white;"></span>
                      <input type="hidden" name="youreceive" id="rec_val" value="120.00">
                      </div>

                    </div>

                </div>
                <input type="hidden" id="dur" name="duration" value="Less than 1 week">
                <div><h5 class="submit-h5">Estimated Duration</h5></div>

                <div class="profile-select submit-m-40">
                  <button type="button" class="btn btn-default submit-select-btn" id="submit_select">
                    <!-- <span class="display span-pad" id="submit1">Please select</span> -->
                    <span class="display span-pad" id="submit2">Less than 1 week</span>
                    <span class="hider span-pad" id="submit3">Less than 1 month</span>
                    <span class="hider span-pad" id="submit4">1 to 3 months</span>
                    <span class="hider span-pad" id="submit5">3 to 6 months</span>
                    <span class="hider span-pad" id="submit6">More than 6 months</span>
                    <span><i class="fa fa-angle-down profile-arrow" aria-hidden="true"></i></span>
                  </button>

                  <ul class="submit-dropdown hider" id="submit_ul">
                    <!-- <a href="" class="profile-li-a"><li class="profile-li" id="submit_li1">Please select</li></a> -->
                    <a href="" class="profile-li-a"><li class="profile-li" id="submit_li2">Less than 1 week</li></a>
                    <a href="" class="profile-li-a"><li class="profile-li" id="submit_li3">Less than 1 month</li></a>
                    <a href="" class="profile-li-a"><li class="profile-li" id="submit_li4">1 to 3 months</li></a>
                    <a href="" class="profile-li-a"><li class="profile-li" id="submit_li5">3 to 6 months</li></a>
                    <a href="" class="profile-li-a"><li class="profile-li" id="submit_li6">More than 6 months</li></a>
                  </ul>
              </div>
              <span class="hider post-error error-color" id="duara-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please select the duration.</span>
              </div>
            </div>
            <div class="row submit-m-40">
              <div class="col-md-12">
                    <div><h5 class="submit-h5">Cover Letter</h5></div>
                    <div>
                      <textarea class="submit-text-area" name="cover" rows="10" id="cover_sub"></textarea>
                    </div>
              </div>
            </div>
            <span class="hider post-error error-color" id="cover-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please enter cover letter.</span>
            <div class="row submit-m-40">
              <div class="col-md-12">
                    <div><label class="post-label">How do you describe UX design? (optional)</label></div>
                    <div>
                      <textarea class="submit-text-area" name="uxdescription" rows="10"></textarea>
                    </div>
              </div>
            </div>
            <div class="row submit-m-40">
              <div class="col-md-12">
                    <div><label class="post-label">How do you describe UI design? (optional)</label></div>
                    <div>
                      <textarea class="submit-text-area" name="uidescription" rows="10"></textarea>
                    </div>
              </div>
            </div>
            <div class="row submit-m-40">
              <div class="col-md-12">
                    <div><label class="post-label">Do you make UX first or UI design? (optional)</label></div>
                    <div>
                      <textarea class="submit-text-area" name="uxuidescription" rows="10"></textarea>
                    </div>
              </div>
            </div>
            <div class="row submit-m-40">
              <div class="col-md-12">
                    <div><label class="post-label">What tools would you use to make UX and UI design? (optional)</label></div>
                    <div>
                      <textarea class="submit-text-area" name="tools" rows="10"></textarea>
                    </div>
              </div>
            </div>
           <!--<div class="row submit-m-25">
              <div class="col-md-12">
                    <div><h5 class="submit-h5">Attachments (optional)</h5></div>
                    <input type="file" id="file_upload" class="hide">
                    <div id="submitfileupload" class="hider">
                    <span class="glyphicon glyphicon-paperclip submit-icon" aria-hidden="true"></span>
                    <span class="submit-icon" id="customfileupload"></span>
                    <span class="glyphicon glyphicon-trash" id="trash" aria-hidden="true"></span>
                    </div>
                    <div class="text-center submit-div submit-f-size">
                      Drag or <a href="#" class="submit-label-an" id="browse">upload</a> project files
                    </div>

              </div>
            </div>
            <div class="row submit-m-40">
              <div class="col-md-12">
                    <div class="submit-f-size submit-f-300">You may attach up to 10 files under the size of <b> 25MB </b>each. Include work samples or other documents to support your application. Do not attach your résumé — your rbs profile is automatically forwarded to the client with your proposal.</div>
              </div>
            </div>-->
        </div>
          <div class="submit-button">
          <span>
          <button id="proposal_submit" type="submit" name="proposal_submit" class="cust-btn-primary btn text-capitalize m-0 retpass">Submit a proposal</button>
<!--           <a href="{{URL('/proposal')}}" id="proposal_submit" name="proposal_submit" class="cust-btn-primary btn text-capitalize m-0 retpass" > Submit a proposal</a> -->
          </span>
          <span>

            <a href="{{ URL::asset('ab/find-work') }}" class="submit-a-16">cancel</a>

          </span>
          </div>



        </form>
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

