<!DOCTYPE html>
<html>
<head>
	<title>Ajax Test</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$( document ).ready(function() {
	//alert('hi');
        var request = $.ajax({
        url: "email1",
       type: "get",
     datatype:'json'
   });
        request.done(function(msg){
          console.log(msg);
         var json=jQuery.parseJSON(msg);
    document.getElementById("provider").innerHTML = json[0]['PROVIDER SIGN UP MAIL']['content'];
        });
});
</script>
</head>
<body>
<h1>Welcome to RBS</h1>
<p id="provider"></p>


</body>
</html>