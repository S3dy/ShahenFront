@extends('layouts.master')
@section('title', 'Messages')
@section('header')
  @include('providerheader')
@endsection

@section('body')
<?php $a=Session('provider_id');?>
<div class="searchempty">
<div class="container pad100 fpagecont">
<!-- <form id="search_form" name="search_form" action="{{ URL('#') }}" method="get"> -->
  <div class="row">
    
  </div>
         @if(session('flags'))
          @if(session('flags') == "3")
       <div class="alert alert-success " id="alert_successbydynamic">
          Your Payment was Successfully Send.
          <!-- <strong>Done!</strong> Your payment sent successfully!. -->
        </div>
        @endif
          @endif
  <div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8 m-top-10">
       <div class="card card-block m-0 cust-card">
                          <div class="col-md-9">
                              <h2 class="card-title search-cust-h2">
                              Freelancer Proposals</h2>
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
                $j=0;
                while($i>=0){
                  

              ?>
              <form action="{{ URL('/payment/make') }}" method="post">
              <input type="hidden" id="max" name="" value="<?php echo $max?>">
              <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                        <div class="card card-block m-0 project-cust-card1" <?php if($obj[$i]['views']==0) {?> style="background-color: #E5E8E8 !important;"<?php } ?>>
                    <div class="cust-border">
                      <div class="row project-content">
                          <div class="col-md-12">
                              <section>
                                  <div class="row">
                                    <div class="col-md-9">
                                      <a href="{{URL('/providerofferview/'.$obj[$i]['proposalid'].'/'.$obj[$i]['jobid'])}}"  class="cust-a">
                                        <h2 class="project-title"><input type="hidden" name="jobname" id="fn{{$i}}" value="<?php print $obj[$i]['freelancername']; ?>"><?php print $obj[$i]['freelancername']; ?>--<input type="hidden" name="jobname" id="jobn{{$i}}" value="<?php print $obj[$i]['jobname']; ?>"><?php print $obj[$i]['jobname']; ?>
                                        <input type="hidden" name="providerid" id="pn{{$i}}" value="<?php echo $a ?>">
                                        <input type="hidden" name="bid_name{{$i}}" id="bn{{$i}}" value="<?php print $obj[$i]['bidvalue']; ?>">
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
                              <span>Esteemed Duration:<?php print $obj[$i]['duration']; ?></span>
                              <span> Bid value:<?php print $obj[$i]['bidvalue']; ?>$</span>
                             </small>
                            <div class=" offer-b-20">
                              <div>
                                <p class="text-justify">
                                <?php print $obj[$i]['cover']; ?>
                                </p>
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
                  <input type="button" onclick="getaccept({{$i}});" id="accept" name="submit" class="cust-btn-primary btn text-capitalize m-0 retpass" value="OK">
              </span>
              <span class="offer-btn-l">
                  <input type="button" id="decline" name="submit" class="cust-btn-declin btn text-capitalize m-0 retpass" value="Decline Offer">
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
  </div>

</div>
</div>
<script src='https://js.stripe.com/v2/' type='text/javascript'></script>
<script type="text/javascript">
//   function getpayment(id){
//   //alert(id);
//    var fnp=$('#fnp'+id).val();
//   var jp=$('#jobnp'+id).val();
//   var pnp=$('#pnp'+id).val();
//   var bnp=$('#bnp'+id).val();


//  alert(fnp+"  "+jp+"  "+pnp+"  "+bnp);

//       var request = $.ajax({
//         url: "payment/make" ,
//        //url: "http://demo.cogzidel.com/upc/emailvalid",
//        type: "post",
//        data: { "freelancer_name" : fnp,"job_name" : jp,"provider_name" : pnp,"bid_val" : bnp},
//      datatype:'json',
//      headers: {
//         'X-CSRF-TOKEN': $('#_token').val()
//     }
// });
//     request.done(function(msg){
//           console.log(msg);
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
