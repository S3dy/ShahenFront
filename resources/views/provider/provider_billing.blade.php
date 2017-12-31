@extends('layouts.masterforfreelancer')
@section('title', 'Billing Method')
@section('header')
  @include('providerheader')
@endsection
@section('body')
<div class="container container-padding-change provprofcon1 ">
    @if(session('flags'))
    @if(session('flags') == "1")
<div class="alert alert-success" role="alert">
  <a href="#" class="alert-link">Account Details added</a>
</div>
@endif
@endif
<?php $json1=$users1
?>
  <div class="row">
    <div class="col-md-3">
     <ul>
      <li class="sidecolor "><span class="fa fa-user-o providericon" aria-hidden="true"></span><span class="sidename"><a href="{{ URL::asset('/providerprofile') }}">My Info</a></span></li>
      <li class="sidecolor active"><span class="fa fa-credit-card providericon" aria-hidden="true"></span><span class="sidename"><a href="{{ URL::asset('/providerbilling') }}">Billing Methods</a></span></li>
      <li class="sidecolor"><span  class="fa fa-unlock-alt providericon" aria-hidden="true"></span><span class="sidename"><a href="{{ URL::asset('/providerchangepassword') }}">Change Password</a></span></li>
      
      </ul>
    </div>
    <div class="col-md-9">
    @if($flags==1)
    <?php
                $json = $users;
                $obj = json_decode($json,true);
                $max=sizeof($obj);
                $i=0;
                $j=0;
                $a=0;
                $b=0;
                while($j<$max){
                  if($obj[$j]['flags']==1) $a=1;
                  else $b=0;
                  $j++;
                }
     ?>
    <?php if($a == 0 & $b == 0 & $max !=0){ ?>
        <div class="alert alert-danger ">
          Please make default your account.
        </div>
    <?php } ?>
    @endif

        <h1 class="contact-h1 contact-m-bottom" >Billing Methods</h1>
        <div class="profile-m-bottom">
         @if($acct!="false")
        <span>
          <input type="button" id="" class="cust-btn-bill btn text-capitalize m-0 retpass bill-m-10" value="Add Billing Method" data-toggle="modal" data-target="#bill">
        </span>
        @endif
        @if($acct=="false")
        <span class="span_pad">
          <a href="{{ URL::asset('/provider_add_account')}}" class="cust-btn-bill btn text-capitalize m-0 retpass bill-m-10">Add Account Details</a>
        </span>
        @elseif($json1['AccountDetails']['message']!="verified")
        <span class="span_pad">
          <a href="{{ URL::asset('/providereditaccount')}}" class="cust-btn-bill btn text-capitalize m-0 retpass bill-m-10">Edit Account Details</a>
        </span>
        @endif
        <table>
                   
          <tr>
            <th class=" text-center bill-table">Set Default</th>
            <th class=" text-center bill-table">Account Holder Name</th>
            <th class=" text-center bill-table">Account Number</th>
          </tr>
          @if($flags==1)
              <?php
                while($i<$max){
              ?>
          <tr>
          <form action="providermakedefault" method="post">
          <td class="bill-pad-t-b text-center"><input type="submit" <?php if($obj[$i]['flags']==1){ ?> value="Default" disabled  <?php } else{ ?>  value="Make Default"  <?php } ?> id="add_card" class="edit_btn btn btn-success foot_p foot_bt bor_rad" style="border-radius: 1px!important;"></td>
          <td class="bill-pad-t-b text-center"><?php print $obj[$i]['holder_name']?></td>
          <td class="bill-pad-t-b text-center"><?php print $obj[$i]['account_number']?></td></tr>
          <input type="hidden" name="acc_no" id="acc_no{{$i}}" value="{{$obj[$i]['account_number']}}">
          <input type="hidden" name="acc_id" id="acc_id{{$i}}" value="{{$obj[$i]['accountid']}}">
          <input type ="hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
          </form>
              <?php
                $i++; } ?>
            @endif
            @if($max==0)
          
          <tr>
          <td class="text-center bill-pad-t-b"></td>
          <td class="text-center bill-pad-t-b">No Billing method set up yet</td>
          <td class="text-center bill-pad-t-b"></td></tr>
            @endif
            </table>
        </div>

      <div class="modal fade bckcolor" id="bill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title bill-font" id="otherexLabel"> Add Billing Method</h2>
      </div>
      <div class="modal-body modalport">
      <div class="row  contact-m-bottom">
        <div class="col-md-3">
          <span><i class="fa fa-credit-card bill-icon" aria-hidden="true"></i></span>
        </div>
        <div class="col-md-5">
          <span class="bill-pad-t-b">Bank Accounts</span>
        </div>
        <div class="col-md-3">
         <form action="{{URL('/')}}/createprovider" method="post">
             <script src="https://checkout.stripe.com/checkout.js" 
              data-key="{{env('publishable_key')}}"
              data-description="Access for a year"
              data-amount="5000"
              data-locale="auto"></script>
              <input type ="hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
              <span><input type="submit" class="cust-btn-bill btn text-capitalize m-0 retpass bill-m-10" value="Set Up"></span>
          </form>
        </div>
      </div>
         </div>

    </div>
  </div>
</div>



  </div>
</div>

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

