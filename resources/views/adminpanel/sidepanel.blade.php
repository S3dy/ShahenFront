
     <div class="wrap">
     <aside id="side-menu" class="aside side" role="navigation" style="overflow-y: auto!important;">
            <div class="logo">
              <a href="#">
                <img src="{{ URL::asset('public/images/logo-rbs.png')}}" width="100px" height="100px">
              </a>
            </div>
            <ul class="nav nav-list accordion">
              <ul class="nav nav-list accordion">
                <li class="nav-header">
                  <div class="link freelanmarg">
                    <span class="ic"><i class="fa fa-globe {{ Request::is('admin') ? 'admin-active' : '' }}"  aria-hidden="true"></i></span>
                    <span><a class="{{ Request::is('admin') ? 'admin-active' : '' }}" href="{{URL::asset('/admin')}}">Freelancer</a></span>
                  </div>
                </li>
                <li class="nav-header">
                  <div class="link">
                    <span class="ic"><i class="fa  fa-users {{ Request::is('admin/provider') ? 'admin-active' : '' }}"></i></span>
                    <span><a id="a2" class="{{ Request::is('admin/provider') ? 'admin-active' : '' }}"  href="{{URL::asset('admin/provider')}}">Provider</a></span>
                  </div>
                </li>
                <li class="nav-header">
                  <div class="link">
                    <span class="ic"><i class="fa fa-briefcase {{ Request::is('admin/job') ? 'admin-active' : '' }}"></i></span>
                    <span><a id="a3" class="{{ Request::is('admin/job') ? 'admin-active' : '' }}" href="{{URL::asset('admin/job')}}">Job Management</a></span>
                  </div>
                </li>
                <li class="nav-header">
                  <div class="link">
                    <span class="ic"><i class="fa fa-cloud {{ Request::is('finance') ? 'admin-active' : '' }}"></i></span>
                    <span><a class="{{ Request::is('finance') ? 'admin-active' : '' }}" href="{{ URL::asset('finance')}}">Finance Management</a></span>
                  </div>
                </li>
                <li class="nav-header">
                  <div class="link">
                    <span class="ic"><i class="fa fa-map-marker {{ Request::is('completeprojects') ? 'admin-active' : '' }}"></i></span>
                    <span><a class="{{ Request::is('completeprojects') ? 'admin-active' : '' }}" href="{{ URL::asset('completeprojects')}}">Completed Projects</a></span>
                  </div>
                </li>
                <li class="nav-header">
                  <div class="link">
                    <span class="ic"><i class="fa fa-puzzle-piece {{ Request::is('admin/addfooter') ? 'admin-active' : '' }}" aria-hidden="true"></i></span>
                    <span><a class="{{ Request::is('admin/addfooter') ? 'admin-active' : '' }}" href="{{ URL::asset('admin/addfooter')}}">Footer Management</a></span>
                  </div>
                </li>
                <li class="nav-header">
                  <div class="link">
                    <span class="ic"><i class="fa fa-link {{ Request::is('admin/sitelinks') ? 'admin-active' : '' }}" aria-hidden="true"></i></span>
                    <span><a class="{{ Request::is('admin/sitelinks') ? 'admin-active' : '' }}" href="{{ URL::asset('admin/sitelinks')}}">Sitelink Management</a></span>
                  </div>
                </li>
                <li class="nav-header">
                  <div class="link">
                    <span class="ic"><i class="fa fa-file-image-o {{ Request::is('admin/addimgbanner') ? 'admin-active' : '' }}" aria-hidden="true"></i></span>
                    <span><a class="{{ Request::is('admin/addimgbanner') ? 'admin-active' : '' }}" class="admin-active" href="{{ URL::asset('admin/addimgbanner')}}">Homepage Management</a></span>
                  </div>
                </li>
                <li class="nav-header">
                  <div class="link">
                    <span class="ic"><i class="fa fa-file-image-o {{ Request::is('admin/addhomecontent') ? 'admin-active' : '' }}" aria-hidden="true"></i></span>
                    <span><a class="{{ Request::is('admin/addhomecontent') ? 'admin-active' : '' }}" href="{{ URL::asset('admin/addhomecontent')}}">Howitworks Management</a></span>
                  </div>
                </li>
                <li class="nav-header">
                  <div class="link">
                    <span class="ic"><i class="fa fa-envelope-o {{ Request::is('admin/mailcontent') ? 'admin-active' : '' }}" aria-hidden="true"></i></span>
                    <span><a class="{{ Request::is('admin/mailcontent') ? 'admin-active' : '' }}" href="{{ URL::asset('admin/mailcontent')}}">Email Management</a></span>
                  </div>
                </li>
                <li class="nav-header">
                  <div class="link">
                    <span class="ic"><i class="fa fa-university {{ Request::is('admin/addjobcontent') ? 'admin-active' : '' }}" aria-hidden="true"></i></span>
                    <span><a class="{{ Request::is('admin/addjobcontent') ? 'admin-active' : '' }}" href="{{ URL::asset('admin/addjobcontent')}}">JobFeed Management</a></ span>
                  </div>
                </li>
                <li class="nav-header">
                  <div class="link">
                    <span class="ic"><i class="fa fa-clone {{ Request::is('admin/emailtemplate') ? 'admin-active' : '' }}" aria-hidden="true"></i></span>
                    <span><a class="{{ Request::is('admin/emailtemplate') ? 'admin-active' : '' }}" href="{{ URL::asset('admin/emailtemplate')}}">Email Template</a></span>
                  </div>
                </li>
              </ul>
             </aside>
             </div>

            

            
          