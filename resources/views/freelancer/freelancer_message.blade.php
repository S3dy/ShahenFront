@extends('layouts.masterforfreelancer')
@section('title', 'Freelancer Messages')
@section('header')
    @include('freelancerheader')
@endsection

@section('body')
<?php $a=session('freelancer_id');?>
<div class="searchempty">
<div class="container pad100 fpagecont">
<form id="search_form" name="search_form" action="{{ URL('#') }}" method="get">
  <div class="row">

  </div>
  <div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8 m-top-10">
       <div class="card card-block m-0 cust-card">

                          <div class="col-md-9">
                              <h2 class="card-title search-cust-h2">
                              Freelancer Messages</h2>
                          </div>
                          <!--<div class="col-md-3">
                            <a href="#">
                              <i class="fa fa-rss search-cust-icon" aria-hidden="true"></i>
                            </a>
                          </div>-->

        </div>
        @if($flags=='1')
              <?php
                $obj = $users;
                $max=sizeof($obj);
                $i=$max-1;
                while($i>=0){
              ?>
              <input type="hidden" id="max" name="">
              <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                        
                        <div class="card card-block m-0 project-cust-card1" <?php if($obj[$i]['views']==0) {?> style="background-color: #E5E8E8 !important;"<?php } ?> >
                    <div class="cust-border">
                      <div class="row project-content">
                          <div class="col-md-12">
                              <section>
                                  <div class="row">
                                    <div class="col-md-9">
                                      <a href="{{URL('/offerview/'.$obj[$i]['proposalid'].'/'.$obj[$i]['jobid'])}}"  class="cust-a">
                                        <h2 class="project-title"><input type="hidden" name="jobname" id="fn{{$i}}" value="<?php print $a ?>"><?php print $obj[$i]['providername']; ?>--<input type="hidden" name="jobname" id="jobn{{$i}}" value="<?php print $obj[$i]['jobname']; ?>"><?php print $obj[$i]['jobname']; ?>

                                        <input type="hidden" name="pro_n" id="pn{{$i}}" value="<?php print $obj[$i]['providerid']; ?>">
                                        </h2>
                                      </a>
                                    </div>
                                  </div>
                              </section>
                          </div>
                      </div>
                      <div class="row project-content">
                          <div class="col-md-12">
                            <small>
                              <span></span>
                              <span></span>
                             </small>
                            <div class=" offer-b-20">
                              <div>
                                <span>
                                Your proposal has been Submitted!!!!
                                </span>
                              </div>
                              <small>
                                <!--<span style="color: #37a000">
                                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </span>-->
                              </small>
                            </div>
                                        <div class="row offer-b-20">
                <input type="hidden" name="job_name"  value="">
<!--               <span class="offer-m-15">
                  <input type="button" onclick="getOffer({{$i}})" id="accept" name="submit" class="cust-btn-primary btn text-capitalize m-0 retpass" value="Start project">
              </span>
              <span class="offer-btn-l">
                  <input type="submit" id="decline" name="submit" class="cust-btn-declin btn text-capitalize m-0 retpass" value="End project">
              </span> -->

            </div>
                          </div>

                      </div>
                      </div>

                </div>
                <?php
                $i--; } ?>
             @endif

                 @if($max =='0')
                        <div class="card card-block m-0 cust-card1  text-center">
                        <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="circle-error-icon">
                              <i class="fa fa-exclamation-circle error-exclamation" aria-hidden="true"></i>
                            </div>
                            <h1 class="search-h1">
                            No Messages found!!!
                            </h1>
                        </div>
                        </div>
                </div>
                @endif
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
