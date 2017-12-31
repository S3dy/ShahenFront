<html>
  <head>
    <link href="{{ URL::asset('public/css/bootstrap.min.css')}}	" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/css/ng-img-crop.css')}}">
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery-1.12.4.js')}}" /></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js')}}" /></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/angular.min.js')}}" /></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/ng-img-crop.js')}}" /></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery-ui.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/script.js')}}" /></script>
     <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <link rel="icon" href="{{URL::asset('public/images/favicon.ico')}}"  />
    <link rel="stylesheet" href="{{URL::asset('public/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/css/font.css')}}">
    <link rel="preload" href="{{URL::asset('public/css/font-async.css')}}" as="style" onload="this.rel='stylesheet'"  />
    <noscript><link rel="stylesheet" href="{{URL::asset('public/css/font-async.css')}}"  /></noscript>
    <link href="{{URL::asset('public/css/app.css')}}" rel="stylesheet" />
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  </head>
  <body>

       <div class="container" style="margin-top:40px">
       		<div class="row">
       			 <div class="col-md-4 col-md-offset-4">
       			 <form id="payment-form" action="{{URL('/')}}/createbankaccount" method="post" >
       			 <input type ="hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
       			 		<input type="text" class="form-control country"  min="2" max="2" value ="US" placeholder="country" disabled="disabled"> <br>
       			 		<input type="text" class="form-control currency"  min="3" max="3" value = "USD"  placeholder="currency" disabled="disabled"> <br>
       			 		<input type="text" class="form-control routing-number"  placeholder="routing number (optional)"  value="110000000"> <br>
       			 		<input type="text" class="form-control account-number"  value="000123456789" placeholder="account number" > <br>
       			 		<input type="text" class="form-control name"  value="Adi" placeholder="account holder name" > <br>
       			 		<select name="type" class="account_holder_type"> 
       			 			<option selected="selected">Individual</option>
       			 			<option>Company</option>
       			 		</select><br>
       			 		<input type="submit" value="submit" class="submit" >
       			 </form>
       			 </div>
       		</div>
       </div>
  </body>
    <script type="text/javascript" >
   		 
    	$(function() {

    		var $form = $('#payment-form');
			  $form.submit(function(event) {

			    
				$form.find('.submit').prop('disabled', true);
				
				Stripe.setPublishableKey('{{env('publishable_key')}}'); 
    			Stripe.bankAccount.createToken({
					  country: $('.country').val(),
					  currency: $('.currency').val(),
					  routing_number: $('.routing-number').val(),
					  account_number: $('.account-number').val(),
					  account_holder_name: $('.name').val(),
					  account_holder_type: $('.account_holder_type').val()
			   }, stripeResponseHandler);

			    return false;
		  		
		  		
		  });

	 });

    	
 
    

  		function stripeResponseHandler(status, response) {
   		console.log(response);
		  // Grab the form:
		  var $form = $('#payment-form');

		  if (response.error) { // Problem!

		    // Show the errors on the form:
		    $form.find('.bank-errors').text(response.error.message);
		    $form.find('button').prop('disabled', false); // Re-enable submission

		  } else { // Token created!

		    // Get the token ID:
		    var token = response.id;

		    // Insert the token into the form so it gets submitted to the server:
		    $form.append($('<input type="hidden" name="stripeToken" />').val(token));

		    console.log(token);
		    // Submit the form:
		   $form.get(0).submit();

		  }
		}
  	</script>
</html>