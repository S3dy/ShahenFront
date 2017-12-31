@extends('layouts.master1')
@section('title', 'Add Account Details')
@section('header')
  @include('providerheader')
   <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
   <script src="https://checkout.stripe.com/checkout.js"></script>
@endsection
@section('body')
<?php $a=Session::get('freelancer_name');?>
<div class="container pagepad ">
  <div class="row">
  @if(session('flag') ==1)
         <div class="alert alert-success ">
          <strong>Success!</strong> Your card details has been added!.
        </div>
  @endif
    @if(session('flag') ==2)
         <div class="alert alert-danger ">
          <strong>Oops!</strong> This account already exists.
        </div>
  @endif

  @if(session('message'))
         <div class="alert alert-danger ">
        <?php echo Session::get("message"); ?>
        </div>
  @endif
      @if(session('flag') ==3)
         <div class="alert alert-danger ">
          <strong>Sorry!</strong> Invalid Request.
        </div>
  @endif

  <?php
  $object=$users; 
  ?>

    <div class="col-md-12">
        <h1 class="contact-h1 contact-m-bottom post-heading">Add a Account details</h1>
        <form id="add_account_details" name="freelancer_add_account" action="ProviderAddAccountDetails" enctype="multipart/form-data" method="post">
        <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php echo $a ?>">
        <input type="hidden" name="customerid" value="<?php echo $object['customerid'] ?>">
        <div class="card card-block m-0 contact-cust-card">

            <h3 class="post-h3 contact-m-bottom">Payment Information</h3>
            <div class="row">

        <div class="col-md-9">
        <div>
          <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">First Name</label>
                </div>

            </div>


            <div class="row">
                <div class="col-md-9">
                <div class="post-m-b-50">
                    <input type="text" class="post-input currency" name="firstName" value="{{$object['AccountDetails']['firstname']}}" id="holderf_name">
                </div>
                </div>
            </div>
            <span class="hider post-error error-color" id="holderf_name_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please enter "First Name".</span>
            </div>
          <div>
          <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">Last Name</label>
                </div>

            </div>


            <div class="row">
                <div class="col-md-9">
                <div class="post-m-b-50">
                    <input  type="text" class="post-input country" name="lastName" value="{{$object['AccountDetails']['lastname']}}"  id="holderl_name">
                </div>
                </div>
            </div>
            <span class="hider post-error error-color" id="holderl_name_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please enter "Last Name".</span>
            </div>
            <div>
          <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">Date Of Birth</label>
                </div>

            </div>
            <div class="row">
                <div class="col-md-7">
                <div class="post-m-b-50">
                  <div class="row">
                    <div class="col-md-2">
                      <input type="text" class="post-input holder_name Numeric" name="date" minlength="2" maxlength="2"  id="dob_date" value="{{$object['AccountDetails']['date']}}">
                    </div>
                    <div class="col-md-2">
                      <input type="text" class="post-input holder_name Numeric" name="month" minlength="2" maxlength="2"  id="dob_month" value="{{$object['AccountDetails']['month']}}">
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="post-input holder_name Numeric" name="year" minlength="4" maxlength="4"  id="dob_year" value="{{$object['AccountDetails']['year']}}">
                    </div>
                  </div>
                </div>
                </div>
            </div>
            <span class="hider post-error error-color" id="dob_error" ><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please enter "Date Of Birth".</span>
            </div>
          <div>
          <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">Personal Id Number</label>
                </div>

            </div>


            <div class="row">
                <div class="col-md-9">
                <div class="post-m-b-50">
                    <input type="text" class="post-input holder_name Numeric" name="personalId" minlength="9" maxlength="9"  id="personal_id" oninput="maxLengthCheck(this)" value="{{$object['AccountDetails']['personalId']}}">
                </div>
                </div>
            </div>
            <span class="hider post-error error-color" id="personal_id_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please enter "Personal Id Number".</span>
            </div>
            <div>
          <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">SSN Number(Last 4 Digit)</label>
                </div>

            </div>


            <div class="row">
                <div class="col-md-2">
                <div class="post-m-b-50">
                    <input  type="text"  class="post-input routing_number Numeric" name="ssnNumber"  id="ssn_number" minlength="4" maxlength="4" oninput="maxLengthCheck(this)" value="{{$object['AccountDetails']['ssnNumber']}}">
                </div>
                </div>
            </div>
            <span class="hider post-error error-color" id="ssn_number_error" ><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please enter "SSN Number".</span>
            </div>
            

          <div class="row">
             <div class="col-md-3">
                <label class="project-label" style="margin-bottom: 20px;">Business Type</label>
                 <input type="hidden" name="type" id="categoryname" value="individual" >
                 <div class="dropdown pull-left mminus" style="margin-bottom: 50px!important;">
                            <button id="category_select" type="button" class="proselect" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                                <span class="pull-left mintext selectedcategory1" id="selectedcategory">inidividual</span>
                                <span class="pull-right marrow"><i class="namesection fa fa-angle-down" aria-hidden="true"></i></span>
                            </button>

                            <ul  class="dropdown-menu cmenu " aria-labelledby="category_select">
                              <li onclick="changecategory('individual')">Individual</li>
                              <li onclick="changecategory('company')">company</li>
                            </ul>
                  </div>
             </div> 
          </div>    


          <div>
              <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">Address</label>
                </div>

            </div>
            <div class="row">
                <div class="col-md-9">
                <div class="post-m-b-50">
                    <input type="text"   class="post-input account_number" name="address"   id="holder_address" value="{{$object['AccountDetails']['address']}}">
                </div>
                </div>
            </div>
            <span class="hider post-error error-color"  id="holder_address_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please enter "Address".</span>

            </div>
            <div>
              <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">Postal Number</label>
                </div>

            </div>
            <div class="row">
                <div class="col-md-2">
                <div class="post-m-b-50">
                    <input type="text"   class="post-input account_number Numeric" name="postal" maxlength="5" minlength="5" id="postal" oninput="maxLengthCheck(this)" value="{{$object['AccountDetails']['postal']}}">
                </div>
                </div>
            </div>
            <span class="hider post-error error-color"  id="postal_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please enter "Postal Number".</span>

            </div>        

            <div>
              <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">City</label>
                </div>

            </div>
            <div class="row">
                <div class="col-md-9">
                <div class="post-m-b-50">
                    <input type="text"   class="post-input account_number" name="city"   id="holder_city" value="{{$object['AccountDetails']['city']}}">
                </div>
                </div>
            </div>
            <span class="hider post-error error-color"  id="holder_city_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please enter "City".</span>
            </div>
            <div>
              <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">State</label>
                </div>

            </div>
            <div class="row">
                <div class="col-md-9">
                <div class="post-m-b-50">
                    <input type="text"   class="post-input account_number" name="state"   id="holder_state" value="{{$object['AccountDetails']['state']}}">
                </div>
                </div>
            </div>
            <span class="hider post-error error-color"  id="holder_state_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please enter "State".</span>


             <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">Country</label>
                </div>

            </div>
            <div class="row">
                <div class="col-md-9">
                <div class="post-m-b-50">
                    <input type="text"   class="post-input account_number" name="country"   id="holder_country" value="{{$object['AccountDetails']['country']}}">
                </div>
                </div>
            </div>
            <span class="hider post-error error-color"  id="holder_country_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please enter "Country".</span>

             <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">Identity Document</label>
                </div>

            </div>
             <div class="post-b-m-40">
                <div class="row">
                <div class="col-md-12 ">
                  <label class="post-label offer-b-10">
                    <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                    <span class="post-attach" id="triggerfile">Attach file</span>
                    <span id="filename"></span>
                  </label>
                  <div>The file can be upto 8 Mb in size (File should be in JPEG or PNG)</div>
                </div>
            </div>
            </div>
            <span class="hider post-error error-color"  id="holder_file_error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>Please Upload "file".</span>
             <input type="file" name="idfile" id="idfile" style="display:none !important;" />
 
            </div>
          </div>


            </div>
            </div>
        <div class="card card-block m-0 contact-cust-card myjob_b_80">
            <div class="row">
              <span class="offer-m-15">
                  <input type="submit" id="add_card" class="cust-btn-primary btn text-capitalize m-0 retpass post-end add_card" value="Add Card">
              </span>
              <span class="bill-p"><a href="{{ URL::asset('/billingmethod')}}" class="bill-a-size">Cancel</a></span>
            </div>
        </div>
        </form>
    </div>
  </div>
</div>

<script type="text/javascript">
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
<script type="text/javascript">
// // $(document).ready(function() {
// //     $('.add_card').bind("click",function() 
// //     { 
// //         var imgVal = $('#idfile').val(); 
// //         if(imgVal=='') 
// //         { 
// //             alert("empty input file"); 

// //         } 
// //         return false; 

// //     }); 
// });
</script> 
@endsection


@section('footer')

   <!-- <script type="text/javascript" >
       
      $(function() {

         $('#errors').hide();

        

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
    </script> -->

  <script>
     $( document ).ready(function() {
       var request = $.ajax({
         url: "{{URL('/')}}/footer" ,
       type: "GET",       
    });
    request.done(function(msg){
       $('#dynamicfooter').html(msg);
   });

    $('#triggerfile').click(function(){

      $('#idfile').click();
      $('#idfile').change(function(e){
          var fileName = e.target.files[0].name;
          $('#filename').html(fileName);
      });
      
    });

});


  </script>
  <div id="dynamicfooter"></div>
@endsection
