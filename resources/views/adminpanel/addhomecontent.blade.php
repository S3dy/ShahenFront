<!DOCTYPE html>
<html>
  <head>
    <title>Admin - Rbs</title>
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery-1.12.4.js')}}" /></script>
    <link href="{{ URL::asset('public/css/bootstrap.min.css')}} " rel="stylesheet" />
    <script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js')}}" /></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/tinymce/tinymce.min.js')}}"></script>
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
                <div class="row">
                  <div class="col-md-12">
                    <div class="panel panel-default m-b-30">
                      <div class="panel-heading">
                        <h3 class="panel-title foot_add f-weight" style="font-weight: 600!important;">Section 1 - Banner image</h3>
                      </div>
                      <div class="panel-body panelpad">
                          <?php
                          $json=$users;
                          $howitworks=json_decode($json,true);
                          ?>
                        <form id="section_banner" method="post" form action="{{URL('/')}}/howitworkspage_banner" enctype="multipart/form-data">
                        <input type="hidden" name="img" value="{{$howitworks[0]['howitworks']['howitsworkpageimgbanner']['image']}}">
                          <div class="row adimg">
                            <div class="col-md-12">
                              <img class="adimg" src="{{URL::asset($howitworks[0]['howitworks']['howitsworkpageimgbanner']['image'])}}" id="change_banner" alt="your image" width="100%" height="400" />
                              <span class="hider login-error error-color" style="margin-top: 22px !important;" id="change_banner-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Image is required.</span>
                              <span><input class="adimg" id="change_ban" type="file" name="photo" accept="image/*"
                              onchange="document.getElementById('change_banner').src = window.URL.createObjectURL(this.files[0])"/></span>
                              
                            </div>
                          </div>
                          <div class="m-b-30">
                          <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                            <input type="text" name="heading" id="add_content" placeholder="Content" class="head_text" value="<?php echo $howitworks[0]['howitworks']['howitsworkpageimgbanner']['heading']; ?>">
                            <span class="hider login-error error-color" id="add_cont_err"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                          </div>
                          <div class="m-b-30">
                            <input type="text" name="content" id="add_Small_Content" placeholder="Small Content" class="head_text" value="<?php echo $howitworks[0]['howitworks']['howitsworkpageimgbanner']['content']; ?>">
                            <span class="hider login-error error-color" id="add_Small_Content-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                          </div>
                          
                          <span> <button type="submit" class="profsetbut pull-right">Save</button></span>
                        </form>
                      </div>
                    </div>
                    <div class="panel panel-default m-b-30">
                      <div class="panel-heading">
                        <h3 class="panel-title f-weight foot_add" style="font-weight: 600!important;">Section 2 - How it works</h3>
                      </div>
                      <div class="panel-body panelpad">
                        <form id="image_content_section" method="post" form action="{{URL('/')}}/howitworkspage_title1" enctype="multipart/form-data">
                        <input type="hidden" name="img1" value="{{$howitworks[0]['howitworks']['howitsworkpagecontentsection']['image1']}}">
                        <input type="hidden" name="img2" value="{{$howitworks[0]['howitworks']['howitsworkpagecontentsection']['image2']}}">
                        <input type="hidden" name="img3" value="{{$howitworks[0]['howitworks']['howitsworkpagecontentsection']['image3']}}">
                        <input type="hidden" name="img4" value="{{$howitworks[0]['howitworks']['howitsworkpagecontentsection']['image4']}}">

                          <div>
                            <div class="m-b-30">
                              <div class="m-b-30 col-md-12">
                              <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                                <input type="text" name="title1" id="add_title_con1" placeholder="Title Content 1" class="head_text" value="<?php echo $howitworks[0]['howitworks']['howitsworkpagecontentsection']['title1']; ?>">
                                <span class="hider login-error error-color" id="add_title_con1-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                              </div>
                              <div class="m-b-30 col-md-6"><textarea name="content1" placeholder="Summary" class="foot_textarea" id="summary_con1"><?php echo $howitworks[0]['howitworks']['howitsworkpagecontentsection']['content1']; ?></textarea>
                                <span class="hider login-error error-color" id="summary_con1-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                              </div>
                              <div class="col-md-6 adimg">
                                <div >
                                  <img class="adimg" src="{{URL::asset($howitworks[0]['howitworks']['howitsworkpagecontentsection']['image1'])}}" id="img_chng1" alt="your image" width="100%" height="300" />
                                  <span class="hider login-error error-color" style="margin-top: 22px !important;" id="img_chng1-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Image is required.</span>
                                  <span><input class="adimg" type="file"  accept="image/*" name="photo1" 
                                  onchange="document.getElementById('img_chng1').src = window.URL.createObjectURL(this.files[0])"/></span>
                                </div>
                              </div>
                            </div>
                            <div class="m-b-30">
                              <div class="m-b-30 col-md-12">
                                <input type="text" name="title2" id="add_title_con2" placeholder="Title Content 2" class="head_text" value="<?php echo $howitworks[0]['howitworks']['howitsworkpagecontentsection']['title2']; ?>">
                                <span class="hider login-error error-color" id="add_title_con2-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                              </div>
                              <div class="m-b-30 col-md-6 pull-right">
                              <textarea  placeholder="Summary" name="content2" class="foot_textarea" id="summary_con2"><?php echo $howitworks[0]['howitworks']['howitsworkpagecontentsection']['content2']; ?></textarea>
                                <span class="hider login-error error-color" id="summary_con2-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                              </div>
                              <div class="col-md-6 adimg pull-left">
                                <div >
                                  <img class="adimg" src="{{URL::asset($howitworks[0]['howitworks']['howitsworkpagecontentsection']['image2'])}}" id="img_chng2" alt="your image" width="100%" height="300" />
                                  <span class="hider login-error error-color" style="margin-top: 22px !important;" id="img_chng2-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Image is required.</span>
                                  <span><input class="adimg" name="photo2" type="file" accept="image/*"
                                  onchange="document.getElementById('img_chng2').src = window.URL.createObjectURL(this.files[0])"/></span>
                                </div>
                              </div>
                            </div>
                            <div class="m-b-30">
                              <div class="m-b-30 col-md-12">
                                <input type="text" name="title3" id="add_title_con3" placeholder="Title Content 3" class="head_text" value="<?php echo $howitworks[0]['howitworks']['howitsworkpagecontentsection']['title3']; ?>">
                                <span class="hider login-error error-color" id="add_title_con3-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                              </div>
                              <div class="m-b-30 col-md-6">
                              <textarea cols="142" rows="5" name="content3" placeholder="Summary" class="foot_textarea" id="summary_con3"><?php echo $howitworks[0]['howitworks']['howitsworkpagecontentsection']['content3']; ?></textarea>
                                <span class="hider login-error error-color" id="summary_con3-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                              </div>
                              <div class="col-md-6 adimg">
                                <div >
                                  <img class="adimg" src="{{URL::asset($howitworks[0]['howitworks']['howitsworkpagecontentsection']['image3'])}}" id="img_chng3" alt="your image" width="100%" height="300" />
                                  <span class="hider login-error error-color" style="margin-top: 22px !important;" id="img_chng3-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Image is required.</span>
                                  <span><input class="adimg" type="file" name="photo3"  accept="image/*"
                                  onchange="document.getElementById('img_chng3').src = window.URL.createObjectURL(this.files[0])"/></span>
                                </div>
                              </div>
                            </div>
                            <div class="m-b-30">
                              <div class="m-b-30 col-md-12">
                                <input type="text" name="title4" id="add_title_con4" placeholder="Title Content 4" class="head_text" value="<?php echo $howitworks[0]['howitworks']['howitsworkpagecontentsection']['title4']; ?>">
                                <span class="hider login-error error-color" id="add_title_con4-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                              </div>
                              <div class="m-b-30 col-md-6 pull-right">
                              <textarea  placeholder="Summary" name="content4" class="foot_textarea" id="summary_con4"><?php echo $howitworks[0]['howitworks']['howitsworkpagecontentsection']['content4']; ?></textarea>
                                <span class="hider login-error error-color" id="summary_con4-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                              </div>
                              <div class="col-md-6 adimg pull-left">
                                <div >
                                  <img class="adimg" src="{{URL::asset($howitworks[0]['howitworks']['howitsworkpagecontentsection']['image4'])}}" id="img_chng4" alt="your image" width="100%" height="300" />
                                  <span class="hider login-error error-color" style="margin-top: 22px !important;" id="img_chng4-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Image is required.</span>
                                  <span><input class="adimg" type="file" name="photo4" accept="image/*"
                                  onchange="document.getElementById('img_chng4').src = window.URL.createObjectURL(this.files[0])"/></span>
                                  
                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="col-md-12 clear-fix">
                                  <span> <button type="submit" class="profsetbut pull-right">Save</button></span>
                            </div>
                        </form>
                      </div>
                    </div>
                    <div class="panel panel-default m-b-30">
                      <div class="panel-heading">
                        <h3 class="panel-title f-weight foot_add" style="font-weight: 600!important;">Section 3 - Bottom section</h3>
                      </div>
                      <div class="panel-body panelpad">
                        <form id="banner_section_end"  method="post" form action="{{URL('/')}}/howitworkspage_greenbanner">
                          <div class="m-b-30">
                          <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                            <input type="text" name="content" id="add_content_end" placeholder="Content" class="head_text" value="<?php echo $howitworks[0]['howitworks']['howitsworkpagegreenbanner']['content']; ?>">
                            <span class="hider login-error error-color" id="add_content_end-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
                          </div>
                          
                          <div class="row">
                            <span> <button type="submit" class="profsetbut pull-right">Save</button></span>
                          </div>
                        </form>
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
          <p class="copyright" id="p"> © 2016 - 2017 Sha7en LLC.</p>
          <a href="{{url('legal/terms')}}" onmouseout="this.style.color = '#7d7d7d'" class="footer-a">Terms of Service</a>
          </br>
        </div>
      </div>
      
    </div>
  </body>
  <script>
  tinymce.init({
  selector: "textarea#summary_con1,#summary_con2,#summary_con3,#summary_con4",
  theme: "modern",
  width: '100%',
  height: 300,
  plugins: [
  "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
  "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
  "save table contextmenu directionality emoticons template paste textcolor"
  ],
  content_css: "css/content.css",
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
  style_formats: [
  {title: 'Bold text', inline: 'b'},
  {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
  {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
  {title: 'Example 1', inline: 'span', classes: 'example1'},
  {title: 'Example 2', inline: 'span', classes: 'example2'},
  {title: 'Table styles'},
  {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
  ]
  });
  </script>
  <script>
        $(document).ready(function(){
function summary_con1() {
var content = tinyMCE.get('summary_con1').getContent(); // msg = textarea id

if( content == "" || content == null){
             // $("#msg_error").html("* Can't add an empty message");
             $('#summary_con1-error').removeClass('hider');
             $('#summary_con1-error').addClass('display');
             return false;
        }
        else
        {
             $('#summary_con1-error').removeClass('display');
             $('#summary_con1-error').addClass('hider');
             return true; 
        }
  }
  $('#summary_con1').keyup(function(){
   summary_con1();
 });
  function summary_con2() {
var content = tinyMCE.get('summary_con2').getContent(); // msg = textarea id

if( content == "" || content == null){
             // $("#msg_error").html("* Can't add an empty message");
             $('#summary_con2-error').removeClass('hider');
             $('#summary_con2-error').addClass('display');
             return false;
        }
        else
        {
             $('#summary_con2-error').removeClass('display');
             $('#summary_con2-error').addClass('hider');
             return true; 
        }
  }
  $('#summary_con2').keyup(function(){
   summary_con2();
 });
  function summary_con3() {
var content = tinyMCE.get('summary_con3').getContent(); // msg = textarea id

if( content == "" || content == null){
             // $("#msg_error").html("* Can't add an empty message");
             $('#summary_con3-error').removeClass('hider');
             $('#summary_con3-error').addClass('display');
             return false;
        }
        else
        {
             $('#summary_con3-error').removeClass('display');
             $('#summary_con3-error').addClass('hider');
             return true; 
        }
  }
  $('#summary_con3').keyup(function(){
   summary_con3();
 });
  function summary_con4() {
var content = tinyMCE.get('summary_con4').getContent(); // msg = textarea id

if( content == "" || content == null){
             // $("#msg_error").html("* Can't add an empty message");
             $('#summary_con4-error').removeClass('hider');
             $('#summary_con4-error').addClass('display');
             return false;
        }
        else
        {
             $('#summary_con4-error').removeClass('display');
             $('#summary_con4-error').addClass('hider');
             return true; 
        }
  }
  $('#summary_con4').keyup(function(){
   summary_con4();
 });
   $('#image_content_section').submit(function(){
  a=summary_con1();b=summary_con2();c=summary_con3();d=summary_con4();
      if(a && b && c && d)
      {
        return true;
      }
      else
      {
        return false;
      }
});
});
        </script>
</html>