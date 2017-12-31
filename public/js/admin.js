$(function() {
   var accordionActive = false;
  
   $(window).on('resize', function() {
       var windowWidth = $(window).width();
       var $topMenu = $('#top-menu');
       var $sideMenu = $('#side-menu');     
       
       if (windowWidth < 768) {
          if ($topMenu.hasClass("active")) {             
            $topMenu.removeClass("active");
            $sideMenu.addClass("active");
            
            var $ddl = $('#top-menu .movable.dropdown');
            $ddl.detach();
            $ddl.removeClass('dropdown');
            $ddl.addClass('nav-header');
            
            $ddl.find('.dropdown-toggle').removeClass('dropdown-toggle').addClass('link');
            $ddl.find('.dropdown-menu').removeClass('dropdown-menu').addClass('submenu');
                        
            $ddl.prependTo($sideMenu.find('.accordion'));
            $('#top-menu #qform').detach().removeClass('navbar-form').prependTo($sideMenu);
            
            if (!accordionActive) {
               var Accordion2 = function(el, multiple) {
                 this.el = el || {};
                 this.multiple = multiple || false;

                  // Variables privadas
                 var links = this.el.find('.movable .link');
                 // Evento
                 links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown);
                }

              Accordion2.prototype.dropdown = function(e) {
                var $el = e.data.el;
                $this = $(this),
                  $next = $this.next();

                $next.slideToggle();
                $this.parent().toggleClass('open');

                if (!e.data.multiple) {
                  $el.find('.movable .submenu').not($next).slideUp().parent().removeClass('open');
                };
              }    

              var accordion = new Accordion2($('ul.accordion'), false); 
              accordionActive = true;
            }
          }
       }
       else {
          if ($sideMenu.hasClass("active")) {              
            $sideMenu.removeClass('active');
            $topMenu.addClass('active');
            
            var $ddl = $('#side-menu .movable.nav-header');
            $ddl.detach();
            $ddl.removeClass('nav-header');
            $ddl.addClass('dropdown');
            
            $ddl.find('.link').removeClass('link').addClass('dropdown-toggle');
            $ddl.find('.submenu').removeClass('submenu').addClass('dropdown-menu');
            
             $('#side-menu #qform').detach().addClass('navbar-form').appendTo($topMenu.find('.nav'));
            $ddl.appendTo($topMenu.find('.nav'));
          }
       }
   });
  
  /**/
  var $menulink = $('.side-menu-link'),       
      $wrap = $('.wrap');
  
  $menulink.click(function() {    
    $menulink.toggleClass('active');
    $wrap.toggleClass('active');    
    return false;
  });
  
  /*Accordion*/
  var Accordion = function(el, multiple) {
    this.el = el || {};
    this.multiple = multiple || false;

    // Variables privadas
    var links = this.el.find('.link');
    // Evento
    links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown);
  }

  Accordion.prototype.dropdown = function(e) {
     var $el = e.data.el;
     $this = $(this),
      $next = $this.next();

    $next.slideToggle();
    $this.parent().toggleClass('open');

    if (!e.data.multiple) {
      $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
    };
  }	

  var accordion = new Accordion($('ul.accordion'), false); 
  
 



});


$(document).ready(function(){
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


});

$(document).ready(function(){
function add_con() {
     var e =$('#add_content').val();
   if(e.length == 0 )
     {
        $('#add_content').addClass('bill-error');
        $('#add_cont_err').removeClass('hider');
        $('#add_cont_err').addClass('display');
        return false;
     }
    else
     {
        $('#add_content').removeClass('bill-error');
        $('#add_cont_err').removeClass('display');
        $('#add_cont_err').addClass('hider');
        return true;
     }
   }

   $('#add_content').keyup(function(){
   add_con();
 });

function add_Small_Content() {
     var e =$('#add_Small_Content').val();
   if(e.length == 0 )
     {
        $('#add_Small_Content').addClass('bill-error');
        $('#add_Small_Content-error').removeClass('hider');
        $('#add_Small_Content-error').addClass('display');
        return false;
     }
    else
     {
        $('#add_Small_Content').removeClass('bill-error');
        $('#add_Small_Content-error').removeClass('display');
        $('#add_Small_Content-error').addClass('hider');
        return true;
     }
   }

   $('#add_Small_Content').keyup(function(){
   add_Small_Content();
 });

function add_button() {
     var e =$('#add_button').val();
   if(e.length == 0 )
     {
        $('#add_button').addClass('bill-error');
        $('#add_button-error').removeClass('hider');
        $('#add_button-error').addClass('display');
        return false;
     }
    else
     {
        $('#add_button').removeClass('bill-error');
        $('#add_button-error').removeClass('display');
        $('#add_button-error').addClass('hider');
        return true;
     }
   }

   $('#add_button').keyup(function(){
   add_button();
 });

// function img_ban(){
//   if( document.getElementById("change_ban").files.length == 0 ){
//     $('#change_banner-error').removeClass('hider');
//         $('#change_banner-error').addClass('display');
//         return false;
// }
// else{
//     $('#change_banner-error').removeClass('display');
//         $('#change_banner-error').addClass('hider');
//         return true;
// }
// }

$('#section_banner').submit(function(){
  a=add_con();b=add_Small_Content();//c=add_button();
      if(a && b )
      {
        return true;
      }
      else
      {
        return false;
      }

});

function add_title_con1() {
     var e =$('#add_title_con1').val();
   if(e.length == 0 )
     {
        $('#add_title_con1').addClass('bill-error');
        $('#add_title_con1-error').removeClass('hider');
        $('#add_title_con1-error').addClass('display');
        return false;
     }
    else
     {
        $('#add_title_con1').removeClass('bill-error');
        $('#add_title_con1-error').removeClass('display');
        $('#add_title_con1-error').addClass('hider');
        return true;
     }
   }

   $('#add_title_con1').keyup(function(){
   add_title_con1();
 });


function add_title_con2() {
     var e =$('#add_title_con2').val();
   if(e.length == 0 )
     {
        $('#add_title_con2').addClass('bill-error');
        $('#add_title_con2-error').removeClass('hider');
        $('#add_title_con2-error').addClass('display');
        return false;
     }
    else
     {
        $('#add_title_con2').removeClass('bill-error');
        $('#add_title_con2-error').removeClass('display');
        $('#add_title_con2-error').addClass('hider');
        return true;
     }
   }

   $('#add_title_con2').keyup(function(){
   add_title_con2();
 });

function add_title_con3() {
     var e =$('#add_title_con3').val();
   if(e.length == 0 )
     {
        $('#add_title_con3').addClass('bill-error');
        $('#add_title_con3-error').removeClass('hider');
        $('#add_title_con3-error').addClass('display');
        return false;
     }
    else
     {
        $('#add_title_con3').removeClass('bill-error');
        $('#add_title_con3-error').removeClass('display');
        $('#add_title_con3-error').addClass('hider');
        return true;
     }
   }

   $('#add_title_con3').keyup(function(){
   add_title_con3();
 });

function add_title_con4() {
     var e =$('#add_title_con4').val();
   if(e.length == 0 )
     {
        $('#add_title_con4').addClass('bill-error');
        $('#add_title_con4-error').removeClass('hider');
        $('#add_title_con4-error').addClass('display');
        return false;
     }
    else
     {
        $('#add_title_con4').removeClass('bill-error');
        $('#add_title_con4-error').removeClass('display');
        $('#add_title_con4-error').addClass('hider');
        return true;
     }
   }

   $('#add_title_con4').keyup(function(){
   add_title_con4();
 });


function summary_con1() {
     var e =$('#summary_con1').val();
   if(e.length == 0 )
     {
        $('#summary_con1').addClass('bill-error');
        $('#summary_con1-error').removeClass('hider');
        $('#summary_con1-error').addClass('display');
        return false;
     }
    else
     {
        $('#summary_con1').removeClass('bill-error');
        $('#summary_con1-error').removeClass('display');
        $('#summary_con1-error').addClass('hider');
        return true;
     }
   }

   $('#summary_con1').keyup(function(){
   summary_con1();
 });

 
function summary_con1() {
     var e =$('#summary_con2').val();
   if(e.length == 0 )
     {
        $('#summary_con2').addClass('bill-error');
        $('#summary_con2-error').removeClass('hider');
        $('#summary_con2-error').addClass('display');
        return false;
     }
    else
     {
        $('#summary_con2').removeClass('bill-error');
        $('#summary_con2-error').removeClass('display');
        $('#summary_con2-error').addClass('hider');
        return true;
     }
   }

   $('#summary_con2').keyup(function(){
   summary_con2();
 });


function summary_con3() {
     var e =$('#summary_con3').val();
   if(e.length == 0 )
     {
        $('#summary_con3').addClass('bill-error');
        $('#summary_con3-error').removeClass('hider');
        $('#summary_con3-error').addClass('display');
        return false;
     }
    else
     {
        $('#summary_con3').removeClass('bill-error');
        $('#summary_con3-error').removeClass('display');
        $('#summary_con3-error').addClass('hider');
        return true;
     }
   }

   $('#summary_con3').keyup(function(){
   summary_con3();
 });


function summary_con4() {
     var e =$('#summary_con4').val();
   if(e.length == 0 )
     {
        $('#summary_con4').addClass('bill-error');
        $('#summary_con4-error').removeClass('hider');
        $('#summary_con4-error').addClass('display');
        return false;
     }
    else
     {
        $('#summary_con4').removeClass('bill-error');
        $('#summary_con4-error').removeClass('display');
        $('#summary_con4-error').addClass('hider');
        return true;
     }
   }

   $('#summary_con4').keyup(function(){
   summary_con4();
 });  

$('#image_content_section').submit(function(){

  a=add_title_con1();b=add_title_con2();c=add_title_con3();d=add_title_con4();
  e=summary_con1();f=summary_con1();g=summary_con1();h=summary_con1();
      if(a && b && c && d && e && f && g && h)
      {
        return true;
      }
      else
      {
        return false;
      }
});

function add_content_end() {
     var e =$('#add_content_end').val();
   if(e.length == 0 )
     {
        $('#add_content_end').addClass('bill-error');
        $('#add_content_end-error').removeClass('hider');
        $('#add_content_end-error').addClass('display');
        return false;
     }
    else
     {
        $('#add_content_end').removeClass('bill-error');
        $('#add_content_end-error').removeClass('display');
        $('#add_content_end-error').addClass('hider');
        return true;
     }
   }

   $('#add_content_end').keyup(function(){
   add_content_end();
 });

function add_btn_end() {
     var e =$('#add_btn_end').val();
   if(e.length == 0 )
     {
        $('#add_btn_end').addClass('bill-error');
        $('#add_btn_end-error').removeClass('hider');
        $('#add_btn_end-error').addClass('display');
        return false;
     }
    else
     {
        $('#add_btn_end').removeClass('bill-error');
        $('#add_btn_end-error').removeClass('display');
        $('#add_btn_end-error').addClass('hider');
        return true;
     }
   }

   $('#add_btn_end').keyup(function(){
   add_btn_end();
 });

$('#banner_section_end').submit(function(){

  a=add_btn_end();//b=add_content_end();
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
$(document).ready(function(){
function mail_con() {
     var e =$('#mail_con').val();
   if(e.length == 0 )
     {
        $('#mail_con').addClass('bill-error');
        $('#mail_con_error').removeClass('hider');
        $('#mail_con_error').addClass('display');
        return false;
     }
    else
     {
        $('#mail_con').removeClass('bill-error');
        $('#mail_con_error').removeClass('display');
        $('#mail_con_error').addClass('hider');
        return true;
     }
   }

   $('#mail_con').keyup(function(){
   mail_con();
 });
/*home pge validation*/
function green_bold() {
     var e =$('#green_bold').val();
   if(e.length == 0 )
     {
        $('#green_bold').addClass('bill-error');
        $('#green_bold_error').removeClass('hider');
        $('#green_bold_error').addClass('display');
        return false;
     }
    else
     {
        $('#green_bold').removeClass('bill-error');
        $('#green_bold_error').removeClass('display');
        $('#green_bold_error').addClass('hider');
        return true;
     }
   }

   $('#green_bold').keyup(function(){
   green_bold();
 });

function black_bold() {
     var e =$('#black_bold').val();
   if(e.length == 0 )
     {
        $('#black_bold').addClass('bill-error');
        $('#black_bold_error').removeClass('hider');
        $('#black_bold_error').addClass('display');
        return false;
     }
    else
     {
        $('#black_bold').removeClass('bill-error');
        $('#black_bold_error').removeClass('display');
        $('#black_bold_error').addClass('hider');
        return true;
     }
   }

   $('#black_bold').keyup(function(){
   black_bold();
 });

function sub_cont() {
     var e =$('#sub_cont').val();
   if(e.length == 0 )
     {
        $('#sub_cont').addClass('bill-error');
        $('#sub_cont_error').removeClass('hider');
        $('#sub_cont_error').addClass('display');
        return false;
     }
    else
     {
        $('#sub_cont').removeClass('bill-error');
        $('#sub_cont_error').removeClass('display');
        $('#sub_cont_error').addClass('hider');
        return true;
     }
   }

   $('#sub_cont').keyup(function(){
   sub_cont();
 });

function btn_contt() {
     var e =$('#btn_contt').val();
   if(e.length == 0 )
     {
        $('#btn_contt').addClass('bill-error');
        $('#btn_contt_error').removeClass('hider');
        $('#btn_contt_error').addClass('display');
        return false;
     }
    else
     {
        $('#btn_contt').removeClass('bill-error');
        $('#btn_contt_error').removeClass('display');
        $('#btn_contt_error').addClass('hider');
        return true;
     }
   }

   $('#btn_contt').keyup(function(){
   btn_contt();
 });
$('#img_ban_cont').submit(function(){

  a=green_bold();b=black_bold();c=sub_cont();//d=btn_contt();
      if(a && b && c)
      {
        return true;
      }
      else
      {
        return false;
      }
});

function how_it_head() {
     var e =$('#how_it_head').val();
   if(e.length == 0 )
     {
        $('#how_it_head').addClass('bill-error');
        $('#how_it_head_error').removeClass('hider');
        $('#how_it_head_error').addClass('display');
        return false;
     }
    else
     {
        $('#how_it_head').removeClass('bill-error');
        $('#how_it_head_error').removeClass('display');
        $('#how_it_head_error').addClass('hider');
        return true;
     }
   }

   $('#how_it_head').keyup(function(){
   how_it_head();
 });
$('#how_it').submit(function(){

  a=how_it_head();
      if(a)
      {
        return true;
      }
      else
      {
        return false;
      }
});

function cont1_head() {
     var e =$('#cont1_head').val();
   if(e.length == 0 )
     {
        $('#cont1_head').addClass('bill-error');
        $('#cont1_head_error').removeClass('hider');
        $('#cont1_head_error').addClass('display');
        return false;
     }
    else
     {
        $('#cont1_head').removeClass('bill-error');
        $('#cont1_head_error').removeClass('display');
        $('#cont1_head_error').addClass('hider');
        return true;
     }
   }

   $('#cont1_head').keyup(function(){
   cont1_head();
 });

function cont1_cont() {
     var e =$('#cont1_cont').val();
   if(e.length == 0 )
     {
        $('#cont1_cont').addClass('bill-error');
        $('#cont1_cont_error').removeClass('hider');
        $('#cont1_cont_error').addClass('display');
        return false;
     }
    else
     {
        $('#cont1_cont').removeClass('bill-error');
        $('#cont1_cont_error').removeClass('display');
        $('#cont1_cont_error').addClass('hider');
        return true;
     }
   }

   $('#cont1_cont').keyup(function(){
   cont1_cont();
 });
$('#add_content1').submit(function(){

  a=cont1_head();b=cont1_cont();
      if(a && b)
      {
        return true;
      }
      else
      {
        return false;
      }
});

function cont2_head() {
     var e =$('#cont2_head').val();
   if(e.length == 0 )
     {
        $('#cont2_head').addClass('bill-error');
        $('#cont2_head_error').removeClass('hider');
        $('#cont2_head_error').addClass('display');
        return false;
     }
    else
     {
        $('#cont2_head').removeClass('bill-error');
        $('#cont2_head_error').removeClass('display');
        $('#cont2_head_error').addClass('hider');
        return true;
     }
   }

   $('#cont2_head').keyup(function(){
   cont2_head();
 });

function cont2_cont() {
     var e =$('#cont2_cont').val();
   if(e.length == 0 )
     {
        $('#cont2_cont').addClass('bill-error');
        $('#cont2_cont_error').removeClass('hider');
        $('#cont2_cont_error').addClass('display');
        return false;
     }
    else
     {
        $('#cont2_cont').removeClass('bill-error');
        $('#cont2_cont_error').removeClass('display');
        $('#cont2_cont_error').addClass('hider');
        return true;
     }
   }

   $('#cont2_cont').keyup(function(){
   cont2_cont();
 });
$('#add_content2').submit(function(){

  a=cont2_head();b=cont2_cont();
      if(a && b)
      {
        return true;
      }
      else
      {
        return false;
      }
});

function cont3_head() {
     var e =$('#cont3_head').val();
   if(e.length == 0 )
     {
        $('#cont3_head').addClass('bill-error');
        $('#cont3_head_error').removeClass('hider');
        $('#cont3_head_error').addClass('display');
        return false;
     }
    else
     {
        $('#cont3_head').removeClass('bill-error');
        $('#cont3_head_error').removeClass('display');
        $('#cont3_head_error').addClass('hider');
        return true;
     }
   }

   $('#cont3_head').keyup(function(){
   cont3_head();
 });

function cont3_cont() {
     var e =$('#cont3_cont').val();
   if(e.length == 0 )
     {
        $('#cont3_cont').addClass('bill-error');
        $('#cont3_cont_error').removeClass('hider');
        $('#cont3_cont_error').addClass('display');
        return false;
     }
    else
     {
        $('#cont3_cont').removeClass('bill-error');
        $('#cont3_cont_error').removeClass('display');
        $('#cont3_cont_error').addClass('hider');
        return true;
     }
   }

   $('#cont3_cont').keyup(function(){
   cont3_cont();
 });
$('#add_content3').submit(function(){

  a=cont3_head();b=cont3_cont();
      if(a && b)
      {
        return true;
      }
      else
      {
        return false;
      }
});

function cont4_head() {
     var e =$('#cont4_head').val();
   if(e.length == 0 )
     {
        $('#cont4_head').addClass('bill-error');
        $('#cont4_head_error').removeClass('hider');
        $('#cont4_head_error').addClass('display');
        return false;
     }
    else
     {
        $('#cont4_head').removeClass('bill-error');
        $('#cont4_head_error').removeClass('display');
        $('#cont4_head_error').addClass('hider');
        return true;
     }
   }

   $('#cont4_head').keyup(function(){
   cont4_head();
 });

function cont4_cont() {
     var e =$('#cont4_cont').val();
   if(e.length == 0 )
     {
        $('#cont4_cont').addClass('bill-error');
        $('#cont4_cont_error').removeClass('hider');
        $('#cont4_cont_error').addClass('display');
        return false;
     }
    else
     {
        $('#cont4_cont').removeClass('bill-error');
        $('#cont4_cont_error').removeClass('display');
        $('#cont4_cont_error').addClass('hider');
        return true;
     }
   }

   $('#cont3_cont').keyup(function(){
   cont4_cont();
 });
$('#add_content4').submit(function(){

  a=cont4_head();b=cont4_cont();
      if(a && b)
      {
        return true;
      }
      else
      {
        return false;
      }
});

function slidd() {
     var e =$('#slidd').val();
   if(e.length == 0 )
     {
        $('#slidd').addClass('bill-error');
        $('#slidd_error').removeClass('hider');
        $('#slidd_error').addClass('display');
        return false;
     }
    else
     {
        $('#slidd').removeClass('bill-error');
        $('#slidd_error').removeClass('display');
        $('#slidd_error').addClass('hider');
        return true;
     }
   }

   $('#slidd').keyup(function(){
   slidd();
 });
$('#slid').submit(function(){

  a=slidd();
      if(a)
      {
        return true;
      }
      else
      {
        return false;
      }
});

function sec5_cont() {
     var e =$('#sec5_cont').val();
   if(e.length == 0 )
     {
        $('#sec5_cont').addClass('bill-error');
        $('#sec5_cont_error').removeClass('hider');
        $('#sec5_cont_error').addClass('display');
        return false;
     }
    else
     {
        $('#sec5_cont').removeClass('bill-error');
        $('#sec5_cont_error').removeClass('display');
        $('#sec5_cont_error').addClass('hider');
        return true;
     }
   }

   $('#sec5_cont').keyup(function(){
   sec5_cont();
 });
$('#sec5').submit(function(){

  a=sec5_cont();
      if(a)
      {
        return true;
      }
      else
      {
        return false;
      }
});

function sec6_cont1() {
     var e =$('#sec6_cont1').val();
   if(e.length == 0 )
     {
        $('#sec6_cont1').addClass('bill-error');
        $('#sec6_cont1_error').removeClass('hider');
        $('#sec6_cont1_error').addClass('display');
        return false;
     }
    else
     {
        $('#sec6_cont1').removeClass('bill-error');
        $('#sec6_cont1_error').removeClass('display');
        $('#sec6_cont1_error').addClass('hider');
        return true;
     }
   }

   $('#sec6_cont1').keyup(function(){
   sec6_cont1();
 });

function sec6_cont2() {
     var e =$('#sec6_cont2').val();
   if(e.length == 0 )
     {
        $('#sec6_cont2').addClass('bill-error');
        $('#sec6_cont2_error').removeClass('hider');
        $('#sec6_cont2_error').addClass('display');
        return false;
     }
    else
     {
        $('#sec6_cont2').removeClass('bill-error');
        $('#sec6_cont2_error').removeClass('display');
        $('#sec6_cont2_error').addClass('hider');
        return true;
     }
   }

   $('#sec6_cont2').keyup(function(){
   sec6_cont2();
 });
$('#sec6').submit(function(){

  a=sec6_cont1();//b=sec6_cont2();
      if(a)
      {
        return true;
      }
      else
      {
        return false;
      }
});

var myVar = setInterval(myTimer, 10000);
function myTimer() {
    $('#alert_successbydynamic').hide();
}

});

