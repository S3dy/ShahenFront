@extends('layouts.master')
@section('title', 'Ongoing Projects - rbs')
@section('header')
  @include('providerheader')
@endsection
@section('body')


<div class="container pagepad  ">
  <div class="row">
    <div class="col-md-9 col-md-offset-2 ">
        <div class="myjob_float row">
          <!-- <input type="submit" id="post" class="cust-btn-primary btn text-capitalize m-0 retpass post-end" value="Post Job"> -->
          <!-- <a href="{{ URL::asset('/postajob') }}" id="post" class="cust-btn-primary btn text-capitalize m-0 retpass post-end">Post Job</a> -->
        </div>
        
        <div class="col-md-12">
        <?php 
                          $size=sizeof($users);
                          $i=0;
                          $j=1;
        if($size!=0)
        {
          ?>
              <div class="card card-block m-0 contact-cust-card myjob_b_80">
                  <h3 class="post-h3 contact-m-bottom">Project Status Notification</h3>
                  <div class="row">
                    <div class="col-md-12">
                        <table class="myjob_p_20 myjob_b_40">
                          <tr class="myjob_table_f">
                          <th class="col-md-2 myjob_table text-left">No</th>
                            <th class="col-md-4 myjob_table text-left">Freelancer</th>
                            <th class="col-md-6 myjob_table text-left">Job Title</th>
                            <!-- <th class="col-md-4 myjob_table text-left">Status</th> -->
                            <!-- <th class="col-md-4 myjob_table text-left">Amount</th> -->
                            <!-- <th class="col-md-1 myjob_table text-left">Offers/Hires</th>
                            <th class="col-md-1 myjob_table text-left">Status</th>
                            <th class="col-md-1 myjob_table text-left">Actions</th> -->
                          </tr>
                          <?php
                          while ($i<$size) {
                            $freelancername=$users[$i]['freelancername'];
                            $jobname=$users[$i]['jobname'];
                          ?>
                          <tr class="myjob_table_f">

                          <td class="col-md-2 myjob_table text-left">
                            <h3 class="freelancerpayment"><?php echo $j; ?></h3>
                          </td>
                          <td class="col-md-4 myjob_table text-left">
                            <h3 class="freelancerpayment" id="providername"><?php echo $freelancername; ?></h3>
                          </td>
                          <td class="col-md-6 myjob_table text-left">
                            
                          <h3 id="jobname"><a href="{{URL('/providerofferview/'.$users[$i]['proposalid'].'/'.$users[$i]['jobid'])}}" class="myjob_a"><?php echo $jobname; ?></a></h3>
                          </td>
                          <!-- <td class="col-md-4 myjob_table text-left">
                            <center><button class="btn btn-success">Complete</button></center>
                          </td> -->
                          </tr>
                          <?php
                            $i++;
                            $j++;
                          }
                          ?>
                  </table>
                    </div>
                  </div>
              </div>
              <?php
                }
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
              <?php
              }
              ?>
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

