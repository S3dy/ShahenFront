<!DOCTYPE html>
<html>

  <head>
    <title>Admin - Rbs</title>
      <script type="text/javascript" src="{{ URL::asset('/js/jquery-1.12.4.js')}}" /></script>
      <link href="{{ URL::asset('/css/bootstrap.min.css')}} " rel="stylesheet" />
      <script type="text/javascript" src="{{ URL::asset('/js/bootstrap.min.js')}}" /></script>
      <script type="text/javascript" src="{{ URL::asset('/js/admin.js')}}" /></script>
      <link href="{{URL::asset('/css/admin.css')}}" rel="stylesheet" />
      <link rel="stylesheet" href="{{URL::asset('/css/font-awesome.css')}}">
      <link rel="stylesheet" href="{{URL::asset('/css/font.css')}}">
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
        <div class="panel-heading f-weight foot_add">Job Details</div>
        <!-- Table -->
        <div class="panel-body">
         <table class="ctable table-striped">
               <!--  <tr height=42 border=1 bordercolor="#e0e0e0" class="row">
                  <th class="col-md-4 table-layout">S No</th>
                  <th class="col-md-4 table-layout">Provider name</th>
                  <th class="col-md-4 table-layout">Job name</th>
               </tr>
 -->         
         
    <?php
               $arr = $job;
               //$count= sizeof($arr);
                 // $pname=$arr[$i]['provider_name'];
                  //$jobpost=$arr[$i]['name_your_job_posting'];
                  //echo $arr[$i]['country'];
                  ?>
                <tr class="row">
                  <td class="col-md-3">Provider Name:</td>
                  <td class="col-md-9"><?php print $arr[0]['providername']; ?></td>
                </tr>
                <tr class="row">
                  <td>Job Name:</td>
                  <td><?php print $arr[0]['jobname']; ?></td>
                </tr>
                <tr class="row">
                  <td>Payment method:</td>
                  <td><?php print $arr[0]['paytype']; ?></td>
                </tr>
                <tr class="row">
                  <td>Experience Level</td>
                  <td><?php print $arr[0]['experiencelevel']; ?></td>
                </tr>
                <tr class="row">
                  <td>Job details:</td>
                  <td><?php print $arr[0]['helps']; ?></td>
                </tr>
                <tr class="row">
                  <td>Job Skills:</td>
                  <td><?php print $arr[0]['skills']; ?></td>
                </tr>
                 <tr class="row">
                  <td>Job Category:</td>
                  <td><?php print $arr[0]['category']; ?></td>
                </tr>
                 <tr class="row">
                  <td>Job Posted Date:</td>
                  <td><?php print $arr[0]['date']; ?></td>
                </tr>
                

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
</html>
