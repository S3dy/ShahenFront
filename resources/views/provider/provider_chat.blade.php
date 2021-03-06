@extends('layouts.chat')
@section('title', 'Chat Room - rbs')
@section('header')
  @include('providerheader')
@endsection
@section('body')
      <div class="chat_window">
   <div class="top_menu">
      
      <div class="title">Chat Room</div>
   </div>
   <ul class="messages"></ul>
   <div class="bottom_wrapper clearfix">
      <div class="message_input_wrapper"><input class="message_input" placeholder="Type your message here..." /></div>
      <div class="send_message">
         <div class="icon"></div>
         <div class="text">Send</div>
      </div>
   </div>
</div>
<div class="message_template">
   <li class="message">
      <div class="avatar"></div>
      <div class="text_wrapper">
         <div class="text"></div>
      </div>
   </li>
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
