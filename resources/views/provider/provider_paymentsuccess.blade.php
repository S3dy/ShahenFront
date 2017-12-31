@extends('layouts.masterforfreelancer')
@section('title', 'Payment Notification - rbs')
@section('header')
  @include('providerheader')
@endsection
@section('body')

                          
<div class="container container-padding-post pagepad">
  <div class="row">
    <div class="col-md-12 mar-t-80">
        <div class="myjob_float row">
          <!-- <input type="submit" id="post" class="cust-btn-primary btn text-capitalize m-0 retpass post-end" value="Post Job"> -->
          <!-- <a href="{{ URL::asset('/postajob') }}" id="post" class="cust-btn-primary btn text-capitalize m-0 retpass post-end">Post Job</a> -->
        </div>
        <?php
          $size=sizeof($users);
         if($size!="0")
        { 
          
          ?>
        <div class="col-md-12">

              <div class="card card-block m-0 contact-cust-card myjob_b_80">
                  <h3 class="post-h3 contact-m-bottom">Payment Notification</h3>
                  <div class="row">
                    <div class="col-md-12">
                        <table class="myjob_p_20 myjob_b_40">
                          <tr class="myjob_table_f">
                          <th class="col-md-1 myjob_table text-left">S No</th>
                            <th class="col-md-4 myjob_table text-left">Freelancer Name</th>
                            <th class="col-md-4 myjob_table text-left">Job Title</th>
                            <th class="col-md-3 myjob_table text-left">Amount</th>
                            <th class="col-md-3 myjob_table text-left">Status</th>
                            <!-- <th class="col-md-4 myjob_table text-left">Amount</th> -->
                            <!-- <th class="col-md-1 myjob_table text-left">Offers/Hires</th>
                            <th class="col-md-1 myjob_table text-left">Status</th>
                            <th class="col-md-1 myjob_table text-left">Actions</th> -->
                          </tr>
                           <?php 
                           $i=0;
                           $j=1;
                           while($i<$size)
                           {
                            $jobname=$users[$i]['projectname'];
                            $freelancername=$users[$i]['freelancername'];
                            ?>
                          <tr class="myjob_table_f">

                          <td class=" myjob_table text-left">
                            <h3 class="freelancerpayment"><?php echo $j; ?></h3>
                          </td>
                          <td class="myjob_table text-left">
                            <h3 class="freelancerpayment" id="providername<?php echo $i; ?>"><?php echo $freelancername; ?></h3>
                          </td>
                          <td class=" myjob_table text-left">
                            <h3 class="freelancerpayment" id="jobname<?php echo $i; ?>"><?php echo $jobname; ?></h3>
                          </td>
                           <td class=" myjob_table text-left">
                            <h4 class="freelancerpayment" id="bidvalue<?php echo $i; ?>"><?php echo $users[$i]['bidvalue']; ?><span class="glyphicon glyphicon-usd dollar" aria-hidden="true" style="font-size:15px !important;height: 15px!important;line-height: 13px !important;"></span></h4>
                          </td>
                          <td class=" myjob_table text-left" style="padding-right: 30px;font-size: 15px; font-weight: 700;"><?php echo $users[$i]['status']; ?></td>
                          <?php
                          $i++;
                          $j++;
                          } ?>
                          </tr>
                  </table>
                    </div>
                  </div>

              </div>
<?php } 
if($size=="0")
{
  ?>
              <div class="card card-block m-0 contact-cust-card myjob_b_80">
                  <h3 class="post-h3 contact-m-bottom">Payment Notification</h3>
                  <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="circle-error-icon">
                              <i class="fa fa-exclamation-circle error-exclamation" aria-hidden="true"></i>
                            </div>
                            <h1 class="search-h1">
                            No Payment details found!!!
                            </h1>
                    </div>
                  </div>

              </div>
<?php } ?>

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
