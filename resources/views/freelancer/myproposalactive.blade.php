@extends('layouts.masterforfreelancer')
@section('title', 'Proposal - Active - rbs')
@section('header')
  @include('freelancerheader')
@endsection
@section('body')
@if($users)
<?php
$a=$users['offer'];
$b=$users['proposal'];

?>
@endif

<div class="container pagepad">
    <div>
      <h1 class="h1-proposal proposal-m-t" style="font-weight: 300;">My Proposals</h1>
      <div>

      <!--Nav tabs -->
        <ul class="nav nav-tabs proposal-m-b custom-nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#active" aria-controls="active" role="tab" data-toggle="tab">ACTIVE</a></li>
         
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="active">
              <div class="card card-block m-0 proposal-card proposal-m-b">
                  <h2 class="proposal-h2">
                    <span class="proposal-weight">{{$a}} Offers</span>
                    <span class="proposal-right qus-icon"><i class="fa fa-question-circle-o" aria-hidden="true" data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="These are offers sent from client."></i></span>
                  </h2>
              </div>
              <!--<div class="card card-block m-0 proposal-card proposal-m-b">
                  <h2 class="proposal-h2">
                    <span class="proposal-weight">0 Active Candidacies</span>
                    <span class="proposal-right qus-icon"><i class="fa fa-question-circle-o" aria-hidden="true" data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="These are proposals that you are discussing with a client."></i></span>
                  </h2>
              </div>-->

              <div class="card card-block m-0 proposal-card proposal-m-b">
                  <h2 class="proposal-h2">
                    <span class="proposal-weight">{{$b}} Submitted Proposals</span>
                    <span class="proposal-right qus-icon"><i class="fa fa-question-circle-o" aria-hidden="true"data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="These are proposals you sent which have not yet received a reply."></i></span>
                  </h2>
              </div>
              <div class="text-right">
               <!-- <a href="#" class="proposal-a">Search for jobs</a>|<a href="#" class="proposal-a">Manage your profile</a>-->
              </div>

            </div>
            <div role="tabpanel" class="tab-pane" id="archived">
              <div class="card card-block m-0 proposal-card proposal-m-b">
                  <h2 class="proposal-h2">
                    <span class="proposal-weight">0 Archived Proposals</span>
                    <span class="proposal-right qus-icon"><i class="fa fa-question-circle-o" aria-hidden="true"data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="These are archived proposals."></i></span>
                  </h2>
              </div>
              <div class="text-right">
                <a href="#" class="proposal-a">Search for jobs</a> | <a href="#" class="proposal-a">Manage your profile</a>
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
