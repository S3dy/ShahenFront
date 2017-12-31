<header class="navheader">
<?php $a=Session::get('firstname');
$b = Session::get('prodp');
?>

   <div class="container fpagecont">
free
     <ul class="nav navbar-nav navbar-left ">
        <li class="l"><a class="logo log-img" href="{{url('/postajob/')}}">
             <img class="img-responsive" src="{{ URL::asset('public/images/logo-rbs.png')}}" />
            </a>
        </li>
          <li class="dropdown" >
          <a href="#"  class="a dropdown-toggle" data-trigger="hover" data-toggle="dropdown">JOBS </a>

             <ul class="dropdown-menu custom-dropdown-menu menu1" >
                <li class="menuli firstlist {{ Request::is('ab/find-work') ? 'active' : '' }}" ><a href="{{ URL::asset('/myjob') }}">My Jobs</a></li>
                <li class="menuli lastlist {{ Request::is('freelancers') ? 'active' : '' }}"><a href="{{ URL::asset('/postajob') }}">Post a Job</a></li>
                <li class="menuli lastlist {{ Request::is('freelancers') ? 'active' : '' }}"><a href="{{ URL::asset('/providerpaymentmessage') }}">Payment view</a></li>
              </ul>
          </li>
          <li class="mes">
              <a href="{{url('/providermessage')}}"  class="a">NOTIFICATION<span class="badge header-badge"><div id="noti">0</div></span>  </a>
          </li>
          <li class="mes">
              <a href="{{url('/providerongoingprojects')}}"  class="a">ONGOING PROJECTS</a>
          </li>
          <!--<li class="mes">
              <a href="{{url('/provider_chat')}}"  class="a">CHAT ROOM</a>
          </li>-->
    </ul>

     <ul class="nav navbar-nav navbar-right ">
        <!--<li>
            <div class="osearch">
                <i class="icon1 fa fa-search" aria-hidden="true"></i>
                <i class="icon2 fa fa-angle-down" aria-hidden="true"></i>
                <input type ="text" placeholder="Find Freelancers" >
            </div>
        </li>-->
        <li class="dropdown">
              <a class="figpic dropdown-toggle" data-toggle="dropdown" role="button" title="<?php echo $a;?>" aria-haspopup="true">
                <img src="<?php if($b){ echo URL::asset('/public/profileimages/'.$b);} else {echo URL::asset('public/images/default.jpg'); } ?>" class="avatar avatar-xs">
                <span class="organization-selector mlicon" id="headfname"><?php echo $a;?></span>
                <span><i class="namesection fa fa-angle-down" aria-hidden="true"></i></span>
              </a>

              <ul class="dropdown-menu cdropdown">
                <!-- <li class="livalue">
                    <button class="button" id="online">Online</button><button class="button" id="Offline">Offline</button>
                </li> -->
                <a href="{{url('/providerprofile')}}" style="text-decoration: none;">
               <li class="first livalue2 liwithimage" >
                  <img src="<?php if($b){ echo URL::asset('/public/profileimages/'.$b);} else {echo URL::asset('public/images/default.jpg'); } ?>" class="avatar avatar-xs" >
                  <span class="pl"><?php echo $a?></span>
                  <div class="liusertype">Client</div>
                </li>
                </a>
                <li class="livalue2 hover" onclick="location.href='{{ URL::asset('/providerprofile') }}'" >
                    <span class="pull-left liicon"><i class="fa fa-cog" aria-hidden="true"></i></span>
                    <span class="pull-left litext"><a href="{{ URL::asset('/providerprofile') }}">Settings</a></span>
                </li>
                <li class="last livalue2 hover" id="logouter" onclick="location.href='{{ URL::asset('/UserAccountLogout') }}'" >
                  <span class="pull-left liicon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
                  <span class="pull-left litext"><a   href="{{ URL::asset('/UserAccountLogout') }}">Logout</a></span>
                  <span class="pull-right pr10"><?php echo $a?></span>
                </li>
            </ul>
        </li>

     </ul>
</div>
</header>

<script>
$( document ).ready(function() {
  //alert('hi');
        var request = $.ajax({
        url: "{{ URL::asset('providernotification') }}",
       type: "get",
     datatype:'json'
   });
        request.done(function(msg){
          console.log(msg);
         //var json=jQuery.parseJSON(msg);
         //var count=json.length;
        //console.log(count);
    document.getElementById("noti").innerHTML = msg; 
           });
});
</script>
