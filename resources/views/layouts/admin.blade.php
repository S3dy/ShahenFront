<!DOCTYPE html>
<html>

    <head>

            <title>@yield('title')</title>
            <script type="text/javascript" src="{{ URL::asset('/js/jquery-1.12.4.js')}}" /></script>
            <link href="{{ URL::asset('/css/bootstrap.min.css')}} " rel="stylesheet" />
            <script type="text/javascript" src="{{ URL::asset('/js/bootstrap.min.js')}}" /></script>
            <script type="text/javascript" src="{{ URL::asset('/js/admin.js')}}" /></script>
            <script type="text/javascript" src="{{ URL::asset('/js/script.js')}}" /></script>
            <script type="text/javascript" src="{{ URL::asset('/js/jquery.dataTables.js')}}" /></script>
            <script type="text/javascript" src="{{ URL::asset('/js/dataTables.bootstrap.js')}}" /></script>
            <link href="{{URL::asset('/css/admin.css')}}" rel="stylesheet" />
            <link rel="stylesheet" href="{{URL::asset('/css/font-awesome.css')}}">
            <link rel="stylesheet" href="{{URL::asset('/css/font.css')}}">
            <link rel="stylesheet" href="{{URL::asset('/css/dataTables.bootstrap.css')}}">


    </head>
<body>
      <div class="wrap">

<aside id="side-menu" class="aside side" role="navigation">
      <div class="logo">
       <a href="#"><img  src="{{ URL::asset('/images/logo-rbs.png')}}" style="height:45px; width:106px;padding-top:5px;"/></a>
    </div>
@yield('content')
         <ul class="nav nav-list accordion">
          <li class="nav-header">

            <div class="link"><i class="fa fa-globe" aria-hidden="true"></i><a id="a1" class="admin-a" href="{{URL::asset('admin/login')}}">Freelancer</a></div>

          </li>

          <li class="nav-header">
            <div class="link"><i class="fa fa-lg fa-users"></i><a id="a2" class="admin-a"href="{{URL::asset('admin/provider')}}">Provider</a></div>

          </li>

          <li class="nav-header">
            <div class="link"><i class="fa fa-cloud"></i>Finance</div>

          </li>

           <li class="nav-header">
            <div class="link"><i class="fa fa-lg fa-map-marker"></i>Post Management</div>

          </li>



      </ul>
      @endsection
  </aside>

      <div class="content">
            <nav class="nav-bar navbar-inverse navheight" role="navigation">
                <div id ="top-menu" class="container-fluid active">
                  <ul class="nav navbar-nav">
                    <li style="line-height:50px;">
                        <i class="fa fa-user fa-fw"style="color:#222;"></i><span style="font-family:'Gotham';width:60px;">Admin</span>
                    </li>
                    <li class="dropdown movable">
                        <a href="#" class="dropdown-toggle col1" data-toggle="dropdown"><span class="caret"></span></a>
                        <ul class="dropdown-menu navbg-border" role="menu">
                            <li><a href="#"><span class="fa fa-user"></span>Change Password</a></li>

                            <li class="divider"></li>
                            <li><a href="{{url('/adminlogout')}}"><span class="fa fa-power-off"></span>Logout</a></li>
                        </ul>
                    </li>

                    </ul>
                </div>
            </nav>
              <section class="content-inner section-bg ">
   @yield('content')
   <!-- footer -->
   <footer class="foot">


                      <div>
                          <div class="col-md-12 text-center  footer-margin">
                              <p class="copyright" id="p"> © 2016 - 2017 Sha7en LLC.</p>
                              <a href="#" onmouseout="this.style.color = '#7d7d7d'" class="footer-a">Terms of Service</a>
                              </br>
                              <a href="#" id="a" onmouseout="this.style.color = '#7d7d7d'" class="footer-a">Cookie Policy</a>

                          </div>

                      </div>




            </footer>
     </section>
 </div>
</div>

 </body>
 </html>