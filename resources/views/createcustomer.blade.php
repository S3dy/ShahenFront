<html>
  <head>
  </head>
  <body>
  @php \Stripe\Stripe::setApiKey($env('secret_key')) @endphp
  		<form action="{{URL('/')}}/charger" method="post">
 	      
         <script src="https://checkout.stripe.com/checkout.js" 
          data-key="{{env('publishable_key')}}"
          data-description="Access for a year"
          data-amount="5000"
          data-locale="auto"></script>

          <input type ="hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
          
          <input type="submit" value="good">
 </form>

  </body>
</html>