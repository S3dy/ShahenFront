@extends('layouts.masterforfreelancer')
@section('title', 'My Jobs - rbs')
@section('header')
  @include('providerheader')
@endsection
@section('body')

                          <?php
                            $obj = $users;
                            $max=sizeof($obj);
                          ?>
<div class="container container-padding-post ">
  <div class="row">
    <div class="col-md-12">
        <div class="myjob_float row">
          <!-- <input type="submit" id="post" class="cust-btn-primary btn text-capitalize m-0 retpass post-end" value="Post Job"> -->
          <a href="{{ URL::asset('/postajob') }}" id="post" class="cust-btn-primary btn text-capitalize m-0 retpass post-end">Post Job</a>
        </div>
        <div class="col-md-12">
              <form id="myjob" action="jobpost" method="post">
               @if($max)
              <div class="card card-block m-0 contact-cust-card myjob_b_80">
                  <h3 class="post-h3 contact-m-bottom">Open Jobs</h3>
                  <div class="row">
                    <div class="col-md-12">
                        <table class="myjob_p_20 myjob_b_40">
                          <tr class="myjob_table_f">
                            <th class="col-md-7 myjob_table text-left">Job Title</th>
                            <!--<th class="col-md-1 myjob_table text-left">Proposals</th>
                            <th class="col-md-1 myjob_table text-left">Messaged</th>
                            <th class="col-md-1 myjob_table text-left">Offers/Hires</th>
                            <th class="col-md-1 myjob_table text-left">Status</th>
                            <th class="col-md-1 myjob_table text-left">Actions</th>-->
                          </tr>
                           @if($flags==1)
                          <?php
                            $obj = $users;
                            $max=sizeof($obj);
                            $i=0;
                            while($i<$max){
                          ?>

                          <tr class="myjob_table_f">

                          <td class="col-md-7 myjob_table text-left">
                            <h3><a href="{{URL('/projectdetails/'.$obj[$i]['jobid'])}}" class="myjob_a"><?php print $obj[$i]['jobname']; ?></a></h3>

                 <!--            <?php
                              //$count=$json[1]['jobs'][$i]['name_your_job_posting'];
                             ?> -->

                            <p class="myjob_p">
                              <span><?php print $obj[$i]['paytype']; ?></span>
                              <!--<span> - Posted</span>
                              <span> 12 days ago</span>
                              <span> by you</span>-->
                            </p>
                            <!--<p><a href="#" class="myjob_a1">View Suggested Freelancers</a></p>-->
                          </td>
                          <!--<td class="col-md-1 myjob_table text-left">
                            <span class="myjob_font">-</span>
                          </td>
                          <td class="col-md-1 myjob_table text-left">
                            <span class="myjob_font">-</span>
                          </td>
                          <td class="col-md-1 myjob_table text-left">
                            <span class="myjob_font">-</span>
                          </td>
                           <td class="col-md-1 myjob_table text-left">
                            <span class="myjob_s">Invite-Only</span>
                          </td>
                          <td class="col-md-1 myjob_table text-left">
                            <span class="myjob_s">
                                  <li class="dropdown" >
                                    <a href="#"  class="a dropdown-toggle" data-trigger="focus" data-toggle="dropdown"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> </a>
                                       <ul class="dropdown-menu custom-dropdown-menuprovider menu1" >
                                          <li class="menuli firstlist {{ Request::is('ab/find-work') ? 'active' : '' }}" ><a href="{{ URL::asset('/ab/find-work/') }}">View Proposal</a></li>

                                        <li class="menuli lastlist"><a href="#">View Job Posting</a></li>
                                          <li class="menuli lastlist"><a href="#">Edit Posting</a></li>
                                          <li class="menuli lastlist"><a href="#">Duplicate Posting</a></li>
                                          <li class="menuli lastlist"><a href="#">Remove Posting</a></li>
                                        </ul>
                                  </li>
                            </span>
                          </td>-->
                          </tr>
                      <?php
                       $i++; } ?>
                       @endif
                  </table>
                    </div>
                  </div>

              </div>
              @endif
                       @if($max =='0')
              <div class="card card-block m-0 contact-cust-card myjob_b_80">
                  <h3 class="post-h3 contact-m-bottom">Open Jobs</h3>
                  <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="circle-error-icon">
                              <i class="fa fa-exclamation-circle error-exclamation" aria-hidden="true"></i>
                            </div>
                            <h1 class="search-h1">
                            No Jobs found!!!
                            </h1>
                    </div>
                  </div>

              </div>
              @endif
<!--               @if($flags =='0')
              <div class="card card-block m-0 contact-cust-card myjob_b_80">
                  <h3 class="post-h3 contact-m-bottom">Open Jobs</h3>
                  <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="circle-error-icon">
                              <i class="fa fa-exclamation-circle error-exclamation" aria-hidden="true"></i>
                            </div>
                            <h1 class="search-h1">
                            No Jobs found!!!
                            </h1>
                    </div>
                  </div>

              </div>
              @endif -->

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

