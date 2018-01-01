<!DOCTYPE html>
<html>

  <head>
    <title>Admin - Rbs</title>
      <script type="text/javascript" src="{{ URL::asset('/js/jquery.js')}}" /></script>
      <link href="{{ URL::asset('/css/bootstrap.min.css')}} " rel="stylesheet" />
      <script type="text/javascript" src="{{ URL::asset('/js/bootstrap.min.js')}}" /></script>
      <script type="text/javascript" src="{{ URL::asset('/js/admin.js')}}" /></script>
      <script type="text/javascript" src="{{ URL::asset('/js/jquery.dataTables.js')}}" /></script>
      <script type="text/javascript" src="{{ URL::asset('/js/dataTables.bootstrap.js')}}" /></script>
      <link href="{{URL::asset('/css/admin.css')}}" rel="stylesheet" />
      <link rel="stylesheet" href="{{URL::asset('/css/font-awesome.css')}}">
      <link rel="stylesheet" href="{{URL::asset('/css/font.css')}}">
      <link rel="stylesheet" href="{{URL::asset('/css/dataTables.bootstrap.css')}}">
      <link rel="stylesheet" href="{{URL::asset('/images/favicon.ico')}}">
      <style>

        html, body {
    margin: 0px;
    padding: 0px;
    min-height: 100%;
    height: 100%;
}
#wrapper {
    min-height: 100%;
    height: auto !important;
    height: 100%;
    margin: 0 auto -50px; /* the bottom margin is the negative value of the footer's height */
    position: relative
}
#footer {
    height: 50px;
}
#footer-content {
    border: 1px solid magenta;
    height: 32px; /* height + top/bottom paddding + top/bottom border must add up to footer height */
    padding: 8px;
}
.push {
    height: 50px;
    clear: both;
}

#content {
    height: 100%;
}
#sidebar {
    border: 1px solid skyblue;
    width: 100px;
    position: absolute;
    left: 0;
    top: 50px;
    bottom: 50px;
}
#main {
    margin-left: 211px;
}

    </style>

  </head>
  <body  style="background-color: #f9f9f9">

<div id="wrapper">
     <div id="content">
    
 @include('adminpanel.sidepanel') 

<div id="main">
      <nav class="nav-bar navbar-inverse navheight" role="navigation">
        <div id ="top-menu" class="container-fluid active">
        <div class="nav navbar-nav navbar-left">
        <li class="adminname">ADMIN</li>
        </div>
          <div class="nav navbar-nav navbar-right">
            <li class="adminlogout" style="line-height:50px;">
                <a href="{{url('/adminlogout')}}"><span class="fa fa-power-off adlogout"></span>Logout</a>
            </li>
            
            </div>
        </div>
    </nav>
    <section class="content-inner section-bg ">
        <div class="pagepad financemarg">
          @if(session('flags') == 1)
       <div class="alert alert-success " id="alert_successbydynamic">
          Your Transaction was Successfull.
        </div>
        @endif
        @if(session('flags') == 2)
       <div class="alert alert-danger" id="alert_successbydynamic">
          Sorry!!Your Transaction was failed. @if(session('err'))  {{session('err')}} @endif
        </div>
        @endif
        <div class="panel panel-default" style="margin-bottom:150px">
        <!-- Default panel contents -->
         <div class="panel-heading">
        <div class="row">
        <div class="col-md-4 comprotit f-weight foot_add">
        Finance Management
        </div>
        </div>
        </div>
        <!-- Table -->
        <div class="panel-body table-responsive">
        <?php 
          if($users!="empty")
          { ?>
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr >
                                            <th><center>S.No</center></th>
                                            <th><center>Provider name</center></th>
                                            <th><center>Freelancer Name</center></th>
                                            <th><center>Job Name</center></th>
                                            <th><center>Amount</center></th>
                                            <th><center>Freelancer Status</center></th>
                                            <th><center>Provider Status</center></th>
                                            <th><center>Approve</center></th>
                                        </tr>
        </thead>
            <tbody>
                                    <?php
      
                                    $arr =$users;
                                     $count= sizeof($arr);
                                    $i=0;
                                    $j=1;
                                    while($i<$count)
                                    {

                                        $provider_name=$arr[$i]['providername'];
                                        $freelancer_name=$arr[$i]['freelancername'];
                                        
                                        // $cardno=$arr[$i]['cardno'];
                                        // $expmonth=$arr[$i]['expmonth'];
                                        // $expyear=$arr[$i]['expyear'];
                                        // $cvv=$arr[$i]['cvv'];
                                        $job_name=$arr[$i]['jobname'];
                                         $pro_id=$arr[$i]['proposalid'];
                                        $bid_value=$arr[$i]['bidvalue'];
                                        $status=$arr[$i]['status'];
                                        $providerstatus=$arr[$i]['providerstatus'];
                                        $approval = $arr[$i]['approve'];
                                        $jobid = $arr[$i]['jobid'];
                                                        ?>

                                    <tr >
                                     <form action="{{URL::asset('adminapprove')}}" method="post"  >
                                       <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                      <input type="hidden" id="bidvalue<?php echo $i; ?>" name="bidvalue"  value="<?php echo $bid_value; ?>">
                                      <input  type="hidden" id="proposalid<?php echo $i; ?>" name="proposalid" value="<?php echo $pro_id; ?>" >
                                      <input type = "hidden" name = "providername" id="p_name" value = "<?php echo $provider_name; ?>">
                                      <input type = "hidden" name = "funtoken" id="cfrs" value = "<?php echo csrf_token(); ?>">
                                      <input type = "hidden" name = "freelancername" id="f_name" value = "<?php echo $freelancer_name; ?>">
                                      <input type = "hidden" name = "jobname" id="job_name" value = "<?php echo $job_name; ?>">
                                      <input type = "hidden" name = "jobid" id="jobid" value = "<?php echo $jobid; ?>">
                                      <input type = "hidden" name = "status" id="status" value = "<?php echo $providerstatus; ?>">
                                      <input type = "hidden" name = "freelancerid" id="freelancerid" value = "<?php echo $arr[$i]['freelancerid']; ?>">
                                      <input type = "hidden" name = "providerid" id="providerid" value = "<?php echo $arr[$i]['providerid']; ?>">
                                      <input type = "hidden" name = "paymentid" id="paymentid" value = "<?php echo $arr[$i]['paymentid']; ?>">
                                    <td><?php echo $j; ?></td>
                                    <td><?php echo $provider_name; ?></td>
                                    <td><?php echo $freelancer_name; ?></td>
                                    <td><?php echo $job_name;?></td>
                                    <td><?php echo $bid_value; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td><?php echo $providerstatus; ?></td>
                                    <?php if($approval == 1) { ?>
                                          <td><center><button class="btn btn-success" disabled="disabled" style="border-radius: 1px;" >Approved</button></center></td>
                                    <?php }else { ?>

                                    <td><center><button type="submit" class="btn btn-success" style="border-radius: 1px;" >Approve</button></center></td>
                                    
                                    <?php } ?>
                                    </form>
                                    </tr>
                                    <?php $i++;
                                    $j++;
                                    }
                                  }
                                  else
                                  {
                                    ?>
                                    <tr ><center>No records found</center></tr>
                                  <?php } ?>
            </tbody>
        </table>
      </div>
      </div>


    </div>




</section>
</div>


    </div>
    </div>
    <div class="push"></div>
</div>
<div id="footer" style="padding-bottom: 0px;background-color: #2a3f54; height:120px;
  bottom:0;
  right:0;
  width:100%;">

                <div>
                    <div class="col-md-12 text-center  footer-margin">
                        <p class="copyright" id="p"> © 2016 - 2017 Sha7en LLC.</p>
                        <a href="{{url('legal/terms')}}" onmouseout="this.style.color = '#7d7d7d'" class="footer-a">Terms of Service</a>
                        </br>

                    </div>
                </div>

</div>
<script src='https://js.stripe.com/v2/' type='text/javascript'></script>


        <script type="text/javascript">
        function make(i)
        {

            // alert("hi");
           // var cardno=$('#cardno'+i).val();
            //var cvv=$('#cvv'+i).val();
            //var expmonth=$('#expmonth'+i).val();
            //var expyear=$('#expyear'+i).val();
            var amt = $('#bid_value'+i).val();
            var payid = $('#pro_id'+i).val();
            var cfrs = $('#cfrs').val();
            var name = $('#f_name').val();
            //alert(payid);
            // alert(cardno+"  "+cvv+"  "+expmonth+"  "+expyear+"   "+amt);
                //Stripe.setPublishableKey('{{env('publishable_key')}}'); 
                //   Stripe.createToken({
                //     number: $('#cardno'+i).val(),
                //     cvc: $('#cvv'+i).val(),
                //     exp_month: $('#expmonth'+i).val(),
                //     exp_year: $('#expyear'+i).val()
                //   }, stripeResponseHandler);

              // function stripeResponseHandler(status, response) {
              //   if (response.error) {
              //       alert("can't Process This Data");
              //   } else {

                // var token=response['id'];
                // alert(token);
                var nan = 'amt='+ amt +'&payid=' + payid + '&_token=' + cfrs + '&name=' + name ;
                 console.log(nan);
                var req=$.ajax({
                type: "POST",
                url: "{{URL::asset('admin/req')}}",
               // url:'admin/req',
                data: nan,
                cache: false,
                async: false,
                processData: false,
                success: function(data) {
                  console.log(data);
                  //location.reload();
                 // window.location.href="{{ URL::asset('finance')}}";
                }
                });
                // req.done(function(res){
                //     alert(res);
                // });

            //     }
            // }
            }</script>

</body>
<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
</html>
