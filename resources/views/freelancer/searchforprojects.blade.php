@extends('layouts.masterforfreelancer')
@section('title', 'Freelance Web Design Jobs online - rbs')
@section('header')
 @include('freelancerheader')
@endsection
@section('body')
<?php
    $obj = $users;
    $max=sizeof($obj);
    // $obj1=json_decode($users1,true);
    // $max1=sizeof($obj1);
    //$obj2=json_decode($users2,true);
    $max2=sizeof($users2[0]['category']);
 ?>

<div class="container  pagepad">
    <form action="{{ URL('/searchresult') }}" method="get" id="search_pro">
    <div class="row">
          <div class="col-md-3">
              <h1 class="find-work-h1">Find Work</h1>
          </div>
          <div class="col-md-9">
            
              <input type="text" name="search" id="search" placeholder="Search for Jobs" value="<?php echo $_GET['search'] ?>" class="project-search-box ">
              <div class="dropdown">
              <ul class="dropdown-menu searchmenu dynamicsearchlist" aria-labelledby="dLabel" >
                   <li >Relavance</li>
                   <li >Newest</li>
                   <li>Client Spending</li>
                   <li >Client Rating</li>
                   <li>Client Spending</li>
                   <li >Client Rating</li>
              </ul>
              </div>
              <label>
              <button type="submit" class="btn btn-primary find-work-search">
                   <i class="fa fa-search" aria-hidden="true"></i>
              </button>
              </label>

            
            <span class="hider error-color" id="search_pro_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
          </div>
    </div>
        <div class="row m-top-20    FilterCheckbox">
            <div class="col-md-3 ">
                    <label class="project-label" style="margin-bottom: 20px;">Category</label>
                    <!-- <div>
                      <select class="project_select">
                        <option value="All Categories" active>All Categories</option>
                        <option value="IT & Networking">IT & Networking</option>
                        <option value="Legal">Legal</option>
                        <option value="Writing">Writing</option>
                      </select>
                    </div> -->
                    @php 
                      $category = "All Categories";
                      if( isset($_GET['category']) && !empty($_GET['category']) ){
                         $category = $_GET['category'];
                      }
                    @endphp
                    <input type="hidden" name="category" id="categoryname" value="{{$category}}" >
                    <div class="dropdown pull-left mminus" style="margin-bottom: 20px!important;">

                            <button id="category_select" type="button" class="proselect" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                                <span class="pull-left mintext selectedcategory" id="selectedcategory">{{$category}}</span>
                                <span class="pull-right marrow"><i class="namesection fa fa-angle-down" aria-hidden="true"></i></span>
                            </button>

                            <ul  class="dropdown-menu cmenu " aria-labelledby="category_select">
                            <li onclick="changecategory('All Categories')">All Categories</li>
                            <?php 
                            $k=0;
                            while($k<$max2){
                            ?>
                                <li onclick="changecategory('{{$users2[0]['category'][$k]}}')">{{$users2[0]['category'][$k]}}</li>
                             <?php 
                             $k++; }
                             ?>
                            </ul>

                  </div>
                   <div class="m-top-20">
                     <!--<section>
                       <div>
                         <label class="project-label" id="job-type">Job Type</label>
                        <span class="" id="all-job-type"><a href="#">show all</a></span>
                       </div>

                       <div class="project-col3-size">
                          <!- <input type="checkbox" name="hourly" value="hourly" checked="checked">Hourly(199)->
                          <div class="checkbox customcheckboxfilter form-group">
                            <label class="checkcss">
                              <input type="checkbox" class="hide" name="hourly" value="hourly" checked="checked" onchange="selectfilter(this,4)">
                              <span class="customcheckbox"  ><i class="fa fa-check tick tick4 open" aria-hidden="true"></i></span>
                          <span>Hourly(199)</span>
                          </label>
                       </div>
                       </div>
                       <div class="project-col3-size">
                          <!- <input type="checkbox" name="Fixed Price" value="Fixed Price" checked="checked">Fixed Price(211) ->
                          <div class="checkbox customcheckboxfilter form-group">
                            <label class="checkcss">
                              <input type="checkbox" class="hide" name="Fixed Price" value="Fixed Price" checked="checked" onchange="selectfilter(this,5)">
                              <span class="customcheckbox"  ><i class="fa fa-check tick tick5 open" aria-hidden="true"></i></span>
                          <span>Fixed Price(211)</span>
                          </label>
                       </div>
                       </div>
                     </section>-->
                     @php
                        $level = array();
                        if(isset($_GET['level'])){
                            $level = $_GET['level'];
                         }
                     @endphp
                   </div>
                   <div class="m-top-20"  >
                   <form>
                     <section>
                       <div>
                         <label class="project-label">Experience Level</label>
                       </div>

                       <div class="project-col3-size">
                          <div class="checkbox customcheckboxfilter form-group">
                            <label class="checkcss">
                              <input type="checkbox" class="hide" name="level[]"  value="Entry Level" onchange="selectfilter(this,1),this.form.submit()" @php if(in_array("Entry Level",$level)) echo "checked='checked'"; @endphp >
                              <span class="customcheckbox"  ><i id="tick1" class="fa fa-check tick @php if(in_array("Entry Level",$level)) echo 'showcheckbox'; @endphp  open" aria-hidden="true"></i></span>
                          <span>Entry Level - $</span>
                          </label>
                       </div>
                       </div>

                       <div class="project-col3-size">
                       <div class="checkbox customcheckboxfilter">
                            <label class="checkcss">
                         <input type="checkbox" class="hide" name="level[]"  value="Intermediate Level"
                          onchange="selectfilter(this,2),this.form.submit()" @php if(in_array("Intermediate Level",$level)) echo "checked='checked'"; @endphp  >
                         <span class="customcheckbox">
                            <i id="tick2" class="fa fa-check tick  @php if(in_array("Intermediate Level",$level)) echo 'showcheckbox'; @endphp   open" aria-hidden="true"></i>
                         </span>
                         <span>Intermediate level- $$</span>
                         </label>
                       </div>
                       </div>

                       <div class="project-col3-size">
                       <div class="checkbox customcheckboxfilter">
                            <label class="checkcss">
                          <input type="checkbox" class="hide" name="level[]" value="Expert Level"
                          onchange="selectfilter(this,3),this.form.submit()" @php if(in_array("Expert Level",$level)) echo "checked='checked'"; @endphp >
                          <span class="customcheckbox">
                            <i id="tick3" class="fa fa-check tick @php if(in_array("Expert Level",$level)) echo 'showcheckbox'; @endphp  open" aria-hidden="true"></i>
                          </span>
                          <span>Expert Level- $$$</span>
                       </label>
                       </div>
                       </div>

                     </section>
                     </form>
                   </div>
                   <!--<div class="m-top-20">
                    <section>
                       <div>
                         <label class="project-label">Client History</label>
                       </div>
                       <div class="project-col3-size">
                           <input type="checkbox" name="No Hires" value="No Hires" checked="checked">No Hires (165) 
                          <div class="checkbox customcheckboxfilter form-group">
                            <label class="checkcss">
                              <input type="checkbox" class="hide" name="No Hires" value="No Hires" checked="checked" onchange="selectfilter(this,6)">
                              <span class="customcheckbox"  ><i class="fa fa-check tick tick6 open" aria-hidden="true"></i></span>
                          <span>No Hires (165)</span>
                          </label>
                       </div>
                       </div>
                       <div class="project-col3-size">
                          <input type="checkbox" name="1 to 9 Hires" value="1 to 9 Hires" checked="checked">1 to 9 Hires (131) 
                          <div class="checkbox customcheckboxfilter form-group">
                            <label class="checkcss">
                              <input type="checkbox" class="hide" name="1to9Hires" value="1 to 9 Hires" checked="checked" onchange="selectfilter(this,7)">
                              <span class="customcheckbox"  ><i class="fa fa-check tick tick7 open" aria-hidden="true"></i></span>
                          <span>1 to 9 Hires (131)</span>
                          </label>
                       </div>
                       </div>
                       <div class="project-col3-size">
                           <input type="checkbox" name="10+ Hires" value="10+ Hires" checked="checked">10+ Hires (112) 
                          <div class="checkbox customcheckboxfilter form-group">
                            <label class="checkcss">
                              <input type="checkbox" class="hide" name="10_Hires" value="10+ Hires" checked="checked" onchange="selectfilter(this,8)">
                              <span class="customcheckbox"  ><i class="fa fa-check tick tick8 open" aria-hidden="true"></i></span>
                          <span>10+ Hires (112)</span>
                          </label>
                       </div>
                       </div>
                     </section>
                   </div> -->
                   <!--<div class="m-top-20">
                     <section>
                       <div>
                         <label class="project-label">Client Info</label>
                       </div>
                       <div class="project-col3-size">
                           <input type="checkbox" name="My Previous Clients" value="My Previous Clients">My Previous Clients 
                          <div class="checkbox customcheckboxfilter form-group">
                            <label class="checkcss">
                              <input type="checkbox" class="hide" name="My Previous Clients" value="My Previous Clients" checked="checked" onchange="selectfilter(this,9)">
                              <span class="customcheckbox"  ><i class="fa fa-check tick tick9 open" aria-hidden="true"></i></span>
                          <span>My Previous Clients</span>
                          </label>
                       </div>
                       </div>
                       <div class="project-col3-size">
                           <input type="checkbox" name="Payment Verified" value="Payment Verified">Payment Verified 
                          <div class="checkbox customcheckboxfilter form-group">
                            <label class="checkcss">
                              <input type="checkbox" class="hide" name="Payment Verified" value="Payment Verified" checked="checked" onchange="selectfilter(this,10)">
                              <span class="customcheckbox"  ><i class="fa fa-check tick tick10 open" aria-hidden="true"></i></span>
                          <span>Payment Verified</span>
                          </label>
                       </div>
                       </div>
                     </section>
                   </div>--> 
                  <!-- <div class="m-top-20">
                     <section>
                       <div>
                         <label class="project-label">Budget (fixed price)</label>
                       </div>
                       <div class="project-col3-size">

                       </div>
                       <span id="amount"></span>
                       <div id="slider-range"></div>

                     </section>
                   </div> -->
                   <!--<div class="m-top-20">
                     <section>
                       <div>
                         <label class="project-label">Location</label>
                       </div>
                       <div class="project-col3-size">
                          <label class="project-search-label">
                              <i class="fa fa-search" aria-hidden="true" style="font-size: 14px;color: #37a000"></i>
                          </label>
                          <input type="textbox" name="search" class="search-text" placeholder="Find Jobs">
                       </div>
                     </section>
                   </div>-->
                   @php
                        $length = array();
                        if(isset($_GET['length'])){
                            $length = $_GET['length'];
                         }
                     @endphp
                   <div class="m-top-20">
                     <section>
                       <div>
                         <label class="project-label">Project Length</label>
                       </div>
                       <div class="project-col3-size">
                          <!-- <input type="checkbox" name="Hours or Days" value="Hours or Days" checked="checked">Hours or Days (32) -->
                          <div class="checkbox customcheckboxfilter form-group">
                            <label class="checkcss">
                              <input type="checkbox" class="hide" name="length[]" value="More than 6 months"  onchange="selectfilter(this,11),this.form.submit()" @php if(in_array("More than 6 months",$length)) echo "checked='checked'"; @endphp >
                              <span class="customcheckbox"  ><i id="tick11" class="fa fa-check tick @php if(in_array("More than 6 months",$length)) echo "showcheckbox"; @endphp open" aria-hidden="true"></i></span>
                          <span>More than 6 months </span>
                          </label>
                       </div>
                       </div>
                       <div class="project-col3-size">
                          <!-- <input type="checkbox" name="Weeks" value="Weeks" checked="checked">Weeks (58) -->
                          <div class="checkbox customcheckboxfilter form-group">
                            <label class="checkcss">
                              <input type="checkbox" class="hide" name="length[]" value="3 to 6 months" @php if(in_array("3 to 6 months",$length)) echo "checked='checked'"; @endphp onchange="selectfilter(this,12),this.form.submit()">
                              <span class="customcheckbox"  ><i id="tick12" class="fa fa-check tick @php if(in_array("3 to 6 months",$length)) echo "showcheckbox"; @endphp open" aria-hidden="true"></i></span>
                          <span>3 to 6 months </span>
                          </label>
                       </div>
                       </div>
                       <div class="project-col3-size">
                          <!-- <input type="checkbox" name="Months" value="Months" checked="checked">Months (72) -->
                          <div class="checkbox customcheckboxfilter form-group">
                            <label class="checkcss">
                              <input type="checkbox" class="hide" name="length[]" value="1 to 3 months"  @php if(in_array("1 to 3 months",$length)) echo "checked='checked'"; @endphp  onchange="selectfilter(this,13),this.form.submit()">
                              <span class="customcheckbox"  ><i id="tick13" class="fa fa-check tick  @php if(in_array("1 to 3 months",$length)) echo "showcheckbox"; @endphp open" aria-hidden="true"></i></span>
                          <span>1 to 3 months </span>
                          </label>
                       </div>
                       </div>
                       <div class="project-col3-size">
                          <!-- <input type="checkbox" name="6 months" value="6 months" checked="checked">> 6 months (40) -->
                          <div class="checkbox customcheckboxfilter form-group">
                            <label class="checkcss">
                              <input type="checkbox" class="hide" name="length[]" value="Less than 1 month"  @php if(in_array("Less than 1 month",$length)) echo "checked='checked'"; @endphp  onchange="selectfilter(this,14),this.form.submit()">
                              <span class="customcheckbox"  ><i id="tick14" class="fa fa-check tick  @php if(in_array("Less than 1 month",$length)) echo "showcheckbox"; @endphp open" aria-hidden="true"></i></span>
                          <span>Less than 1 month </span>
                          </label>
                       </div>
                       </div>
                       <div class="project-col3-size">
                          <!-- <input type="checkbox" name="Not Specified" value="Not Specified" checked="checked">Not Specified (0) -->
                          <div class="checkbox customcheckboxfilter form-group">
                            <label class="checkcss">
                              <input type="checkbox" class="hide" name="length[]" value="Less than 1 week"  @php if(in_array("Less than 1 week",$length)) echo "checked='checked'"; @endphp  onchange="selectfilter(this,15),this.form.submit()">
                              <span class="customcheckbox"  ><i id="tick15" class="fa fa-check tick  @php if(in_array("Less than 1 week",$length)) echo "showcheckbox"; @endphp open" aria-hidden="true"></i></span>
                          <span>Less than 1 week</span>
                          </label>
                       </div>
                       </div>
                     </section>
                   </div>

                   @php
                        $duration = array();
                        if(isset($_GET['duration'])){
                            $duration = $_GET['duration'];
                         }
                     @endphp

                   <div class="m-top-20">
                     <section>
                       <div>
                         <label class="project-label">Hours per Week</label>
                       </div>
                       <div class="project-col3-size">
                          <!-- <input type="checkbox" name="Part Time" value="Part Time" checked="checked">Part Time (129) -->
                          <div class="checkbox customcheckboxfilter form-group">
                            <label class="checkcss">
                              <input type="checkbox" class="hide" name="duration[]" value="More than 30 hrs/week"  onchange="selectfilter(this,16),this.form.submit()"  @php if(in_array("More than 30 hrs/week",$duration)) echo "checked='checked'"; @endphp >
                              <span class="customcheckbox"  ><i id="tick16" class="fa fa-check tick @php if(in_array("More than 30 hrs/week",$duration)) echo "showcheckbox"; @endphp  open" aria-hidden="true"></i></span>
                          <span>More than 30 hrs/week</span>
                          </label>
                       </div>
                       </div>
                       <div class="project-col3-size">
                          <!-- <input type="checkbox" name="Full Time" value="Full Time" checked="checked">Full Time (73) -->
                          <div class="checkbox customcheckboxfilter form-group">
                            <label class="checkcss">
                              <input type="checkbox" class="hide" name="duration[]" value="Less than 30 hrs/week"  onchange="selectfilter(this,17),this.form.submit()"  @php if(in_array("Less than 30 hrs/week",$duration)) echo "checked='checked'"; @endphp>
                              <span class="customcheckbox"  ><i id="tick17" class="fa fa-check tick @php if(in_array("Less than 30 hrs/week",$duration)) echo "showcheckbox"; @endphp open" aria-hidden="true"></i></span>
                          <span>Less than 30 hrs/week</span>
                          </label>
                       </div>
                       </div>
                       <div class="project-col3-size">
                          <!-- <input type="checkbox" name="Not Specified" value="Not Specified" checked="checked">Not Specified (0) -->
                          <div class="checkbox customcheckboxfilter form-group">
                            <label class="checkcss">
                              <input type="checkbox" class="hide" name="duration[]" value="I dont know yet"  onchange="selectfilter(this,18),this.form.submit()"  @php if(in_array("I dont know yet",$duration)) echo "checked='checked'"; @endphp>
                              <span class="customcheckbox"  ><i id="tick18" class="fa fa-check tick @php if(in_array("I dont know yet",$duration)) echo "showcheckbox"; @endphp open" aria-hidden="true"></i></span>
                          <span>I don't know yet</span>
                          </label>
                       </div>
                       </div>
                     </section>
                   </div>
                </div>
                @if($max1!=0)
            <div class="col-md-9 m-top-10 <?php if($users == "not found") echo 'hide';?>">
                <div class="card card-block m-0 project-cust-card">


                              <!--<div class="row">
                                <div class="col-md-4 text-center cust-project">
                                  If you like this search, you can
                                </div>
                                <div class="col-md-8  cust-project">
                                    <span class="project-border">
                                      <a href="#"> + Save This Search To Your Job Feed</a>
                                    </span>

                                </div>
                              </div>-->
                              @php
                                $sortby = "New";
                                if(isset($_GET['sortby']) && !empty($_GET['sortby'])){
                                 $sortby = $_GET['sortby'];
                                }
                              @endphp
                              <div class="row">
                              <div class="col-md-6 select-pad">
                                  <label class="project-label pull-left">Sort by:  &nbsp;&nbsp;&nbsp;</label>
                                  <div class="dropdown pull-left mminus">
                                      <input type="hidden"  class="sortbyvalue" name="sortby" value="{{$sortby}}" >
                                     <button id="dLabel" type="button" class="cselect" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">

                                         <span class="pull-left mintext" id="selectedsortby">{{$sortby}}</span>
                                         <span class="pull-right marrow"><i class="namesection fa fa-angle-down" aria-hidden="true"></i></span>
                                     </button>
                                     <ul  class="dropdown-menu cmenu " aria-labelledby="dLabel">
                                       <li onclick="sortbys('New')"><a>New</a></li>
                                       <li onclick="sortbys('Old')"><a>Old</a></li>
                                     </ul>
                                    </div>
                              </div>
                              <div class="col-md-6 text-center">
                                <label class="job-label">{{$max1}}  job(s) found</label>
                              </div>
                              </div>
                </div>

                <?php
                if($users !=  ""){
                $obj = $users;

                //$obj = json_decode($json,true);
                $max=sizeof($obj);
                $i=0;
                while($i<$max){

              ?>

                @if($max1!=0)
                <div class="card card-block m-0 project-cust-card1">
                    <div class="cust-border">
                      <div class="row project-content">
                          <div class="col-md-12">
                              <section>
                                  <div class="row">
                                    <div class="col-md-9">
                                      <a href="{{URL('/selectproject/'.$obj[$i]['jobid'].'/'.$obj[$i]['providerid'])}}"  class="cust-a">
                                        <h2 class="project-title"><?php print $obj[$i]['jobname']; ?>

                                        </h2>
                                      </a>
                                    </div>
                                  </div>
                              </section>
                          </div>
                      </div>
                      <div class="row project-content">
                          <div class="col-md-12">
                            <small>
                              <span><?php print $obj[$i]['paytype']; ?></span>
                              <span> - <?php print $obj[$i]['experiencelevel']; ?>@php if($obj[$i]['experiencelevel']=="Entry Level"){ echo "$"; } elseif($obj[$i]['experiencelevel']=="Intermediate Level") { echo "$$"; } else{echo "$$$"; } @endphp</span>
                              <span> - Budget Amount <?php print $obj[$i]['budget']; ?>$</span>
                              <span> - Est. Time: <?php print $obj[$i]['duration']; ?>, <?php print $obj[$i]['timecommitment']; ?></span>
                              <span>Categories-<?php print $obj[$i]['category']; ?> </span>
                            </small>
                            <div>
                              <div>
                                <p class="text-justify">
                                <?php print $obj[$i]['helps']; ?>
                                </p>
                                <span><a href="" class="cust-a"></a></span>
                              </div>
                              <small>
                                <!--<span style="color: #37a000">
                                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </span>-->
                                <!-- <span><i class="fa fa-map-marker" aria-hidden="true"></i></span> -->
                                <span></span>
                              </small>
                            </div>

                          </div>

                      </div>
                      </div>

                </div>
                @endif
                <?php
                $i++; }

              }

              ?>
              <div class="card card-block m-0 project-cust-card1">
              <input type="hidden" name="page" id="paginator" >
                    <div class="cust-border">
                      <div class="row ">
                          <div class="col-md-12">
                              <section>
                                  <div class="row">
                                    <div class="col-md-12 text-right">
                                      <nav aria-label="Page navigation ">
                                        @php $n = 0; @endphp
                                          <ul class="pagination">
                                            <li @php if(!isset($_GET['page'])) echo "class='disabled'";
                                                     else{
                                                        $s = $_GET['page'];
                                                        $m = intval($s/5);
                                                         if($s != 5 && $m > 0 ){
                                                           $scd = ($m * 5); 
                                                           $n = 1;
                                                        }else{
                                                          echo "class='disabled'";
                                                        }

                                                     }
                                              @endphp >
                                              <a @php if(!isset($_GET['page'])) echo "href='#'"; 

                                                if($n == 1) { @endphp onclick="setpage('{{$scd}}')"  @php } @endphp >Previous
                                              </a>
                                            </li>
                                            @php 
                                            $total = ($max1 / 15) + 1; //how many 15 set // per set have 15 page
                                            if($total > 5){ 
                                              $i  = 1; // page 1 
                                              $limit  = 5 + 1; //page 5
                                            }else{
                                              $i = 1;
                                              $limit = $total; 
                                            }  

                                            if(isset($_GET['page'])){
                                              $i = $_GET['page'];
                                              $calc = intval( $i / 5 );  // finding page number in which set
                                              if($i == 5 || $calc == 0 ){   //first set
                                                $i = 1;   //starting 1
                                                $nolimit = $total; // checking limit either 5 or more    
                                                if($nolimit > 5 ){
                                                  $limit = 1 + 5;
                                                }else{
                                                  $limit = $nolimit;
                                                }
                                              }else{
                                                $i = ($calc * 5) + 1;  
                                                $nolimit = $total - ( $calc * 5);
                                                if($nolimit > 5 ){    
                                                  $limit = $i + 5;
                                                }else{
                                                  $limit = intval($nolimit) + $i;
                                                }
                                              }

                                            }else{  
                                              $i = 1;
                                            }
                                            if($total > 5 ){
                                               $t = $total;
                                            }
                                            //echo $i;
                                            //echo $limit;
                                            for($i=$i;$i<$limit;$i++){ @endphp
                                                <li @php if(isset($_GET['page']) && ($_GET['page'] == $i )) echo "class='active'"; @endphp><a onclick="setpage('{{$i}}')">{{$i}}</a></li>
                                               
                                           @php } @endphp
                                            <li @php  $z = 0; 
                                               
                                                if($total > $limit ){
                                                  $z = 1;
                                                }else{
                                                  echo "class='disabled'";
                                                }
                                                

                                             @endphp >
                                              <a  
                                               @php if($total  > $limit) {
                                              if($z ==1) {   
                                               @endphp onclick="setpage({{$limit}})" @php } } @endphp aria-label="Next">
                                                Next
                                              </a>
                                            </li>
                                          </ul>
                                        </nav>
                                    </div>
                                  </div>
                              </section>
                          </div>
                      </div>
                      </div>
                </div>
            </div>
            @endif
            @if($max1==0)
            <div class="col-md-9 m-top-10 ">
               <div class="card card-block m-0 cust-card">

                                  <div class="col-md-9">
                                      <h2 class="card-title search-cust-h2">Job search</h2>
                                  </div>
                                  <!--<div class="col-md-3">
                                    <a href="#">
                                      <i class="fa fa-rss search-cust-icon" aria-hidden="true"></i>
                                    </a>
                                  </div>-->

                </div>
                                <div class="card card-block m-0 cust-card1  text-center">
                                <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="circle-error-icon">
                                      <i class="fa fa-exclamation-circle error-exclamation" aria-hidden="true"></i>
                                    </div>
                                    <div class="search-h1 clear">
                                       There are no results that match your search.
                                       <h5>Please try adjusting your search keywords or filters.</h5>
                                    </div>

                                </div>
                                </div>
                        </div>
            </div>
            @endif
      </div>
      </form>
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

