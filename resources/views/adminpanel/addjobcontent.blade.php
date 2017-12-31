<!DOCTYPE html>
<html>

  <head>
    <title>Admin - Rbs</title>
      <script type="text/javascript" src="{{ URL::asset('public/js/jquery-1.12.4.js')}}" /></script>
      <link href="{{ URL::asset('public/css/bootstrap.min.css')}} " rel="stylesheet" />
      <script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js')}}" /></script>
      <script type="text/javascript" src="{{ URL::asset('public/js/admin.js')}}" /></script>
      <link href="{{URL::asset('public/css/admin.css')}}" rel="stylesheet" />
      <link rel="stylesheet" href="{{URL::asset('public/css/font-awesome.css')}}">
      <link rel="stylesheet" href="{{URL::asset('public/css/font.css')}}">
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
        <div class="pagepad financemarg">
        <div class="panel panel-default" style="margin-bottom:50px">
        <!-- Default panel contents -->
        <div class="panel-heading f-weight foot_add">Add Category</div>
        <!-- Table -->
        <div class="panel-body">
         <form name="add_cat" id="add_cat" method="post" action="{{URL('/')}}/admin/addcatagory">
         <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                
                <div class="input_fields_wrap">
                <div class="row">
                <div class="col-md-12"><div class="col-md-8">
                    <button type="button" id="addButton" class="profsetbuttt add_field_button notransform">Click to add more</button>
                </div></div>
                </div>
                    <div class="row">
                      <span class="col-md-12">
                        <span class="col-md-8">
                        <div id='TextBoxesGroup' class="row">
                        <?php
                                  $obj=json_decode($users,true);
                                  $j=sizeof($obj[0]['category']);
                                  $k=$j-1;
                                  for($i=0;$i<=$k;$i++)
                                  {
                            ?>
                          <div id="TextBoxDiv1" class="col-md-12 bannercont re">
                            <div class="row">
                              <div class="col-md-10">
                                      <input type='textbox' id='textbox$i' value="{{$obj[0]['category'][$i]}}" name='textbox[]' placeholder='Add To Category' class='foot_text' required='required'>     
                              </div>
                              <div class="col-md-2 dynamic_btn">
                                <input type='button' value='Delete' class="remove edit_btn btn btn-danger bor_rad foot_bt" id='removeButton'>    
                              </div>
                            </div>
                          </div>
                        <?php
                          }
                        ?>
                        </div>
                        </span>
                      </span>  
                    </div>
                    <button type="submit" class="profsetbuttt margrit add_field_button" style="float: right;" value="Save">Save</button>         
                </div>
         </form>

      </div>
      </div>
      <div class="panel panel-default" style="margin-bottom:50px;display: none" >
        <!-- Default panel contents -->
        <div class="panel-heading f-weight foot_add">Add Preferences</div>
        <!-- Table -->
        <div class="panel-body">
         <form name="add_pref" id="add_pref" method="post" action="{{URL('/')}}/admin/addpref">
         <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                <div class="input_fields_wrap">
                <div class="row">
                <div class="col-md-12">
                <div class="col-md-8">
                    <button type="button" id="addButton1" class="profsetbuttt add_field_button notransform" >Click to add more</button>
                </div>
                </div>
                </div>    
                    <div class="row">
                      <span class="col-md-12">
                        <span class="col-md-8">
                        <div id='TextBoxesGroup1' class="row">
                        <?php
                                  
                                  $f=sizeof($obj[0]['preferences']);
                                  $h=$f-1;
                                  for($r=0;$r<=$h;$r++)
                                  {
                            ?>
                          <div id="PreferencesDiv1" class="col-md-12 bannercont re">
                            <div class="row">
                              <div class="col-md-10">
                                      <input type='textbox' id='prebox$r' value="{{$obj[0]['preferences'][$r]}}" name='prebox[]' placeholder='Add To Preferences' class='foot_text' required='required'>     
                                  
                                <!-- <input type='textbox' id='prebox1' name="prebox[]" placeholder="Add To Preferences" required="required" class="foot_text"> -->
                              </div>
                              <div class="col-md-2 dynamic_btn">
                                <input type='button' value='Delete' class="remove edit_btn btn btn-danger bor_rad foot_bt" id='removeButton'>    
                              </div>
                            </div>
                          </div>
                          <?php
                            }
                        ?>
                        </div>
                        </span>
                      </span>  
                    </div> 
                    <button type="submit" class="profsetbuttt margrit add_field_button" style="float: right;" value="Save">Save</button>        
                </div>
         </form>

      </div>
      </div>
      <div class="panel panel-default" style="margin-bottom:150px">
        <!-- Default panel contents -->
        <div class="panel-heading f-weight foot_add">Add Qualifications</div>
        <!-- Table -->
        <div class="panel-body">
         <form name="add_free_type" id="add_free_type" method="post" action="{{URL('/')}}/admin/addqual">
         <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-8">
                      <label class="bannercont lablehead">Freelancer Type</label>
                    </div>
                  </div>
                </div>
                <div class="input_fields_wrap">
                <div class="row">
                <div class="col-md-12">
                <div class="col-md-8">
                    <button type="button" id="addButton2" class="profsetbuttt notransform add_field_button" >Click to add more</button>
                </div>
                </div>
                </div>
                    <div class="row">
                      <span class="col-md-12">
                        <span class="col-md-8">
                        <div id='TextBoxesGroup2' class="row">
                        <?php
                                  
                                  $l=sizeof($obj[0]['freelancertype']);
                                  $b=$l-1;
                                  for($a=0;$a<=$b;$a++)
                                  {
                            ?>
                          <div id="QualiDiv1" class="col-md-12 bannercont re2">
                            <div class="row">
                              <div class="col-md-10">
                                    <input type='textbox' id='qualbox$a' value="{{$obj[0]['freelancertype'][$a]}}" name='qualbox[]' placeholder='Add Freelancer Type' class='foot_text' required='required'>     
                                <!-- <input type='textbox' id='qualbox1' name="qualbox[]" placeholder="Add Freelancer Type" required="required" class="foot_text"> -->
                              </div>
                              <div class="col-md-2 dynamic_btn">
                                <input type='button' value='Delete' class="remove edit_btn btn btn-danger bor_rad foot_bt" id='removeButton'>    
                              </div>
                            </div>
                          </div>
                          <?php
                            }
                        ?>
                        </div>
                        </span>
                      </span>  
                    </div> 
                    <button type="submit" class="profsetbuttt margrit add_field_button" style="float: right;" value="Save">Save</button>
                </div>
         </form>
          <div class="row">
            <div class="col-md-12">
              <hr style="height: 10px; border: 0;box-shadow: 0 10px 10px -10px #8c8b8b inset;">            
            </div>
          </div>
         <form name="add_job_success" id="add_job_success" class="dynamic_mar" method="post" action="{{URL('/')}}/admin/addjobsuccess">
         <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-8">
                      <label class="bannercont lablehead">Job Success Score</label>
                    </div>
                  </div>
                </div>
                <div class="input_fields_wrap">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-8">
                      <button type="button" id="addButton3" class="profsetbuttt margrit add_field_button" >Click to add more</button>
                    </div>
                  </div>
                </div>
                    <div class="row">
                      <span class="col-md-12">
                        <span class="col-md-8">
                        <div id='TextBoxesGroup3' class="row">
                        <?php
                                  
                                  $q=sizeof($obj[0]['jobsuccessscore']);
                                  $c=$q-1;
                                  for($z=0;$z<=$c;$z++)
                                  {
                            ?>
                          <div id="JobsuccessDiv1" class="col-md-12 bannercont re3">
                            <div class="row">
                              <div class="col-md-10">
                                      <input type='textbox' id='jobbox$z' value="{{$obj[0]['jobsuccessscore'][$z]}}" name='jobbox[]' placeholder='Add Job Success Score' class='foot_text' required='required'>     
                                <!-- <input type='textbox' id='jobbox1' name="jobbox[]" placeholder="Add Job Success Score" required="required" class="foot_text"> -->
                              </div>
                              <div class="col-md-2 dynamic_btn">
                                <input type='button' value='Delete' class="remove edit_btn btn btn-danger bor_rad foot_bt" id='removeButton'>    
                              </div>
                            </div>
                          </div>
                          <?php
                            }
                        ?>
                        </div>
                        </span>
                      </span>  
                    </div> 
                    <button type="submit" class="profsetbuttt margrit add_field_button" style="float: right;" value="Save">Save</button>        
                </div>
         </form>
         <div class="row">
            <div class="col-md-12">
              <hr style="height: 10px; border: 0;box-shadow: 0 10px 10px -10px #8c8b8b inset;">            
            </div>
          </div>
         <form name="add_talent" id="add_talent" class="dynamic_mar" method="post" action="{{URL('/')}}/admin/addtalent">
         <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-8">
                      <label class="bannercont lablehead">Rising Talent</label>
                    </div>
                  </div>
                </div>
                <div class="input_fields_wrap">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-8">
                      <button type="button" id="addButton4" class="profsetbuttt margrit add_field_button">Click to add more</button>
                    </div>
                  </div>
                </div>      
                    <div class="row">
                      <span class="col-md-12">
                        <span class="col-md-8">
                        <div id='TextBoxesGroup4' class="row">
                        <?php
                                  
                                  $s=sizeof($obj[0]['risingtalent']);
                                  $n=$s-1;
                                  for($y=0;$y<=$n;$y++)
                                  {
                            ?>
                          <div id="TalentDiv1" class="col-md-12 bannercont re4">
                            <div class="row">
                              <div class="col-md-10">
                                      <input type='textbox' id='talentbox$y' value="{{$obj[0]['risingtalent'][$y]}}" name='talentbox[]' placeholder='Add Rising Talent' class='foot_text' required='required'>
                                <!-- <input type='textbox' id='talentbox1' name="talentbox[]" placeholder="Add Rising Talent" required="required" class="foot_text"> -->
                              </div>
                              <div class="col-md-2 dynamic_btn">
                                <input type='button' value='Delete' class="remove edit_btn btn btn-danger bor_rad foot_bt" id='removeButton'>    
                              </div>
                            </div>
                          </div>
                          <?php
                            }
                        ?>
                        </div>
                        </span>
                      </span>  
                    </div> 
                    <button type="submit" class="profsetbuttt margrit add_field_button" style="float: right;" value="Save">Save</button>        
                </div>
         </form>
         <div class="row">
            <div class="col-md-12">
              <hr style="height: 10px; border: 0;box-shadow: 0 10px 10px -10px #8c8b8b inset;">            
            </div>
          </div>
         <form name="add_hour" id="add_hour" class="dynamic_mar" method="post" action="{{URL('/')}}/admin/addhour">
         <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-8">
                      <label class="bannercont lablehead">Hours Billed on rbs</label>
                    </div>
                  </div>
                </div>
                <div class="input_fields_wrap">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-8">
                      <button type="button" id="addButton5" class="profsetbuttt margrit add_field_button">Click to add more</button>
                    </div>
                  </div>
                </div>
                    <div class="row">
                      <span class="col-md-12">
                        <span class="col-md-8">
                        <div id='TextBoxesGroup5' class="row">
                        <?php
                                  
                                  $d=sizeof($obj[0]['hoursbilledonrbs']);
                                  $t=$d-1;
                                  for($p=0;$p<=$t;$p++)
                                  {
                            ?>
                          <div id="HourDiv1" class="col-md-12 bannercont re5">
                            <div class="row">
                              <div class="col-md-10">
                                      <input type='textbox' id='hourbox$p' value="{{$obj[0]['hoursbilledonrbs'][$p]}}" name='hourbox[]' placeholder='Add Hours Billed On Rbs' class='foot_text' required='required'>
                                <!-- <input type='textbox' id='hourbox1' name="hourbox[]" placeholder="Add Hours Billed On Rbs" required="required" class="foot_text"> -->
                              </div>
                              <div class="col-md-2 dynamic_btn">
                                <input type='button' value='Delete' class="remove edit_btn btn btn-danger bor_rad foot_bt" id='removeButton'>    
                              </div>
                            </div>
                          </div>
                          <?php
                            }
                        ?>
                        </div>
                        </span>
                      </span>  
                    </div> 
                    <button type="submit" class="profsetbuttt margrit add_field_button" style="float: right;" value="Save">Save</button>        
                </div>
         </form>
         <div class="row">
            <div class="col-md-12">
              <hr style="height: 10px; border: 0;box-shadow: 0 10px 10px -10px #8c8b8b inset;">            
            </div>
          </div>
         <form name="add_location" id="add_location" class="dynamic_mar" method="post" action="{{URL('/')}}/admin/addlocation">
         <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-8">
                      <label class="bannercont lablehead">Location</label>
                    </div>
                  </div>
                </div>
                <div class="input_fields_wrap">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-8">
                      <button type="button" id="addButton6" class="profsetbuttt margrit add_field_button">Click to add more</button>
                    </div>
                  </div>
                </div>
                    <div class="row">
                      <span class="col-md-12">
                        <span class="col-md-8">
                        <div id='TextBoxesGroup6' class="row">
                        <?php
                                  
                                  $w=sizeof($obj[0]['location']);
                                  $e=$w-1;
                                  for($x=0;$x<=$e;$x++)
                                  {
                            ?>
                          <div id="HourDiv1" class="col-md-12 bannercont re6">
                            <div class="row">
                              <div class="col-md-10">
                                      <input type='textbox' id='locabox$x' value="{{$obj[0]['location'][$x]}}" name='locabox[]' placeholder='Add Location' class='foot_text' required='required'>
                                <!-- <input type='textbox' id='locabox1' name="locabox[]" placeholder="Add Location" required="required" class="foot_text"> -->
                              </div>
                              <div class="col-md-2 dynamic_btn">
                                <input type='button' value='Delete' class="remove edit_btn btn btn-danger bor_rad foot_bt" id='removeButton'>    
                              </div>
                            </div>
                          </div>
                          <?php
                            }
                        ?>
                        </div>
                        </span>
                      </span>  
                    </div> 
                    <button type="submit" class="profsetbuttt margrit add_field_button" style="float: right;" value="Save">Save</button>        
                </div>
         </form>
         <div class="row">
            <div class="col-md-12">
              <hr style="height: 10px; border: 0;box-shadow: 0 10px 10px -10px #8c8b8b inset;">            
            </div>
          </div>
         <form name="add_eng" id="add_eng" class="dynamic_mar" method="post" action="{{URL('/')}}/admin/addeng">
         <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-8">
                      <label class="bannercont lablehead">English Level</label>
                    </div>
                  </div>
                </div>
                <div class="input_fields_wrap">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-8">
                      <button type="button" id="addButton7" class="profsetbuttt margrit add_field_button">Click to add more</button>
                    </div>
                  </div>
                </div>
                    <div class="row">
                      <span class="col-md-12">
                        <span class="col-md-8">
                        <div id='TextBoxesGroup7' class="row">
                        <?php
                                  
                                  $pp=sizeof($obj[0]['englishlevel']);
                                  $ee=$pp-1;
                                  for($xx=0;$xx<=$ee;$xx++)
                                  {
                            ?>
                          <div id="EngDiv1" class="col-md-12 bannercont re7">
                            <div class="row">
                              <div class="col-md-10">
                                      <input type='textbox' id='engbox$xx' value="{{$obj[0]['englishlevel'][$xx]}}" name='engbox[]' placeholder='Add English Level' class='foot_text' required='required'> 
                                <!-- <input type='textbox' id='engbox1' name="engbox[]" placeholder="Add English Level" required="required" class="foot_text"> -->
                              </div>
                              <div class="col-md-2 dynamic_btn">
                                <input type='button' value='Delete' class="remove edit_btn btn btn-danger bor_rad foot_bt" id='removeButton'>    
                              </div>
                            </div>
                          </div>
                          <?php
                            }
                        ?>
                        </div>
                        </span>
                      </span>  
                    </div> 
                    <button type="submit" class="profsetbuttt margrit add_field_button" style="float: right;" value="Save">Save</button>        
                </div>
         </form>
         <div class="row">
            <div class="col-md-12">
              <hr style="height: 10px; border: 0;box-shadow: 0 10px 10px -10px #8c8b8b inset;">            
            </div>
          </div>
         <form name="add_group" id="add_group" class="dynamic_mar" method="post" action="{{URL('/')}}/admin/addgroup">
         <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-8">
                      <label class="bannercont lablehead">Group</label>
                    </div>
                  </div>
                </div>
                <div class="input_fields_wrap">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-8">
                      <button type="button" id="addButton8" class="profsetbuttt margrit add_field_button">Click to add more</button>
                    </div>
                  </div>
                </div>
                    <div class="row">
                      <span class="col-md-12">
                        <span class="col-md-8">
                        <div id='TextBoxesGroup8' class="row">
                        <?php
                                  
                                  $ppp=sizeof($obj[0]['group']);
                                  $eee=$ppp-1;
                                  for($xxx=0;$xxx<=$eee;$xxx++)
                                  {
                            ?>
                          <div id="GroupDiv1" class="col-md-12 bannercont re8">
                            <div class="row">
                              <div class="col-md-10">
                                      <input type='textbox' id='groupbox$xxx' value="{{$obj[0]['group'][$xxx]}}" name='groupbox[]' placeholder='Add Group' class='foot_text' required='required'>
                                <!-- <input type='textbox' id='groupbox1' name="groupbox[]" placeholder="Add Group" required="required" class="foot_text"> -->
                              </div>
                              <div class="col-md-2 dynamic_btn">
                                <input type='button' value='Delete' class="remove edit_btn btn btn-danger bor_rad foot_bt" id='removeButton'>    
                              </div>
                            </div>
                          </div>
                          <?php
                            }
                        ?>
                        </div>
                        </span>
                      </span>  
                    </div> 
                    <button type="submit" class="profsetbuttt margrit add_field_button" style="float: right;" value="Save">Save</button>        
                </div>
         </form>
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
<script type="text/javascript">
       
    $(document).ready(function(){

    var counter = 2;

    $("#addButton").click(function () {

  if(counter>50){
            alert("Only 50 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'TextBoxDiv' + counter);

  newTextBoxDiv.after().html('<div class="re">'+'<div class="col-md-10 bannercont">'+'<input type="text" name="textbox[]'+
        '" id="textbox' + counter + '" value="" class="foot_text" placeholder="Add To Category" required="required" >'+'</div>'+'<div class="col-md-2">'+'<input type="button" id="removeButton" class="remove edit_btn btn btn-danger bor_rad foot_bt" value="Delete">'+'</div>'+'</div>');

  newTextBoxDiv.appendTo("#TextBoxesGroup");


  counter++;
     });

      $("body").on("click", ".remove", function () {
        $(this).closest(".re").remove();
    });
  

     $("#getButtonValue").click(function () {

  var msg = '';
  for(i=1; i<counter; i++){
      msg += "\n Textbox #" + i + " : " + $('#textbox[]' + i).val();
  }
        alert(msg);
     });
  });
    

  $(document).ready(function(){

    var counter1 = 2;

    $("#addButton1").click(function () {

  if(counter1>50){
            alert("Only 50 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'PreferencesDiv' + counter1);

  newTextBoxDiv.after().html('<div class="re1">'+'<div class="col-md-10 bannercont">'+'<input type="text" name="prebox[]'+
        '" id="prebox' + counter1 + '" value="" class="foot_text" placeholder="Add To Preferences" required="required" >'+'</div>'+'<div class="col-md-2">'+'<input type="button" id="removeButton" class="remove edit_btn btn btn-danger bor_rad foot_bt" value="Delete">'+'</div>'+'</div>');

  newTextBoxDiv.appendTo("#TextBoxesGroup1");


  counter1++;
     });

      $("body").on("click", ".remove", function () {
        $(this).closest(".re1").remove();
    });
  

     $("#getButtonValue").click(function () {

  var msg = '';
  for(i=1; i<counter1; i++){
      msg += "\n Textbox #" + i + " : " + $('#prebox[]' + i).val();
  }
        alert(msg);
     });
  });


$(document).ready(function(){

    var counter2 = 2;

    $("#addButton2").click(function () {

  if(counter2>50){
            alert("Only 50 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'QualiDiv' + counter2);

  newTextBoxDiv.after().html('<div class="re2">'+'<div class="col-md-10 bannercont">'+'<input type="text" name="qualbox[]' +
        '" id="qualbox' + counter2 + '" value="" class="foot_text" placeholder="Add Freelancer Type" required="required" >'+'</div>'+'<div class="col-md-2">'+'<input type="button" id="removeButton" class="remove edit_btn btn btn-danger bor_rad foot_bt" value="Delete">'+'</div>'+'</div>');

  newTextBoxDiv.appendTo("#TextBoxesGroup2");


  counter2++;
     });

      $("body").on("click", ".remove", function () {
        $(this).closest(".re2").remove();
    });
  

     $("#getButtonValue").click(function () {

  var msg = '';
  for(i=1; i<counter2; i++){
      msg += "\n Textbox #" + i + " : " + $('#qualbox[]' + i).val();
  }
        alert(msg);
     });
  });

$(document).ready(function(){

    var counter3 = 2;

    $("#addButton3").click(function () {

  if(counter3>50){
            alert("Only 50 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'JobsuccessDiv' + counter3);

  newTextBoxDiv.after().html('<div class="re3">'+'<div class="col-md-10 bannercont">'+'<input type="text" name="jobbox[]'+
        '" id="jobbox' + counter3 + '" value="" class="foot_text" placeholder="Add Job Success Score" required="required" >'+'</div>'+'<div class="col-md-2">'+'<input type="button" id="removeButton" class="remove edit_btn btn btn-danger bor_rad foot_bt" value="Delete">'+'</div>'+'</div>');

  newTextBoxDiv.appendTo("#TextBoxesGroup3");


  counter3++;
     });

      $("body").on("click", ".remove", function () {
        $(this).closest(".re3").remove();
    });
  

     $("#getButtonValue").click(function () {

  var msg = '';
  for(i=1; i<counter3; i++){
      msg += "\n Textbox #" + i + " : " + $('#jobbox[]' + i).val();
  }
        alert(msg);
     });
  });

$(document).ready(function(){

    var counter4 = 2;

    $("#addButton4").click(function () {

  if(counter4>50){
            alert("Only 50 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'TalentDiv' + counter4);

  newTextBoxDiv.after().html('<div class="re4">'+'<div class="col-md-10 bannercont">'+'<input type="text" name="talentbox[]' +
        '" id="talentbox' + counter4 + '" value="" class="foot_text" placeholder="Add Rising Talent" required="required" >'+'</div>'+'<div class="col-md-2">'+'<input type="button" id="removeButton" class="remove edit_btn btn btn-danger bor_rad foot_bt" value="Delete">'+'</div>'+'</div>');

  newTextBoxDiv.appendTo("#TextBoxesGroup4");


  counter4++;
     });

      $("body").on("click", ".remove", function () {
        $(this).closest(".re4").remove();
    });
  

     $("#getButtonValue").click(function () {

  var msg = '';
  for(i=1; i<counter4; i++){
      msg += "\n Textbox #" + i + " : " + $('#talentbox[]' + i).val();
  }
        alert(msg);
     });
  });


$(document).ready(function(){

    var counter5 = 2;

    $("#addButton5").click(function () {

  if(counter5>50){
            alert("Only 50 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'HourDiv' + counter5);

  newTextBoxDiv.after().html('<div class="re5">'+'<div class="col-md-10 bannercont">'+'<input type="text" name="hourbox[]'+
        '" id="hourbox' + counter5 + '" value="" class="foot_text" placeholder="Add Hours Billed On Rbs" required="required" >'+'</div>'+'<div class="col-md-2">'+'<input type="button" id="removeButton" class="remove edit_btn btn btn-danger bor_rad foot_bt" value="Delete">'+'</div>'+'</div>');

  newTextBoxDiv.appendTo("#TextBoxesGroup5");


  counter5++;
     });

      $("body").on("click", ".remove", function () {
        $(this).closest(".re5").remove();
    });
  

     $("#getButtonValue").click(function () {

  var msg = '';
  for(i=1; i<counter5; i++){
      msg += "\n Textbox #" + i + " : " + $('#hourbox[]' + i).val();
  }
        alert(msg);
     });
  });

$(document).ready(function(){

    var counter6 = 2;

    $("#addButton6").click(function () {

  if(counter6>50){
            alert("Only 50 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'LocaDiv' + counter6);

  newTextBoxDiv.after().html('<div class="re6">'+'<div class="col-md-10 bannercont">'+'<input type="text" name="locabox[]' +
        '" id="locabox' + counter6 + '" value="" class="foot_text" placeholder="Add Location" required="required" >'+'</div>'+'<div class="col-md-2">'+'<input type="button" id="removeButton" class="remove edit_btn btn btn-danger bor_rad foot_bt" value="Delete">'+'</div>'+'</div>');

  newTextBoxDiv.appendTo("#TextBoxesGroup6");


  counter6++;
     });

      $("body").on("click", ".remove", function () {
        $(this).closest(".re6").remove();
    });
  

     $("#getButtonValue").click(function () {

  var msg = '';
  for(i=1; i<counter6; i++){
      msg += "\n Textbox #" + i + " : " + $('#locabox[]' + i).val();
  }
        alert(msg);
     });
  });

$(document).ready(function(){

    var counter7 = 2;

    $("#addButton7").click(function () {

  if(counter7>50){
            alert("Only 50 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'EngDiv' + counter7);

  newTextBoxDiv.after().html('<div class="re7">'+'<div class="col-md-10 bannercont">'+'<input type="text" name="engbox[]'+
        '" id="engbox' + counter7 + '" value="" class="foot_text" placeholder="Add English Level" required="required" >'+'</div>'+'<div class="col-md-2">'+'<input type="button" id="removeButton" class="remove edit_btn btn btn-danger bor_rad foot_bt" value="Delete">'+'</div>'+'</div>');

  newTextBoxDiv.appendTo("#TextBoxesGroup7");


  counter7++;
     });

      $("body").on("click", ".remove", function () {
        $(this).closest(".re7").remove();
    });
  

     $("#getButtonValue").click(function () {

  var msg = '';
  for(i=1; i<counter7; i++){
      msg += "\n Textbox #" + i + " : " + $('#engbox[]' + i).val();
  }
        alert(msg);
     });
  });


$(document).ready(function(){

    var counter8 = 2;

    $("#addButton8").click(function () {

  if(counter8>50){
            alert("Only 50 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'GroupDiv' + counter8);

  newTextBoxDiv.after().html('<div class="re8">'+'<div class="col-md-10 bannercont">'+'<input type="text" name="groupbox[]'+
        '" id="groupbox' + counter8 + '" value="" class="foot_text" placeholder="Add Group" required="required" >'+'</div>'+'<div class="col-md-2">'+'<input type="button" id="removeButton" class="remove edit_btn btn btn-danger bor_rad foot_bt" value="Delete">'+'</div>'+'</div>');

  newTextBoxDiv.appendTo("#TextBoxesGroup8");


  counter8++;
     });

      $("body").on("click", ".remove", function () {
        $(this).closest(".re8").remove();
    });
  

     $("#getButtonValue").click(function () {

  var msg = '';
  for(i=1; i<counter8; i++){
      msg += "\n Textbox #" + i + " : " + $('#groupbox[]' + i).val();
  }
        alert(msg);
     });
  });
</script>

</html>
