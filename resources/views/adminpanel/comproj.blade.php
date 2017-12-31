<!DOCTYPE html>
<html>

  <head>
    <title>Admin - Rbs</title>
      <script type="text/javascript" src="{{ URL::asset('public/js/jquery.js')}}" /></script>
      <link href="{{ URL::asset('public/css/bootstrap.min.css')}} " rel="stylesheet" />
      <script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js')}}" /></script>
      <script type="text/javascript" src="{{ URL::asset('public/js/admin.js')}}" /></script>
      <script type="text/javascript" src="{{ URL::asset('public/js/jquery.dataTables.js')}}" /></script>
      <script type="text/javascript" src="{{ URL::asset('public/js/dataTables.bootstrap.js')}}" /></script>
      <link href="{{URL::asset('public/css/admin.css')}}" rel="stylesheet" />
      <link rel="stylesheet" href="{{URL::asset('public/css/font-awesome.css')}}">
      <link rel="stylesheet" href="{{URL::asset('public/css/font.css')}}">
      <link rel="stylesheet" href="{{URL::asset('public/css/dataTables.bootstrap.css')}}">
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
        <div class="panel panel-default" style="margin-bottom:150px">
        <!-- Default panel contents -->
        <div class="panel-heading f-weight foot_add">
        <div class="row">
        <div class="col-md-4 comprotit">
        Completed projects
        </div>
        </div>
        </div>
        <!-- Table -->
        <div class="panel-body table-responsive">
                                <?php 
                                  if($users!="ok")
                                  { 
                                    $count= sizeof($users);
                                    $i=0;
                                    $j=1;
                                  ?>
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr >
                                            <th><center>S.No</center></th>
                                            <th><center>Provider Name</center></th>
                                            <th><center>Job Name</center></th>
                                            <th><center>Total Amount</center></th>
                                            <th><center>Freelancer Name</center></th>
                                            <th><center>Status</center></th>
                                        </tr>
        </thead>
            <tbody>
                                <?php
                                  while($i<$count)
                                  {

                                      $provider_name=$users[$i]['providername'];
                                      $freelancer_name=$users[$i]['freelancername'];
                                      $job_name=$users[$i]['jobname'];
                                      $amount=$users[$i]['totalamount'];
                                                      ?>
                                  <tr >
                                  <td><?php echo $j; ?></td>
                                  <td><?php echo $provider_name; ?></td>
                                  <td><?php echo $job_name; ?></td>
                                  <td><?php echo $amount; ?></td>
                                  <td><?php echo $freelancer_name; ?></td>
                                  <td>completed</td>
                                  </tr>
                                  <?php $i++;
                                  $j++;
                                  }
                                }
                                else
                                {
                                  ?>
                                  <center>No record found</center>
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
</body>
<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
</html>
