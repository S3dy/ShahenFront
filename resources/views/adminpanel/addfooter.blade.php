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
          <div class="row">
          <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="margin-bottom:150px">
        <!-- Default panel contents -->
        <div class="panel-heading f-weight">
        <div class="row">
        <div class="col-md-4 comprotit foot_add">
            Footer Management
            </div>
        <div class="col-md-4 comprotit btn_chng">
        <a href="{{url('/admin/addfootcontent')}}" class="cust-btn-primary btn text-capitalize m-0 retpass">Add Footer</a>
        </div>
        </div>
        </div>
        
        <!-- Table -->
        <div class="panel-body table-responsive">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr >
                                            <th><center>S.No</center></th>
                                            <th><center>Footer Name</center></th>
                                            <th><center>Edit Option</center></th>
                                        </tr>
        </thead>
            <tbody>
                              <?php
                       $arr = json_decode($users,true);
                       $max=sizeof($arr);
                        $i=0;
                        $j=1;
                        while($i<$max){
                       //$name=$arr['foot_name'];
                          ?>
                        <tr >
                           
                           <td>
                         
                             {{$j}}  
                          
                           </td>
                           <td>
                            
                             {{$arr[$i]['footname']}}  
                        
                             
                           </td>
                           <td>
                           <center>

                             <span><a href="{{url('/admin/edit/'.$arr[$i]['footerid'])}}" class="edit_btn btn btn-success foot_p foot_bt bor_rad">Edit</a></span>
                             <span><a class="edit_btn btn btn-danger bor_rad foot_bt" href="{{url('/admin/delete/'.$arr[$i]['footerid'])}}">Delete</a></span>

                           </center>
                             
                           </td>
                        </tr>
                        <?php
      
                          $i++;
                          $j++;
                        }
                         ?>
            </tbody>
        </table>
      </div>

      </div>

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
