$(document).ready(function(){
   $('#csign').addClass('formheadnav-hover');
   $('.list1').hide();
   $('.optionlist').hide();

   s = 0;

   $('#csign').click(function(){
       $('#isign').removeClass('formheadnav-hover');
       $('#csign').addClass('formheadnav-hover');
       $('#cc').show();
       s = 0;
   });
   $('#isign').click(function(){
      s =1;
     $('#isign').addClass('formheadnav-hover');
     $('#csign').removeClass('formheadnav-hover');
     $('#cc').hide();

   });

  $('#newid').click(function(){
      $('#newid').addClass('active');
      $('#oldid').removeClass('active');
       $('#dis_new').removeClass('hider');
      $('#dis_new').addClass('display');
      $('#dis_old').removeClass('display');
      $('#dis_old').addClass('hider');



  });

    $('#oldid').click(function(){
      $('#oldid').addClass('active');
      $('#newid').removeClass('active');
      $('#dis_new').removeClass('display');
      $('#dis_new').addClass('hider');
       $('#dis_old').removeClass('hider');
      $('#dis_old').addClass('display');

  });

   var i = 1;

   $('#selector').click(function(e){
     e.stopPropagation();
   });
   $('body').click(function(e){

    if(e.target.id == "dropdwn" || e.target.id=="selector"){
       if(i == 1){
         $('.downarrow i').replaceWith("<i class='fa fa-angle-up ' aria-hidden='true'></i>");
         $('.list1').show();
         $('.optionlist ').show();
         i = 2;
       }else {
         i = 1;
         $('.list1').hide();
         $('.optionlist').hide();
         $('.downarrow i').replaceWith("<i class='fa fa-angle-down' aria-hidden='true'></i>");
       }
       return false;
       }

       if(i == 2){
         i = 1;
         $('.list1').hide();
         $('.optionlist').hide();
        $('.downarrow i').replaceWith("<i class='fa fa-angle-down' aria-hidden='true'></i>");
       }
   })
   j = 1;
   $('.optionlist1').hide();
   $('.dropdowntype2').click(function(){
     if(j == 1){
        j = 2;
        $('.optionlist1').show();
     }else{
       $('.optionlist1').hide();
       j = 1;
     }
   });






   function fname(){
     var e =$('#fname').val();
   if(e.length == 0 ){
        $('#fname').addClass('input-error');
        $('#sign-div').addClass('custom-former');
        $('#sign-show-fname').removeClass('hider');
        $('#sign-show-fname').addClass('display');
        return false;
     }
     else
     {
        $('#fname').removeClass('input-error');
        $('#sign-div').removeClass('custom-former');
        $('#sign-show-fname').removeClass('display');
        $('#sign-show-fname').addClass('hider');
        return true;
     }
   }

   $('#fname').keyup(function(){
    fname()  ;
 });

    function lname(){
     var e =$('#lname').val();
   if(e.length == 0 ){
        $('#lname').addClass('input-error');
        $('#sign-div1').addClass('custom-former');
        $('#sign-show-lname').removeClass('hider');
        $('#sign-show-lname').addClass('display');
        return false;
     }
     else
     {
        $('#lname').removeClass('input-error');
        $('#sign-div1').removeClass('custom-former');
        $('#sign-show-lname').removeClass('display');
        $('#sign-show-lname').addClass('hider');
        return true;
     }
   }
   $('#lname').keyup(function(){
   lname();
 });

   function company(){
     var e =$('#company').val();
   if(e.length == 0 ){
        $('#company').addClass('input-error');
        $('#sign-div2').addClass('custom-former');
        $('#sign-show-company').removeClass('hider');
        $('#sign-show-company').addClass('display');
        return false;
     }
     else
     {
        $('#company').removeClass('input-error');
        $('#sign-div2').removeClass('custom-former');
        $('#sign-show-company').removeClass('display');
        $('#sign-show-company').addClass('hider');
        return true;
     }
   }

   $('#company').keyup(function(){
      company();
 });

 function isValidEmailAddress(e) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(e);
};

   function mail(){
     var e =$('#sign-email').val();
    if( !isValidEmailAddress( e ) )
     {
        $('#sign-email').addClass('input-error');
        $('#sign-div3').addClass('custom-former');
        $('#sign-show-invalid').removeClass('hider');
        $('#sign-show-invalid').addClass('display');
        $('#valid-email').removeClass('display');
        $('#valid-email').addClass('hider');
        return false;
     }
    else
     {
        $('#sign-email').removeClass('input-error');
        $('#sign-div3').removeClass('custom-former');
        $('#valid-email').addClass('hider');
        $('#valid-email').removeClass('display');
        $('#sign-show-invalid').removeClass('display');
        $('#sign-show-invalid').addClass('hider');

        var sd= 0;
        var request = $.ajax({
        url: "/emailvalid" ,
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "email" : e },
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

       });
         request.done(function( msg ) {
            if(msg == "0"){
              $('#sign-email').addClass('input-error');
              $('#sign-div3').addClass('custom-former');
              $('#valid-email').removeClass('hider');
              $('#valid-email').addClass('display');
              $('#sign-show-invalid').addClass('hider');
              $('#sign-show-invalid').removeClass('display');
              sd = 1;
           }else{
              $('#sign-email').removeClass('input-error');
              $('#sign-div3').removeClass('custom-former');
             $('#valid-email').addClass('hider');
             $('#valid-email').removeClass('display');
             $('#sign-show-invalid').addClass('hider');
             $('#sign-show-invalid').removeClass('display');
           }
        });
          if(sd == 1) return false;
          return true;
     }

     }



   $('#sign-email').keyup(function(){
    mail();
 });

      function password() {
     var e =$('#sign-password').val();
        function isValidPassword(e) {
  var pattern = /^(?=.*[A-Za-z])(?=.*\d)|(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/i;
    //var pattern = /^(?=.*?[a-z\x80-\xFF])(?=.*?[0-9!"#$%&'()*+,\-.\/:;<=>?@\[\\\]^_`{|}~]).+$/i
    return pattern.test(e);
};

   if(e.length == 0 ){
        $('#sign-password').addClass('input-error');
        $('#sign-div4').addClass('custom-former');
        $('#sign-show-password').removeClass('hider');
        $('#sign-show-password').addClass('display');
        $('#sign-valid-password').addClass('hider');
        $('#sign-valid-password').removeClass('display');
        $('#sign-invalid-password').removeClass('display');
        $('#sign-invalid-password').addClass('hider');
        return false;
     }
     if(e.length >= 1 && e.length < 8)
     {
        $('#sign-invalid-password').removeClass('display');
        $('#sign-invalid-password').addClass('hider');
        $('#sign-show-password').removeClass('display');
        $('#sign-show-password').addClass('hider');
        $('#sign-password').addClass('input-error');
        $('#sign-div4').addClass('custom-former');
        $('#sign-valid-password').removeClass('hider');
        $('#sign-valid-password').addClass('display');
        return false;
     }
     if( !isValidPassword( e ) )
     {

        $('#sign-valid-password').removeClass('display');
        $('#sign-valid-password').addClass('hider');
        $('#sign-show-password').removeClass('display');
        $('#sign-show-password').addClass('hider');
        $('#sign-password').addClass('input-error');
        $('#sign-div4').addClass('custom-former');
        $('#sign-invalid-password').removeClass('hider');
        $('#sign-invalid-password').addClass('display');
        return false;
     }
     else

     {
        $('#sign-invalid-password').removeClass('display');
        $('#sign-invalid-password').addClass('hider');
        $('#sign-valid-password').removeClass('display');
        $('#sign-valid-password').addClass('hider')
        $('#sign-password').removeClass('input-error');
        $('#sign-div4').removeClass('custom-former');
        $('#sign-show-password').removeClass('display');
        $('#sign-show-password').addClass('hider');
        return true;
     }
   }

   $('#sign-password').keyup(function(){
   password();
 });

function check() {
    var ckbox = $('#check');
    if (ckbox.is(':checked')) {
          $('#check').removeClass('forget-input');
          $('#check-error').removeClass('display');
          $('#check-error').addClass('hider');
          return true;
        } else {
          $('#check').addClass('forget-input');
          $('#check-error').removeClass('hider');
          $('#check-error').addClass('display');
          return false;
        }
      }





$('#signin').submit(function(){

  if(s == 0){

    a = fname();b = lname();c = company();d = mail();e = password();f=check();

        if(a && b && c && d && e && f)
        {

          return true;
        }
        else
        {

          return false;
        }
  }else{

    a = fname();b = lname();d = mail();e = password();f=check();

        if(a && b  && d && e && f)
        {

          return true;
        }
        else
        {

          return false;
        }
  }

});

   function forgetmail(){
     var forgetmail1 =$('#forget-mail').val();
     function isValidEmailAddress(forgetmail1) {
    var pattern1 = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern1.test(forgetmail1);
};

    if( !isValidEmailAddress( forgetmail1) )
     {

        $('#forget-mail').addClass('forget-input');
        $('#forget-invalid').removeClass('hider');
        $('#forget-invalid').addClass('display');
        return false;
     }
    else
     {
        $('#forget-mail').removeClass('forget-input');
        $('#forget-invalid').removeClass('display');
        $('#forget-invalid').addClass('hider');
        return true;
     }
   }

   $('#forget-mail').keyup(function(){
    forgetmail() ;
      console.log("Mail true:" +m);
 });


  function forgetcaptcha() {
     var e =$('#captcha-input').val();
   if(e.length == 0 ){
        $('#captcha-input').addClass('forget-input');
        $('#forget-captcha').removeClass('hider');
        $('#forget-captcha').addClass('display');
        return false;
     }
     else
     {
        $('#captcha-input').removeClass('forget-input');
        $('#forget-captcha').removeClass('display');
        $('#forget-captcha').addClass('hider');
        return true;
     }
   }

   $('#captcha-input').keyup(function(){
   forgetcaptcha();
 });

$('#forget').submit(function(){
  a=forgetmail();b=forgetcaptcha();
      if(a && b)
      {
        return true;
       }
      else
      {
        return false;
      }
});

  function logininput() {
     var e =$('#name').val();
   if(e.length == 0 ){
        $('#name').addClass('login-inbox');
        $('#name').addClass('forget-input');
        $('#loginmail').removeClass('hider');
        $('#loginmail').addClass('display');
        return false;
     }
     else
     {
        $('#name').removeClass('forget-input');
        $('#name').removeClass('login-inbox');
        $('#loginmail').removeClass('display');
        $('#loginmail').addClass('hider');
        return true;
     }
   }

   $('#name').keyup(function(){
   logininput();
 });

function loginpassword() {
     var e =$('#loginpassword').val();
   if(e.length == 0 ){
        $('#loginpassword').addClass('login-inbox');
        $('#loginpassword').addClass('forget-input');
        $('#login-pass-error').removeClass('hider');
        $('#login-pass-error').addClass('display');
        return false;
     }
     else
     {
        $('#loginpassword').removeClass('forget-input');
        $('#loginpassword').removeClass('login-inbox');
        $('#login-pass-error').removeClass('display');
        $('#login-pass-error').addClass('hider');
        return true;
     }
   }

   $('#loginpassword').keyup(function(){
   loginpassword();
 });

$('#loginform').submit(function(){
  a=logininput();b=loginpassword();
      if(a && b)
      {
        return true;
      }
      else
      {
        return false;
      }
});


$('#lbutton').click(function(){
  $('#loginform').submit();
  a=logininput();b=loginpassword();
      if(a && b)
      {
        return true;
      }
      else
      {
        return false;
      }
})
/*freelancer signup*/

function fstname(){
     var e =$('#fstname').val();
   if(e.length == 0 ){
        $('#fstname').addClass('input-error');
        $('#freesign-div1').addClass('custom-former');
        $('#f').removeClass('hider');
        $('#f').addClass('display');
        return false;
     }
     else
     {
        $('#fstname').removeClass('input-error');
        $('#freesign-div1').removeClass('custom-former');
        $('#f').removeClass('display');
        $('#f').addClass('hider');
        return true;
     }
   }

   $('#fstname').keyup(function(){
    fstname()  ;
 });
function lstname(){
     var e =$('#lstname').val();
   if(e.length == 0 ){
        $('#lstname').addClass('input-error');
        $('#freesign-div2').addClass('custom-former');
        $('#l').removeClass('hider');
        $('#l').addClass('display');
        return false;
     }
     else
     {
        $('#lstname').removeClass('input-error');
        $('#freesign-div2').removeClass('custom-former');
        $('#l').removeClass('display');
        $('#l').addClass('hider');
        return true;
     }
   }

   $('#lstname').keyup(function(){
    lstname();
 });


   function eml(){
    var sds = 0;
     var e =$('#eml').val();

    if( !isValidEmailAddress( e ) )
     {
        $('#eml').addClass('input-error');
        $('#freesign-div3').addClass('custom-former');
        $('#e').removeClass('hider');
        $('#e').addClass('display');
        return false;
     }
    else
     {

     $('#eml').removeClass('input-error');
     $('#freesign-div3').removeClass('custom-former');
     $('#e').addClass('hider');
     $('#e').removeClass('display');
     $('#valid-email').addClass('hider');
     $('#valid-email').removeClass('display');
        var sds = 0;
        var request = $.ajax({
        url: "/emailvalid" ,
       //url: "http://demo.cogzidel.com/upc/fvalid",
       type: "post",
       data: { "email" : e },
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

       });
         request.done(function( msg ) {
            if(msg == "0"){
              $('#eml').addClass('input-error');
              $('#freesign-div3').addClass('custom-former');
              $('#e').addClass('hider');
              $('#e').removeClass('display');
              $('#valid-email').removeClass('hider');
              $('#valid-email').addClass('display');
              sds = 1;
           }else{
             $('#eml').addClass('input-error');
             $('#freesign-div3').addClass('custom-former');
             $('#e').removeClass('hider');
             $('#e').addClass('display');
           }
        });
          if(sds == 1) return false;

        return true;
     }
   }

   $('#eml').keyup(function(){
    eml() ;
 });


function uname(){

  var e =$('#uname').val();
   if(e.length == 0 ){
        $('#uname').addClass('input-error');
        $('#freesign-div4').addClass('custom-former');
        $('#u').removeClass('hider');
        $('#u').addClass('display');
        return false;
     }
     else
     {
        $('#uname').removeClass('input-error');
        $('#freesign-div4').removeClass('custom-former');
        $('#u').removeClass('display');
        $('#u').addClass('hider');
        $('#valid-username').addClass('hider');
        $('#valid-username').removeClass('display');
        return true;

     }
   }

  $('#uname').blur(function(){
    var e =$('#uname').val();
    var se = 0;
    $('#uname').removeClass('input-error');
    $('#freesign-div4').removeClass('custom-former');
      $('#u').addClass('hider');
      $('#u').removeClass('display');
      $('#valid-username').addClass('hider');
      $('#valid-username').removeClass('display');

     if(e.length == 0 ){
          $('#uname').addClass('input-error');
          $('#freesign-div4').addClass('custom-former');
          $('#u').removeClass('hider');
          $('#u').addClass('display');
          $('#valid-username').addClass('hider');
          $('#valid-username').removeClass('display');
          return false;
       }
       else
       {
         var se = 0;
         var request = $.ajax({
         url: "flvalid" ,
        //url: "http://demo.cogzidel.com/upc/fvalid",
        type: "post",
        data: { "uname" : e },
      datatype:'json',
      headers: {
         'X-CSRF-TOKEN': $('#_token').val()
     }

        });
          request.done(function( msg ) {

             if(msg == "1"){
               $('#uname').addClass('input-error');
               $('#freesign-div4').addClass('custom-former');
               $('#u').addClass('hider');
               $('#u').removeClass('display');
               $('#valid-username').removeClass('hider');
               $('#valid-username').addClass('display');
               se = 1;
            }else{
              $('#uname').addClass('input-error');
              $('#freesign-div4').addClass('custom-former');
              $('#u').removeClass('hider');
              $('#u').addClass('display');
              $('#valid-username').addClass('hider');
              $('#valid-username').removeClass('display');
            }
         });
           if(se == 1) return false;

         return true;

       }
  });

   $('#uname').keyup(function(){
    uname();
 });
function pass(){
     var e =$('#pass').val();
     function isValidPassword(e) {
    var pattern = /^(?=.*[A-Za-z])(?=.*\d)|(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/i;
    return pattern.test(e);
};
   if(e.length == 0 ){
        $('#pass').addClass('input-error');
        $('#freesign-div5').addClass('custom-former');
        $('#p').removeClass('hider');
        $('#p').addClass('display');
        $('#free-valid-password').addClass('hider');
        $('#free-valid-password').removeClass('display');
        $('#free-invalid-password').removeClass('display');
        $('#free-invalid-password').addClass('hider');
        return false;
     }
/*rrretreterrrrrrrrrrtttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt*/
    if(e.length >= 1 && e.length < 8)
     {
        $('#free-invalid-password').removeClass('display');
        $('#free-invalid-password').addClass('hider');
        $('#p').removeClass('display');
        $('#p').addClass('hider');
        $('#pass').addClass('input-error');
        $('#freesign-div5').addClass('custom-former');
        $('#free-valid-password').removeClass('hider');
        $('#free-valid-password').addClass('display');
        return false;
     }
    if( !isValidPassword( e ) )
     {

        $('#free-valid-password').removeClass('display');
        $('#free-valid-password').addClass('hider');
        $('#p').removeClass('display');
        $('#p').addClass('hider');
        $('#pass').addClass('input-error');
        $('#freesign-div5').addClass('custom-former');
        $('#free-invalid-password').removeClass('hider');
        $('#free-invalid-password').addClass('display');
        return false;
     }

     else
     {
        $('#free-invalid-password').removeClass('display');
        $('#free-invalid-password').addClass('hider');
        $('#free-valid-password').removeClass('display');
        $('#free-valid-password').addClass('hider')
        $('#pass').removeClass('input-error');
        $('#freesign-div5').removeClass('custom-former');
        $('#p').removeClass('display');
        $('#p').addClass('hider');
        return true;
     }
   }

   $('#pass').keyup(function(){
    pass()  ;
 });
function captcha(){
     var e =$('#captcha').val();
   if(e.length == 0 ){
        $('#captcha').addClass('input-error');
        $('#freesign-div6').addClass('custom-former');
        $('#c').removeClass('hider');
        $('#c').addClass('display');
        return false;
     }
     else
     {
        $('#captcha').removeClass('input-error');
        $('#freesign-div6').removeClass('custom-former');
        $('#c').removeClass('display');
        $('#c').addClass('hider');
        return true;
     }
   }

   $('#captcha').keyup(function(){
    captcha()  ;
 });

function free_check() {
    var ckbox = $('#free-check');
    if (ckbox.is(':checked')) {
          $('#free-check').removeClass('forget-input');
          $('#free-check-error').removeClass('display');
          $('#free-check-error').addClass('hider');
          return true;
        } else {
          $('#free-check').addClass('forget-input');
          $('#free-check-error').removeClass('hider');
          $('#free-check-error').addClass('display');
          return false;
        }
      }


$('#freelancersignin').submit(function(){
  a=fstname();b=lstname();c=uname();d=pass();e=captcha();f=eml();g=free_check();
      if(a && b && c && d && e && f && g)
      {
        return true;
      }
      else
      {
        return false;
      }
});

/*retype password validation*/
  function new_password() {
     var e =$('#new_password').val();
   if(e.length == 0 )
     {
        $('#new_password').addClass('forget-input');
        $('#new-pass-error').removeClass('hider');
        $('#new-pass-error').addClass('display');
        return false;
     }
    else
     {
        $('#new_password').removeClass('forget-input');
        $('#new-pass-error').removeClass('display');
        $('#new-pass-error').addClass('hider');
        return true;
     }
   }

   $('#new_password').keyup(function(){
   new_password();
 });

function re_password() {
     var f =$('#new_password').val();
     var e =$('#re_password').val();
   if(e.length == 0 )
     {
        $('#re_password').addClass('forget-input');
        $('#re-pass-error').removeClass('hider');
        $('#re-pass-error').addClass('display');
        return false;
     }
     if (e != f  )
     {
        $('#re_password').addClass('forget-input');
        $('#same-pass-error').removeClass('hider');
        $('#same-pass-error').addClass('display');
        return false;
     }
    else
     {
        $('#re_password').removeClass('forget-input');
        $('#re-pass-error').removeClass('display');
        $('#re-pass-error').addClass('hider');
        $('#same-pass-error').removeClass('display');
        $('#same-pass-error').addClass('hider');
        return true;
     }

   }

   $('#re_password').keyup(function(){
   re_password();
 });

$('#reset').submit(function(){
  a=new_password();b=re_password();
      if(a && b)
      {
        return true;
      }
      else
      {
        return false;
      }
});


$('#check').click(function(){
  if($("#check").is(':checked'))
      $("#check-error").hide();  // checked
  else
      $("#check-error").show();
})

$('#free-check').click(function(){
  if($("#free-check").is(':checked'))
      $("#free-check-error").hide();  // checked
  else
      $("#free-check-error").show();
})




    $("#sen").click(function(){
        $("#vis").slideToggle(200);
    });

    $("#add").click(function(){
        $("#addli").slideToggle(200);
    });

    $("#conn").click(function(){
        $("#connli").slideToggle(200);
    });

    $("#bro").click(function(){
        $("#broli").slideToggle(200);
    });

    $("#soc").click(function(){
        $("#socli").slideToggle(300);
    });
    $("#fol").click(function(){
        $("#folli").slideToggle(300);
    });


function set(dd){
  $('#hwss').html(dd);
  $('#how_about').val(dd);
}

/*change password validation*/
function oldpassword() {
     var e =$('#old-password').val();
   if(e.length == 0 )
     {
        $('#old-password').addClass('forget-input');
        $('#old-pass-error').removeClass('hider');
        $('#old-pass-error').addClass('display');
        return false;
     }
    else
     {
        $('#old-password').removeClass('forget-input');
        $('#old-pass-error').removeClass('display');
        $('#old-pass-error').addClass('hider');
        $('#no-old-pass-error').removeClass('display');
        $('#no-old-pass-error').addClass('hider');
        return true;
     }
   }

   $('#old-password').keyup(function(){
   oldpassword();
 });



      function changepassword() {
     var e =$('#change-password').val();
        function isValidPassword(e) {
    var pattern = /^(?=.*[A-Za-z])(?=.*\d)|(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/i;
    return pattern.test(e);
};


   if(e.length == 0 ){
        $('#change-pass-error').removeClass('hider');
        $('#change-pass-error').addClass('display');
        $('#change-short-error').addClass('hider');
        $('#change-short-error').removeClass('display');
        $('#change-letter-error').removeClass('display');
        $('#change-letter-error').addClass('hider');
        $('#change-password').addClass('forget-input');
        return false;
     }
     if(e.length >= 1 && e.length < 8)
     {
        $('#change-letter-error').removeClass('display');
        $('#change-letter-error').addClass('hider');
        $('#change-pass-error').removeClass('display');
        $('#change-pass-error').addClass('hider');
        $('#change-short-error').removeClass('hider');
        $('#change-short-error').addClass('display');
        $('#change-password').addClass('forget-input');
        return false;
     }
     if( !isValidPassword( e ) )
     {

        $('#change-short-error').removeClass('display');
        $('#change-short-error').addClass('hider');
        $('#change-letter-error').removeClass('hider');
        $('#change-letter-error').addClass('display');
        $('#change-password').addClass('forget-input');
        return false;
     }
     else

     {
        $('#change-letter-error').removeClass('display');
        $('#change-letter-error').addClass('hider');
        $('#change-short-error').removeClass('display');
        $('#change-short-error').addClass('hider')
        $('#change-pass-error').removeClass('display');
        $('#change-pass-error').addClass('hider');
        $('#change-password').removeClass('forget-input');
        return true;
     }
   }

   $('#change-password').keyup(function(){
   changepassword();
 });


function conformpassword() {
     var f =$('#change-password').val();
     var e =$('#conform-password').val();
   if(e.length == 0 )
     {
        $('#conform-password').addClass('forget-input');
        $('#conform-pass-error').removeClass('hider');
        $('#conform-pass-error').addClass('display');
        $('#conform-match-error').addClass('hider');
        $('#conform-match-error').removeClass('display');
        return false;
     }
     if (e != f  )
     {
        $('#conform-pass-error').addClass('hider');
        $('#conform-pass-error').removeClass('display');
        $('#conform-password').addClass('forget-input');
        $('#conform-match-error').removeClass('hider');
        $('#conform-match-error').addClass('display');
        return false;
     }
    else
     {
        $('#conform-password').removeClass('forget-input');
        $('#conform-pass-error').removeClass('display');
        $('#conform-pass-error').addClass('hider');
        $('#conform-match-error').removeClass('display');
        $('#conform-match-error').addClass('hider');
        return true;
     }

   }

   $('#conform-password').keyup(function(){
   conformpassword();
 });

$('#change_pass_form').submit(function(){
  a=oldpassword();b=changepassword();c=conformpassword();
      if(a && b && c)
      {
        getChangepass();
        return true;
      }
      else
      {
        return false;
      }
});

function socialchangepassword() {
     var e =$('#social-change-password').val();
        function isValidPassword(e) {
    var pattern = /^(?=.*[A-Za-z])(?=.*\d)|(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/i;
    return pattern.test(e);
};


   if(e.length == 0 ){
        $('#social-social-change-pass-error').removeClass('hider');
        $('#social-change-pass-error').addClass('display');
        $('#social-change-short-error').addClass('hider');
        $('#social-change-short-error').removeClass('display');
        $('#social-change-letter-error').removeClass('display');
        $('#social-change-letter-error').addClass('hider');
        $('#social-change-password').addClass('forget-input');
        return false;
     }
     if(e.length >= 1 && e.length < 8)
     {
        $('#social-change-letter-error').removeClass('display');
        $('#social-change-letter-error').addClass('hider');
        $('#social-change-pass-error').removeClass('display');
        $('#social-change-pass-error').addClass('hider');
        $('#social-change-short-error').removeClass('hider');
        $('#social-change-short-error').addClass('display');
        $('#social-change-password').addClass('forget-input');
        return false;
     }
     if( !isValidPassword( e ) )
     {

        $('#social-change-short-error').removeClass('display');
        $('#social-change-short-error').addClass('hider');
        $('#social-change-letter-error').removeClass('hider');
        $('#social-change-letter-error').addClass('display');
        $('#social-change-password').addClass('forget-input');
        return false;
     }
     else

     {
        $('#social-change-letter-error').removeClass('display');
        $('#social-change-letter-error').addClass('hider');
        $('#social-change-short-error').removeClass('display');
        $('#social-change-short-error').addClass('hider')
        $('#social-change-pass-error').removeClass('display');
        $('#social-change-pass-error').addClass('hider');
        $('#social-change-password').removeClass('forget-input');
        return true;
     }
   }

   $('#social-change-password').keyup(function(){
   socialchangepassword();
 });


function socialconformpassword() {
     var f =$('#social-change-password').val();
     var e =$('#social-conform-password').val();
   if(e.length == 0 )
     {
        $('#social-conform-password').addClass('forget-input');
        $('#social-conform-pass-error').removeClass('hider');
        $('#social-conform-pass-error').addClass('display');
        $('#social-conform-match-error').addClass('hider');
        $('#social-conform-match-error').removeClass('display');
        return false;
     }
     if (e != f  )
     {
        $('#social-conform-pass-error').addClass('hider');
        $('#social-conform-pass-error').removeClass('display');
        $('#social-conform-password').addClass('forget-input');
        $('#social-conform-match-error').removeClass('hider');
        $('#social-conform-match-error').addClass('display');
        return false;
     }
    else
     {
        $('#social-conform-password').removeClass('forget-input');
        $('#social-conform-pass-error').removeClass('display');
        $('#social-conform-pass-error').addClass('hider');
        $('#social-conform-match-error').removeClass('display');
        $('#social-conform-match-error').addClass('hider');
        return true;
     }

   }

   $('#social-conform-password').keyup(function(){
   socialconformpassword();
 });

$('#change_pass_form3').submit(function(){
  a=socialchangepassword();b=socialconformpassword();
      if(a && b)
      {
        return true;
      }
      else
      {
        return false;
      }
});



//change password provider
function oldpassword1() {
     var e =$('#old-password1').val();
   if(e.length == 0 )
     {
        $('#old-password1').addClass('forget-input');
        $('#old-pass-error1').removeClass('hider');
        $('#old-pass-error1').addClass('display');
        return false;
     }
    else
     {
        $('#old-password1').removeClass('forget-input');
        $('#old-pass-error1').removeClass('display');
        $('#old-pass-error1').addClass('hider');
        $('#no-old-pass-error1').removeClass('display');
        $('#no-old-pass-error1').addClass('hider');
        return true;
     }
   }

   $('#old-password1').keyup(function(){
   oldpassword1();
 });

     function changepassword1() {
     var e =$('#change-password1').val();
        function isValidPassword(e) {
    var pattern = /^(?=.*[A-Za-z])(?=.*\d)|(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/i;
    return pattern.test(e);
};


   if(e.length == 0 ){
        $('#change-pass-error1').removeClass('hider');
        $('#change-pass-error1').addClass('display');
        $('#change-short-error1').addClass('hider');
        $('#change-short-error1').removeClass('display');
        $('#change-letter-error1').removeClass('display');
        $('#change-letter-error1').addClass('hider');
        $('#change-password1').addClass('forget-input');
        return false;
     }
     if(e.length >= 1 && e.length < 8)
     {
        $('#change-letter-error1').removeClass('display');
        $('#change-letter-error1').addClass('hider');
        $('#change-pass-error1').removeClass('display');
        $('#change-pass-error1').addClass('hider');
        $('#change-short-error1').removeClass('hider');
        $('#change-short-error1').addClass('display');
        $('#change-password1').addClass('forget-input');
        return false;
     }
     if( !isValidPassword( e ) )
     {

        $('#change-short-error1').removeClass('display');
        $('#change-short-error1').addClass('hider');
        $('#change-letter-error1').removeClass('hider');
        $('#change-letter-error1').addClass('display');
        $('#change-password1').addClass('forget-input');
        return false;
     }
     else

     {
        $('#change-letter-error1').removeClass('display');
        $('#change-letter-error1').addClass('hider');
        $('#change-short-error1').removeClass('display');
        $('#change-short-error1').addClass('hider')
        $('#change-pass-error1').removeClass('display');
        $('#change-pass-error1').addClass('hider');
        $('#change-password1').removeClass('forget-input');
        return true;
     }
   }

   $('#change-password1').keyup(function(){
   changepassword1();
 });


function conformpassword1() {
     var f =$('#change-password1').val();
     var e =$('#conform-password1').val();
   if(e.length == 0 )
     {
        $('#conform-password1').addClass('forget-input');
        $('#conform-pass-error1').removeClass('hider');
        $('#conform-pass-error1').addClass('display');
        $('#conform-match-error1').addClass('hider');
        $('#conform-match-error1').removeClass('display');
        return false;
     }
     if (e != f  )
     {
        $('#conform-pass-error1').addClass('hider');
        $('#conform-pass-error1').removeClass('display');
        $('#conform-password1').addClass('forget-input');
        $('#conform-match-error1').removeClass('hider');
        $('#conform-match-error1').addClass('display');
        return false;
     }
    else
     {
        $('#conform-password1').removeClass('forget-input');
        $('#conform-pass-error1').removeClass('display');
        $('#conform-pass-error1').addClass('hider');
        $('#conform-match-error1').removeClass('display');
        $('#conform-match-error1').addClass('hider');
        return true;
     }

   }

   $('#conform-password1').keyup(function(){
   conformpassword1();
 });

$('#change_pass_form1').submit(function(){
  a=oldpassword1();b=changepassword1();c=conformpassword1();
      if(a && b && c)
      {
        getChangepass_pro();
        return true;
      }
      else
      {
        return false;
      }
});

function socialchangepassword1() {
     var e =$('#social-change-password1').val();
        function isValidPassword(e) {
    var pattern = /^(?=.*[A-Za-z])(?=.*\d)|(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/i;
    return pattern.test(e);
};


   if(e.length == 0 ){
        $('#social-change-pass-error1').removeClass('hider');
        $('#social-change-pass-error1').addClass('display');
        $('#social-change-short-error1').addClass('hider');
        $('#social-change-short-error1').removeClass('display');
        $('#social-change-letter-error1').removeClass('display');
        $('#social-change-letter-error1').addClass('hider');
        $('#social-change-password1').addClass('forget-input');
        return false;
     }
     if(e.length >= 1 && e.length < 8)
     {
        $('#social-change-letter-error1').removeClass('display');
        $('#social-change-letter-error1').addClass('hider');
        $('#social-change-pass-error1').removeClass('display');
        $('#social-change-pass-error1').addClass('hider');
        $('#social-change-short-error1').removeClass('hider');
        $('#social-change-short-error1').addClass('display');
        $('#social-change-password1').addClass('forget-input');
        return false;
     }
     if( !isValidPassword( e ) )
     {

        $('#social-change-short-error1').removeClass('display');
        $('#social-change-short-error1').addClass('hider');
        $('#social-change-letter-error1').removeClass('hider');
        $('#social-change-letter-error1').addClass('display');
        $('#social-change-password1').addClass('forget-input');
        return false;
     }
     else

     {
        $('#social-change-letter-error1').removeClass('display');
        $('#social-change-letter-error1').addClass('hider');
        $('#social-change-short-error1').removeClass('display');
        $('#social-change-short-error1').addClass('hider')
        $('#social-social-change-pass-error1').removeClass('display');
        $('#social-change-pass-error1').addClass('hider');
        $('#social-change-password1').removeClass('forget-input');
        return true;
     }
   }

   $('#social-change-password1').keyup(function(){
   socialchangepassword1();
 });


function socialconformpassword1() {
     var f =$('#social-change-password1').val();
     var e =$('#social-conform-password1').val();
   if(e.length == 0 )
     {
        $('#social-conform-password1').addClass('forget-input');
        $('#social-conform-pass-error1').removeClass('hider');
        $('#social-conform-pass-error1').addClass('display');
        $('#social-conform-match-error1').addClass('hider');
        $('#social-conform-match-error1').removeClass('display');
        return false;
     }
     if (e != f  )
     {
        $('#social-conform-pass-error1').addClass('hider');
        $('#social-conform-pass-error1').removeClass('display');
        $('#social-conform-password1').addClass('forget-input');
        $('#social-conform-match-error1').removeClass('hider');
        $('#social-social-conform-match-error1').addClass('display');
        return false;
     }
    else
     {
        $('#social-conform-password1').removeClass('forget-input');
        $('#social-conform-pass-error1').removeClass('display');
        $('#social-conform-pass-error1').addClass('hider');
        $('#social-conform-match-error1').removeClass('display');
        $('#social-conform-match-error1').addClass('hider');
        return true;
     }

   }

   $('#social-conform-password1').keyup(function(){
   socialconformpassword1();
 });

$('#change_pass_form2').submit(function(){
  a=socialchangepassword1();b=socialconformpassword1();
      if(a && b)
      {
        return true;
      }
      else
      {
        return false;
      }
});



$(function () {
  $('[data-toggle="popover"]').popover()
})



function visibility1() {
    $('#visibility1').removeClass("hider");
     $('#visibility1').addClass("display");
     $('#visibility2').removeClass("display");
     $('#visibility3').removeClass("display");
     $('#visibility2').addClass("hider");
     $('#visibility3').addClass("hider");
     $('#ul').removeClass("display");
     $('#ul').addClass("hider");
     $('#li1').addClass("profile_active");
     $('#li2').removeClass("profile_active");
     $('#li3').removeClass("profile_active");
     var char="Public";
     $('#visiblei123').val(char);
   }

   $('#li1').click(function(){
   visibility1();
 });
function visibility2() {
    $('#visibility2').removeClass("hider");
     $('#visibility2').addClass("display");
     $('#visibility1').removeClass("display");
     $('#visibility3').removeClass("display");
     $('#visibility1').addClass("hider");
     $('#visibility3').addClass("hider");
     $('#ul').removeClass("display");
     $('#ul').addClass("hider");
     $('#li1').removeClass("profile_active");
     $('#li3').removeClass("profile_active");
     $('#li2').addClass("profile_active");
     var char="Only show my profile to rbs users logged in";
     $('#visiblei123').val(char);
   }

   $('#li2').click(function(){
   visibility2();
 });
function visibility3() {
     $('#visibility1').addClass("hider");
     $('#visibility1').removeClass("display");
     $('#visibility3').removeClass("hider");
     $('#visibility3').addClass("display");
     $('#visibility2').removeClass("display");
     $('#visibility2').addClass("hider");
     $('#ul').removeClass("display");
     $('#ul').addClass("hider");
     $('#li1').removeClass("profile_active");
     $('#li2').removeClass("profile_active");
     $('#li3').addClass("profile_active");
     var char="Private";
     $('#visiblei123').val(char);
   }

   $('#li3').click(function(){
   visibility3();
 });

function ul_click() {
  var a=$('#visible_select').val();

     $('#ul').removeClass("hider");
     $('#ul').addClass("display");
   }

   $('#visible_select').click(function(){

   ul_click();
 });




function preference1() {
     $('#preference1').removeClass("hider");
     $('#preference1').addClass("display");
     $('#preference2').removeClass("display");
     $('#preference3').removeClass("display");
     $('#preference2').addClass("hider");
     $('#preference3').addClass("hider");
     $('#pre_ul').removeClass("display");
     $('#pre_ul').addClass("hider");
     $('#pre_li1').addClass("profile_active");
     $('#pre_li2').removeClass("profile_active");
     $('#pre_li3').removeClass("profile_active");
     var char="Both long-term and one-time projects";
$('#proj_prefi').val(char);
   }

   $('#pre_li1').click(function(){
   preference1();
 });
function preference2() {
     $('#preference2').removeClass("hider");
     $('#preference2').addClass("display");
     $('#preference1').removeClass("display");
     $('#preference3').removeClass("display");
     $('#preference1').addClass("hider");
     $('#preference3').addClass("hider");
     $('#pre_ul').removeClass("display");
     $('#pre_ul').addClass("hider");
     $('#pre_li1').removeClass("profile_active");
     $('#pre_li3').removeClass("profile_active");
     $('#pre_li2').addClass("profile_active");
     var char="Longer-term projects 3+ months long";
$('#proj_prefi').val(char);
   }

   $('#pre_li2').click(function(){
   preference2();
 });
function preference3() {
     $('#preference1').addClass("hider");
     $('#preference1').removeClass("display");
     $('#preference3').removeClass("hider");
     $('#preference3').addClass("display");
     $('#preference2').removeClass("display");
     $('#preference2').addClass("hider");
     $('#pre_ul').removeClass("display");
     $('#pre_ul').addClass("hider");
     $('#pre_li1').removeClass("profile_active");
     $('#pre_li2').removeClass("profile_active");
     $('#pre_li3').addClass("profile_active");
     var char="Shorter-term projects < 3 months long";
$('#proj_prefi').val(char);
   }

   $('#pre_li3').click(function(){
   preference3();
 });

function pre_ul_click() {
  var a=$('#preference_select').val();

     $('#pre_ul').removeClass("hider");
     $('#pre_ul').addClass("display");
   }

   $('#preference_select').click(function(){

   pre_ul_click();
 });


 /*my job feed tab selection*/
 $( window ).load(function()
  {
    project_kind1();
    num_hire1();
  });

 function project_kind1() {
      $('#on_going').addClass("feed-tab-border");
      $('#one_time').removeClass("feed-tab-border");
      $('#not_sure').removeClass("feed-tab-border");

    }

    $('#on_going').click(function(){
    project_kind1();
  });
 function project_kind2() {
      $('#on_going').removeClass("feed-tab-border");
      $('#not_sure').removeClass("feed-tab-border");
      $('#one_time').addClass("feed-tab-border");
    }

    $('#one_time').click(function(){
    project_kind2();
  });
 function project_kind3() {
      $('#on_going').removeClass("feed-tab-border");
      $('#one_time').removeClass("feed-tab-border");
      $('#not_sure').addClass("feed-tab-border");
    }

    $('#not_sure').click(function(){
    project_kind3();
  });


 function num_hire1() {
      $('#need_one').addClass("feed-tab-border");
      $('#need_more').removeClass("feed-tab-border");
    }

    $('#need_one').click(function(){
    num_hire1();
  });
 function num_hire2() {
      $('#need_one').removeClass("feed-tab-border");
      $('#need_more').addClass("feed-tab-border");
    }

    $('#need_more').click(function(){
    num_hire2();
  });

 /*post a job page*/
 $( window ).load(function()
 {
    experiance_level1();
 });

 function experiance_level1() {
      $('#entry').addClass("feed-tab-border");
      $('#intermediate').removeClass("feed-tab-border");
      $('#expert').removeClass("feed-tab-border");
    }

    $('#entry').click(function(){
    experiance_level1();
  });
 function experiance_level2() {
      $('#entry').removeClass("feed-tab-border");
      $('#expert').removeClass("feed-tab-border");
      $('#intermediate').addClass("feed-tab-border");
    }

    $('#intermediate').click(function(){
    experiance_level2();
  });
 function experiance_level3() {
      $('#entry').removeClass("feed-tab-border");
      $('#intermediate').removeClass("feed-tab-border");
      $('#expert').addClass("feed-tab-border");
    }

    $('#expert').click(function(){
    experiance_level3();
  });





 $('#myCollapsible').collapse({
   toggle: false
 })


 /*freelancers header*/
  function online() {
      $('#online').addClass("online");
      $('#offline').removeClass("online");
    }

    $('#online').click(function(){
    online();
  });

 function offline() {
     $('#offline').addClass("online");
      $('#online').removeClass("online");

    }
    $('#offline').click(function(){
    offline();
  });




/*submit proposal page*/
function submit_proposal1() {
     $('#submit1').removeClass("hider");
     $('#submit1').addClass("display");
     $('#submit2').removeClass("display");
     $('#submit3').removeClass("display");
     $('#submit2').addClass("hider");
     $('#submit3').addClass("hider");
     $('#submit4').removeClass("display");
     $('#submit5').removeClass("display");
     $('#submit4').addClass("hider");
     $('#submit5').addClass("hider");
     $('#submit6').removeClass("display");
     $('#submit6').addClass("hider");
     $('#submit_ul').removeClass("display");
     $('#submit_ul').addClass("hider");
     $('#submit_li1').addClass("profile_active");
     $('#submit_li2').removeClass("profile_active");
     $('#submit_li3').removeClass("profile_active");
     $('#submit_li4').removeClass("profile_active");
     $('#submit_li5').removeClass("profile_active");
     $('#submit_li6').removeClass("profile_active");
   }

   $('#submit_li1').click(function(){
    $('#dur').val($('#submit_li1').html());
      //prop_select();
     submit_proposal1();

 });
function submit_proposal2() {
     $('#submit2').removeClass("hider");
     $('#submit2').addClass("display");
     $('#submit1').removeClass("display");
     $('#submit3').removeClass("display");
     $('#submit1').addClass("hider");
     $('#submit3').addClass("hider");
     $('#submit4').removeClass("display");
     $('#submit5').removeClass("display");
     $('#submit4').addClass("hider");
     $('#submit5').addClass("hider");
     $('#submit6').removeClass("display");
     $('#submit6').addClass("hider");
     $('#submit_ul').removeClass("display");
     $('#submit_ul').addClass("hider");
     $('#submit_li1').removeClass("profile_active");
     $('#submit_li3').removeClass("profile_active");
     $('#submit_li4').removeClass("profile_active");
     $('#submit_li5').removeClass("profile_active");
     $('#submit_li6').removeClass("profile_active");
     $('#submit_li2').addClass("profile_active");
   }

   $('#submit_li2').click(function(){
        $('#dur').val($('#submit_li2').html());
   submit_proposal2();
 });
function submit_proposal3() {
     $('#submit1').addClass("hider");
     $('#submit1').removeClass("display");
     $('#submit3').removeClass("hider");
     $('#submit3').addClass("display");
     $('#submit2').removeClass("display");
     $('#submit2').addClass("hider");
     $('#submit4').removeClass("display");
     $('#submit4').addClass("hider");
     $('#submit5').removeClass("display");
     $('#submit5').addClass("hider");
     $('#submit6').removeClass("display");
     $('#submit6').addClass("hider");
     $('#submit_ul').removeClass("display");
     $('#submit_ul').addClass("hider");
     $('#submit_li1').removeClass("profile_active");
     $('#submit_li2').removeClass("profile_active");
     $('#submit_li4').removeClass("profile_active");
     $('#submit_li5').removeClass("profile_active");
     $('#submit_li6').removeClass("profile_active");
     $('#submit_li3').addClass("profile_active");
   }

   $('#submit_li3').click(function(){
        $('#dur').val($('#submit_li3').html());
   submit_proposal3();
 });
function submit_proposal4() {
     $('#submit4').removeClass("hider");
     $('#submit4').addClass("display");
     $('#submit2').removeClass("display");
     $('#submit3').removeClass("display");
     $('#submit2').addClass("hider");
     $('#submit3').addClass("hider");
     $('#submit5').removeClass("display");
     $('#submit1').removeClass("display");
     $('#submit5').addClass("hider");
     $('#submit1').addClass("hider");
     $('#submit6').removeClass("display");
     $('#submit6').addClass("hider");
     $('#submit_ul').removeClass("display");
     $('#submit_ul').addClass("hider");
     $('#submit_li4').addClass("profile_active");
     $('#submit_li2').removeClass("profile_active");
     $('#submit_li3').removeClass("profile_active");
     $('#submit_li1').removeClass("profile_active");
     $('#submit_li5').removeClass("profile_active");
     $('#submit_li6').removeClass("profile_active");
   }

   $('#submit_li4').click(function(){
        $('#dur').val($('#submit_li4').html());
   submit_proposal4();
 });
function submit_proposal5() {
     $('#submit5').removeClass("hider");
     $('#submit5').addClass("display");
     $('#submit2').removeClass("display");
     $('#submit3').removeClass("display");
     $('#submit2').addClass("hider");
     $('#submit3').addClass("hider");
     $('#submit1').removeClass("display");
     $('#submit4').removeClass("display");
     $('#submit1').addClass("hider");
     $('#submit4').addClass("hider");
     $('#submit6').removeClass("display");
     $('#submit6').addClass("hider");
     $('#submit_ul').removeClass("display");
     $('#submit_ul').addClass("hider");
     $('#submit_li5').addClass("profile_active");
     $('#submit_li1').removeClass("profile_active");
     $('#submit_li2').removeClass("profile_active");
     $('#submit_li3').removeClass("profile_active");
     $('#submit_li4').removeClass("profile_active");
     $('#submit_li6').removeClass("profile_active");
   }

   $('#submit_li5').click(function(){
        $('#dur').val($('#submit_li5').html());
   submit_proposal5();
 });
function submit_proposal6() {
     $('#submit6').removeClass("hider");
     $('#submit6').addClass("display");
     $('#submit1').removeClass("display");
     $('#submit2').removeClass("display");
     $('#submit1').addClass("hider");
     $('#submit2').addClass("hider");
     $('#submit3').removeClass("display");
     $('#submit3').addClass("hider");
     $('#submit4').removeClass("display");
     $('#submit4').addClass("hider");
     $('#submit5').removeClass("display");
     $('#submit5').addClass("hider");
     $('#submit_ul').removeClass("display");
     $('#submit_ul').addClass("hider");
     $('#submit_li6').addClass("profile_active");
     $('#submit_li1').removeClass("profile_active");
     $('#submit_li2').removeClass("profile_active");
     $('#submit_li3').removeClass("profile_active");
     $('#submit_li4').removeClass("profile_active");
     $('#submit_li5').removeClass("profile_active");
   }

   $('#submit_li6').click(function(){
        $('#dur').val($('#submit_li6').html());
   submit_proposal6();
 });

function submit_click() {
  var a=$('#submit_select').html();

      $('#dur').val(a);
     $('#submit_ul').removeClass("hider");
     $('#submit_ul').addClass("display");
   }

   $('#submit_select').click(function(){
   submit_click();

 });

   //div id click
//    $("#on_going").click(function() {
//     $("#ong").click();
// });

//       $("#one_time").click(function() {
//     $("#ont").click();
// });


/*file upload*/

$("#browse").click(function() {
    $("#file_upload").click();
})

$('input[type=file]').change(function (e) {
    $('#customfileupload').html($(this).val());
    $('#submitfileupload').removeClass("hider");
    $('#submitfileupload').addClass("display");
});

$("#trash").click(function() {
   $('#submitfileupload').removeClass("display");
    $('#submitfileupload').addClass("hider");
})



/*subtraction on submit proposal page*/
$(function() {
    // $('#bit_span').on('keydown', '#bit_val', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
    $('#bit_val,#receive_val').keypress(function(event) {
    var $this = $(this);
    if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
       ((event.which < 48 || event.which > 57) &&
       (event.which != 0 && event.which != 8))) {
           event.preventDefault();
    }

    var text = $(this).val();
    if ((event.which == 46) && (text.indexOf('.') == -1)) {
        setTimeout(function() {
            if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
            }
        }, 1);
    }

    if ((text.indexOf('.') != -1) &&
        (text.substring(text.indexOf('.')).length > 2) &&
        (event.which != 0 && event.which != 8) &&
        ($(this)[0].selectionStart >= text.length - 2)) {
            event.preventDefault();
    }
});
    $("#bit_val").on("keydown keyup ", sub);
  function sub() {
    f=$("#bit_val").val();
    if(f>49){
  a=parseFloat($("#bit_val").val()) -30.00;
  $("#receive_val").val(a.toFixed(2));
  $("#rec_val").val(a.toFixed(2));
  // $("#receive_val").val(Number($("#bit_val").val()) -30.00 );
  }
}
});


// $('#bin').click(function()
// {
//   alert("sd");
// $('#cert').hide();
// $('#earn').hide();
// });






/*billing method validation*/

function holdername() {
     var e =$('#holder_name').val();
  
   if(e.length == 0 )
     {
        $('#holder_name').addClass('bill-error');
        $('#holder_name_error').removeClass('hider');
        $('#holder_name_error').addClass('display');
        return false;
     }
    else
     {
        $('#holder_name').removeClass('bill-error');
        $('#holder_name_error').removeClass('display');
        $('#holder_name_error').addClass('hider');
        return true;
     }
   }

   $('#holder_name').keyup(function(){
   holdername();
 });

function routing_number() {
     var e =$('#routing_number').val();
   if(e.length == 0 )
     {
        $('#routing_number').addClass('bill-error');
        $('#routing_number_error').removeClass('hider');
        $('#routing_number_error').addClass('display');
        return false;
     }
    else
     {
        $('#routing_number').removeClass('bill-error');
        $('#routing_number_error').removeClass('display');
        $('#routing_number_error').addClass('hider');
        return true;
     }
   }

   $('#routing_number').keyup(function(){
   routing_number();
 });

function account_number() {
     var e =$('#account_number').val();
   if(e.length == 0 )
     {
        $('#account_number').addClass('bill-error');
        $('#account_number_error').removeClass('hider');
        $('#account_number_error').addClass('display');
        return false;
     }
    else
     {
        $('#account_number').removeClass('bill-error');
        $('#account_number_error').removeClass('display');
        $('#account_number_error').addClass('hider');
        return true;
     }
   }

   $('#account_number').keyup(function(){
   account_number();
 });

$('#add_bill_card').submit(function(){
  a=holdername();b=routing_number();
  c=account_number();
      if(a  && b &&  c)
      {
        return true;
      }
      else
      {
        return false;
      }
});




/*profile setting page tab*/
function profile_entry() {
      $('#profile_entry').addClass("feed-tab-border");
      $('#profile_inter').removeClass("feed-tab-border");
      $('#profile_expert').removeClass("feed-tab-border");
      var char="Entry Level";
  $('#exp_lvl').val(char);

    }

    $('#profile_entry').click(function(){
    profile_entry();
  });
 function profile_inter() {
      $('#profile_entry').removeClass("feed-tab-border");
      $('#profile_expert').removeClass("feed-tab-border");
      $('#profile_inter').addClass("feed-tab-border");
      var char="Intermediate";
  $('#exp_lvl').val(char);
    }

    $('#profile_inter').click(function(){
    profile_inter();
  });
 function profile_expert() {
      $('#profile_entry').removeClass("feed-tab-border");
      $('#profile_inter').removeClass("feed-tab-border");
      $('#profile_expert').addClass("feed-tab-border");
      var char="Expert";
  $('#exp_lvl').val(char);
    }

    $('#profile_expert').click(function(){
    profile_expert();
  });

    $('#catsavecfr').click(function(){
    $('#providerprofilespinner').css('visibility',"visible");
    $('#profilesettingnone').css({"pointer-events":"none","opacity":"0.3"});
    var a=$('#visiblei123').val();
    var b=$('#proj_prefi').val();
    var c=$('#exp_lvl').val();
    // alert(a+"  "+b+"   "+c);
    var request = $.ajax({
        url: "viewSettings",
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "Visibility" : a,"ProjectPreference" : b,"ExperienceLevel" : c},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
        request.done(function(msg){
          // alert(msg);
          console.log(msg);
          // location.reload();
          $('#providerprofilespinner').css('visibility',"hidden");
          $('#profilesettingnone').css({"pointer-events":"visible","opacity":"1"});
        })
  });




/*sort in search for project*/
    $('#newid').click(function(e){
        e.preventDefault();
        url='http://'+$('#search').val();
        $('#new_sort').attr('href', url);
    });



/*submit proposal validation*/
// function prop_select() {
//      var e =$('#submit_li1').val();
//    if(e.length == "" )
//      {
//         $('#submit_select').addClass('bill-error');
//         $('#duara-error').removeClass('hider');
//         $('#duara-error').addClass('display');
//         return false;
//      }
//     else
//      {
//         $('#submit_select').removeClass('bill-error');
//         $('#duara-error').removeClass('display');
//         $('#duara-error').addClass('hider');
//         return true;
//      }
//    }

 //   $('#submit_select').click(function(){
 //   prop_select();
 // });
function prop_cover() {
     var e =$('#cover_sub').val();
   if(e.length == 0 )
     {
        $('#cover_sub').addClass('bill-error');
        $('#cover-error').removeClass('hider');
        $('#cover-error').addClass('display');
        return false;
     }
    else
     {
        $('#cover_sub').removeClass('bill-error');
        $('#cover-error').removeClass('display');
        $('#cover-error').addClass('hider');
        return true;
     }
   }

   $('#cover_sub').keyup(function(){
   prop_cover();
 });
function prop_bid() {
     var e =$('#bit_val').val();
   if(e < 50 )
     {
        $('#bit_val').addClass('bill-error');
        $('#bid-error').removeClass('hider');
        $('#bid-error').addClass('display');
        return false;
     }
    else
     {
        $('#bit_val').removeClass('bill-error');
        $('#bid-error').removeClass('display');
        $('#bid-error').addClass('hider');
        return true;
     }
   }

   $('#bit_val').keyup(function(){
   prop_bid();
 });

$('#sub_pro').submit(function(){
  a=prop_cover();b=prop_bid();
      if(a && b)
      {
        return true;
      }
      else
      {
        return false;
      }
});


/*admin validation*/
function in_val() {
     var e =$('#add_foot').val();
   if(e.length == 0 )
     {
        $('#add_foot').addClass('bill-error');
        $('#foot_error').removeClass('hider');
        $('#foot_error').addClass('display');
        return false;
     }
    else
     {
        $('#add_foot').removeClass('bill-error');
        $('#foot_error').removeClass('display');
        $('#foot_error').addClass('hider');
        return true;
     }
   }

   $('#add_foot').keyup(function(){
   in_val();
 });

// function textarea_val() {
//      var e =$('#foot_textarea').val();
//    if(e.length == 0 )
//      {
//         $('#foot_textarea').addClass('bill-error');
//         $('#foot_text_error').removeClass('hider');
//         $('#foot_text_error').addClass('display');
//         return false;
//      }
//     else
//      {
//         $('#foot_textarea').removeClass('bill-error');
//         $('#foot_text_error').removeClass('display');
//         $('#foot_text_error').addClass('hider');
//         return true;
//      }
//    }

//    $('#foot_textarea').keyup(function(){
//    textarea_val();
//  });

function page_val() {
     var e =$('#page_tittle').val();
   if(e.length == 0 )
     {
        $('#page_tittle').addClass('bill-error');
        $('#page_tittle_error').removeClass('hider');
        $('#page_tittle_error').addClass('display');
        return false;
     }
    else
     {
        $('#page_tittle').removeClass('bill-error');
        $('#page_tittle_error').removeClass('display');
        $('#page_tittle_error').addClass('hider');
        return true;
     }
   }

   $('#page_tittle').keyup(function(){
   page_val();
 });

function footurl_val() {
     var e =$('#foot_url').val();
   if(e.length == 0 )
     {
        $('#foot_url').addClass('bill-error');
        $('#footurl_error').removeClass('hider');
        $('#footurl_error').addClass('display');
        return false;
     }
    else
     {
        $('#foot_url').removeClass('bill-error');
        $('#footurl_error').removeClass('display');
        $('#footurl_error').addClass('hider');
        return true;
     }
   }

   $('#foot_url').keyup(function(){
   footurl_val();
 });

$('#add_footer').submit(function(){
  a=in_val();b=footurl_val();c=page_val();
      if(a && b && c)
      {
        return true;
      }
      else
      {
        return false;
      }
});


$("#recap").click(function() {
  $("#recaptcha").reload("contact.html");
  return true;
});



var myVar = setInterval(myTimer, 10000);
function myTimer() {
    $('#alert_successbydynamic').hide();
}

  function search_empty() {
     var e =$('#search_id').val();
   if(e.length == 0 ){
        $('#search_empty_error').removeClass('hider');
        $('#search_empty_error').addClass('display');
        return false;
     }
     else
     {  
        $('#search_empty_error').removeClass('display');
        $('#search_empty_error').addClass('hider');
        return true;
     }
   }
   $('#search_id').keyup(function(){
   search_empty();
 });
   $('#search_form').submit(function(){
  a=search_empty();
      if(a)
      {
        return true;
      }
      else
      {
        return false;
      }
});

function search_project() {
     var e =$('#search').val();
   if(e.length == 0 ){
        $('#search_pro_error').removeClass('hider');
        $('#search_pro_error').addClass('display');
        return false;
     }
     else
     {  
        $('#search_pro_error').removeClass('display');
        $('#search_pro_error').addClass('hider');
        return true;
     }
   }
$('#search').keyup(function(){
   search_project();
 });
   
/*validation for add account details*/ 

function personalid() {
     var e =$('#personal_id').val();
  
   if(e.length == 0 )
     {
        $('#personal_id').addClass('bill-error');
        $('#personal_id_error').removeClass('hider');
        $('#personal_id_error').addClass('display');
        return false;
     }
    else
     {
        $('#personal_id').removeClass('bill-error');
        $('#personal_id_error').removeClass('display');
        $('#personal_id_error').addClass('hider');
        return true;
     }
   }

   $('#personal_id').keyup(function(){
   personalid();
 });

function dob() {
     var e =$('#dob_date,#dob_month,#dob_year').val();
     var a =$('#dob_date').val();
     var b =$('#dob_month').val();
     var c =$('#dob_year').val();
     
      

   if(e.length == 0 || a.length ==0 || b.length == 0 || c.length  == 0)
     {
        $('#dob_date,#dob_month,#dob_year').addClass('bill-error');
        $('#dob_error').removeClass('hider');
        $('#dob_error').addClass('display');
        return false;
     }
    else
     {
      var dd = parseInt(a); 
     var mm = parseInt(b);
     var yy = parseInt(c);     
     var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];  

      if(dd > 32 && dd < 0){
          $('#dob_date,#dob_month,#dob_year').removeClass('bill-error');
                $('#dob_error').removeClass('display');
                $('#dob_error').addClass('hider');  
                return false;
      }

        if (mm == 1 || mm > 2) {
            if (dd > ListofDays[mm - 1]) {
                console.log('Invalid date format1!');
                 $('#dob_date,#dob_month,#dob_year').removeClass('bill-error');
                $('#dob_error').removeClass('display');
                $('#dob_error').addClass('hider');  
                return false;
            }
        }
        console.log(dd + " " + mm + " " + yy);
         if (mm == 2) {
            var lyear = false;
            if ((!(yy % 4) && yy % 100) || !(yy % 400)) {
                lyear = true;
            }
            if ((lyear == false) && (dd >= 29)) {
                console.log('Invalid date format2!');
                 $('#dob_date,#dob_month,#dob_year').addClass('bill-error');
                $('#dob_error').removeClass('hider');
                $('#dob_error').addClass('display');
                return false;
            }
            if ((lyear == true) && (dd > 29)) {
                console.log('Invalid date forma3!');
                 $('#dob_date,#dob_month,#dob_year').addClass('bill-error');
                $('#dob_error').removeClass('hider');
                $('#dob_error').addClass('display');
                return false;
            }
        }

     


        $('#dob_date,#dob_month,#dob_year').removeClass('bill-error');
        $('#dob_error').removeClass('display');
        $('#dob_error').addClass('hider');
        return true;
     }
   }

   $('#dob_date,#dob_month,#dob_year').keyup(function(){
   dob();
 });

function ssn_number() {
     var e =$('#ssn_number').val();
   if(e.length == 0 )
     {
        $('#ssn_number').addClass('bill-error');
        $('#ssn_number_error').removeClass('hider');
        $('#ssn_number_error').addClass('display');
        return false;
     }
    else
     {
        $('#ssn_number').removeClass('bill-error');
        $('#ssn_number_error').removeClass('display');
        $('#ssn_number_error').addClass('hider');
        return true;
     }
   }

   $('#ssn_number').keyup(function(){
   ssn_number();
 });

function holder_address() {
     var e =$('#holder_address').val();
   if(e.length == 0 )
     {
        $('#holder_address').addClass('bill-error');
        $('#holder_address_error').removeClass('hider');
        $('#holder_address_error').addClass('display');
        return false;
     }
    else
     {
        $('#holder_address').removeClass('bill-error');
        $('#holder_address_error').removeClass('display');
        $('#holder_address_error').addClass('hider');
        return true;
     }
   }

   $('#holder_address').keyup(function(){
   holder_address();
 });

function postal() {
     var e =$('#postal').val();
   if(e.length == 0 )
     {
        $('#postal').addClass('bill-error');
        $('#postal_error').removeClass('hider');
        $('#postal_error').addClass('display');
        return false;
     }
    else
     {
        $('#postal').removeClass('bill-error');
        $('#postal_error').removeClass('display');
        $('#postal_error').addClass('hider');
        return true;
     }
   }

   $('#postal').keyup(function(){
   postal();
 });

function holder_city() {
     var e =$('#holder_city').val();
   if(e.length == 0 )
     {
        $('#holder_city').addClass('bill-error');
        $('#holder_city_error').removeClass('hider');
        $('#holder_city_error').addClass('display');
        return false;
     }
    else
     {
        $('#holder_city').removeClass('bill-error');
        $('#holder_city_error').removeClass('display');
        $('#holder_city_error').addClass('hider');
        return true;
     }
   }

   $('#holder_city').keyup(function(){
   holder_city();
 });

function holder_state() {
     var e =$('#holder_state').val();
   if(e.length == 0 )
     {
        $('#holder_state').addClass('bill-error');
        $('#holder_state_error').removeClass('hider');
        $('#holder_state_error').addClass('display');
        return false;
     }
    else
     {
        $('#holder_state').removeClass('bill-error');
        $('#holder_state_error').removeClass('display');
        $('#holder_state_error').addClass('hider');
        return true;
     }
   }

   $('#holder_state').keyup(function(){
   holder_state();
 });

function holder_country() {
     var e =$('#holder_country').val();
   if(e.length == 0 )
     {
        $('#holder_country').addClass('bill-error');
        $('#holder_country_error').removeClass('hider');
        $('#holder_country_error').addClass('display');
        return false;
     }
    else
     {
        $('#holder_country').removeClass('bill-error');
        $('#holder_country_error').removeClass('display');
        $('#holder_country_error').addClass('hider');
        return true;
     }
   }

   $('#holder_country').keyup(function(){
   holder_country();
 });

function holderf_name() {
     var e =$('#holderf_name').val();
   if(e.length == 0 )
     {
        $('#holderf_name').addClass('bill-error');
        $('#holderf_name_error').removeClass('hider');
        $('#holderf_name_error').addClass('display');
        return false;
     }
    else
     {
        $('#holderf_name').removeClass('bill-error');
        $('#holderf_name_error').removeClass('display');
        $('#holderf_name_error').addClass('hider');
        return true;
     }
   }

   $('#holderf_name').keyup(function(){
   holderf_name();
 });

function holderl_name() {
     var e =$('#holderl_name').val();
   if(e.length == 0 )
     {
        $('#holderl_name').addClass('bill-error');
        $('#holderl_name_error').removeClass('hider');
        $('#holderl_name_error').addClass('display');
        return false;
     }
    else
     {
        $('#holderl_name').removeClass('bill-error');
        $('#holderl_name_error').removeClass('display');
        $('#holderl_name_error').addClass('hider');
        return true;
     }
   }

   $('#holderl_name').keyup(function(){
   holderl_name();
 });

function file(){
  var imgVal = $('#idfile').val(); 
            if(imgVal=='') 
            { 
              $('#holder_file_error').removeClass('hider');
              $('#holder_file_error').addClass('display');
              return false;
            } 
            else{
              $('#holder_file_error').removeClass('display');
              $('#holder_file_error').addClass('hider');
              return true;
            }
}

// $('#add_card').bind("click",function() { 
        
//   file();
//     }); 

$('#add_account_details').submit(function(){
  a=dob();b=holderf_name();c=holderl_name();d=holder_country();e=holder_state();
  f=holder_city();g=postal();h=holder_address();i=ssn_number();j=personalid();k=file();
      if(a  && b && c && d && e && f && g && h && i && j && k)
      { 
        
        return true;
      }
      else
      {
        return false;
      }
});










});
var app = angular.module('app',['ngImgCrop']);
app.controller('doc',function($scope,$window,$http){
   
   $scope.names = [];
$scope.c = "India";

$scope.setcountry = function(s){
  $scope.c = s;
}
$scope.redirect = function(s){
$window.location.href=s;
}


});





app.controller('Ctrl',['$scope', function($scope) {
    $scope.myImage='';
    $scope.myCroppedImage='';
     
   $scope.names = [];


    var handleFileSelect=function(evt) {
      var file=evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function($scope){
          $scope.myImage=evt.target.result;
        });
      };
      reader.readAsDataURL(file);
    };
    angular.element(document.querySelector('#fileInput')).on('change',handleFileSelect);



}]);




/*portfolio*/
$(document).ready(function(){
function project_overview() {
     var p =$('#pr').val();
   if(p.length == 0 )
     {
        $('#pr').addClass('profvalid');
        $('#err').removeClass('hide');
        $('#err').addClass('display');
        return false;
     }
    else
     {
        $('#pr').removeClass('profvalid');
        $('#err').removeClass('display');
        $('#err').addClass('hide');
        return true;
     }
   }

   $('#pr').keyup(function(){
   project_overview();
 });


function add_project() {
     var p =$('#pr1').val();
   if(p.length == 0 )
     {
        $('#pr1').addClass('profvalid');
        $('#err1').removeClass('hide');
        $('#err1').addClass('display');
        return false;
     }
    else
     {
        $('#pr1').removeClass('profvalid');
        $('#err1').removeClass('display');
        $('#err1').addClass('hide');
        return true;
     }
   }

   $('#pr1').keyup(function(){
   add_project();
 });


function add_category() {
 // alert("cat function");
     var p =$('#cat').val();
   if(p == "Select a category")
     {

        $('#errcat').removeClass('hide');
        $('#errcat').addClass('display');
        return false;
     }
     else
     {
        $('#errcat').addClass('hide');
        $('#errcat').removeClass('display');
        return true;
     }


}
$('#cat').keyup(function(){
  add_category();
 });

function add_cat() {
     var p =$('#cat').val();
   if(p == "Select a category")
     {

        $('#errcat').removeClass('hide');
        $('#errcat').addClass('display');
        return false;
     }
     else
     {
        $('#errcat').addClass('hide');
        $('#errcat').removeClass('display');
        return true;
     }

}$('#cat').change(function(){
  add_cat();
 });





/*function url() {
     var u =$('#pr2').val();
        function isValidurl(u) {
    var pattern = ^(http:\/\/|https:\/\/)?(www.)?([a-zA-Z0-9]+).[a-zA-Z0-9]*.[a-z]{3}.?([a-z]+)?$;
    return pattern.test(u);
};
    if( !isValidurl( u ) )
      {
        $('#pr2').addClass('profvalid');
        $('#err2').removeClass('hide');
        $('#err2').addClass('display');
        return false;
     }
    else
     {
        $('#pr2').removeClass('profvalid');
        $('#err2').removeClass('display');
        $('#err2').addClass('hide');
        return true;
     }
    }
     $('#pr2').keyup(function(){
   url();
 });
*/



$('#form_port').click(function(){
  //console.log("func call");
//alert('hi');
  a=project_overview();b=add_project();c=add_category()
      if(a && b && c)
      {
        //alert("hi");
        getMessage();
        return true;
      }
      else
      {
        return false;
      }
});


/*Certifications*/


function add_certi() {
     var p =$('#sub').val();
   if(p.length ==0)
     {
        $('#sub').addClass('profvalid');
        $('#errsub').removeClass('hide');
        $('#errsub').addClass('display');
        return false;
     }
     else
     {
      $('#sub').removeClass('profvalid');
        $('#errsub').addClass('hide');
        $('#errsub').removeClass('display');
        return true;
     }

}$('#sub').keyup(function(){
  add_certi()
 });

function add_provider() {
     var p =$('#prov').val();
   if(p.length ==0)
     {
        $('#prov').addClass('profvalid');
        $('#errprov').removeClass('hide');
        $('#errprov').addClass('display');
        return false;
     }
     else
     {
      $('#prov').removeClass('profvalid');
        $('#errprov').addClass('hide');
        $('#errprov').removeClass('display');
        return true;
     }

}$('#prov').keyup(function(){
  add_provider()
 });
function add_certdes() {
     var p =$('#certdes').val();
   if(p.length == 0 )
     {
        $('#certdes').addClass('profvalid');
        $('#errcertdes').removeClass('hide');
        $('#errcertdes').addClass('display');
        return false;
     }
    else
     {
        $('#certdes').removeClass('profvalid');
        $('#errcertdes').removeClass('display');
        $('#errcertdes').addClass('hide');
        return true;
     }
   }

   $('#certdes').keyup(function(){
   add_certdes();
 });

function add_certdes() {
     var p =$('#certdes').val();
   if(p.length == 0 )
     {
        $('#certdes').addClass('profvalid');
        $('#errcertdes').removeClass('hide');
        $('#errcertdes').addClass('display');
        return false;
     }
    else
     {
        $('#certdes').removeClass('profvalid');
        $('#errcertdes').removeClass('display');
        $('#errcertdes').addClass('hide');
        return true;
     }
   }

   $('#certdes').keyup(function(){
   add_certdes();
 });


$('#certbut').click(function(){
  a=add_certi();b=add_provider();c=add_certdes()
      if(a && b && c)
      {
        //alert("dhjbcsa");
        cert1();
        return true;


      }
      else
      {
        return false;
      }
});

function cert1()
{
       // alert("hi");
        // var name=$('#nam').val();
        $('.freelancerprofileupdate').css('visibility',"visible");
    $('#certificatehide').css({"pointer-events":"none","opacity":"0.3"});
        var t=$('#sub').val();
        var n=$('#prov').val();
        var pr=$('#certdes').val();
        var pr_con=$('#d1').val();

      // alert(n);
        var request = $.ajax({
        url: "userscertificate",
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "certificationname" : t,"provider" : n,"description" : pr,"date" : pr_con},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
        request.done(function(msg){

          
          //var m=msg.val();
           //alert("Hi");
           console.log(msg);
           if(msg == "CertificateAdded")

           {
              $('.freelancerprofileupdate').css('visibility',"hidden");
              $('#hourlyratehide').css({"pointer-events":"visible","opacity":"1"});
              location.reload();
             console.log("Updated");
              $('#cert').html(n);
            $('#earn').html(pr_con);

           }
           else
           {
            location.reload();
             console.log("Not Updated");
           }
        });

}

/*employment history*/
function add_company() {
     var p =$('#pr3').val();
   if(p.length == 0 )
     {
        $('#pr3').addClass('profvalid');
        $('#err3').removeClass('hide');
        $('#err3').addClass('display');
        return false;
     }
    else
     {
        $('#pr3').removeClass('profvalid');
        $('#err3').removeClass('display');
        $('#err3').addClass('hide');
        return true;
     }
   }

   $('#pr3').keyup(function(){
   add_company();
 });



   function add_location() {
     var p =$('#lo').val();
   if(p.length == 0 )
     {
        $('#lo').addClass('profvalid');
        $('#errlo').removeClass('hide');
        $('#errlo').addClass('display');
        return false;
     }
    else
     {
        $('#lo').removeClass('profvalid');
        $('#errlo').removeClass('display');
        $('#errlo').addClass('hide');
        return true;
     }
   }

   $('#lo').keyup(function(){
   add_location();
 });



   function add_title() {
     var p =$('#tit').val();
   if(p.length == 0 )
     {
        $('#tit').addClass('profvalid');
        $('#errtit').removeClass('hide');
        $('#errtit').addClass('display');
        return false;
     }
    else
     {
        $('#tit').removeClass('profvalid');
        $('#errtit').removeClass('display');
        $('#errtit').addClass('hide');
        return true;
     }
   }

   $('#tit').keyup(function(){
   add_title();
 });

$('#empform').click(function(){
  a=add_company();b=add_location();c=add_title()
      if(a && b && c)
      {
        getemp();
        return true;
      }
      else
      {
        return false;
      }
});



/*education*/
 function add_school() {
     var p =$('#scool').val();
   if(p.length == 0 )
     {
        $('#scool').addClass('profvalid');
        $('#errscool').removeClass('hide');
        $('#errscool').addClass('display');
        return false;
     }
    else
     {
        $('#scool').removeClass('profvalid');
        $('#errscool').removeClass('display');
        $('#errscool').addClass('hide');
        return true;
     }
   }

   $('#scool').keyup(function(){
   add_school();
 });
  function add_degree() {
     var p =$('#deg_name').val();
   if(p.length == 0 )
     {
        $('#deg_name').addClass('profvalid');
        $('#degree_error').removeClass('hide');
        $('#degree_error').addClass('display');
        return false;
     }
    else
     {
        $('#deg_name').removeClass('profvalid');
        $('#degree_error').removeClass('display');
        $('#degree_error').addClass('hide');
        return true;
     }
   }

   $('#deg_name').keyup(function(){
   add_degree();
 });
function sc_fromm() {
     var p =$('#sc_from').val();
   if(p == "From")
     {
        $('#sc_from').addClass('profvalid');
        $('#frm_scool').removeClass('hide');
        $('#frm_scool').addClass('display');
        return false;
     }
     else
     {
        $('#sc_from').removeClass('profvalid');
        $('#frm_scool').addClass('hide');
        $('#frm_scool').removeClass('display');
        return true;
     }

}$('#sc_from').change(function(){
  sc_fromm();
 });
function sc_too() {
     var p =$('#sc_to').val();
   if(p == "To (Or Expected Graduation Year)")
     {
        $('#sc_to').addClass('profvalid');
        $('#to_scool').removeClass('hide');
        $('#to_scool').addClass('display');
        return false;
     }
     else
     {
        $('#sc_to').removeClass('profvalid');
        $('#to_scool').addClass('hide');
        $('#to_scool').removeClass('display');
        return true;
     }

}$('#sc_to').change(function(){
  sc_too();
 });

$('#add_edu_btn').click(function(){
  a=add_school();b=add_degree();c=sc_fromm();d=sc_too();
      if(a && b && c && d)
      {
        getSchool();
      }
      else
      {
        return false;
      }
});

function add_subject() {
     var p =$('#subject').val();
   if(p.length == 0 )
     {
        $('#subject').addClass('profvalid');
        $('#errsub').removeClass('hide');
        $('#errsub').addClass('display');
        return false;
     }
    else
     {
        $('#subject').removeClass('profvalid');
        $('#errsub').removeClass('display');
        $('#errsub').addClass('hide');
        return true;
     }
   }

   $('#subject').keyup(function(){
   add_subject();
 });


function add_description() {
     var p =$('#des').val();
   if(p.length == 0 )
     {
        $('#des').addClass('profvalid');
        $('#errdes').removeClass('hide');
        $('#errdes').addClass('display');
        return false;
     }
    else
     {
        $('#des').removeClass('profvalid');
        $('#errdes').removeClass('display');
        $('#errdes').addClass('hide');
        return true;
     }
   }

   $('#des').keyup(function(){
   add_description();
 });

$('#otherex1').click(function(){
  a=add_subject();b=add_description();
  s=0;
      if(a && b)
      {
         getOther();
        return true;


      }
      else
      {
        return false;
      }
});

$('#editname').hide();
$('#name').click(function(){
  $('#editname').show();
});

/*edit name & job title*/
function add_jobtitle() {
     var p =$('#job').val();
   if(p.length == 0 )
     {
        $('#job').addClass('profvalid');
        $('#errjob').removeClass('hide');
        $('#errjob').addClass('display');
        return false;
     }
    else
     {
        $('#job').removeClass('profvalid');
        $('#errjob').removeClass('display');
        $('#errjob').addClass('hide');
        return true;
     }
   }

   $('#job').keyup(function(){
   add_jobtitle();
 });

   $('#tite').click(function(){
    a=add_jobtitle();
    if(a)
    {
      //alert("hi");
      gettitl();
      return true;
    }
    else
      {
        return false;
      }
   });

/*overview*/
function add_overview() {
     var p =$('#overv').val();
   if(p.length == 0 )
     {
        $('#overv').addClass('profvalid');
        $('#erroverv').removeClass('hide');
        $('#erroverv').addClass('display');
        return false;
     }

     if(p.length >= 1 && p.length <= 99 )
     {
        $('#overv').addClass('profvalid');
        $('#erroverv').removeClass('display');
        $('#erroverv').addClass('hide');
        $('#erroverv1').removeClass('hide');
        $('#erroverv1').addClass('displayy');
        return false;
     }
    else
     {

        $('#overv').removeClass('profvalid');
        $('#erroverv1').removeClass('displayy');
        $('#erroverv1').addClass('hide');
        return true;
     }
   }

   $('#overv').keydown(function(){
   add_overview();
 });
      $('#ove').click(function(){
   a=add_overview();
   if (a)
    {
      //alert("oo");
        getdesc();
        return true;
   }
   else
   {
    return false;
   }
 });
});





/*select freelancer*/

$(document).ready(function(){
$('#2').hide('ex2');


$('#compt').click(function(){
  $('#1').show('com1');
  $('#2').hide('ex2');

});

$('#exp').click(function(){
  $('#2').show('ex2');
  $('#1').hide('com1');


});

/*post a job page validation*/
function post_name() {
     var e =$('#post-name').val();
   if(e.length == 0 ){

        $('#post-name').addClass('post-input-error');
        $('#post-name-error').removeClass('hider');
        $('#post-name-error').addClass('display');
        return false;
     }
     else
     {

        $('#post-name').removeClass('post-input-error');
        $('#post-name-error').removeClass('display');
        $('#post-name-error').addClass('hider');
        return true;
     }
   }

   $('#post-name').keyup(function(){
   post_name();
 });

function post_disc() {
     var e =$('#project-disc').val();
   if(e.length == 0 ){

        $('#project-disc').addClass('post-input-error');
        $('#project-desc-error').removeClass('hider');
        $('#project-desc-error').addClass('display');
        return false;
     }
     else
     {

        $('#project-disc').removeClass('post-input-error');
        $('#project-desc-error').removeClass('display');
        $('#project-desc-error').addClass('hider');
        return true;
     }
   }

   $('#project-disc').keyup(function(){
   post_disc();
 });

function task_desc() {
     var e =$('#task-desc').val();
   if(e.length == 0 ){

        $('#task-desc').addClass('post-input-error');
        $('#task-desc-error').removeClass('hider');
        $('#task-desc-error').addClass('display');
        return false;
     }
     else
     {

        $('#task-desc').removeClass('post-input-error');
        $('#task-desc-error').removeClass('display');
        $('#task-desc-error').addClass('hider');
        return true;
     }
   }

   $('#task-desc').keyup(function(){
   task_desc();
 });

function skill_desc() {
     var e =$('#skill-desc').val();
   if(e.length == 0 ){

        $('#skill-desc').addClass('post-input-error');
        $('#skill-desc-error').removeClass('hider');
        $('#skill-desc-error').addClass('display');
        return false;
     }
     else
     {

        $('#skill-desc').removeClass('post-input-error');
        $('#skill-desc-error').removeClass('display');
        $('#skill-desc-error').addClass('hider');
        return true;
     }
   }

   $('#skill-desc').keyup(function(){
   skill_desc();
 });

function budget()
{
  var e = $('#pay').val();
  if(e == "Pay a fixed price"){
    $('#budget').removeClass('hider');
    $('#budget').addClass('display');
  }
  else{
    $('#budget').addClass('hider');
    $('#budget').removeClass('display'); 
  }
}

$('#pay').change(function()
{
  budget();
});

$('#post_a_job').submit(function(){
  a=post_name();b=post_disc();c=task_desc();d=skill_desc();
      if(a && b && c && d)
      {
        return true;
      }
      else
      {
        return false;
      }
});

$("#close-ques").click(function(){
        $('#close-ques').removeClass('display');
        $('#close-ques').addClass('hider');
        $('#ques').removeClass('display');
        $('#ques').addClass('hider');
});

//my job feed validation
  function feedinput() {
     var e =$('#jobf').val();
   if(e.length == 0 ){
        $('#jobf').addClass('login-inbox');
        $('#jobf').addClass('forget-input');
        $('#feedjob').removeClass('hider');
        $('#feedjob').addClass('display');
        return false;
     }
     else
     {
        $('#jobf').removeClass('forget-input');
        $('#jobf').removeClass('login-inbox');
        $('#feedjob').removeClass('display');
        $('#feedjob').addClass('hider');
        return true;
     }
   }

   $('#jobf').keyup(function(){
   feedinput();
 });

 $('#job-feed').click(function(){
  a=feedinput();
  if (feedinput())
  {
    return true;
  }
  else
  {
    return false;
  }

 });

});

$( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 100,
      values: [ 25, 75 ],
      slide: function( event, ui ) {
        $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  } );

//Scripts For Ajax call
function getMessage(){
        //alert("portfolio functio call");
        $('.freelancerprofileupdate').css('visibility',"visible");
        $('#porthide').css({"pointer-events":"none","opacity":"0.3"});
        var t=$('#pr').val();
        var n=$('#nam').val();
        var pr=$('#pr1').val();
        //var pr_img=$('#proj_img').val();
        var pr_con=$('#proj_cont').val();
        var pr_cat=$('#cat').val();
        var pr_scat=$('#proj_scat').val();
        var pr_u=$('#pr2').val();
        var pr_dat=$('#proj_dat').val();
        var pr_sk=$('#proj_sk').val();
       // alert(n);
        var request = $.ajax({
        url: "portfolio",
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "username" : n,"projecttitle" : t,"projectoverview" : pr,"contract" : pr_con,"category" : pr_cat,"subcategory" : pr_scat,"projecturl" : pr_u,"completiondate" : pr_dat,"skills" : pr_sk },
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
        request.done(function(msg){
            //alert("Hi");
           // location.reload();
           console.log(msg);
           if(msg == "Inserted")
           {
            $('.freelancerprofileupdate').css('visibility',"hidden");
            $('#porthide').css({"pointer-events":"visible","opacity":"1"});
            location.reload();
             console.log("Updated");
             $('#cert').html('#nam');

           }
           else
           {
             location.reload();
             console.log("Not Updated");
           }
        });

}

/*certificate modal*/
/*function getcert(){
  var cer=$("#certi").val();
  var n=$('#nam').val();
  //alert(cer);
  var request = $.ajax({
        url: "cert" ,
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "name" : n,"certificate" : cer },
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
  request.done(function(msg){
            //console.log(msg);
           if(msg == "CertificateAdded")
           {
             console.log("Updated");
           }
           else
           {
             console.log("Not Updated");
           }
  });
  //alert(cer);
}*/

/*add employment modal*/

function getemp(){
  $('.freelancerprofileupdate').css('visibility',"visible");
    $('#employhide').css({"pointer-events":"none","opacity":"0.3"});
  var n=$('#nam').val();
  var cn=$('#pr3').val();
  var cit=$('#lo').val();
  var coun=$('#coun').val();
  var t=$('#tit').val();
  var rol=$('#rol').val();
  var fm=$('#from_mnth').val();
  var fy=$('#from_year').val();
  var tm=$('#to_mnth').val();
  var ty=$('#to_yr').val();
  var e_desc=$('#e_desc').val();
    var request = $.ajax({
        url: "employee" ,
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "username" : n,"company" : cn,"city" : cit,"location" : coun,"title" : t,"role" : rol,"description" : e_desc,"startmonth" : fm,"startyear" : fy,"endmonth" : tm,"endyear" : ty},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
      request.done(function(msg){
           if(msg == "Details Updated")
           {
            $('.freelancerprofileupdate').css('visibility',"hidden");
              $('#employhide').css({"pointer-events":"visible","opacity":"1"});
            location.reload();
             console.log("Updated");
             $('#cer').html(n);
             $('#title').html(t);
             $('#from').html(fm);
             $('#frye').html(fy);
             $('#to').html(tm);
             $('#toyr').html(ty);
             $('#des1').html(e_desc);
           }
           else
           {
            location.reload();
             console.log("Not Updated");
           }
  });

}

/*add education modal*/
function getSchool(){
  $('.freelancerprofileupdate').css('visibility',"visible");
    $('#eduhide').css({"pointer-events":"none","opacity":"0.3"});
  var n=$('#nam').val();
  var sn=$('#scool').val();
  var sfrom=$('#sc_from').val();
  var sto=$('#sc_to').val();
  var degnam=$('#deg_name').val();
  var area=$('#area_study').val();
  var desc=$('#sc_desc').val();
  var request = $.ajax({
        url: "schooldetails" ,
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "username" : n,"schoolname" : sn,"startdate" : sfrom,"enddate" : sto,"degree" : degnam,"areaofstudy" : area,"description" : desc},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
  request.done(function(msg){
    console.log(msg);
          if(msg == "School Details Added")
           {
            $('.freelancerprofileupdate').css('visibility',"hidden");
              $('#eduhide').css({"pointer-events":"visible","opacity":"1"});
             console.log("Updated");
             location.reload();
             $('#bac').html(sn);
             $('#cse').html(degnam);
             $('#col').html(area);
             $('#year').html(sto);
             $('#toyr').html(sfrom);
           }
           else
           {
            location.reload();
             console.log("Not Updated");
           }

  });

}

/*add other experience modal*/
function getOther(){
    $('.freelancerprofileupdate').css('visibility',"visible");
    $('#exphide').css({"pointer-events":"none","opacity":"0.3"});
    var n=$('#nam').val();
    var sub=$('#subject').val();
    var desc=$('#des').val();

    var request = $.ajax({
        url: "experience" ,
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "username" : n,"subject" : sub,"description" : desc},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
    request.done(function(msg){
      console.log(msg);
          if(msg == "Other Experiences Added")
           {
            $('.freelancerprofileupdate').css('visibility',"hidden");
              $('#exphide').css({"pointer-events":"visible","opacity":"1"});
            location.reload();
             console.log("Updated");
             $('#name').html(sub);
           }
           else
           {
            location.reload();
             console.log("Not Updated");
           }
    });
}
/*add video details*/
function getvid(){
 // alert("hi");
      var n=$('#nam').val();
    var sn=$('#vd_link').val();
    var vd=$('#vd_ty').val();
    //alert(vd);
    var request = $.ajax({
        url: "vid" ,
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "name" : n,"video_lin" : sn,"video_typ" : vd_ty},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
    request.done(function(msg){
       //console.log(msg);
          if(msg == "Video added")
           {
             console.log("Updated");
           }
           else
           {
             console.log("Not Updated");
           }
    });
}

/*update Description */
function getdesc(){
  //alert("hi");
  $('.freelancerprofileupdate').css('visibility',"visible");
    $('#hideover').css({"pointer-events":"none","opacity":"0.3"});
      var n=$('#nam').val();
    var ov=$('#overv').val();
    //alert(ov);
    var request = $.ajax({
        url: "editDescription" ,
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "username" :n, "overview" : ov},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
    request.done(function(msg){
       console.log(msg);
          if(msg == "Description added")
           {
            $('.freelancerprofileupdate').css('visibility',"hidden");
              $('#hideover').css({"pointer-events":"visible","opacity":"1"});
            location.reload();
             console.log("Updated");
           }
           else
           {
              location.reload();
             console.log("Not Updated");
           }
    });
}

function gettitl(){
    $('.freelancerprofileupdate').css('visibility',"visible");
    $('#freelancerhide').css({"pointer-events":"none","opacity":"0.3"});
    var n=$('#nam').val();
    var ov=$('#job').val();
    var request = $.ajax({
        url: "editjob" ,
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "username" : n,"jobtitle" : ov},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
    request.done(function(msg){
       //console.log(msg);
          if(msg == "Title added")
           {
            $('.freelancerprofileupdate').css('visibility',"hidden");
            $('#freelancerhide').css({"pointer-events":"visible","opacity":"1"});
            location.reload();
            console.log("Updated");
           }
           else
           {
             console.log("Not Updated");
           }
    });
}

function getrate(){
    $('.freelancerprofileupdate').css('visibility',"visible");
    $('#hourlyratehide').css({"pointer-events":"none","opacity":"0.3"});
    var n=$('#nam').val();
    var hr=$('#hr_rate').val();
    var yr=$('#you_receive').val();
    //lert("hi");
    var request = $.ajax({
        url: "editrate" ,
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: {"username" : n,"hourate" : hr,"receiverate" : yr},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
    request.done(function(msg){
    // var json=jQuery.parseJSON(msg);
    // document.getElementById("fnamei").innerHTML = json.fname;
        //document.getElementById("lnamei").innerHTML = json.lname;
       console.log(msg);
          if(msg == "Rate added")
           {
              $('.freelancerprofileupdate').css('visibility',"hidden");
              $('#hourlyratehide').css({"pointer-events":"visible","opacity":"1"});
              location.reload();
             console.log("Updated");
           }
           else
           {
            location.reload();
             console.log("Not Updated");
           }
    });
}


function selectchecker(e,i){
  if($(e).prop('checked')) {
      $('.tick'+i).css("display","block");
      console.log("checked");
  }else{
$('.tick'+i).css("display","none");
      console.log("unchecked");
  }
}

function selectfilter(e,i){
  if($(e).prop('checked')) {
      $('#tick'+i).addClass('showcheckbox');
      console.log("checked");
  }else{
$('#tick'+i).removeClass('showcheckbox');
      console.log("unchecked");
  }
}


/*profile settings*/
function afterchip(){
/*var a= $('#chiplist').html();
var b=$('#g1')+$('#gc1');
var c=a+b;
$('#chiplist').after(a);*/

/*var a=$('#g1').html();
var b=$('#gend').html();
var c=a+b;
$('#gc1').html(c);
var a=$('#g1').html();
var b=$('#gend').html();
var c=a+b;*/
$('#gc1').html($('#g1').html()+$('#gend').html());
}

$(document).ready(function(){
  var flag=0;

 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });

 });


$(document).ready(function(){
$('#bin4').click(function() {
  var cer="edu";
      var request = $.ajax({
        url: "edudel" ,
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "name" : cer},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
    request.done(function(msg){
      console.log(msg);
      location.reload();

    })
});
$('#bin5').click(function() {
  var cer="other";
      var request = $.ajax({
        url: "otherdel" ,
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "name" : cer},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
    request.done(function(msg){
      console.log(msg);
      location.reload();

    })
});

});

$(document).ready(function(){
$('#bin').click(function()
{
  // alert("sd");
  var cer="certificate";
      var request = $.ajax({
        url: "cerdel" ,
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "name" : cer},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
    request.done(function(msg){
      console.log(msg);
      location.reload();

    })
$('#cert').hide();
$('#earn').hide();
});

});
$(document).ready(function(){
$('#bin1').click(function() {
   /*$('#cc').hide('overcont');
   $('#c1').removeClass('hider');
   $('#c1').addClass('display');
*/
getemppp();
});
function getemppp(){
  var n=$('#nam').val();
  var cn=$('#pr3').val();
  var cit=$('#lo').val();
  var coun=$('#coun').val();
  var t=$('#tit').val();
  var rol=$('#rol').val();
  var fm=$('#from_mnth').val();
  var fy=$('#from_year').val();
  var tm=$('#to_mnth').val();
  var ty=$('#to_yr').val();
  var e_desc=$('#e_desc').val();
    var request = $.ajax({
        url: "delemp" ,
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "name" : n,"cmpny_name" : cn,"city" : cit,"country" : coun,"title" : t,"role" : rol,"edu_desc" : e_desc,"from_mnth" : fm,"from_year" : fy,"to_mnth" : tm,"to_year" : ty},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
      request.done(function(msg){
           if(msg == "Details Updated")
           {
            //location.reload();
             console.log("deleted");
             $('#cer').html(n);
             $('#title').html(t);
             $('#from').html(fm);
             $('#frye').html(fy);
             $('#to').html(tm);
             $('#toyr').html(ty);
             $('#des1').html(e_desc);
           }
           else
           {
             console.log("Not deleted");
           }
  });

}


});
$(document).ready(function(){
$('#bin2').click(function() {
  var cer="portfolio";
      var request = $.ajax({
        url: "portdel" ,
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "name" : cer},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
    request.done(function(msg){
      console.log(msg);
      location.reload();

    })

});

});
$(document).ready(function(){
$('#bin3').click(function() {
  var cer="emp";
      var request = $.ajax({
        url: "empdel" ,
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "name" : cer},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
    request.done(function(msg){
      console.log(msg);
      location.reload();

    })

});

});

//Message ajax call
function getaccept(){
  // var max=$('#max').val();
  var j=$('#jobid').val();
  var p=$('#pr').val();
  var fid=$('#fid').val();
   //alertify.alert(p);
 //alert(p);
  alertify.confirm('Would you like to accept the proposal?',function(){
    $('#loaderimg').css('visibility',"visible");
    $('#provideroffer').css('pointer-events',"none");
      var request = $.ajax({
        url: "../acceptproposal" ,
       type: "POST",
       data: {"jobid" : j,"proposalid" : p,"freelancerid" : fid},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }
});
    request.done(function(msg){
      console.log(msg);
      if(msg=="false")
      {
        $('#loaderimg').css('visibility',"hidden");
        $('#provideroffer').css('pointer-events',"visible");
        alertify.alert('Alert','Sorry!!Already proposal accepted for this project',function(){ location.reload(); });
      }
      else{
          $('#loaderimg').css('visibility',"hidden");
          alertify.alert('Alert','Proposal Accepted',function(){ location.reload(); });
      }

    });
});


}

//Decline proposal
function getdecline(){

   var p=$('#pr').val();
   var fid=$('#fid').val();
  alertify.confirm('Would you like to decline the proposal?',function(){
    $('#loaderimg').css('visibility',"visible");
    $('#provideroffer').css('pointer-events',"none");
      var request = $.ajax({
        url: "../declineproposal" ,
       type: "POST",
       data: {"proposalid" : p,"freelancerid" : fid},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }
});
    request.done(function(msg){
      console.log(msg);
      if(msg=="proposal declined")
      {
        $('#loaderimg').css('visibility',"hidden");
        $('#provideroffer').css('pointer-events',"visible");
        alertify.alert('Alert','Proposal Declined',function(){ location.reload(); });
      }
    });
});


}

//Change password
function getChangepass(){
  var op=$('#old-password').val();
  var np=$('#change-password').val();
  var request = $.ajax({
       url: "freelancerpasswordupdate" ,
     //  url: "http://demo.cogzidel.com/upc/chgpass",
       type: "post",
       data: {"oldpassword" : op,"newpassword" : np},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }
});
    request.done(function(msg){
      //console.log(msg);
          // alert("Offer Provided");
          // location.reload();
          if(msg == "Password Updated Successfully")
           {
             console.log("Password Updated");
             $('#correct_pass').removeClass('hider');
             $('#correct_pass').addClass('display');
             $('#wrong_pass').addClass('hider');
             $('#wrong_pass').removeClass('display');
             $('#old-password').val('');
             $('#change-password').val('');
             $('#conform-password').val('');
             $('#no-old-pass-error').addClass('hider');
             $('#no-old-pass-error').removeClass('display');
             setTimeout(function() {
                  $('#correct_pass').fadeOut('slow');
              }, 5000);
           }
           else if(msg=="wrong old password")
           {
            //console.log(msg);
             console.log("Not Updated");
             $('#correct_pass').removeClass('display');
             $('#correct_pass').addClass('hider');
             $('#wrong_pass').addClass('display');
             $('#wrong_pass').removeClass('hider');
             $('#old-password').val('');
             $('#change-password').val('');
             $('#conform-password').val('');
             $('#no-old-pass-error').addClass('display');
             $('#no-old-pass-error').removeClass('hider');
             $('#old-password').addClass('forget-input');

           }
    });


}

function reset4()
    {
      $('#social-change-password').val('');
      $('#social-conform-password').val('');
      $('#social-old-pass-error').removeClass('display');
      $('#social-conform-pass-error').removeClass('display');
      $('#social-conform-match-error').removeClass('display');
      $('#social-change-pass-error').removeClass('display');
      $('#social-change-short-error').removeClass('display');
      $('#social-change-letter-error').removeClass('display');

      $('#social-conform-pass-error').addClass('hider');
      $('#social-conform-match-error').addClass('hider');
      $('#social-change-pass-error').addClass('hider');
      $('#social-change-short-error').addClass('hider');
      $('#social-change-letter-error').addClass('hider');
      $('#social-conform-password').removeClass('forget-input');
      $('#social-change-password').removeClass('forget-input');
    }

function reset3()
    {
      $('#social-change-password1').val('');
      $('#social-conform-password1').val('');
      $('#social-conform-pass-error1').removeClass('display');
      $('#social-conform-match-error1').removeClass('display');
      $('#social-change-pass-error1').removeClass('display');
      $('#social-change-short-error1').removeClass('display');
      $('#social-change-letter-error1').removeClass('display');

      $('#social-conform-pass-error1').addClass('hider');
      $('#social-conform-match-error1').addClass('hider');
      $('#social-change-pass-error1').addClass('hider');
      $('#social-change-short-error1').addClass('hider');
      $('#social-change-letter-error1').addClass('hider');
      $('#social-conform-password1').removeClass('forget-input');
      $('#social-change-password1').removeClass('forget-input');
    }


function reset2()
    {
      $('#old-password1').val('');
      $('#change-password1').val('');
      $('#conform-password1').val('');
      $('#old-pass-error1').removeClass('display');
      $('#conform-pass-error1').removeClass('display');
      $('#conform-match-error1').removeClass('display');
      $('#change-pass-error1').removeClass('display');
      $('#change-short-error1').removeClass('display');
      $('#change-letter-error1').removeClass('display');

      $('#old-pass-error1').addClass('hider');
      $('#conform-pass-error1').addClass('hider');
      $('#conform-match-error1').addClass('hider');
      $('#change-pass-error1').addClass('hider');
      $('#change-short-error1').addClass('hider');
      $('#change-letter-error1').addClass('hider');
      $('#conform-password1').removeClass('forget-input');
      $('#change-password1').removeClass('forget-input');
      $('#old-password1').removeClass('forget-input');
    }

function reset1()
    {
      $('#old-password').val('');
      $('#change-password').val('');
      $('#conform-password').val('');
      $('#old-pass-error').removeClass('display');
      $('#conform-pass-error').removeClass('display');
      $('#conform-match-error').removeClass('display');
      $('#change-pass-error').removeClass('display');
      $('#change-short-error').removeClass('display');
      $('#change-letter-error').removeClass('display');

      $('#old-pass-error').addClass('hider');
      $('#conform-pass-error').addClass('hider');
      $('#conform-match-error').addClass('hider');
      $('#change-pass-error').addClass('hider');
      $('#change-short-error').addClass('hider');
      $('#change-letter-error').addClass('hider');
      $('#conform-password').removeClass('forget-input');
      $('#change-password').removeClass('forget-input');
      $('#old-password').removeClass('forget-input');
    }

/*provider profile hide & show*/

$(document).ready(function(){

 $('#wrnm').hide();
$('#nmbut').click(function() {
   $('#wrnm').show('provnmedit');
   $('#nm').hide('provcad');
   });
  $('#savebut').click(function() {
  /*$('#nm').show('provcad');
  $('#wrnm').hide('provnmedit');*/
   });
  $('#canbut').click(function() {
    location.reload(true);
  $('#nm').show('provcad');
  $('#wrnm').hide('provnmedit');
   });

    $('#wrml').hide();
  $('#mlbut').click(function() {
   $('#wrml').show('wrmaile');
   $('#ml').hide('maile');
   });
  $('#savebut1').click(function() {
  /*$('#ml').show('maile');
  $('#wrml').hide('wrmaile');*/
   });
  $('#canbut1').click(function() {
    location.reload(true);
  $('#ml').show('maile');
  $('#wrml').hide('wrmaile');
   });


     $('#wrcmny').hide();
  $('#combut').click(function() {
   $('#wrcmny').show('wrcompani');
   $('#cmny').hide('compani');
   });
  $('#savebut2').click(function() {
  /*$('#cmny').show('compani');
  $('#wrcmny').hide('wrcompani');*/
   });
  $('#canbut2').click(function() {
    location.reload(true);
  $('#cmny').show('compani');
  $('#wrcmny').hide('wrcompani');
   });

  $('#wrad').hide();
  $('#adbut').click(function() {
   $('#wrad').show('wraddr');
   $('#ad').hide('addr');
   });
  $('#savebut3').click(function() {
  /*$('#ad').show('addr');
  $('#wrad').hide('wraddr');*/
   });
  $('#canbut3').click(function() {
    location.reload(true);
  $('#ad').show('addr');
  $('#wrad').hide('wraddr');
   });

  $('#wrtim').hide();
  $('#timbut').click(function() {
   $('#wrtim').show('wrtimee');
   $('#tim').hide('timee');
   });
  $('#savebut4').click(function() {
  $('#tim').show('timee');
  $('#wrtim').hide('wrtimee');
   });
  $('#canbut4').click(function() {
    location.reload(true);
  $('#tim').show('timee');
  $('#wrtim').hide('wrtimee');
   });

$('#wrph').hide();
  $('#phbut').click(function() {
   $('#wrph').show('wrphoon');
   $('#ph').hide('phoon');
   });
  $('#savebut5').click(function() {
  /*$('#ph').show('phoon');
  $('#wrph').hide('wrphoon');*/
   });
  $('#canbut5').click(function() {
    location.reload(true);
  $('#ph').show('phoon');
  $('#wrph').hide('wrphoon');
   });


  $('#wrvat').hide();
  $('#idbut').click(function() {
   $('#wrvat').show('wrvatid');
   $('#vat').hide('vat');
   });
  $('#savebut6').click(function() {
  $('#vat').show('vatid');
  $('#wrvat').hide('wrvatid');
   });
  $('#canbut6').click(function() {
  $('#vat').show('vatid');
  $('#wrvat').hide('wrvatid');
   });


/*freelancers settings*/
$('#cat1').hide();
$('#cat1icon').click(function(){
$('#cat1').toggle('cato1');
});

$('#cat2').hide();
$('#cat2icon').click(function(){
$('#cat2').toggle('cato2');
});
$('#cat3').hide();
$('#cat3icon').click(function(){
$('#cat3').toggle('cato3');
});
$('#cat4').hide();
$('#cat4icon').click(function(){
$('#cat4').toggle('cato4');
});
$('#cat5').hide();
$('#cat5icon').click(function(){
$('#cat5').toggle('cato5');
});

$('#cat6').hide();
$('#cat6icon').click(function(){
$('#cat6').toggle('cato6');
});

$('#cat7').hide();
$('#cat7icon').click(function(){
$('#cat7').toggle('cato7');
});

$('#cat8').hide();
$('#cat8icon').click(function(){
$('#cat8').toggle('cato8');
});
$('#cat9').hide();
$('#cat9icon').click(function(){
$('#cat9').toggle('cato9');
});
$('#cat10').hide();
$('#cat10icon').click(function(){
$('#cat10').toggle('cato10');
});
$('#cat11').hide();
$('#cat11icon').click(function(){
$('#cat11').toggle('cato11');
});

$('#cat12').hide();
$('#cat12icon').click(function(){
$('#cat12').toggle('cato12');
});

$('#cat1').hide();
$('#1caticon').click(function(){
$('#cat1').toggle('cato1');
});

$('#cat2').hide();
$('#2caticon').click(function(){
$('#cat2').toggle('cato2');
});
$('#cat3').hide();
$('#3caticon').click(function(){
$('#cat3').toggle('cato3');
});
$('#cat4').hide();
$('#4caticon').click(function(){
$('#cat4').toggle('cato4');
});
$('#cat5').hide();
$('#5caticon').click(function(){
$('#cat5').toggle('cato5');
});

$('#cat6').hide();
$('#6caticon').click(function(){
$('#cat6').toggle('cato6');
});

$('#cat7').hide();
$('#7caticon').click(function(){
$('#cat7').toggle('cato7');
});

$('#cat8').hide();
$('#8caticon').click(function(){
$('#cat8').toggle('cato8');
});
$('#cat9').hide();
$('#9caticon').click(function(){
$('#cat9').toggle('cato9');
});
$('#cat10').hide();
$('#10caticon').click(function(){
$('#cat10').toggle('cato10');
});
$('#cat11').hide();
$('#11caticon').click(function(){
$('#cat11').toggle('cato11');
});

$('#cat12').hide();
$('#12caticon').click(function(){
$('#cat12').toggle('cato12');
});

$('#majoriconcl').hide();
$('#majoricon').show();
$('#majoricon').click(function(){
$('#majoriconcl').show('major-categories');
$('#majoricon').hide();
$('#cattalents').hide();
});


$('#catsavebut').click(function(){
  $('#majoriconcl').hide('major-categories');
  $('#majoricon').show();
  $('#cattalents').show();
});


$('#catcanbut').click(function(){
  $('#majoriconcl').hide('major-categories');
  $('#majoricon').show();
  $('#cattalents').show();
});

});

function profirst(){
        //alert("portfolio functio call");
        var t=$('#providername').val();
        // var n=$('#nam').val();
        var pr=$('#providerlname').val();
        //alert(pr);
        var request = $.ajax({
        url: "providerfirstname",
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "firstname" : t,"lastname" : pr},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
        request.done(function(msg){
          console.log(msg);
          var json=jQuery.parseJSON(msg);
        document.getElementById("fnamei").innerHTML = json.firstname;
        document.getElementById("lnamei").innerHTML = json.lastname;
        
        });

}


function prosecond(){
        //alert("portfolio functio call");
        var t=$('#providerename').val();
        var n=$('#nam').val();
        //var pr=$('#lname').val();
        var request = $.ajax({
        url: "second",
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "name" : n,"fname" : t,},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
        request.done(function(msg){
    document.getElementById("emaili").innerHTML =msg;
            //alert("Hi");
           // console.log(msg);
           // if(msg == "updated")
           // {
           //  location.reload();
           //   console.log("Updated");


           // }
           // else
           // {
           //   console.log("Not Updated");
           // }
        });

}
$('#savebut1').click(function()
{
   prosecond();
});


function prothird(){
        //alert("portfolio functio call");
        var t=$('#providercname').val();
        // var n=$('#nam').val();
        var pr=$('#providerweb').val();
        var pr1=$('#providertag').val();
        var pr2=$('#providerdesc1').val();
        // alert("sam");
        var request = $.ajax({
        url: "companydetail",
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "companyname" : t,"website":pr,"tagline":pr1,"description":pr2,},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
        request.done(function(msg){
          console.log(msg);
          var json=jQuery.parseJSON(msg);
          document.getElementById("cmpnynamei").innerHTML = json.companyname;
            //alert("Hi");
           // console.log(msg);
           // if(msg == "updated")
           // {
           //  location.reload();
           //   console.log("Updated");


           // }
           // else
           // {
           //   console.log("Not Updated");
           // }
        });

}
$('#savebut2').click(function()
{
   prothird();
});



function profour(){
        // alert("portfolio functio call");
        var t=$('#providercoun').val();
        // var n=$('#nam').val();
        var pr=$('#provideradd').val();
        var pr1=$('#providercity').val();
        var pr2=$('#providerzip').val();
        var request = $.ajax({
        //url:"http://demo.cogzidel.com/upc/companyaddress",
        url: "companyaddress",
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "country" : t,"address":pr,"city":pr1,"zipcode":pr2},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
        request.done(function(msg){
          console.log(msg);
          document.getElementById("countryi").innerHTML = msg;
          
        });

}
$('#savebut3').click(function()
{
   profour();
});


function profive(){
        // alert("portfolio functio call");
        var t=$('#providerzone').val();
        // var n=$('#nam').val();
        var request = $.ajax({
        url: "timezone",
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "zone" : t,},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
        request.done(function(msg){
            //alert("Hi");
           console.log(msg);
           var json=jQuery.parseJSON(msg);
          document.getElementById("zonei").innerHTML = json.zone;
           //document.getElementById("zonei").innerHTML =msg;
           // if(msg == "updated")
           // {
           //  location.reload();
           //   console.log("Updated");
           //   }
           // else
           // {
           //   console.log("Not Updated");
           // }
        });

}
$('#savebut4').click(function()
{
   profive();
});



function prosix(){

        var t=$('#providerid1').val();
        var n=$('#nam').val();
        var pr=$('#providernum1').val();
        var request = $.ajax({
        url: "phone",
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "name" : n,"phoneid" : t,"number":pr,},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
        request.done(function(msg){
            //alert("Hi");
           console.log(msg);
           var json=jQuery.parseJSON(msg);
          document.getElementById("phonei").innerHTML = json.phone;
           // document.getElementById("phonei").innerHTML =msg;
           // if(msg == "updated")
           // {
           //  location.reload();
           //   console.log("Updated");


           // }
           // else
           // {
           //   console.log("Not Updated");
           // }
        });

}
// $('#savebut5').click(function()
// {
//    prosix();
// });


function prosev(){
        var t=$('#providervat123').val();
        var n=$('#nam').val();
        var request = $.ajax({
        url: "sev",
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "name" : n,"vat" : t,},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }

});
        request.done(function(msg){
            //alert("Hi");
           console.log(msg);
 // document.getElementById("phonei").innerHTML =msg;
           // if(msg == "updated")
           // {
           //  location.reload();
           //   console.log("Updated");


           // }
           // else
           // {
           //   console.log("Not Updated");
           // }
        });

}

function getOffer(){
  //alert(id);
  var max=$('#max').val();

  var fn=$('#fn').val();
  var j=$('#jobn').val();
  var pn=$('#pn').val();
  var bn=$('#bn').val();
  var pr=$('#pr').val();

 //alert(pr);
var r = confirm("Would you like to start a project?");
if (r == true) {
      var request = $.ajax({
        url: "free_msg" ,
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: { "freelancer_name" : fn,"job_name" : j,"provider_name" : pn,"bid_val" : bn,'proposal_id': pr},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }
});
    request.done(function(msg){
          console.log(msg);
          alert("Offer Accepted");
          location.reload();
          if(msg == "updated")
           {
             console.log("Accepted");
           }
           else
           {
             console.log("Not Updated");
           }
    });
  }
else {
    return false;
}
}





/*provider profile*/
$(document).ready(function(){

function provider_firstname() {
     var p =$('#providername').val();
   if(p.length == 0 )
     {
        $('#providername').addClass('profvalid');
        $('#errprovidername').removeClass('hide');
        $('#errprovidername').addClass('display');
        return false;
     }
    else
     {
        $('#providername').removeClass('profvalid');
        $('#errprovidername').removeClass('display');
        $('#errprovidername').addClass('hide');
        return true;
     }
   }

   $('#providername').keyup(function(){
   provider_firstname();
 });

function provider_lastname() {
     var p =$('#providerlname').val();
   if(p.length == 0 )
     {
        $('#providerlname').addClass('profvalid');
        $('#errproviderlname').removeClass('hide');
        $('#errproviderlname').addClass('display');
        return false;
     }
    else
     {
        $('#providerlname').removeClass('profvalid');
        $('#errproviderlname').removeClass('display');
        $('#errproviderlname').addClass('hide');
        return true;
     }
   }

   $('#providerlname').keyup(function(){
   provider_lastname();
 });


$('#savebut').click(function(){
  a=provider_firstname();b=provider_lastname();
      if(a && b )
      {
        $('#nm').show('provcad');
  $('#wrnm').hide('provnmedit');
        }
      else
      {

        return false;
      }
});

function provider_email() {
     var p =$('#providerename').val();
   if(p.length == 0 )
     {
        $('#providerename').addClass('profvalid');
        $('#errproviderename').removeClass('hide');
        $('#errproviderename').addClass('display');
        return false;
     }
    else
     {
        $('#providerename').removeClass('profvalid');
        $('#errproviderename').removeClass('display');
        $('#errproviderename').addClass('hide');
        return true;
     }
   }
    $('#providerename').keyup(function(){
   provider_email();
 });


$('#savebut1').click(function(){
  a=provider_email();
      if(a)
      {
        $('#ml').show('maile');
  $('#wrml').hide('wrmaile');
      }
      else
      {
        return false;
      }
});

function provider_companyname() {
     var p =$('#providercname').val();
   if(p.length == 0 )
     {
        $('#providercname').addClass('profvalid');
        $('#errprovidercname').removeClass('hide');
        $('#errprovidercname').addClass('display');
        return false;
     }
    else
     {
        $('#providercname').removeClass('profvalid');
        $('#errprovidercname').removeClass('display');
        $('#errprovidercname').addClass('hide');
        return true;
     }
   }

   $('#providercname').keyup(function(){
   provider_companyname();
 });

function provider_website() {
     var p =$('#providerweb').val();
     function checkUrl(p)
{
    //regular expression for URL
    var pattern = /(\b(\/\/|www\.)([0-9A-Za-z]+\.[A-Za-z]?)+\b)/;
    return pattern.test(p);
}    
   if(p.length == 0 )
     {
        $('#providerweb').addClass('profvalid');
        $('#errproviderweb').removeClass('hide');
        $('#errproviderweb').addClass('display');
        $('#errproviderurl').addClass('hide');
        $('#errproviderurl').removeClass('display');  
        return false;
     }
    if(!checkUrl(p)){
      $('#providerweb').addClass('profvalid');
      $('#errproviderurl').removeClass('hide');
      $('#errproviderurl').addClass('display');
      $('#errproviderweb').addClass('hide');
      $('#errproviderweb').removeClass('display');
      $('#providerweb').addClass('profvalid');
      $('#errproviderweb').addClass('display');
      $('#errproviderweb').removeClass('hide');
      $('#errproviderweb').addClass('hide');
      $('#errproviderweb').removeClass('display');
        return false;  
    } 
    else
     {
        $('#providerweb').removeClass('profvalid');
        $('#errproviderweb').removeClass('display');
        $('#errproviderweb').addClass('hide');
        $('#errproviderurl').addClass('hide');
        $('#errproviderurl').removeClass('display');  
        return true;
     }
   }

   $('#providerweb').keyup(function(){
   provider_website();
 });


$('#savebut2').click(function(){
  a=provider_companyname();b=provider_website();
      if(a && b )
      {
        $('#cmny').show('compani');
  $('#wrcmny').hide('wrcompani');
      }
      else
      {
        return false;
      }
});

function provider_address() {
     var p =$('#provideradd').val();
   if(p.length == 0 )
     {
        $('#provideradd').addClass('profvalid');
        $('#errprovideradd').removeClass('hide');
        $('#errpprovideradd').addClass('display');
        return false;
     }
    else
     {
        $('#provideradd').removeClass('profvalid');
        $('#errprovideradd').removeClass('display');
        $('#errprovideradd').addClass('hide');
        return true;
     }
   }

   $('#provideradd').keyup(function(){
   provider_address();
 });

function provider_city() {
     var p =$('#providercity').val();
   if(p.length == 0 )
     {
        $('#providercity').addClass('profvalid');
        $('#errprovidercity').removeClass('hide');
        $('#errprovidercity').addClass('display');
        return false;
     }
    else
     {
        $('#providercity').removeClass('profvalid');
        $('#errprovidercity').removeClass('display');
        $('#errprovidercity').addClass('hide');
        return true;
     }
   }

   $('#providercity').keyup(function(){
   provider_city();
 });


$('#savebut3').click(function(){
  a=provider_address();b=provider_city();
      if(a && b )
      {
        $('#ad').show('addr');
  $('#wrad').hide('wraddr');
      }
      else
      {
        return false;
      }
});


function provider_phone() {
     var p =$('#providernum1').val();
   if(p.length == 0 )
     {
        $('#providernum1').addClass('profvalid');
        $('#errprovidernum1').removeClass('hide');
        $('#errprovidernum1').addClass('display');
        return false;
     }
    else
     {
        $('#providernum1').removeClass('profvalid');
        $('#errprovidernum1').removeClass('display');
        $('#errprovidernum1').addClass('hide');
        return true;
     }
   }

   $('#providernum1').keyup(function(){
   provider_phone();
 });

function provider_phonecode() {
     var p =$('#providerid1').val();
   if(p.length == 0 )
     {
        $('#providerid1').addClass('profvalid');
        $('#errprovidernum1').removeClass('hide');
        $('#errprovidernum1').addClass('display');
        return false;
     }
    else
     {
        $('#providerid1').removeClass('profvalid');
        $('#errprovidernum1').removeClass('display');
        $('#errprovidernum1').addClass('hide');
        return true;
     }
   }

   $('#providerid1').keyup(function(){
   provider_phonecode();
 });



$('#savebut5').click(function(){
  a=provider_phone();b=provider_phonecode();
      if(a && b )
      {
        $('#ph').show('phoon');
  $('#wrph').hide('wrphoon');
  prosix();
      }
      else
      {
        return false;
      }
});



$('#str').click(function() {
  $('#str').addclass('colorstar');
});


  });

//project completed
function getcompfree(id){
  //alert(id);
  $('#spinner').css('visibility',"visible");
  $('#completed').css('pointer-events',"none");
   var fnp=$('#jobid'+id).val();
  var jp=$('#providerid'+id).val();
  var proposalid=$('#proposalid'+id).val();
  //alert(jp);


 //alert(jp);
      var request = $.ajax({
        url: "completeproject",
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: {"jobid" : fnp, "providerid" : jp,"proposalid" : proposalid},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }
});
    request.done(function(msg){
          console.log(msg);
          location.reload();
          $('#spinner').css('visibility',"hidden");
          $('#completed').css('pointer-events',"visible");
    });
}


// function fileupload(){
//   console.log("loading");
//    var url = "/fileupload";
//     var formdata = new FormData(this);
//     formdata.append("dp",$('#fileInput')[0].files[0]);
//   $.ajax(url,{
//     method:'post',
//     data: formdata,
//     mimeTypes:"multipart/form-data",
//     contentType: false,
//     cache: false,
//     processData: false,
//      success: function(){
//                 alert("file successfully submitted");
//             },error: function(xhr, status, error) {
//           var err = JSON.parse(xhr.responseText);
//   alert(err.Message);
//             }

//   });

// }

function getSkills(){
  //alert(id);
  $('.freelancerprofileupdate').css('visibility',"visible");
  $('#skillshide').css({"pointer-events":"none","opacity":"0.3"});
   var fn=$('#nam').val();
  var sk=$('#skill').val();
  //alert(jp);


 //alert(jp);
      var request = $.ajax({
        url: "viewSkill",
       //url: "http://demo.cogzidel.com/upc/emailvalid",
       type: "post",
       data: {"username" : fn,"skills" : sk},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }
});
    request.done(function(msg){
      $('.freelancerprofileupdate').css('visibility',"hidden");
      $('#skillshide').css({"pointer-events":"visible","opacity":"1"});
      location.reload();
          console.log(msg);
          //alert("Succefully Submitted");
    });
}


//Provider change password
function getChangepass_pro(){
  //alert('hi');
  var op=$('#old-password1').val();
  var np=$('#change-password1').val();
  var request = $.ajax({
       url: "providerpasswordupdate" ,
     //  url: "http://demo.cogzidel.com/upc/chgpass",
       type: "post",
       data: {"oldpassword" : op,"newpassword" : np},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }
});
    request.done(function(msg){
      console.log(msg);
          // alert("Offer Provided");
          // location.reload();
          if(msg == "Password Updated Successfully")
           {
             console.log("Password Updated");
             $('#correct_pass1').removeClass('hider');
             $('#correct_pass1').addClass('display');
             $('#wrong_pass1').addClass('hider');
             $('#wrong_pass1').removeClass('display');
             $('#old-password1').val('');
             $('#change-password1').val('');
             $('#conform-password1').val('');
             $('#no-old-pass-error1').addClass('hider');
             $('#no-old-pass-error1').removeClass('display');
             setTimeout(function() {
                  $('#correct_pass1').fadeOut('slow');
              }, 5000);
           }
           else if(msg=="wrong old password")
           {
            //console.log(msg);
             console.log("Not Updated");
             $('#correct_pass1').removeClass('display');
             $('#correct_pass1').addClass('hider');
             $('#wrong_pass1').addClass('display');
             $('#wrong_pass1').removeClass('hider');
             $('#old-password1').val('');
             $('#change-password1').val('');
             $('#conform-password1').val('');
             $('#no-old-pass-error1').addClass('display');
             $('#no-old-pass-error1').removeClass('hider');
             $('#old-password1').addClass('forget-input');

           }
    });
}


function changecategory(a){
  $('#categoryname').val(a);
  $('#selectedcategory').html(a); 
  $('#search_pro').submit(); 
}

function sortbys(b){
  $('.sortbyvalue').val(b);
  $('#selectedsortby').html(b);
  $('#search_pro').submit();
}

function setpage(page){
  $('#paginator').val(page);
  $('#search_pro').submit();
}
