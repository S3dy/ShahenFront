
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
              
              <div class="pagepad imgselect">
                
                <!--<div class="row">
                  <div class="col-md-12">
                    <ul class="nav nav-tabs">
                      <li role="presentation" class="active"><a href="#">Home Page</a></li>
                      <li role="presentation"><a href="#">How it works Page</a></li>
                    </ul>
                  </div>
                </div>-->
                <br><br><br>
                <div class="row">
                  <div class="col-md-12">
                    
                    <div class="contborder">
                    <form action="{{URL('/')}}/img_content" method="post" class="form-group" id="img_ban_cont" enctype="multipart/form-data">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title f-weight foot_add" style="font-weight: 600!important;">Section 1 - Image Banner</h3>
                        </div>
                        <div class="panel-body panelpad">
                          <div class="row">
                            <div class="col-md-12">
                              
                              <?php 
                          $json=$users;
                          $homepage=json_decode($json,true);
                          $greenhead=$homepage[0]['homepage']['banner1']['greenbold'];
                          $blackhead=$homepage[0]['homepage']['banner1']['blackbold'];
                          $subcont=$homepage[0]['homepage']['banner1']['subcontent'];

                          ?>
                              <div class="row adimgrow">
                                <div class="col-md-12">
                                  <img class="adimg" src="{{url::asset($homepage[0]['homepage']['banner1']['image'])}}"   id="banner" alt="your image" width="100%"  />
                                  <input type="hidden" name="img" value="{{$homepage[0]['homepage']['banner1']['image']}}">
                                  <input class="adimg" type="file" name="photo" 
                                  onchange="document.getElementById('banner').src = window.URL.createObjectURL(this.files[0])">
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="adimgrow">
                          
                            <div class="row">
                              <div class="col-md-12">
                                
                                  <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                                  <h3 class="bannercont">Image Banner Content</h3>
                                  <div class="contentchanges">
                                    <div class=" custom-form m-b-30 row">
                                      <label class="olabel control-label col-md-2">Line1 content </label>
                                      <div class="col-md-10 ">
                                        <input type="text" name="greenbold" value="<?php echo $greenhead;?>" class="emform form-control" id="green_bold">
                                        <span class="hider login-error error-color"  id="green_bold_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                                      </div>
                                    </div>
                                    <div class="form-group custom-form m-b-30 row">
                                      <label class="olabel col-md-2">Line2 content </label>
                                      <div class="col-md-10">
                                        <input type="text" name="blackbold" value="<?php echo $blackhead;?>"  class="emform form-control " id="black_bold">
                                        <span class="hider login-error error-color"  id="black_bold_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                                      </div>
                                    </div>
                                    <div class="form-group custom-form m-b-30 row">
                                      <label class="olabel col-md-2">Line3 content </label>
                                      <div class="col-md-10">
                                        <input type="text" name="subcontent" value="<?php echo $subcont;?>" id="sub_cont"  class="emform form-control ">
                                        <span class="hider login-error error-color"  id="sub_cont_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                                      </div>
                                    </div>
                                    
                                  </div>

                                  <span class="pull-right"><button type="submit" class="profsetbut" value="submit">save</button></span>
                                </form>

                              </div>
                            </div>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    
                    <div class="">
                      
                      <div class="row">
                        <div class="col-md-12">
                          <div class="contborder">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title f-weight foot_add" style="font-weight: 600!important;">Section 2 - How It Works </h3>
                              </div>
                              <div class="panel-body panelpad">
                                <form action="{{URL('/')}}/Howitworks_heading" method="post" id="how_it">
                                  <div class="form-group custom-form row">
                                    <label class="olabel col-md-2">Heading </label>
                                    <div class="col-md-10">
                                    <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                                      <input type="text" name="headcontent" id="how_it_head"   class="emform form-control" value="<?php echo $homepage[0]['homepage']['howitswork']['headcontent']; ?>">
                                      <span class="hider login-error error-color" id="how_it_head_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                                    </div>
                                  </div>
                                  <span class="pull-right"><button type="submit" class="profsetbut " value="submit">save</button></span>
                                </form>
                                <br><br>
                                <div class="row">
                                 <div class="col-md-12">
                                  <h4>Title one</h4>
                                  <hr style="height: 10px; border: 0;box-shadow: 0 10px 10px -10px #8c8b8b inset;">
                                  </div>
                                  
                                </div>
                                <br><br>
                                <div class="row">
                                  <form id="add_content1" method="post" form action="{{URL('/')}}/howitworks_titleone" enctype="multipart/form-data">
                                  <input type="hidden" name="img" value="{{$homepage[0]['homepage']['howitsworktitleone']['image']}}">
                                    <div class="col-md-6">
                                      <img class="adimg" id="title1" src="{{url::asset($homepage[0]['homepage']['howitsworktitleone']['image'])}}" alt="your image" width="100%" height="300" />
                                      <input class="adimg" type="file" name="photo" 
                                      onchange="document.getElementById('title1').src = window.URL.createObjectURL(this.files[0])">
                                     
                                      
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group custom-form m-b-30">
                                        <label class="olabel">Heading </label>
                                        <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                                        <input type="text" name="cont1_head" id="cont1_head"  class="form-control" value="<?php echo $homepage[0]['homepage']['howitsworktitleone']['heading']; ?>">
                                        <span class="hider login-error error-color" id="cont1_head_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                                      </div>
                                      <label class="olabel">Content </label>
                                      <textarea type="textarea" class="form-control" rows="6" id="cont1_cont" name="cont1_cont" value="<?php echo $homepage[0]['homepage']['howitsworktitleone']['content']; ?>"><?php echo $homepage[0]['homepage']['howitsworktitleone']['content']; ?></textarea>
                                      <span class="hider login-error error-color" id="cont1_cont_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="pull-right"><button type="submit" class="profsetbut " value="submit">save</button></span>
                                    </div>
                                  </form>   

                                </div>


                                <br><br>
                                <div class="row">
                                  <div class="col-md-12">
                                  <h4>Title two</h4>
                                  <hr style="height: 10px; border: 0;box-shadow: 0 10px 10px -10px #8c8b8b inset;">
                                </div>
                                </div>
                                <br><br>
                                <div class="row">
                                  <form id="add_content2" method="post" form action="{{URL('/')}}/howitworks_titletwo" enctype="multipart/form-data">
                                  <input type="hidden" name="img" value="{{$homepage[0]['homepage']['howitsworktitletwo']['image']}}">
                                    <div class="col-md-6">

                                      <img class="adimg" id="title2" name="photo" src="{{URL::asset($homepage[0]['homepage']['howitsworktitletwo']['image'])}}" alt="your image" width="100%" height="300" />
                                      <input class="adimg" type="file" name="photo" 
                                      onchange="document.getElementById('title2').src = window.URL.createObjectURL(this.files[0])">
                                      
                                      
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group custom-form m-b-30">
                                      <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                                        <label class="olabel">Heading </label>
                                        <input type="text" name="heading" id="cont2_head"  class="form-control" value="<?php echo $homepage[0]['homepage']['howitsworktitletwo']['heading']; ?>">
                                        <span class="hider login-error error-color" id="cont2_head_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                                      </div>
                                      <label class="olabel">Content </label>
                                      <textarea type="textarea" class="form-control" value="<?php echo $homepage[0]['homepage']['howitsworktitletwo']['content']; ?>" name="content" rows="6" id="cont2_cont"><?php echo $homepage[0]['homepage']['howitsworktitletwo']['content']; ?></textarea>
                                      <span class="hider login-error error-color" id="cont2_cont_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="pull-right"><button type="submit" class="profsetbut " value="submit">save</button></span>
                                    </div>
                                  </form>
                                </div>

                                <br><br>
                                <div class="row">
                                <div class="col-md-12">
                                  <h4>Title three</h4>
                                  <hr style="height: 10px; border: 0;box-shadow: 0 10px 10px -10px #8c8b8b inset;">
                                </div>
                                </div>
                                <br><br>
                                <div class="row">
                                  <form id="add_content3" method="post" form action="{{URL('/')}}/howitworks_titlethree" enctype="multipart/form-data">
                                    <div class="col-md-6">
                                    <input type="hidden" name="img" value="{{$homepage[0]['homepage']['howitsworktitlethree']['image']}}">
                                    
                                      <img class="adimg" id="title3" src="{{URL::asset($homepage[0]['homepage']['howitsworktitlethree']['image'])}}" alt="your image" width="100%" height="300" />
                                      <input class="adimg" type="file" name="photo" 
                                      onchange="document.getElementById('title3').src = window.URL.createObjectURL(this.files[0])">
                                     
                                      
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group custom-form m-b-30">
                                      <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                                        <label class="olabel">Heading </label>
                                        <input type="text" name="heading" id="cont3_head"  class="form-control" value="<?php echo $homepage[0]['homepage']['howitsworktitlethree']['heading']; ?>">
                                        <span class="hider login-error error-color" id="cont3_head_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                                      </div>
                                      <label class="olabel">Content </label>
                                      <textarea type="textarea" name="content" class="form-control" rows="6" id="cont3_cont" value="<?php echo $homepage[0]['homepage']['howitsworktitlethree']['content']; ?>"><?php echo $homepage[0]['homepage']['howitsworktitlethree']['content']; ?></textarea>
                                      <span class="hider login-error error-color" id="cont3_cont_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="pull-right"><button type="submit" class="profsetbut" value="submit">save</button></span>
                                    </div>
                                  </form>
                                </div>

                                <br><br>
                                <div class="row">
                                <div class="col-md-12">
                                  <h4>Title four</h4>
                                  <hr style="height: 10px; border: 0;box-shadow: 0 10px 10px -10px #8c8b8b inset;">
                                </div>
                                </div>
                                <br><br>
                                <div class="row">
                                 <form id="add_content4"  method="post" form action="{{URL('/')}}/howitworks_titlefour" enctype="multipart/form-data">
                                    <div class="col-md-6">
                                    <input type="hidden" name="img" value="{{$homepage[0]['homepage']['howitsworktitlefour']['image']}}">
                                      
                                      <img class="adimg" id="title4" src="{{URL::asset($homepage[0]['homepage']['howitsworktitlefour']['image'])}}" alt="your image" width="100%" height="300" />
                                      <input class="adimg" type="file" name="photo" 
                                      onchange="document.getElementById('title4').src = window.URL.createObjectURL(this.files[0])">
                                      
                                      
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group custom-form m-b-30">
                                      <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                                        <label class="olabel">Heading </label>
                                        <input type="text" name="heading" id="cont4_head"  class="form-control" value="<?php echo $homepage[0]['homepage']['howitsworktitlefour']['heading']; ?>">
                                        <span class="hider login-error error-color" id="cont4_head_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                                      </div>
                                      <label class="olabel">Content </label>
                                      <textarea type="textarea" name="content" class="form-control" rows="6" id="cont4_cont" value="<?php echo $homepage[0]['homepage']['howitsworktitlefour']['content']; ?>"><?php echo $homepage[0]['homepage']['howitsworktitlefour']['content']; ?></textarea>
                                      <span class="hider login-error error-color" id="cont4_cont_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="pull-right"><button type="submit" class="profsetbut " value="submit">save</button></span>
                                    </div>
                                  </form>
                                </div>


                              </div>  
                            </div>
                          </div>
                        </div>
                      </div>
                     
                      
                      <div class="contborder">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title f-weight foot_add" style="font-weight: 600!important;">Section 3 - Slidder</h3>
                          </div>
                          <div class="panel-body panelpad">
                          
                            <form id="slid" method="post" form action="{{URL('/')}}/howitworks_slidder" enctype="multipart/form-data">
                            <input type="hidden" name="img1" value="{{$homepage[0]['homepage']['sliders']['image1']}}">
                            <input type="hidden" name="img2" value="{{$homepage[0]['homepage']['sliders']['image2']}}">
                              <div class="adimg">
                                <label class="olabel">slider1 </label>
                                <!-- <select name="options" id="myselect" class="form-control emform">
                                  <option value="slidder1">slidder 1</option>
                                  <option value="slidder2">slidder 2</option>
                                </select> -->
                              </div>
                              <div id="slid_1" class="display">
                              <div class="row">
                                <div class="col-md-6">
                                 <label class="olabel">Image1 </label>
                                  <img class="adimg"  id="slidder1" alt="your image" width="100%" height="300" src="{{URL::asset($homepage[0]['homepage']['sliders']['image1'])}}"/>
                                  <input class="adimg" type="file" name="photo1" 
                                  onchange="document.getElementById('slidder1').src = window.URL.createObjectURL(this.files[0])">
                                 </div>
                                 <div class="col-md-6"> 
                                 <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                                  <label class="olabel">Content1 </label>
                                  <div >
                                  <textarea type="textarea" name="content1" class="form-control adimg m-b-30" rows="6" id="slidder1"><?php echo$homepage[0]['homepage']['sliders']['content1'];?></textarea>
                                    <span class="hider login-error error-color" id="slidd_error" style="margin-top: -30px !important;"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                                  </div>
                                  </div>
                                 <!--  <div class="col-md-12">
                                       <span><button type="submit" class="profsetbut  pull-right" value="submit">save</button></span>
                                  </div> -->
                                
                              </div>
                             </div> 
                            
                              <div  id="slid_2">
                               <label class="olabel">Slidder2 </label>
                              <div class="row">
                                <div class="col-md-6">
                                 <label class="olabel">Image2 </label>
                                  <img class="adimg"  id="slidder2" alt="your image" width="100%" height="300" src="{{URL::asset($homepage[0]['homepage']['sliders']['image2'])}}"/>
                                  <input class="adimg" type="file" name="photo2" 
                                  onchange="document.getElementById('slidder2').src = window.URL.createObjectURL(this.files[0])">
                                 </div>
                                 <div class="col-md-6"> 
                                 <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                                  <label class="olabel">Content2 </label>
                                  <div >
                                  <textarea type="textarea" name="content2" class="form-control adimg m-b-30" rows="6" id="slidder2"><?php echo$homepage[0]['homepage']['sliders']['content2'];?></textarea>
                                    <span class="hider login-error error-color" id="slidd_error" style="margin-top: -30px !important;"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                                  </div>
                                  </div>
                                  <div class="col-md-12">
                                       <span><button type="submit" class="profsetbut  pull-right" value="submit">save</button></span>
                                  </div>
                                
                              </div>
                            </div>
                            
                            </form>
                            
                          </div>
                        </div>
                      </div>
                     
                      <div class="contborder">
                        <div class="panel panel-default">
                          
                            <div class="panel-heading">
                              <h3 class="panel-title f-weight foot_add" style="font-weight: 600!important;">section 4 - Wide banner</h3>
                            </div>
                            <div class="panel-body panelpad">
                             <form id="sec5"  method="post" form action="{{URL('/')}}/howitworks_widebanner" enctype="multipart/form-data">
                             <input type="hidden" name="img" value="{{$homepage[0]['homepage']['banner2']['image']}}">
                              <div class="form-group custom-form">
                              <div class="row">
                               <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                                <label class="olabel col-md-2">Heading </label>
                                <div class="col-md-10">
                                <input type="text" name="heading" id="sec5_cont"  class="emform adimg form-control" value="<?php echo $homepage[0]['homepage']['banner2']['heading']; ?>">
                                <span class="hider login-error error-color" id="sec5_cont_error" style="margin-top: -10px !important;"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                                </div>
                              </div>
                              </div>
                              <img class="adimg" src="{{URL::asset($homepage[0]['homepage']['banner2']['image'])}}" id="wide_banner" alt="your image" width="100%" height="150" />
                              <input class="adimg" type="file" name="photo" 
                              onchange="document.getElementById('wide_banner').src = window.URL.createObjectURL(this.files[0])">
                              <button type="submit" class="profsetbut pull-right" value="submit">save</button>
                              </form>
                            </div>
                          
                        </div>
                      </div>
                      
                      <div class="contborder">
                        <div class="panel panel-default">
                          
                            <div class="panel-heading">
                            <h3 class="panel-title f-weight foot_add" style="font-weight: 600!important;">Section 5 - Bottom section</h3>
                          </div>
                            <div class="panel-body panelpad">
                            <form id="sec6"  method="post" form action="{{URL('/')}}/howitworks_greenbanner">
                              <div class="form-group custom-form row">
                              <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                                <label class="olabel col-md-3">Name of the Content </label>
                                <div class="col-md-9">
                                <input type="text" name="content" id="sec6_cont1"  class="emform adimg form-control" value="<?php echo $homepage[0]['homepage']['banner3']['content']; ?>">
                                <span class="hider login-error error-color" id="sec6_cont1_error" style="margin-top: -10px !important;"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                                </div>
                              </div>
                              
                              <div class="row">
                              <div class="col-md-12">
                              <button type="submit" class="profsetbut pull-right" value="submit">save</button>
                              </div>
                              </div>
                            </form>  
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
        function cardmonth() {
     var e =$('#myselect').val();
   if(e == "slidder2" )
     {
        
        $('#slid_1').removeClass('display');
        $('#slid_1').addClass('hider');
        $('#slid_2').addClass('display');
     }
    else
    {   
        $('#slid_2').removeClass('display');
        $('#slid_2').addClass('hider');
        $('#slid_1').addClass('display');
    }
    // else()
    // {
    //     $('#slid_1').removeClass('display');
    //     $('#slid_1').addClass('hider');
    //     $('#slid_2').removeClass('display');
    //     $('#slid_2').addClass('hider');
    //     $('#slid_3').removeClass('hider');
    //     $('#slid_3').addClass('display');
    // }
    
   }

   $('#myselect').change(function(){
   cardmonth();
 });
        </script>
        
      </html>
