@extends('layouts.masterforfreelancer')
@section('title', 'View Offer - RBS')
@section('header')
  @include('providerheader')
@endsection
@section('body')

@php $providerid=Session::get('provider_id');
@endphp
<div class="container container-padding-offer" style="padding-top:100px">
      @if(session('flag'))
        @if(session('flag') == 1)
       <div class="alert alert-danger ">
          <strong>Proposal is declined</strong> 
        </div>
         @endif
        @if(session('flag') == 3)
       <div class="alert alert-danger ">
          <strong>Sorry!!! Feedback is already given</strong> 
        </div>
         @endif
        @if(session('flag') == 4)
       <div class="alert alert-success ">
          <strong>Feedback is given successfully</strong> 
        </div>
         @endif
      @endif
      @if(session('flags'))
          @if(session('flags') == "2")
       <div class="alert alert-success " id="alert_successbydynamic">
          Your Payment was Successfully Send.
          <!-- <strong>Done!</strong> Your payment sent successfully!. -->
        </div>
        @endif
      @endif

      @if(session('flags') == "5")
       <div class="alert alert-danger " id="alert_successbydynamic">
          Sorry!! Your Transaction was failed.
        </div>
        @endif
          @if(session('flags') == "6")
       <div class="alert alert-danger " id="alert_successbydynamic">
          Sorry!! This Project is already completed.
        </div>
        @endif

        @if(session('flags') == "7")
       <div class="alert alert-danger " id="alert_successbydynamic">
          Sorry!! Your payment Exceeds Budget Value.Make payment Within Budget Amount.
        </div>
        @endif

   <div>
        
              
     <p class="offp_tag flleft">View Offer</p><span><img id="loaderimg" style="visibility: hidden;height: 50px;margin-left: 15px;" class="loaderimg" src="{{URL('/')}}/public/images/loader.svg"></span>
     @if($users1['freelancerstatus']=="Completed" && $users1['providerfeedback']['flag']==0)
      <a class="feedback_offer" href="{{URL('providerfeedbackview/'.$users[0]['jobid'].'/'.$id)}}" >Give FeedBack</a>
     @endif
   </div>
   <div class="offer-b-10">
 <!--      <a href="#" class="job-feed-b-10 view-offer-a">PENDING</a><span class="offer-f-weight"> - Expires on August 26,2017.</span> -->
               
              <form action="{{url('/decline/proposal')}}" method="post" id="decline_proposal" onsubmit = "checkalert()" class="decline_proposal">
              <input type ="hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
              <input type="hidden" name="fn" id="freelancerid" value="">
              <input type="hidden" name="pn" id="pn" value="">
              <input type="hidden" name="jobid" id="jobid" value="{{$users[0]['jobid']}}">
              <input type="hidden" name="bn" id="bn" value="">
              <input type="hidden" name="proposalid" id="pr" value="{{$id}}">
              <input type="hidden" name="freelancerid" id="fid" value="{{$users[0]['freelancerid']}}">
   </div>
   <div class="row offer-f-size clear">
     <div class="col-md-8">
       <div class="card card-block m-0 view-offer-card proposal-m-b" id="provideroffer">
           <div class="row offer-b-20 offer-row-top">
              <div class="col-md-5 offer-m-left">
                <label class="offer-label">Contract Title</label>
              </div>
              <div class="col-md-7 offer-f-weight">
                <span>{{$users[0]['jobname']}}</span>
              </div>
           </div>
           <!-- <div class="row offer-b-20">
              <div class="col-md-5 offer-m-left">
                <label class="offer-label">Related Job Opening</label>
              </div>
              <div class="col-md-7 offer-f-weight">
                <a href="#" class="offer-link"><span>{{$users[0]['jobname']}}</span></a>
              </div>
           </div> -->
<!--            <div class="row offer-b-20">
              <div class="col-md-5 offer-m-left">
                <label class="offer-label">Hourly Rate</label>
              </div>
              <div class="col-md-7 offer-f-weight">
                <label class="offer-label">$3.33 / hr</label>
              </div>
           </div> -->
            <div class="row offer-b-20">
              <div class="col-md-5 offer-m-left">
                <label class="offer-label">Bid Value</label>
              </div>
              <div class="col-md-7 offer-f-weight">
                <label class="offer-label">{{$users[0]['bidvalue']}} $</label>
              </div>
           </div>
<!--            <div class="row offer-b-20">
              <div class="col-md-5 offer-m-left">
                <label class="offer-label">Weekly Limit</label>
              </div>
              <div class="col-md-7 offer-f-weight">
                <span>100 hours / week</span>
              </div>
           </div> -->
<!--            <div class="row offer-b-20">
              <div class="col-md-5 offer-m-left">
                <label class="offer-label">Manual Time Allowed</label>
              </div>
              <div class="col-md-7 offer-f-weight">
                <span>No</span>
              </div>
           </div> -->
           <div class="row offer-b-20">
              <div class="col-md-5 offer-m-left">
                <label class="offer-label">Offer Date</label>
              </div>
              <div class="col-md-7 offer-f-weight">
                <span>{{$users[0]['date']}}</span>
              </div>
           </div>
           <div class="row offer-b-20">
              <div class="col-md-5 offer-m-left">
                <label class="offer-label">Start Date</label>
              </div>
              <div class="col-md-7 offer-f-weight">
                <span>{{$users[0]['date']}}</span>
              </div>
           </div>
           <div class="row offer-b-20">
              <div class="col-md-5 offer-m-left">
                <label class="offer-label">Status</label>
              </div>
              <div class="col-md-7 offer-f-weight">
                <span><?php if($users[0]['status']==""){ echo"Proposal Received";} elseif($users1['freelancerstatus']=="Completed"){ echo $users1['freelancerstatus']; } else echo$users[0]['status'];?></span>
              </div>
           </div>
           <div class="row offer-b-20">
              <div class="col-md-5 offer-m-left">
                <label class="offer-label">Paid Amount</label>
              </div>
              <div class="col-md-7 offer-f-weight">
                <span>{{$users[0]['paidamount']}} $</span>
              </div>
           </div>
            <div class="row offer-b-20">
              <span class="offer-m-15">
           @if($users[0]['status']=="")
            <input type="button" id="accept" name="submit" class="cust-btn-primary btn text-capitalize m-0 retpass" onclick="getaccept()" value="Accept Proposal">
           @endif
              </span>
              <span class="offer-btn-l">
              @if($users[0]['status']=="")
                  <input type="button" id="decline" onclick="getdecline()" name="submit" class="cust-btn-decline11 btn text-capitalize m-0 retpass" value="Decline Proposal">
              @endif
              </span>

            </div>
              
                 </form>
              <div class="row text-center">
              @if(($users[0]['status']== "InProgress" || $users[0]['status']== "Completed") && ($users[0]['payment']=="" || $users[0]['payment']==1))
              <form action="{{ URL('payment') }}" method="post">
              <input type ="hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
              <input type="hidden" name="jobid" value="{{$users[0]['jobid']}}">
              <input type="hidden" name="bidvalue" value="{{$users[0]['bidvalue']}}">
              <input type="hidden" name="proposalid" value="{{$id}}">
              <input type="hidden" name="freelancerid" id="freelancerid" value="{{$users[0]['freelancerid']}}">
                <input type="submit" name="" class="paybut" value="Make Payment">
              </form>
              @endif
              @if($users[0]['payment']==2 && $users1['providerstatus']!="Completed")
              <form action="{{ URL('providercomplete')}}" method="post">
              <input type = "hidden" name = "_token" id="cfrs" value = "<?php echo csrf_token(); ?>">
                <input type="hidden" name="jobid" value="{{$users[0]['jobid']}}">
                <input type="submit" name="" class="paybut" value="Complete Project">
              </form>
              @endif
              </div>
              
          
        </div>

     </div>

   </div>
</div>


<div class="chat">
<div class="container chatting">
<div class="panel panel-default">
  <div class="panel-body backcolor">
    <h3 class="panel-title text-center"><strong>Conversation with <?php echo $users[0]['freelancername']; ?> </strong></h3>
  </div>
  </div>
  <div class="row rowmarg">
  <div class="col-md-4"></div>
  <div class="col-md-4 text-center">
<div class="imgcaption">
You
</div>
</div>
</div>
<form action="{{URL('providerchat')}}" method="post">
<div class="sendsection">
<div class="row">

<input type = "hidden" name = "_token" id="cfrs" value = "<?php echo csrf_token(); ?>">
<input type="hidden" name="freelancerid" value="{{$users[0]['freelancerid']}}">
<input type="hidden" name="proposalid" value="{{$id}}">
<input type="hidden" name="jobid" value="{{$users[0]['jobid']}}">
<textarea type="textarea" required="required" class="col-md-11 chattxt" name="message"></textarea>
</div>
<div class="row">
<div class="col-md-12">
<button type="submit" class="profsetbut chatbut">SEND MESSAGE</button>
</div>
</div>
</div>
</form>
<div style=" height:500px; width:600px; overflow-y: auto; overflow-x: auto; margin-bottom: 170px;">
<?php
$max=sizeof($users2);
$i=$max-1;
while($i>=0)
{
  $senderid=$users2[$i]['sender'];
  $message=$users2[$i]['message'];
  if($senderid==$providerid)
  {
?>
<div class="row rowmarg">
<div class="col-md-1"></div>
<div class="col-md-1">
<div class="imgcaption1"><br />You
</div>
</div>
<div class="col-md-1"></div>
<div class="col-md-8" >
<div class="panel panel-default">
  <div class="panel-body">
    <p class="msgcont"><?php echo $message; ?></p>
  </div>
  </div>
</div>
</div>
<?php 
}else{

?>
<div class="row rowmarg">
<div class="col-md-1"></div>
<div class="col-md-8" >
<div class="panel panel-default">
  <div class="panel-body">
    <p class="msgcont"><?php echo $message; ?></p>
  </div> 
  </div>
</div>
<div class="col-md-1">
<div class="imgcaption2"><br /><?php echo $users2[$i]['freelancername']; ?>
</div>
<div class="col-md-1"></div>
</div>
</div>
<?php
  }
  $i--;
}
?>
</div>

</div>
</div>

    <script src="{{URL::asset('public/js/alertify.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/alertify.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/default.min.css')}}">
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
