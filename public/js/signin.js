$(document).ready(function(){
   
   $('#fname').change(function(){
   	 var e =$('#fname').val();
 	 if(e.length == 0 ){
        $('#f').removeClass('hider');
        $('#f').addClass('display');
     }
 });
    
});