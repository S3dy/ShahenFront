@extends('layouts.masterforfreelancer')
@section('title', 'Add a Account Details')
@section('header')
  @include('providerheader')
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script src="https://checkout.stripe.com/checkout.js"></script>
@endsection
@section('body')
<?php $a=Session::get('provider_name');?>
<div class="container pagepad ">
  <div class="row">
  @if($flag==1)
         <div class="alert alert-success ">
          <strong>Success!</strong> Your card details has been added!.
        </div>
  @endif
    @if($flag==2)
         <div class="alert alert-danger ">
          <strong>Oops!</strong> This account already exists.
        </div>
  @endif

      <div class="alert alert-warning hide" id="errors">
         <strong>Warning!  &nbsp;&nbsp;</strong><span id="errormessage"></span>
     </div>

    <div class="col-md-12">




        <h1 class="contact-h1 contact-m-bottom post-heading">Add a Account details</h1>
        <form id="add_bill_card" name="freelancer_add_card" action="{{ URL::asset('/provideraddcard') }}" method="post">
        <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php echo $a ?>">
        <div class="card card-block m-0 contact-cust-card">

            <h3 class="post-h3 contact-m-bottom">Payment Information</h3>
            <div class="row">

        <div class="col-md-9">
        <div>
          <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">Currency</label>
                </div>

            </div>


            <div class="row">
                <div class="col-md-9">
                <div class="post-m-b-50">
                    <input type="text" class="post-input currency" name="currency" disabled="disabled" value="USD"   id="currency">
                    
                </div>
                </div>
            </div>
            </div>
          <div>
          <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">Bank Country</label>
                </div>

            </div>


            <div class="row">
                <div class="col-md-9">
                <div class="post-m-b-50">
                    <input  type="text" class="post-input country" name="country"  disabled="disabled" value="US"  id="bank_country">
                    
                </div>
                </div>
            </div>
            </div>
          <div>
          <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">Account Holder Name</label>
                </div>

            </div>


            <div class="row">
                <div class="col-md-9">
                <div class="post-m-b-50">
                    <input type="text" class="post-input holder_name" name="holder_name" minlength="3" maxlength="30"  id="holder_name">
                </div>
                </div>
            </div>
            <span class="hider post-error error-color" id="holder_name_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please enter "Holder Name".</span>
            </div>
            <div>
          <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">Account Holder Type</label>
                </div>

            </div>
            <div class="row">
                <div class="col-md-9">
                <div class="post-m-b-50">
                    <select name="holder_type"  class="bill-select holder_type"   id="holder_type">
                         <option value="company" selected="selected">Company</option>
                         <option value="individual">Individual</option>
                      </select>
                </div>
                </div>
            </div>
            </div>
            <div>
          <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">Routing Number</label>
                </div>

            </div>


            <div class="row">
                <div class="col-md-9">
                <div class="post-m-b-50">
                    <input  type="text"  class="post-input routing_number" name="routing_number"  id="routing_number" max="9">
                </div>
                </div>
            </div>
            <span class="hider post-error error-color" id="routing_number_error" ><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please enter "Routing Number".</span>
            </div>
            <div>
              <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">Account Number</label>
                </div>

            </div>


            <div class="row">
                <div class="col-md-9">
                <div class="post-m-b-50">
                    <input type="text"   class="post-input account_number" name="account_number"   id="account_number">
                </div>
                </div>
            </div>
            <span class="hider post-error error-color"  id="account_number_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please enter "Account Number".</span>

            </div>
          </div>


            </div>
            </div>
        <div class="card card-block m-0 contact-cust-card myjob_b_80">
            <div class="row">
              <span class="offer-m-15">
                  <input type="submit" id="add_card" class="cust-btn-primary btn text-capitalize m-0 retpass post-end" value="Add Card">
              </span>
              <span class="bill-p"><a href="{{ URL::asset('/providerbilling')}}" class="bill-a-size">Cancel</a></span>
            </div>


        </div>


        </form>
    </div>
  </div>
</div>

<script type="text/javascript" >
       
      $(function() {


        

        var $form = $('#add_bill_card');


        $form.submit(function(event) {

          
        $form.find('.submit').prop('disabled', true);
       
       Stripe.setPublishableKey('{{env('publishable_key')}}'); 
          Stripe.bankAccount.createToken({
            country: $('.country').val(),
            currency: $('.currency').val(),
            routing_number: $('.routing_number').val(),
            account_number: $('.account_number').val(),
            account_holder_name: $('.holder_name').val(),
            account_holder_type: $('.holder_type').val()
         }, stripeResponseHandler);

          return false;
          
          
      });

   });

      
 
    

      function stripeResponseHandler(status, response) {
      console.log(response);
      // Grab the form:


      var $form = $('#add_bill_card');

      if (response.error) { // Problem!

        // Show the errors on the form:

        $('#errormessage').html(response.error.message);
        $('#errors').show();
        $form.find('button').prop('disabled', false); // Re-enable submission

      } else { // Token created!

        // Get the token ID:
        var token = response.id;

        // Insert the token into the form so it gets submitted to the server:
        $form.append($('<input type="hidden" name="token" />').val(token));

        console.log(token);
        // Submit the form:
       $form.get(0).submit();

      }
    }
    </script>


<script>
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
  a=holdername();b=routing_number();c=account_number();
      if(a && b && c)
      {
        return true;
      }
      else
      {
        return false;
      }
});
</script>
@endsection


@section('footer')
  <script>
     $( document ).ready(function() {
       var request = $.ajax({
         url: "{{URL('/')}}/footer" ,
       type: "GET",       
    });
    request.done(function(msg){
       $('#dynamicfooter').html(msg);
   });
});
  </script>
  <div id="dynamicfooter"></div>
@endsection
