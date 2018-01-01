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

    <section class="content-inner section-bg ">
        <div class="pagepad">
          <div class="row">
          <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="margin-bottom:150px">
        <!-- Default panel contents -->
        <form id="add_footer"> 
        <div class="panel-heading f-weight">
          <div class="row">
            <div class="col-md-4 comprotit foot_add">
            Add Footer
            </div>
            <div class="col-md-3">
            </div>
          <div class="col-md-5 text-right">
              <span><button  class="btn btn-success foot_p bor_rad" type="submit">Save</button></span>
              <span><a href="{{url('admin/addfooter2')}}" class="btn btn-danger foot_p bor_rad">Close</a></span>
          </div>
          </div>
          </div>
        
        <div class="panel-body">
          <div class="row">
           <label  class="col-md-12 control-label">Footersection</label>
            <div class="col-md-12 foot_b">
              <div>
                <select class="foot_select" name="foot_select">
                  <option value="COMPANY INFO">COMPANY INFO</option>
                  <option value="ADDITIONAL SERVICES">ADDITIONAL SERVICES</option>
                  <option value="BROWSE">BROWSE</option>
                  <option value="CONNECT WITH US">CONNECT WITH US</option>
                </select>
              </div>
            </div>
            
            <label  class="col-md-12 control-label">Footername</label>
            <div class="col-md-12 foot_b">
              <div><input type="text" name="foot_name" id="add_foot" placeholder="Footer Name" class="foot_text"></div><span class="hider login-error error-color" id="foot_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>    
            </div>
            
            <label  class="col-md-12 control-label">Title of the page</label>
            <div class="col-md-12 foot_b">
              <div><input type="text" name="page_title" id="page_tittle" placeholder="Page Tittle" class="foot_text"></div>
            <span class="hider login-error error-color" id="page_tittle_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
            </div>
            <label  class="col-md-12 control-label">Link under</label>
            <div class="col-md-12 foot_b">
              <div>
                <select class="foot_select" name="foot_type">
                  <option value="COMPANY INFO">legal</option>
                  <option value="ADDITIONAL SERVICES">terms</option>
                  <option value="BROWSE">blog</option>
                  <option value="CONNECT WITH US">about</option>
                </select>
              </div>
            </div>
            <label  class="col-md-12 control-label">Name of the link</label>
            <div class="col-md-12 foot_b">
              <div><input type="text" name="foot_url" id="foot_url" placeholder="Hyper Link" class="foot_text"></div>
            <span class="hider login-error error-color" id="footurl_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
            </div>
            
            <div class="col-md-12 foot_b">
              <div><textarea rows="5" class="foot_textarea" id="foot_textarea" name="foot_textarea" placeholder="Description"></textarea></div>    
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
                        <a href="#" onmouseout="this.style.color = '#7d7d7d'" class="footer-a">Terms of Service</a>
                        </br>
                        <a href="#" id="a" onmouseout="this.style.color = '#7d7d7d'" class="footer-a">Cookie Policy</a>

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
