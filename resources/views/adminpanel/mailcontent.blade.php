<!DOCTYPE html>
<html>

  <head>
    <title>Admin - Rbs</title>
   <script type="text/javascript" src="{{ URL::asset('/js/jquery.js')}}" /></script>
      <link href="{{ URL::asset('/css/bootstrap.min.css')}} " rel="stylesheet" />
      <script type="text/javascript" src="{{ URL::asset('/js/bootstrap.min.js')}}" /></script>
      <script type="text/javascript" src="{{ URL::asset('/js/admin.js')}}" /></script>
      <script type="text/javascript" src="{{ URL::asset('/js/tinymce/tinymce.min.js')}}"></script>
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

        <div class="pagepad financemarg">
              

            <div class="row adimg">

              <div class="col-md-8 col-md-offset-2">
              <form action="{{url('/admin_email')}}" method="post" id="sec">
              <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
                <div class="m-b-30">
                    <span class=" foot_add">Email Management</span> <span><img id="loaderimg" style="visibility: hidden;" class="loaderimg" src="{{URL('/')}}//images/loader.svg"></span>
                </div>
              <div class="adimg m-b-30">
             <select name="options" class="form-control foot_select" id="options">
             <option value="PROVIDER SIGN UP MAIL">PROVIDER SIGN UP MAIL</option>
             <option value="FREELANCER SIGN UP MAIL">FREELANCER SIGN UP MAIL</option>
             <option value="ACCEPT PROPOSAL MAIL">ACCEPT PROPOSAL MAIL</option>
             <option value="DECLINE PROPOSAL MAIL">DECLINE PROPOSAL MAIL</option>
             <option value="MESSAGE FROM PROVIDER MAIL">MESSAGE FROM PROVIDER MAIL</option>
             <option value="MESSAGE FROM FREELANCER MAIL">MESSAGE FROM FREELANCER MAIL</option>
             <option value="PAYMENT FROM PROVIDER MAIL">PAYMENT FROM PROVIDER MAIL</option>
             <option value="PROJECT COMPLETED MAIL">PROJECT COMPLETED MAIL</option>
             <option value="SUBMIT PROPOSAL MAIL">SUBMIT PROPOSAL MAIL</option>
             <option value="SUBMIT PROPOSAL MAIL FREELANCER">SUBMIT PROPOSAL MAIL FREELANCER</option>
             <option value="DECLINE PROPOSAL MAIL PROVIDER">DECLINE PROPOSAL MAIL PROVIDER</option>
             <option value="PROJECT COMPLETED MAIL FREELANCER">PROJECT COMPLETED MAIL FREELANCER</option>
             <option value="PAYMENT TO FREELANCER MAIL">PAYMENT TO FREELANCER MAIL</option>
             <option value="FORGET PASSWORD MAIL">FORGET PASSWORD MAIL</option>
             </select>
             </div>
             <div class="adimg m-b-30">
                  <input type="text" class="form-control" value="{{$users1}}" id="subject" name ="subject" placeholder="Subject">
             </div>
             <div class="adimg m-b-30 ">
             <textarea type="textarea"  name="emailcontent" value="{{$users}}" class="form-control"  id="mail_con">{{$users}}</textarea>
             <span class="hider login-error error-color" id="mail_con_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
             </div>
              <button type="submit" class="profsetbut  pull-right" value="submit">save</button>
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
    tinymce.init({
        selector: "textarea#mail_con",
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
var content = tinyMCE.get('mail_con').getContent(); // msg = textarea id

if( content == "" || content == null){
             // $("#msg_error").html("* Can't add an empty message");
             $('#mail_con_error').removeClass('hider');
             $('#mail_con_error').addClass('display');
             return false;
        }
        else
        {
             $('#mail_con_error').removeClass('display');
             $('#mail_con_error').addClass('hider');
             return true; 
        }
  }
  $('#sec6_con').keyup(function(){
   sec6_con();
 });
   $('#sec').submit(function(){
  a=sec6_con();
      if(a)
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
        var s=$('#subject').val();
        //alert(t);
        var request = $.ajax({
        url: "emailcontent",
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "options" : t,"subject" : s,},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
        request.done(function(msg){
          console.log(msg);
          var json=jQuery.parseJSON(msg);
          document.getElementById("subject").value = json[0][t]['subject'];
          tinyMCE.activeEditor.setContent(json[0][t]['content']);
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
