<header class="navheader">

@php $a=Session::get('username');
      $b = Session::get('dp');
@endphp

   <div class="container fpagecont">

     <ul class="nav navbar-nav navbar-left ">
        <li class="l"><a class="logo log-img" href="{{url('/ab/find-work/')}}">
             <img class="img-responsive" src="{{ URL::asset('public/images/logo-rbs.png')}}" />
            </a>
        </li>
          <li class="dropdown" >
          <a href="#"  class="a dropdown-toggle" data-trigger="hover" data-toggle="dropdown">FIND</a>
             <ul class="dropdown-menu custom-dropdown-menu menu1" >
                <li class="menuli firstlist {{ Request::is('ab/find-work') ? 'active' : '' }}" ><a href="{{ URL::asset('/ab/find-work/') }}">Find Works</a></li>
                <li class="menuli  {{ Request::is('ab/proposals') ? 'active' : '' }}"><a  href="{{ URL::asset('/ab/proposals/') }}">Proposal</a></li>
                <!-- <li class="menuli lastlist {{ Request::is('myprofile') ? 'active' : '' }}"><a href="{{ URL::asset('/myprofile') }}">Profile</a></li> -->
                <li class="menuli lastlist {{ Request::is('ongoingproj') ? 'active' : '' }}"><a href="{{ URL::asset('/ongoingproj') }}">Ongoing Projects</a></li>

              </ul>
          </li>
          <li class="mes">
              <a href="{{url('/freelancermessage')}}"  class="a {{ Request::is('freelancer_message') ? 'activenav' : '' }}"  >NOTIFICATION<span class="badge header-badge"><div id="noti">0</div></span> </a>
          </li>
          <li class="mes">
              <a href="{{ URL::asset('/freelancerpaymentmessage') }}"  class="a {{ Request::is('freelancerpaymentmessage') ? 'activenav' : '' }}"  >Payments</a>
          </li>

          <!--<li class="mes">
              <a href="{{url('/freelancer_chat')}}"  class="a {{ Request::is('freelancer_chat') ? 'activenav' : '' }}" >CHAT ROOM</a>
          </li>-->
    </ul>

     <ul class="nav navbar-nav navbar-right ">
       
        <li class="dropdown">
              <a class="figpic dropdown-toggle" data-toggle="dropdown" role="button" title="<?php echo $a;?>" aria-haspopup="true">
                <img src="<?php if($b){ echo URL::asset('/public/profileimages/'.$b);} else {echo URL::asset('public/images/default.jpg'); } ?>" class="avatar avatar-xs">
                <span class="organization-selector mlicon"><?php echo $a;?></span>
                <span><i class="namesection fa fa-angle-down" aria-hidden="true"></i></span>
              </a>

              <ul class="dropdown-menu cdropdown">
                <!-- <li class="livalue">
                    <button class="button" id="online">Online</button><button class="button" id="Offline">Offline</button>
                </li> -->
               <a href="{{ URL::asset('/myprofile') }}" style="text-decoration: none;">
               <li class="first livalue2 liwithimage" >
                  <img src="<?php if($b){ echo URL::asset('/public/profileimages/'.$b);} else {echo URL::asset('public/images/default.jpg'); } ?>" class="avatar avatar-xs" >
                  <span class="pl"><?php echo $a;?></span>
                  <div class="liusertype">Freelancers</div>
                </li>
                </a>
                <li class="livalue2 hover" onclick="location.href='{{ URL::asset('/ProfileSession') }}'" >
                    <span class="pull-left liicon"><i class="fa fa-cog" aria-hidden="true"></i></span>
                    <span class="pull-left litext"><a href="{{ URL::asset('/ProfileSession') }}">Settings</a></span>
                </li>
                <li class="last livalue2 hover" id="logouter" onclick="location.href='{{ URL::asset('/UserAccountLogout') }}'">
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
        url: "{{ URL::asset('freelancernotification') }}",
       type: "get",
     datatype:'json'
   });
        request.done(function(msg){
          console.log(msg);
         var json=jQuery.parseJSON(msg);
         //var count=json.length;
        //console.log(count);
    document.getElementById("noti").innerHTML = msg;        });
});
</script>