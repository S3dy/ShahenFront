@extends('layouts.masterforfreelancer')
@section('title', 'My Job Feed')
@section('header')
  @include('freelancerheader')
@endsection

@section('body')
<?php $a=session('freelancer_name'); ?>
<div class="searchempty">
<div class="container pad100 fpagecont">
<form id="search_form" name="search_form" action="{{ URL('/search_result') }}" method="get">
   
   <!--<div class="alert alert-info borbox empty" role="alert">
      <div class="horn"><i class="fa fa-bullhorn" aria-hidden="true"></i></div>
      <div class="emptycontent">
        <p>We’ve reviewed your profile and currently our marketplace doesn’t have opportunities for your area of expertise.</p>

    <p>If you have more relevant skills or experience to add, you can update and re-submit your profile. You can find more information regarding our decision <a href="#">here</a>.</p>
    </div>
  </div>-->

  <div class="row">
    <div class="col-md-2">
      <h1 class="find-work-h1">Find Work</h1>
    </div>
    <div class="col-md-8" style="padding-bottom: 30px;">
      <input type="textbox" name="search" placeholder="Search for Jobs" class="search-box" id="search_id">
          <label>
              <button type="submit" class="btn btn-primary find-work-search" id="search_empty">
                   <a href="{{ URL('/jobs/browse') }}" style="color:white!important"><i class="fa fa-search" aria-hidden="true"></a></i>
              </button>
          </label>
          <span class="hider error-color" id="search_empty_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8 m-top-10">
       <div class="card card-block m-0 cust-card">

                          <div class="col-md-9">
                              <h2 class="card-title search-cust-h2">My Job Feed</h2>
                          </div>
                          <!--<div class="col-md-3">
                            <a href="#">
                              <i class="fa fa-rss search-cust-icon" aria-hidden="true"></i>
                            </a>
                          </div>-->

        </div>
                        <div class="card card-block m-0 cust-card1  text-center">
                        <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="circle-error-icon">
                              <i class="fa fa-exclamation-circle error-exclamation" aria-hidden="true"></i>
                            </div>
                            <h1 class="search-h1">
                              Find projects more quickly <br> and easily - run and save a  <br> search to see interesting <br> projects here.
                            </h1>
                        </div>
                        </div>
                </div>
    </div>
    <div class="col-md-2">
          <!--<div class="m-top-10">
                      <label class="side-label">My Profile</label>
                  </div>
                  <div class="row m-sm-bottom">
                  <div class="col-md-4">
                      <span class="profile-pic"><img src="https://odesk-prod-portraits.s3.amazonaws.com/Users:adithyanj:PortraitUrl?AWSAccessKeyId=1XVAX3FNQZAFC9GJCFR2&amp;Expires=2147483647&amp;Signature=UMJx0TDlBH0di%2BU%2FJf4xMB80XZ4%3D&amp;1482228375785481" class="avatar avatar-xs"></span>
                  </div>
                  <div class="col-md-8 m-top-20">
                      <span>More than 30 hrs/week</span>
                  </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="progress cust-process">
                          <div class="progress-bar custom-progressbarcolor" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                          </div>
                          </div>
                          <span class="process-span">40%</span>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <a href="{{ URL('/freelancers')}}" class="cust-a">View my profile</a>
                    </div>

                  </div>-->
    </div>

  </div>
  </form>
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
