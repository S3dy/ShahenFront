<html lang="en">
<head>
<meta charset="UTF-8">
    <link href="{{ URL::asset('public/css/bootstrap.min.css')}}	" rel="stylesheet" />	
    <link rel="icon" href="{{URL::asset('public/images/favicon.ico')}}"  />
    <link rel="stylesheet" href="{{URL::asset('public/css/font-awesome.min.css')}}">
    <style>
		.pay-img{
			    opacity: 0.5;
    filter: alpha(opacity=50); 
		}

		input[type="number"]::-webkit-outer-spin-button,
		input[type="number"]::-webkit-inner-spin-button {
		    -webkit-appearance: none;
		    margin: 0;
		}
		input[type="number"] {
		    -moz-appearance: textfield;
		}
	</style>
</head>

<body style="background-color: #f9f9f9";>
	<div class="container" style="margin-top:100px;">
		<div class='row'>
			<div class='col-md-4'></div>
			<div class='col-md-4'>

				<center><h3>Payment Process</h3></center>		
				<br><br>	
				<script src='https://js.stripe.com/v2/' type='text/javascript'></script>
				<form accept-charset="UTF-8" action="{{URL('/')}}/providerpayment" class="require-validation"
					data-cc-on-file="false"
					data-stripe-publishable-key="{{env('publishable_key')}}"
					id="payment-form" method="post">
					{{ csrf_field() }}
					<div class='form-row'>
						<div class='col-xs-12 form-group required'>
							<label class='control-label'>Name on Card</label> <input
								class='form-control' maxlength="30" type='text'>
						</div>
					</div>
					<div class='form-row'>
						<div class='col-xs-12 form-group card required'>
							<label class='control-label'>Card Number</label> <input
								autocomplete='off' oninput="maxLengthCheck(this)" class='form-control card-number Numeric numspinner' maxlength="16" minlength="16"
								type='text'>
						</div>
					</div>
					<div class='form-row'>
						<div class='col-xs-12 form-group card required'>
							<label class='control-label'>Amount</label> <input
								autocomplete='off' oninput="maxLengthCheck(this)" class='form-control card-number Numeric numspinner' maxlength="9" minlength="1"
								type='text' name="payamount">
						</div>
					</div>
					<div class="form-row">
					 <div class="row" style="padding-left:15px;padding-bottom:10px;">
					   <div class="col-md-2">
				   			<img src="{{asset('public/images/icon-cc-visa.png')}}"  >
					   </div>
					   <div class="col-md-2">
					   		<img src="{{asset('public/images/icon-cc-mastercard.png')}}"  >
					   </div>
					   <div class="col-md-2">
					   		<img src="{{asset('public/images/icon-cc-discover.png')}}" >
					   </div>
					   <div class="col-md-2">
					   		<img src="{{asset('public/images/icon-cc-amex.png')}}" >
					   </div>
					   <div class="col-md-4">
					   </div>
					   </div>
					</div>
					<div class='form-row clear-fix'>
						<div class='col-xs-4 form-group cvc required'>
							<label class='control-label'>CVC</label> <input
								autocomplete='off' class='form-control card-cvc Numeric' oninput="maxLengthCheck(this)"
								placeholder='ex. 311' minlength="3" maxlength="4" type='number'>
						</div>
						<div class='col-xs-4 form-group expiration required'>
							<label class='control-label'>Expiration</label> <input
								class='form-control card-expiry-month Numeric' placeholder='MM' oninput="maxLengthCheck(this)" minlength="2" maxlength="2" type='number'>
						</div>
						<div class='col-xs-4 form-group expiration required'>
							<label class='control-label'> </label> <input
								class='form-control card-expiry-year Numeric' placeholder='YYYY' oninput="maxLengthCheck(this)"
								 minlength="3" maxlength="4" type='number'>
						</div>
					</div>
					<input type="hidden" name="bidvalue" id="bidval" value="{{$bidvalue}}">
					<input type="hidden" name="jobid" id="jobname" value="{{$jobid}}">
					<input type="hidden" name="proposalid" id="proposalid" value="{{$proposalid}}">
					<input type="hidden" name="freelancerid" id="freelancerid" value="{{$freelancerid}}">
					<div class='form-row'>
						<div class='col-md-12 form-group'>
							<button class='form-control btn btn-primary submit-button'
								type='submit' style="margin-top: 10px;">Pay »</button>
						</div>
					</div>
					<div class='form-row'>
						<div class='col-md-12 error form-group hide'>
							<div class='alert-danger alert'>Please correct the errors and try
								again.</div>
						</div>
					</div>
				</form>
				@if ((Session::has('success-message')))
				<div class="alert alert-success col-md-12">{{
					Session::get('success-message') }}</div>
				@endif @if ((Session::has('fail-message')))
				<div class="alert alert-danger col-md-12">{{
					Session::get('fail-message') }}</div>
				@endif
			</div>
			<div class='col-md-4'></div>
		</div>
	</div>
	 <script type="text/javascript" src="{{ URL::asset('public/js/jquery-1.12.4.js')}}" /></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js')}}" /></script>
    <script type="text/javascript" src="{{URL::asset('public/js/jquery.payment.min.js')}}" ></script>

	<script>
		


		$(function() {
			  $('form.require-validation').bind('submit', function(e) {
			    var $form         = $(e.target).closest('form'),
			        inputSelector = ['input[type=email]', 'input[type=password]',
			                         'input[type=text]', 'input[type=file]',
			                         'textarea'].join(', '),
			        $inputs       = $form.find('.required').find(inputSelector),
			        $errorMessage = $form.find('div.error'),
			        valid         = true;

			    $errorMessage.addClass('hide');
			    $('.has-error').removeClass('has-error');
			    $inputs.each(function(i, el) {
			      var $input = $(el);
			      if ($input.val() === '') {
			        $input.parent().addClass('has-error');
			        $errorMessage.removeClass('hide');
			        e.preventDefault(); // cancel on first error
			      }
			    });
			  });
			});

			$(function() {
			  var $form = $("#payment-form");


			  $form.on('submit', function(e) {
			    if (!$form.data('cc-on-file')) {
			      e.preventDefault();
			      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
			      Stripe.createToken({
			        number: $('.card-number').val(),
			        cvc: $('.card-cvc').val(),
			        exp_month: $('.card-expiry-month').val(),
			        exp_year: $('.card-expiry-year').val()
			      }, stripeResponseHandler);
			    }
			  });

			  function stripeResponseHandler(status, response) {
			    if (response.error) {
			      $('.error')
			        .removeClass('hide')
			        .find('.alert')
			        .text(response.error.message);
			    } else {
			      // token contains id, last4, and card type
			      var token = response['id'];
			      // insert the token into the form so it gets submitted to the server
			      $form.find('input[type=text]').empty();
			      $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
			      $form.get(0).submit();
			    }
			  }
			})

			function maxLengthCheck(object) {
     			if (object.value.length > object.maxLength)
      			object.value = object.value.slice(0, object.maxLength)
  			}
  			$('.Numeric').bind('keydown',function(e){
   				if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
                // Allow: Ctrl+V
                (event.ctrlKey == true && (event.which == '118' || event.which == '86')) ||  
                // Allow: Ctrl+c
                (event.ctrlKey == true && (event.which == '99' || event.which == '67')) || 
                // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
       			})
		</script>
</body>
</html>
