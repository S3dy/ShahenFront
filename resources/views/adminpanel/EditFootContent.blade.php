<!DOCTYPE html>
<html>

  <head>
    <title>Admin - Rbs</title>
      <script type="text/javascript" src="{{ URL::asset('/js/jquery-1.12.4.js')}}" /></script>
      <link href="{{ URL::asset('/css/bootstrap.min.css')}} " rel="stylesheet" />
      <script type="text/javascript" src="{{ URL::asset('/js/bootstrap.min.js')}}" /></script>
      
      <script type="text/javascript" src="{{ URL::asset('/js/tinymce/tinymce.min.js')}}"></script>
      <script type="text/javascript" src="{{ URL::asset('/js/admin.js')}}" /></script>
      <link href="{{URL::asset('/css/admin.css')}}" rel="stylesheet" />
      <link rel="stylesheet" href="{{URL::asset('/css/font-awesome.css')}}">
      <link rel="stylesheet" href="{{URL::asset('/css/font.css')}}">
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
          <?php
                       $arr = json_decode($users,true);
                    ?>
    <section class="content-inner section-bg ">
        <div class="pagepad">
          <div class="row">
          <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="margin-bottom:150px">
        <!-- Default panel contents -->
        <form id="add_footer" action="{{URL('/')}}/admin/editfooter" method="post"> 
        <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="id" value="{{$id}}">
        <div class="panel-heading f-weight">
          <div class="row">
            <div class="col-md-4 comprotit foot_add">
            Add Footer
            </div>
            <div class="col-md-3">
            </div>
          <div class="col-md-5 text-right">
              <span><button  class="btn btn-success foot_p bor_rad" type="submit">Save</button></span>
              <span><a href="{{url('admin/addfooter')}}" class="btn btn-danger foot_p bor_rad">Close</a></span>
          </div>
          </div>
          </div>
        
        <div class="panel-body">
          <div class="row">
          <input type="hidden" name="foot_change" value="home" >
           <label  class="col-md-12 control-label">Footersection</label>
            <div class="col-md-12 foot_b">
              <div>
                <select class="foot_select" name="footselect"  >

                  <option value="COMPANY INFO" <?php if($arr['footselect']=='COMPANY INFO'){ ?> selected <?php } ?>>COMPANY INFO</option>
                  <option value="DISCOVER" <?php if($arr['footselect']=='DISCOVER'){ ?> selected <?php } ?>  >DISCOVER</option>
                  <option value="POLICIES" <?php if($arr['footselect']=='POLICIES'){ ?> selected <?php } ?> >POLICIES</option>
                  <option value="CONNECT WITH US" <?php if($arr['footselect']=='CONNECT WITH US'){ ?> selected <?php } ?> >CONNECT WITH US</option>
                </select>
              </div>
            </div>
                        <label  class="col-md-12 control-label">Link under</label>
            <div class="col-md-12 foot_b">
              <div>
                <select class="foot_select" name="foottype">
                  <option value="legal" <?php if($arr['foottype']=='legal'){ ?> selected <?php } ?>  >legal</option>
                  <option value="terms" <?php if($arr['foottype']=='terms'){ ?> selected <?php } ?> >terms</option>
                  <option value="blog" <?php if($arr['foottype']=='blog'){ ?> selected <?php } ?> >blog</option>
                  <option value="about" <?php if($arr['foottype']=='about'){ ?> selected <?php } ?> >about</option>
                </select>
              </div>
            </div>
            <label  class="col-md-12 control-label">Footername</label>
            <div class="col-md-12 foot_b">
              <div><input type="text" name="footname" id="add_foot" value="{{$arr['footname']}}" placeholder="Footer Name" class="foot_text"></div><span class="hider login-error error-color" id="foot_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>    
            </div>
            
            <label  class="col-md-12 control-label">Title of the page</label>
            <div class="col-md-12 foot_b">
              <div><input type="text" name="pagetitle" value="{{$arr['pagetitle']}}" id="page_tittle" placeholder="Page Tittle" class="foot_text"></div>
            <span class="hider login-error error-color" id="page_tittle_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
            </div>
            <label  class="col-md-12 control-label">Name of the link</label>
            <div class="col-md-12 foot_b">
              <div><input type="text" name="footurl" value="{{$arr['footurl']}}" id="foot_url" placeholder="Hyper Link" class="foot_text"></div>
            <span class="hider login-error error-color" id="footurl_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
            </div>
            
            <div class="col-md-12 foot_b">
              <div><textarea rows="5" class="foot_textarea" value="{{$arr['foottextarea']}}" name="foottextarea" id="foot_textarea" placeholder="Description">{{$arr['foottextarea']}}</textarea></div>    
            <span class="hider login-error error-color" id="foot_text_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
            </div>
            
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


<!-- Just be careful that you give correct path to your tinymce.min.js file, above is the default example -->
<script>
    tinymce.init({
        selector: "textarea#foot_textarea",
        theme: "modern",
        width: 685,
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

</html>
