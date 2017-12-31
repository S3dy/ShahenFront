<html>
  <head>
  </head>
  <body> 
     <form method="post" action="{{URL('/')}}/testerfile" enctype="multipart/form-data">
        <input type="file" name="file" >
        <input type ="hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="submit" value="submit">
     </form>
  </body>
</html>