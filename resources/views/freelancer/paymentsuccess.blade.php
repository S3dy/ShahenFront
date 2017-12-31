@extends('layouts.masterforfreelancer')
@section('title', 'Payment Notification - rbs')
@section('header')
  @include('freelancerheader')
@endsection
@section('body')

                          
<div class="container pageapd ">
  <div class="row">
    <div class="col-md-12 mar-t-80">
        <div class="myjob_float row">
<!--           <!— <input type="submit" id="post" class="cust-btn-primary btn text-capitalize m-0 retpass post-end" value="Post Job"> —>
          <!— <a href="{{ URL::asset('/postajob') }}" id="post" class="cust-btn-primary btn text-capitalize m-0 retpass post-end">Post Job</a> —>
 -->        </div>
        <?php
          $size=sizeof($users);
         if($size!="0")
        { 
          
          ?>
        <div class="col-md-12">
     <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
              <form id="myjob" action="jobpost" method="post">
              <div class="card card-block m-0 contact-cust-card myjob_b_80">
                  <h3 class="post-h3 contact-m-bottom">Payment Notification</h3>
                  <div class="row">
                    <div class="col-md-12">
                        <table class="myjob_p_20 myjob_b_40">
                          <tr class="myjob_table_f">
                            <th class="col-md-4 myjob_table text-left">Job Title</th>
                            <th class="col-md-4 myjob_table text-left">Provider</th>
                            <th class="col-md-4 myjob_table text-left">Amount</th>
<!--                             <!— <th class="col-md-1 myjob_table text-left">Offers/Hires</th>
                            <th class="col-md-1 myjob_table text-left">Status</th>
                            <th class="col-md-1 myjob_table text-left">Actions</th> —> -->
                          </tr>
                           <?php 
                           $i=0;
                           while($i<$size)
                           {
                            ?>

                          <tr class="myjob_table_f">

                          <td class="col-md-4 myjob_table text-left">
                            <h3 class="freelancerpayment"><?php echo $users[$i]['projectname']; ?></h3>
                          </td>
                          <td class="col-md-4 myjob_table text-left">
                            <h3 class="freelancerpayment"><?php echo $users[$i]['providername']; ?></h3>
                          </td>
                          <td class="col-md-4 myjob_table text-left">
                            <h3 class="freelancerpayment"><?php echo $users[$i]['bidvalue']; ?><span class="glyphicon glyphicon-usd dollar" aria-hidden="true" style="font-size:15px !important;height: 15px!important;line-height: 14px !important;"></span></h3>
                          </td>
                          <?php
                          $i++;
                          } ?>
                          </tr>
                  </table>
                    </div>
                  </div>

              </div>
<?php } 
else
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
        </form>
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
