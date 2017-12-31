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
      <script type="text/javascript">
        function admin_validation() {
     var p =$('#ranjit').val();
   if(p.length == 0 )
     {
        $('#ranjit').addClass('bor_col');
        return false;
     }
    else
     {
        $('#ranjit').removeClass('bor_col');
        return true;
     }
   }

   // $('#lol').click(function(){

 // });
      </script>
      <script type="text/javascript">
 //  $('#lol').click(function(){
 //              admin_validation();
 // });
            function lol()
  {
   admin_validation();
 }
      </script>
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
    margin-left: 211px
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
         <?php
          $json = $users;
          $obj = json_decode($json,true);
      ?>
     <section class="content-inner section-bg ">
        <div class="pagepad">
          <div class="row">

          <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading f-weight foot_add">SocialPage links</div>
              <div class="panel-body">
               <form class="form-horizontal" action="{{URL('/')}}/admin/uploadsitelinks" method="post" >
                <input type="hidden" name="splitter" value="social"> 
                 <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Facebook</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{$obj[0]['facebook']['facebooksitelink']}}" name ="facebook" placeholder="link">
                    </div>
                    <div class="checkbox col-sm-2">
                      <label>
                        <input type="checkbox" <?php if($obj[0]['facebook']['status']=='1') { ?> checked="checked" <?php } ?>  name="facebookstatus" value="enable">
                         Enable
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Twitter</label>
                     <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{$obj[0]['twitter']['twittersitelink']}}"  name="twitter" placeholder="link">
                    </div>
                    <div class="checkbox col-sm-2">
                      <label>
                        <input type="checkbox" <?php if($obj[0]['twitter']['status']=='1') { ?> checked="checked" <?php } ?>  name="twitterstatus" value="enable">
                         Enable
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Googleplus</label>
                     <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{$obj[0]['google']['googlesitelink']}}"  name="google" placeholder="link">
                    </div>
                    <div class="checkbox col-sm-2">
                      <label>
                        <input type="checkbox" <?php if($obj[0]['google']['status']=='1') { ?> checked="checked" <?php } ?> name="googlestatus" value="enable">
                         Enable
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Linkedin</label>
                     <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{$obj[0]['linkedin']['linkedsitelink']}}" name = "linkedin" placeholder="link">
                    </div>
                    <div class="checkbox col-sm-2">
                      <label>
                        <input type="checkbox" <?php if($obj[0]['linkedin']['status']=='1') { ?> checked="checked" <?php } ?> name="linkedinstatus" value="enable">
                         Enable
                      </label>
                    </div>
                  </div>
 <!--                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Youtube</label>
                     <div class="col-sm-8">
                    </div>
                    <div class="checkbox col-sm-2">
                      <label>
                       name="youtubestatus" value="enable">
                         Enable
                      </label>
                    </div>
                  </div> -->
                  <div class="form-group">
                     <div class="col-md-10 col-md-offset-2">
                       <span><button  class="btn btn-success foot_p bor_rad" type="submit">Save</button></span>
                       
                     </div>
                  </div>
                
                </form>
                
              </div>
            </div>
            <br><br>
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading f-weight foot_add">MobileApp links

              </div>
              <div class="panel-body">
                <form class="form-horizontal" action="{{URL('/')}}/admin/uploadsitelinks" method="post" >
                <input type="hidden" name="splitter" value="mobile"> 
                <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Android</label>
                     <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{$obj[0]['android']['androidsitelink']}}" name="android" placeholder="link">
                    </div>
                    <div class="checkbox col-sm-2">
                      <label>
                        <input type="checkbox" <?php if($obj[0]['android']['status']=='1') { ?> checked="checked" <?php } ?> name="androidstatus" value="enable">
                         Enable
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">iOS</label>
                     <div class="col-sm-8">
                      <input type="text" value="{{$obj[0]['ios']['iossitelink']}}" class="form-control" name="ios"  placeholder="link">
                    </div>
                    <div class="checkbox col-sm-2">
                      <label>
                        <input type="checkbox" <?php if($obj[0]['ios']['status']=='1') { ?> checked="checked" <?php } ?> name="iosstatus" value="enable">
                         Enable
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-10 col-md-offset-2">
                       <span><button  class="btn btn-success foot_p bor_rad" type="submit">Save</button></span>
                       
                     </div>
                  </div>
                  
                </form>
              </div>
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
                        <p class="copyright" id="p"> © 2016 - 2017 RBS Global Inc.</p>
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
