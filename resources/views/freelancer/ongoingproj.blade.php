@extends('layouts.masterforfreelancer')
@section('title', 'Payment Notification - rbs')
@section('header')
  @include('freelancerheader')
@endsection
@section('body')


<div class="container pagepad  ">
  <div class="row">
    <div class="col-md-12 ">
        <div class="myjob_float row">
          <!-- <input type="submit" id="post" class="cust-btn-primary btn text-capitalize m-0 retpass post-end" value="Post Job"> -->
          <!-- <a href="{{ URL::asset('/postajob') }}" id="post" class="cust-btn-primary btn text-capitalize m-0 retpass post-end">Post Job</a> -->
        </div>
        <?php 

                           $size=sizeof($users);
                           $i=0;
                           $j=1;
        if($size!=0)
        {
          ?>
          <div class="spinner" style="visibility: hidden;" id="spinner">
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
        <div class="col-md-12">

              <div class="card card-block m-0 contact-cust-card myjob_b_80" id="completed">
                  <h3 class="post-h3 contact-m-bottom">Project Status Notification</h3>
                  <div class="row">
                    <div class="col-md-12">
                        <table class="myjob_p_20 myjob_b_40">
                          <tr class="myjob_table_f">
                          <th class="col-md-4 myjob_table text-left">No</th>
                            <th class="col-md-4 myjob_table text-left">Provider</th>
                            <th class="col-md-4 myjob_table text-left">Job Title</th>
                            <th class="col-md-4 myjob_table text-left">Status</th>
                            <!-- <th class="col-md-4 myjob_table text-left">Amount</th> -->
                            <!-- <th class="col-md-1 myjob_table text-left">Offers/Hires</th>
                            <th class="col-md-1 myjob_table text-left">Status</th>
                            <th class="col-md-1 myjob_table text-left">Actions</th> -->
                          </tr>
                           <?php
                           while($i<$size)
                           {
                            $jobname=$users[$i]['jobname'];
                            $jobid=$users[$i]['jobid'];
                            $providername=$users[$i]['providername'];
                            $fstatus=$users[$i]['status'];
                            $providerid=$users[$i]['providerid'];
                            $proposalid=$users[$i]['proposalid'];
                            ?>
<input type="hidden" name="providerid" id="providerid<?php echo $i; ?>" value="<?php echo $providerid ?>">
<input type="hidden" name="jobid" id="jobid<?php echo $i; ?>" value="<?php echo $jobid ?>">
<input type="hidden" name="proposalid" id="proposalid<?php echo $i; ?>" value="<?php echo $proposalid ?>">
<input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                          <tr class="myjob_table_f">

                          <td class="col-md-4 myjob_table text-left">
                            <h3 class="freelancerpayment"><?php echo $j; ?></h3>
                          </td>
                          <td class="col-md-4 myjob_table text-left">
                            <h3 class="freelancerpayment" id="providername<?php echo $i; ?>"><?php echo $providername; ?></h3>
                          </td>
                          <td class="col-md-4 myjob_table text-left">
                            <h3 class="freelancerpayment" id="jobname<?php echo $i; ?>"><?php echo $jobname; ?></h3>
                          </td>
                          <td class="col-md-4 myjob_table text-left">
                            <center><button class="btn btn-success"  <?php if($fstatus =="Completed") { ?> disabled="disabled" <?php }else { ?>onclick="getcompfree({{$i}})" <?php } ?>>Complete</button></center>
                          </td>
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
if($size==0)
{
  ?>
              <div class="card card-block m-0 contact-cust-card myjob_b_80">
                  <h3 class="post-h3 contact-m-bottom">Project Status Notification</h3>
                  <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="circle-error-icon">
                              <i class="fa fa-exclamation-circle error-exclamation" aria-hidden="true"></i>
                            </div>
                            <h1 class="search-h1">
                            No Ongoing Projects found!!!
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

