@extends('layouts.masterforfreelancer')
@section('title', 'Billing Method')
@section('header')
  @include('freelancerheader')
@endsection
@section('body')


<div class="container container-padding-change ">
    @if(session('flags'))
    @if(session('flags') == "1")
<div class="alert alert-success" role="alert">
  <a href="#" class="alert-link">Account Details added</a>
</div>
@endif
@endif
  <div class="row">
    <div class="col-md-3 m-t-10">
      <h4 class="contact-h4">Billing</h4>
      <ul class="contact-ul">
        <li class="active"><a href="#" class="contact-a">Billing Methods</a></li>
      </ul>

      <h4 class="contact-h4">User Settings</h4>
      <ul class="contact-ul">

        <li><a href="{{ URL::asset('/myprofile/')}}" class="contact-a">My Profile</a></li>
        <li><a href="{{ URL::asset('/ProfileSession')}}" class="contact-a">Profile Settings</a></li>
        <li><a href="{{ URL::asset('freelancerchangepassword')}}" class="contact-a">Change Password</a></li>
      </ul>
    </div>
    <div class="col-md-9 billing-height">
              @if($flags==1)
    <?php
                $json = $users;
                $json1=$users1;
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
         @if(session('flag'))
        @if(session('flag') == 5)
       <div class="alert alert-danger ">
          <strong>Oops!</strong> Please update your bank account details before proceed.
        </div>
        @endif
        @endif
    <?php if($a == 0 & $b == 0 & $max !=0){ ?>
        <div class="alert alert-danger ">
          Please make default your account.
        </div>
    <?php } ?>
    @endif

        <h1 class="contact-h1 contact-m-bottom">Billing Methods</h1>
        <div class="profile-m-bottom">
        @if($acct!="false")
        <span>
          <input type="button" id="" class="cust-btn-bill btn text-capitalize m-0 retpass bill-m-10" value="Add Billing Method" data-toggle="modal" data-target="#bill">
        </span>
        @elseif($acct=="false")
        <span class="span_pad">
          <a href="{{ URL::asset('/add_account')}}" class="cust-btn-bill btn text-capitalize m-0 retpass bill-m-10">Add Account Details</a>
        </span>
        @elseif($json1['AccountDetails']['message']!="verified")
        <span class="span_pad">
          <a href="{{ URL::asset('/freelancereditaccount')}}" class="cust-btn-bill btn text-capitalize m-0 retpass bill-m-10">Edit Account Details</a>
        </span>
        @endif
        <table>
          
          <tr>
            <th class="text-center bill-table">Set Default</th>
            <th class="text-center bill-table">Account Holder Name</th>
            <th class="text-center bill-table">Account Number</th>
          </tr>
          @if($flags==1)
              <?php
                while($i<$max){
              ?>
          <tr>
          <form action="makedefault" method="post">
          <td class="text-center bill-pad-t-b"><input type="submit" <?php if($obj[$i]['flags']==1){ ?> value="Default" disabled  <?php } else{ ?>  value="Make Default"  <?php } ?>  id="add_card" class="edit_btn btn btn-success foot_p foot_bt bor_rad" style="border-radius: 1px!important;" ></td>
          <td class="text-center bill-pad-t-b"><?php print $obj[$i]['holdername']?></td>
          <td class="text-center bill-pad-t-b"><?php print $obj[$i]['accountnumber']?></td></tr>
          <input type="hidden" name="acc_no" id="acc_no{{$i}}" value="{{$obj[$i]['accountnumber']}}">
          <input type="hidden" name="cust_id" id="cust_id{{$i}}" value="{{$obj[$i]['accountid']}}">
          <input type ="hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
          </form>
              <?php
                $i++; } ?>
            @endif
            @if($max==0)
          <tr>
          <td class="text-center bill-pad-t-b"></td>
          <td class="text-center bill-pad-t-b">No Card details</td>
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
        <div class="col-md-2">
          <span><i class="fa fa-credit-card bill-icon" aria-hidden="true"></i></span>
        </div>
        <div class="col-md-7 debitcard">
          <span class="bill-pad-t-b">Bank details</span>
        </div>
        <div class="col-md-3 setup">

         <form action="{{URL('/')}}/setup" method="post">
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
<script>
  function make_default1(i){
   //alert(i);
    var a=$('#acc_no'+i).val();
    var b=$('#cust_id'+i).val();
    //alert(b);
           var request = $.ajax({
         url: "{{URL('/')}}/make_default" ,
       type: "post", 
       data: {"acc_no" : a,"cust_id" :b},
     datatype:'json',
     headers: {
        'X-CSRF-TOKEN': $('#_token').val()
    }      
    });
    request.done(function(msg){
      console.log(msg);
      location.reload();
      //$('#dynamicfooter').html(msg);
   });
  }
</script>

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

