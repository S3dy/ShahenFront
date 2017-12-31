@extends('layouts.masterforfreelancer')
@section('title', 'Profile Settings')
@section('header')
  @include('freelancerheader')
@endsection
@section('body')
<div class="container container-padding-change ">
  <div class="spinner" style="visibility: hidden;" id="providerprofilespinner">
            <div id="floatingBarsG">
              <div class="blockG" id="rotateG_01"></div>
              <div class="blockG" id="rotateG_02"></div>
              <div class="blockG" id="rotateG_03"></div>
              <div class="blockG" id="rotateG_04"></div>
              <div class="blockG" id="rotateG_05"></div>
              <div class="blockG" id="rotateG_06"></div>
              <div class="blockG" id="rotateG_07"></div>
              <div class="blockG" id="rotateG_08"></div>
            </div>
    </div>
  <div class="row" id="profilesettingnone">
    <div class="col-md-3 m-t-10">
      <h4 class="contact-h4">Billing</h4>
      <ul class="contact-ul">
        <li><a href="{{ URL::asset('/billingMethod/')}}" class="contact-a">Billing Methods</a></li>
      </ul>
      <?php
      $json = $s;
          $obj = json_decode($json,true);
      ?>

      <h4 class="contact-h4">User Settings</h4>
      <ul class="contact-ul">

        <li><a href="{{ URL::asset('/myprofile')}}" class="contact-a">My Profile</a></li>
        <li class="active"><a href="{{ URL::asset('/ProfileSession')}}" class="contact-a">Profile Settings</a></li>
        <li><a href="{{ URL::asset('freelancerchangepassword')}}" class="contact-a">Change Password</a></li>
      </ul>
    </div>
    
    <div class="col-md-9">
        <h1 class="contact-h1 contact-m-bottom">Profile Settings</h1>
        <div class="profile-m-bottom">
        <div>
          <h2 class="profile-h2">My Profile</h2>
        </div>
        <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <hr class="profile-hr">
        <div class="profile-float"><!--<a href="{{URL::asset('/freelancers/view')}}" class="cust-a profile-a">View my profile as others see it</a>--></div>
        <ul class="profile-ul">
          <li class="row profile-m-50">
            <div class="col-md-4">
              <strong class=" profile-font">Visibility</strong>
            </div>
            <div class="col-md-8">
              <div class="profile-select dropdown">
              <input type="hidden" name="visiblei" id="visiblei123" <?php if($obj['freelancerprofile']['visibility']!=""){ echo 'value="'.$obj['freelancerprofile']['visibility'].'"'; } else{ echo'value=""';} ?>>
                  <button type="button" class="btn btn-default profile-select-btn" data-toggle="dropdown" id="visible_select">
                    <span <?php if($obj['freelancerprofile']['visibility']=="Public"){ echo 'class="display span-pad"'; } else { echo 'class="hider span-pad"'; } ?> id="visibility1" value="a" >Public</span>
                    <span  <?php if($obj['freelancerprofile']['visibility']=="Only show my profile to rbs users logged in"){ echo 'class="display span-pad"'; } else { echo 'class="hider span-pad"'; } ?>  id="visibility2">Only show my profile to rbs users logged in</span>
                    <span <?php if($obj['freelancerprofile']['visibility']=="Private"){ echo 'class="display span-pad"'; } else { echo 'class="hider span-pad"'; } ?> id="visibility3">Private</span>
                    <span><i class="fa fa-angle-down profile-arrow" aria-hidden="true"></i></span>
                  </button>
                  <ul class="profile-dropdown dropdown-menu">
                    <a href="" class="profile-li-a"><li class="profile-li" id="li1" value="Public">Public</li></a>
                    <a href="" class="profile-li-a"><li class="profile-li" id="li2">Only show my profile to rbs users logged in</li></a>
                    <a href="" class="profile-li-a"><li class="profile-li" id="li3">Private</li></a>
                  </ul>
              </div>
            </div>
          </li>
          <li class="row profile-m-30">
            <div class="col-md-4">
              <strong class=" profile-font">Project Preference</strong>
              <span class="glyphicon glyphicon-question-sign profile-pad" aria-hidden="true" data-container="body" data-toggle="popover" data-placement="right" data-content="Don't worry, your selection won't affect how or when we display your profile to clients."></span>
            </div>
            <div class="col-md-8">
              <div class="profile-select dropdown">
              <input type="hidden" name="proj_prefi" id="proj_prefi" <?php if($obj['freelancerprofile']['preference']!=""){ echo 'value="'.$obj['freelancerprofile']['preference'].'"'; } else{ echo'value=""';} ?>>
                  <button type="button" class="btn btn-default preference-select-btn" data-toggle="dropdown" id="preference_select">
                    <span <?php if($obj['freelancerprofile']['preference']=="Both long-term and one-time projects"){ echo 'class="display span-pad"'; } else { echo 'class="hider span-pad"'; } ?> id="preference1">Both long-term and one-time projects</span>
                    <span <?php if($obj['freelancerprofile']['preference']=="Longer-term projects 3+ months long"){ echo 'class="display span-pad"'; } else { echo 'class="hider span-pad"'; } ?> id="preference2">Longer-term projects 3+ months long</span>
                    <span <?php if($obj['freelancerprofile']['preference']=="Shorter-term projects < 3 months long"){ echo 'class="display span-pad"'; } else { echo 'class="hider span-pad"'; } ?> id="preference3">Shorter-term projects < 3 months long</span>
                    <span><i class="fa fa-angle-down profile-arrow" aria-hidden="true"></i></span>
                  </button>
                  <ul class="preference-dropdown dropdown-menu">
                    <a href="" class="profile-li-a"><li class="profile-li" id="pre_li1">Both long-term and one-time projects</li></a>
                    <a href="" class="profile-li-a"><li class="profile-li" id="pre_li2">Longer-term projects 3+ months long</li></a>
                    <a href="" class="profile-li-a"><li class="profile-li" id="pre_li3">Shorter-term projects < 3 months long</li></a>
                  </ul>
              </div>
            </div>
          </li>
         <!-- <li class="row profile-m-30">
            <div class="col-md-4">
              <strong class=" profile-font">Responsiveness</strong>
              <span class="glyphicon glyphicon-question-sign profile-pad" aria-hidden="true" data-container="body" data-toggle="popover" data-placement="right" data-content="We'll list how often you respond to client invitations once you've received more invitations. Top freelancers accept or decline all job invites within 24 hours..Learn more"></span>
            </div>
            <div class="col-md-8">
           
                Your responsiveness will be determined after you receive and respond to a few more job invitations. Top freelancers accept or decline all invitations within 24 hours.
             
            </div>
          </li>
          <li class="row profile-m-30">
            <div class="col-md-4">
              <strong class=" profile-font">Earnings Privacy</strong>
            </div>
            <div class="col-md-8">
              <<!--small>
                Want to keep your earnings private?
                <a href="#" class="cust-a profile-a"> Upgrade to a Freelancer Plus membership</a> to enable this setting.
              </small>
            </div>
          </li>-->
        </ul>
    </div>
    <div class="profile-m-bottom">
        <div>
          <h2 class="profile-h2">Experience Level</h2>
        </div>
        <hr class="profile-hr">
        <div class="row profile-m-40">
          <div class="col-md-4">
          <label>
            <div  <?php if($obj['freelancerprofile']['experiencelevel']=="Entry Level"){ echo 'class="text-center profile-tag profile-border feed-tab-border"'; } else { echo 'class="text-center profile-tag profile-border"'; } ?>  id="profile_entry">
            <input <?php if($obj['freelancerprofile']['experiencelevel']=="Entry Level"){ echo 'checked="checked"'; } ?> type="radio" name="en_le" hidden="hidden" value="entry level">
          </label>
          <input type="hidden" name="exp_lvl" id="exp_lvl" value="<?php echo $obj['freelancerprofile']['experiencelevel']; ?>">
              <h3 class="profile-h3" >Entry Level</h3>
              <small class="text-muted profile-f-weight">
                  Starting to build experience in my field of work
              </small>
            </div>
          </div>
          <div class="col-md-4">
          <label>
            <div <?php if($obj['freelancerprofile']['experiencelevel']=="Intermediate"){ echo 'class="text-center profile-tag profile-border feed-tab-border"'; } else { echo 'class="text-center profile-tag profile-border"'; } ?>  id="profile_inter">
            <input <?php if($obj['freelancerprofile']['experiencelevel']=="Intermediate"){ echo 'checked="checked"'; } ?> type="radio" name="en_le" hidden="hidden" value="intermediate level">
          </label>
              <h3 class="profile-h3">Intermediate</h3>
              <small class="text-muted profile-f-weight">
                  A few years of professional experience in my field
              </small>
            </div>
          </div>
          <div class="col-md-4">
          <label>
            <div <?php if($obj['freelancerprofile']['experiencelevel']=="Expert"){ echo 'class="text-center profile-tag profile-border feed-tab-border"'; } else { echo 'class="text-center profile-tag profile-border"'; } ?> id="profile_expert">
            <input <?php if($obj['freelancerprofile']['experiencelevel']=="Expert"){ echo 'checked="checked"'; } ?> type="radio" name="en_le" hidden="hidden"  value="expert level">
          </label>
              <h3 class="profile-h3">Expert</h3>
              <small class="text-muted profile-f-weight">
                  Many years of professional experience doing complex projects
              </small>
            </div>
          </div>
        </div>
    </div>
<!--     <div class="profile-m-bottom">
        <div>
         <span> <h2 class="profile-h2 catflo catmrg">Categories</h2></span>
         <span class="fa fa-pencil-square catflo catpen" id="majoricon" aria-hidden="true"></span>
        </div>
        <hr class="profile-hr catcl">

<div class="major-categories" id="majoriconcl">
         <div>
          <h3 class="category-h3 catcl">What are the main services you offer to clients?</h3>
          <p class="catp">Select up to 10 categories that match your professional experience. Choosing carefully helps clients find you in the marketplace.</p>
        </div>
        
        
        <div class="category-chip" id="chiplist" >
        <div class="chip catchip">Desktop Software Development
          <span class="closebtn catcls"onclick="this.parentElement.style.display='none'">&times;</span>
        </div>
        <div class="catchip" id="gc1">
          <span class="closebtn catcls" id="gend" onclick="this.parentElement.style.display='none'">&times;</span>
        </div> -->
         <!-- <div class="chip catchip">Desktop Software Development
          <span class="closebtn catcls" onclick="this.parentElement.style.display='none'">&times;</span>
        </div>
         <div class="chip catchip ">Desktop Software Development
          <span class="closebtn catcls" onclick="this.parentElement.style.display='none'">&times;</span>
        </div>
         <div class="chip catchip">Desktop Software Development
          <span class="closebtn catcls" onclick="this.parentElement.style.display='none'">&times;</span>
        </div>
         <div class="chip catchip">Desktop Software Development
          <span class="closebtn catcls" onclick="this.parentElement.style.display='none'">&times;</span>
        </div>
         <div class="chip catchip">Desktop Software Development
          <span class="closebtn catcls" onclick="this.parentElement.style.display='none'">&times;</span>
        </div> -->
  <!--       </div> -->

<!--         <div class="category">
        <span class="fa fa-chevron-circle-down greencat" id="1caticon" aria-hidden="true"></span>
        <span class="profile-h2 greenweb" id="cat1icon">Web, Mobile & Software Dev</span>
        <div class="row cat1group cato1" id="cat1">
        <div class="col-md-6">
        
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" onclick="afterchip()" value="Entry Level" 
                          onchange="selectchecker(this,1)" >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick1" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span id="c1">Desktop Software Development</span>
                         </label>
                       </div>
          
          <div class="checkbox customcheckboxfilter catpad" >
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" id="li2" onclick="afterchip()" value="Entry Level" 
                          onchange="selectchecker(this,2)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick2" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span id="g1"> Game Development</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,3)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick3" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Product Management</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,4)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick4" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Scripts & Utilities</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,5)" >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick5" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Web & Mobile Design</span>
                         </label>
                       </div>
    
            </div>

            <div class="col-md-6">
               <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,6)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick6" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Ecommerce Development</span>
                         </label>
                       </div>
          
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,7)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick7" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span> Mobile Development</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,8)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick8" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>QA & Testing</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,9)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick9" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Web Development</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,10)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick10" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Other - Software Development</span>
                         </label>
                       </div>
            </div>
        </div>
        </div>

         <div class="category">
        <span class="fa fa-chevron-circle-down greencat" id="2caticon" aria-hidden="true"></span>
        <span class="profile-h2 greenweb" id="cat2icon">IT & Networking</span>
        <div class="row cat1group cato2" id="cat2">
        <div class="col-md-6">
        
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,11)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick11" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Database Administration</span>
                         </label>
                       </div>
          
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,12)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick12" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span> Information Security</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,13)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick13" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Other - IT & Networking</span>
                         </label>
                       </div>
                       </div>
            <div class="col-md-6">
               <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,14)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick14" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span> ERP / CRM Software</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,15)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick15" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Network & System Administration</span>
                         </label>
                       </div>
              </div>
            </div>
            </div>

             <div class="category">
        <span class="fa fa-chevron-circle-down greencat" id="3caticon" aria-hidden="true"></span>
        <span class="profile-h2 greenweb" id="cat3icon">Data Science & Analytics</span>
        <div class="row cat1group cato3" id="cat3">
        <div class="col-md-6">
        
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,16)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick16" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>A/B Testing</span>
                         </label>
                       </div>
          
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,17)" >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick17" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span> Data Extraction / ETL</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,18)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick18{" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Machine Learning</span>
                         </label>
                       </div>
                <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,19)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick19" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Other Data Science & Analytics</span>
                         </label>
                       </div>
                 </div>

            <div class="col-md-6">
               <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,20)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick20" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Data Visualization</span>
                         </label>
                       </div>

           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,21)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick21" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Data Mining & Management</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,22)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick22" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Quantitative Analysis</span>
                         </label>
                       </div>
              </div>
            </div>
            </div>

            <div class="category">
        <span class="fa fa-chevron-circle-down greencat" id="4caticon" aria-hidden="true"></span>
        <span class="profile-h2 greenweb" id="cat4icon">Engineering & Architecture</span>
        <div class="row cat1group cato4" id="cat4">
        <div class="col-md-6">

          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,23)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick23" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>3D Modeling & CAD</span>
                         </label>
                       </div>

          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,24)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick24" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Chemical Engineering</span>
                         </label>
                       </div>
          
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,25)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick25" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span> Contract Manufacturing</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,26)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick26" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Interior Design</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,27)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick27" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Product Design</span>
                         </label>
                       </div>
            </div>

            <div class="col-md-6">
               <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,28)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick28" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Architecture</span>
                         </label>
                       </div>
          
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,29)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick29" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span> Civil & Structural Engineering</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,30)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick30" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Electrical Engineering</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,31)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick31" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Mechanical Engineering</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,32)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick32" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Other - Engineering & Architecture</span>
                         </label>
                       </div>
            </div>
        </div>
        </div>

            <div class="category">
        <span class="fa fa-chevron-circle-down greencat" id="5caticon" aria-hidden="true"></span>
        <span class="profile-h2 greenweb" id="cat5icon">Design & Creative</span>
        <div class="row cat1group cato5" id="cat5">
        <div class="col-md-6">

          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,33)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick33" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Animation</span>
                         </label>
                       </div>

          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,34)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick34" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Graphic Design</span>
                         </label>
                       </div>
          
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,35)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick35" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span> Logo Design & Branding</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,36)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick36" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Presentations</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,37)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick37" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Voice Talent</span>
                         </label>
                       </div>
            </div>

            <div class="col-md-6">
               <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,38)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick38" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Audio Production</span>
                         </label>
                       </div>
          
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,39)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick39" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span> Illustration</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,40)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick40" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Photography</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,41)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick41" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Video Production</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,42)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick42" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Other - Design & Ccreative</span>
                         </label>
                       </div>
            </div>
        </div>
        </div>

           <div class="category">
        <span class="fa fa-chevron-circle-down greencat" id="6caticon" aria-hidden="true"></span>
        <span class="profile-h2 greenweb" id="cat6icon">Writing</span>
        <div class="row cat1grou cato6" id="cat6">
        <div class="col-md-6">

          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,43)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick43" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Academic Writing & Reserch</span>
                         </label>
                       </div>

          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,44)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick44" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Copywriting</span>
                         </label>
                       </div>
          
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,45)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick45" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span> Editing & Proofreading</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,46)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick46" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>REsumes & Coverletters</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,47)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick47" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Web Content</span>
                         </label>
                       </div>
            </div>

            <div class="col-md-6">
               <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,48)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick48" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Article & Blog Writing</span>
                         </label>
                       </div>
          
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,49)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick49" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span> Creative Writing</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,50)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick50" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Grant Writing</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,51)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick51" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Technical Writing</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,52)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick52" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Other - Writing</span>
                         </label>
                       </div>
            </div>
        </div>
        </div>

        <div class="category">
        <span class="fa fa-chevron-circle-down greencat" id="7caticon" aria-hidden="true"></span>
        <span class="profile-h2 greenweb" id="cat7icon">Translation</span>
        <div class="row cat1group cato7" id="cat7">
        <div class="col-md-6">
        
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,53)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick53" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>General Translation</span>
                         </label>
                       </div>
          
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,54)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick54" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span> Medical Translation</span>
                         </label>
                       </div>
                 </div>

            <div class="col-md-6">
               <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,55)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick55" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Legal Translation</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,56)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick56" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Technical Translation</span>
                         </label>
                       </div>
              </div>
            </div>
            </div>


            <div class="category">
        <span class="fa fa-chevron-circle-down greencat" id="8caticon" aria-hidden="true"></span>
        <span class="profile-h2 greenweb" id="cat8icon">Legal</span>
        <div class="row cat1group cato8" id="cat8">
        <div class="col-md-6">
        
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,57)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick57" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Contract Law</span>
                         </label>
                       </div>
          
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,58)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick58" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span> Criminal law</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,59)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick59" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Intellectual Property Law</span>
                         </label>
                       </div>
                <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,60)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick60" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Other - Legal</span>
                         </label>
                       </div>
                 </div>

            <div class="col-md-6">
               <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,61)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick61" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Corporate Law</span>
                         </label>
                       </div>

           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,)62"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick62" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Family Law</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,63)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick63" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Paralegal Service</span>
                         </label>
                       </div>
              </div>
            </div>
            </div>


            <div class="category">
        <span class="fa fa-chevron-circle-down greencat" id="9caticon" aria-hidden="true"></span>
        <span class="profile-h2 greenweb" id="cat9icon"> Admin Support</span>
        <div class="row cat1group cato9" id="cat9">
        <div class="col-md-6">
        
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,64)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick64" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Data Entry</span>
                         </label>
                       </div>
          
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,65)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick65" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span> Project Management</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,66)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick66" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Web Research</span>
                         </label>
                       </div>
                 </div>

            <div class="col-md-6">
               <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,67)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick67" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Personal / Virtual Assistant</span>
                         </label>
                       </div>

           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,68)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick68" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Transcription</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,69)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick69" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Other - Admin Support</span>
                         </label>
                       </div>
              </div>
            </div>
            </div>

               <div class="category">
        <span class="fa fa-chevron-circle-down greencat" id="10caticon" aria-hidden="true"></span>
        <span class="profile-h2 greenweb" id="cat10icon"> Customer Service</span>
        <div class="row cat1group cato10" id="cat10">
        <div class="col-md-6">
        
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,70)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick70" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Customer Service</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,71)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick71" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Other - Customer Service</span>
                         </label>
                       </div>
                 </div>

            <div class="col-md-6">
               <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,72)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick72" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Technical Service</span>
                         </label>
                       </div>
              </div>
            </div>
            </div>
           
             <div class="category">
        <span class="fa fa-chevron-circle-down greencat" id="11caticon" aria-hidden="true"></span>
        <span class="profile-h2 greenweb" id="cat11icon">Sales & Marketing</span>
        <div class="row cat1group cato11" id="cat11">
        <div class="col-md-6">
        
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,73)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick73" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Display & Advertising</span>
                         </label>
                       </div>
          
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,74)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick74" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span> Lead Generation</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,75)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick75" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Marketing Strategy</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,76)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick76" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>SEM - Search Engine Marketing</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,77)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick77" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>SMM - Social Media Marketing</span>
                         </label>
                       </div>

            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,78)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick78" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Other - Sales & Marketing</span>
                         </label>
                       </div>
    
            </div>

            <div class="col-md-6">
               <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,79)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick79" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Email & Marketing Automation</span>
                         </label>
                       </div>
          
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,80)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick80" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span> Market & Customer Research</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,81)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick81" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Public Relations</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,82)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick82" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>SEO - Search Engine Opimization</span>
                         </label>
                       </div>
           
           <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,83)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick83" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Telemarketing & Telesales</span>
                         </label>
                       </div>
            </div>
        </div>
        </div>

         <div class="category">
        <span class="fa fa-chevron-circle-down greencat" id="12caticon" aria-hidden="true"></span>
        <span class="profile-h2 greenweb" id="cat12icon"> Accounting & Consulting</span>
        <div class="row cat1group cato12" id="cat12">
        <div class="col-md-6">
        
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,84)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick84" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Accounting</span>
                         </label>
                       </div>
          
          <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,85)"  >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick85" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span> Human Resources</span>
                         </label>
                       </div>
           
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,86)" >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick86" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Other - Accounting & Consulting</span>
                         </label>
                       </div>
                 </div>

            <div class="col-md-6">
               <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,87)" >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick87" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Financial Planning</span>
                         </label>
                       </div>

          
            <div class="checkbox customcheckboxfilter catpad">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="Entry Level" value="Entry Level" 
                          onchange="selectchecker(this,88)" >
                         <span class="customcheckbox">
                            <i class="fa fa-check tick tick88" style="display:none" aria-hidden="true"></i>
                         </span>
                         <span>Management Consulting</span> 
                         </label>
                       </div>
              </div>
            </div>
            </div> -->
<!--             <div class="catbut">
            <button type="button" id="catsavebut" class="profsetbut">Save Categories</button>
            <a class="can" id="catcanbut" href="#">Cancel</a>
            </div>
</div> <!-- major categories -->

<!--         <div class="talents" id="cattalents">
        <div>
          <h3 class="category-h3 catcl">Web, Mobile & Software Dev</h3>
        </div>
        <span>
          <strong class="profile-font catcl">Web Development</strong>
        </span>
        </div>
    </div>  -->
    <button type="submit" id="catsavecfr" class="profsetbut">Save Changes</button>
    <br></br><br></br><br></br>
    <!--<div class="profile-m-bottom">
        <div>
          <h2 class="profile-h2">Linked Accounts</h2>
        </div>
        <hr class="profile-hr">
        <div class="row profile-m-40">
          <div class="col-md-4">
          <a href="#" target="_blank" class="profile-social-a">
            <div class="account-tag profile-border profile-social-inner">
              <div class="row">
                  <span class="profile-icons"><i class="fa fa-facebook social-face" aria-hidden="true"></i></span>
                  <span class="profile-span">Facebook</span>

              </div>
            </div>
          </a>

          </div>
          <div class="col-md-4">
          <a href="#" target="_blank" class="profile-social-a">
            <div class="account-tag profile-border profile-social-inner">
              <div class="row">
                  <span class="profile-icons"><i class="fa fa-twitter social-twet" aria-hidden="true"></i></span>
                  <span class="profile-span">Twitter</span>

              </div>
            </div>
          </a>

          </div>
          <div class="col-md-4">
          <a href="github" target="_blank" class="profile-social-a">
            <div class="account-tag profile-border profile-social-inner">
              <div class="row">
                  <span class="profile-icons"><i class="fa fa-github-alt social-git" aria-hidden="true"></i></span>
                  <span class="profile-span">Git Hub</span>

              </div>
            </div>
          </a>

          </div>
          <div class="col-md-4">
          <a href="#" class="profile-social-a">
            <div class="account-tag profile-border profile-social-inner">
              <div class="row">
                  <span class="profile-icons"><i class="fa fa-stack-overflow social-stack" aria-hidden="true"></i></span>
                  <span class="profile-span">StackOverflow</span>

              </div>
            </div>
          </a>

          </div>
          <div class="col-md-4">
          <a href="#" class="profile-social-a">
            <div class="account-tag profile-border profile-social-inner">
              <div class="row">
                  <span class="profile-icons"><i class="fa fa-behance social-be" aria-hidden="true"></i></span>
                  <span class="profile-span">Behance</span>

              </div>
            </div>
          </a>

          </div>
          <div class="col-md-4">
          <a href="#" class="profile-social-a">
            <div class="account-tag profile-border profile-social-inner">
              <div class="row">
                  <span class="profile-icons"><i class="fa fa-dribbble social-stack" aria-hidden="true"></i></span>
                  <span class="profile-span">Dribbble</span>

              </div>
            </div>
          </a>

          </div>
          <div class="col-md-4">
          <a href="#" class="profile-social-a">
            <div class="account-tag profile-border profile-social-inner">
              <div class="row">
                  <span class="profile-icons"><i class="fa fa-deviantart social-face" aria-hidden="true"></i></span>
                  <span class="profile-span">DeviantART</span>

              </div>
            </div>
          </a>

          </div>
          <div class="col-md-4">
          <a href="/signup/create-account/google" target="_blank" class="profile-social-a">
            <div class="account-tag profile-border profile-social-inner">
              <div class="row">
                  <span class="profile-icons"><i class="fa fa-google-plus social-be" aria-hidden="true"></i></span>
                  <span class="profile-span">Google</span>

              </div>
            </div>
          </a>

          </div>
    </div>
    </div>-->
  </div>
</div>

@endsection


@section('footer')
  <script>
     $( document ).ready(function() {
       var request = $.ajax({
         url: "{{URL('/')}}/footer" ,
       type: "GET",       
    });
    request.done(function(msg){
       $('#dynamicfooter').html(msg);
   });
});
  </script>
  <div id="dynamicfooter"></div>
@endsection

