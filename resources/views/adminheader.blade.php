<header class="navheader">
<?php $a=Session::get('my_name');?>

   <div class="container fpagecont">

     <ul class="nav navbar-nav navbar-left ">
        <li class="l"><a class="logo log-img" href="{{url('/ab/find-work/')}}">
             <img class="img-responsive" src="{{ URL::asset('/images/logo-rbs.png')}}" />
            </a>
        </li>

    </ul>

     <ul class="nav navbar-nav navbar-right ">

        <li class="dropdown">
              <a class="figpic dropdown-toggle" data-toggle="dropdown" role="button" title="Adithya Nj" aria-haspopup="true">
              <i class="fa fa-user-circle-o" aria-hidden="true" class="avatar avatar-xs" style="font-size: 25px;"></i>
                <!-- <img src="https://odesk-prod-portraits.s3.amazonaws.com/Users:adithyanj:PortraitUrl?AWSAccessKeyId=1XVAX3FNQZAFC9GJCFR2&amp;Expires=2147483647&amp;Signature=UMJx0TDlBH0di%2BU%2FJf4xMB80XZ4%3D&amp;1482228375785481" class="avatar avatar-xs"> -->
                <span class="organization-selector mlicon">Admin</span>
                <span><i class="namesection fa fa-angle-down" aria-hidden="true"></i></span>
              </a>

              <ul class="dropdown-menu cdropdown">
                <!-- <li class="livalue">
                    <button class="button" id="online">Online</button><button class="button" id="Offline">Offline</button>
                </li> -->
               <li class="first livalue2 liwithimage" >
               <i class="fa fa-user-circle-o" aria-hidden="true" class="avatar avatar-xs" style="font-size: 25px;"></i>
                  <!-- <img src="https://odesk-prod-portraits.s3.amazonaws.com/Users:adithyanj:PortraitUrl?AWSAccessKeyId=1XVAX3FNQZAFC9GJCFR2&amp;Expires=2147483647&amp;Signature=UMJx0TDlBH0di%2BU%2FJf4xMB80XZ4%3D&amp;1482228375785481" class="avatar avatar-xs" > -->
                  <span class="pl">Admin</span>
                  <!-- <div class="liusertype">Freelancers</div> -->
                </li>
                <li class="livalue2 hover" ng-click="redirect('{{ URL::asset('/freelancers/settings/') }}')">
                    <span class="pull-left liicon"><i class="fa fa-cog" aria-hidden="true"></i></span>
                    <span class="pull-left litext"><a href="{{ URL::asset('/freelancers/settings/') }}">Settings</a></span>
                </li>
                <li class="last livalue2 hover" id="logouter" ng-click="redirect('{{ URL::asset('logout') }}')">
                  <span class="pull-left liicon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
                  <span class="pull-left litext"><a   href="{{ URL::asset('logout') }}">Logout</a></span>
                  <span class="pull-right pr10">Admin</span>
                </li>
            </ul>
        </li>

     </ul>
</div>
</header>
