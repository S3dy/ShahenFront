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
        <div class="pagepad">
        <div class="panel panel-default" style="margin-bottom:150px">
        <!-- Default panel contents -->
        <div class="panel-heading">
        <div class="row">
        <div class="col-md-4 comprotit">
        Job List
        </div>
        <div class="col-md-5">
        </div>
        <div class="col-md-3 comproject">
        <span class="glyphicon glyphicon-search compsearch"></span>
        <input type="text" class="comprofont" placeholder="Search">
        <button >Search</button>
        </div>
        </div>
        </div>
        <div class="panel-heading f-weight">Job List</div>
        <!-- Table -->
        <div class="panel-body">
         <table class="ctable table-striped">
                <tr height=42 border=1 bordercolor="#e0e0e0" class="row">
                  <th class="col-md-4 table-layout">S No</th>
                  <th class="col-md-4 table-layout">Provider name</th>
                  <th class="col-md-4 table-layout">Job name</th>
               </tr>
         
         
    <?php
               $arr = json_decode($v,true);
               $count= sizeof($arr);
               $i=0;
               $j=1;
               while($i<$count){
                  $pname=$arr[$i]['provider_name'];
                  $jobpost=$arr[$i]['name_your_job_posting'];
                  // echo $arr[$i]['country'];
                  ?>
                <tr class="row">
                  <td><?php echo $j; ?></td>
                  <td><?php echo $pname ?></td>
                  <td><?php echo $jobpost ?></td>
                </tr>
                <?php $i++;
                $j++;
              }
          ?>

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
