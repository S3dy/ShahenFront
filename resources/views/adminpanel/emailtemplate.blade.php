<!DOCTYPE html>
<html>

  <head>
    <title>Admin - Rbs</title>
   <script type="text/javascript" src="{{ URL::asset('public/js/jquery.js')}}" /></script>
      <link href="{{ URL::asset('public/css/bootstrap.min.css')}} " rel="stylesheet" />
      <script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js')}}" /></script>
      <script type="text/javascript" src="{{ URL::asset('public/js/admin.js')}}" /></script>
      <script type="text/javascript" src="{{ URL::asset('public/js/tinymce/tinymce.min.js')}}"></script>
      <script type="text/javascript" src="{{ URL::asset('public/js/jquery.dataTables.js')}}" /></script>
      <script type="text/javascript" src="{{ URL::asset('public/js/dataTables.bootstrap.js')}}" /></script>
      <link href="{{URL::asset('public/css/admin.css')}}" rel="stylesheet" />
      <link rel="stylesheet" href="{{URL::asset('public/css/font-awesome.css')}}">
      <link rel="stylesheet" href="{{URL::asset('public/css/font.css')}}">
      <link rel="stylesheet" href="{{URL::asset('public/css/dataTables.bootstrap.css')}}">
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
              

            <div class="row adimg">

              <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                <div class="panel-heading f-weight foot_add"><span class=" foot_add">Mail Template</span> <span><img id="loaderimg" style="visibility: hidden;" class="loaderimg" src="{{URL('/')}}/public/images/loader.svg"></span></div>
                <div class="panel-body">  
                <?php 
                 $obj=json_decode($users,true);
                ?>
              <form action="{{url('/editemailtemplate')}}" method="post" id="temp">
              <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
              <div class="foot_add" style="margin-bottom: 20px;">
              Header :    
              </div>
             <div class="adimg m-b-30">
             <textarea type="textarea"  name="emailtemplate1" value="{{$obj[0]['emailtemplate1']}}" class="form-control"  id="mail_temp1">{{$obj[0]['emailtemplate1']}}</textarea>
             <span class="hider login-error error-color" id="mail_temp1_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
             </div>
             <div class="foot_add" style="margin-bottom: 20px;">
              Footer :    
              </div>
             <div class="adimg m-b-30 ">
             <textarea type="textarea"  name="emailtemplate2" value="{{$obj[0]['emailtemplate2']}}" class="form-control"  id="mail_temp2">{{$obj[0]['emailtemplate2']}}</textarea>
             <span class="hider login-error error-color" id="mail_temp2_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
             </div>
              <button type="submit" class="profsetbut  pull-right" value="submit">save</button>
              </form>
                </div>
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
        selector: "textarea#mail_temp1,#mail_temp2",
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
function sec6_con() {
var content = tinyMCE.get('mail_temp1').getContent(); // msg = textarea id

if( content == "" || content == null){
             // $("#msg_error").html("* Can't add an empty message");
             $('#mail_temp1_error').removeClass('hider');
             $('#mail_temp1_error').addClass('display');
             return false;
        }
        else
        {
             $('#mail_temp1_error').removeClass('display');
             $('#mail_temp1_error').addClass('hider');
             return true; 
        }
  }
  $('#mail_temp1').keyup(function(){
   sec6_con();
 });

  function sec6_temp() {
var content = tinyMCE.get('mail_temp2').getContent(); // msg = textarea id

if( content == "" || content == null){
             // $("#msg_error").html("* Can't add an empty message");
             $('#mail_temp2_error').removeClass('hider');
             $('#mail_temp2_error').addClass('display');
             return false;
        }
        else
        {
             $('#mail_temp2_error').removeClass('display');
             $('#mail_temp2_error').addClass('hider');
             return true; 
        }
  }
  $('#mail_temp2').keyup(function(){
   sec6_temp();
});

   $('#temp').submit(function(){
  a=sec6_con(); b=sec6_temp();
      if(a && b)
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
<script>
  function cont(){
        //alert("portfolio functio call");
        $('#loaderimg').css('visibility',"visible");
        tinymce.activeEditor.setMode('readonly');
        $('#options').prop('disabled','disabled');
        var t=$('#options').val();
        //alert(t);
        var request = $.ajax({
        url: "emailcon",
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "options" : t},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
        request.done(function(msg){
          console.log(msg);
          tinyMCE.activeEditor.setContent(msg);
           $('#loaderimg').css('visibility',"hidden");
           $('#options').removeAttr('disabled');
    //document.getElementById("mail_con").val = msg;
    tinymce.activeEditor.setMode('design'); 
        });

}

   $('#options').change(function(){
   cont();
 });
</script>
</html>
