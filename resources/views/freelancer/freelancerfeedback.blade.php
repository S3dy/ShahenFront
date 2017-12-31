@extends('layouts.masterforfreelancer')
@section('title', 'Freelancer Feedback')
@section('header')
@include('freelancerheader')
@endsection
@section('body')
<div class="feedback">
	<div class="container feedcontain">
		<div class="panel panel-default">
                     
             <div class="panel-body panelpad">
             <form name="freelancer_feedback" method="post" action="{{URL('/')}}/freelancerfeedback">
             <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
             <input type="hidden" name="jobid" value={{$jobid}}>
             <input type="hidden" name="proposalid" value={{$id}}>
		<!-- <p class="likely">Now likely are you to recommend this client to a friend or a colleague?</p> -->
		<!-- <div class="radiorate">
			<span class="flleft"><p>Not at all likely </p></span>
			<span class="row flleft radiocont">
				<span class="col-md-1">
				</span>
				<span class="col-md-1">
					1
					<input type="radio" name="option">
				</span>
				<span class="col-md-1">
					2
					<input type="radio" name="option">
				</span>
				<span class="col-md-1">
					3
					<input type="radio" name="option">
				</span>
				<span class="col-md-1">
					4
					<input type="radio" name="option">
				</span>
				<span class="col-md-1">
					5
					<input type="radio" name="option">
				</span>
				<span class="col-md-1">
					6
					<input type="radio" name="option">
				</span>
				<span class="col-md-1">
					7
					<input type="radio" name="option">
				</span>
				<span class="col-md-1">
					8
					<input type="radio" name="option">
				</span>
				<span class="col-md-1">
					9
					<input type="radio" name="option">
				</span>
				<span class="col-md-1">
					10
					<input type="radio" name="option" checked="checked">
				</span>
				<span class="col-md-1">
				</span>
			</span>
			<span class="flleft"><p>Extremely likely</p></span>
		</div> -->
		<div class="clear">
			<span><i class="fa fa-bullhorn speaker flleft" aria-hidden="true"></i></span>
			<span class="flleft"><p class="feedhead">Public Feedback</p></span>
		</div>
		<p class="clear shared radiocont">This feedback will be shared on your clients work history only after they've left feedback for you.</p>
		<div class="contpad">
		<div>
	
			<h4 class="likely">Feedback to Client</h4>
			
			<fieldset class="rating1">
				<input type="radio" id="star5" name="rating1" value="5" class="ratingcalc"/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
				<input type="radio" id="star4half" name="rating1" value="4.5" class="ratingcalc" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
				<input type="radio" id="star4" name="rating1" value="4" class="ratingcalc" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
				<input type="radio" id="star3half" name="rating1" value="3.5" class="ratingcalc" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
				<input type="radio" id="star3" name="rating1" value="3" class="ratingcalc" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
				<input type="radio" id="star2half" name="rating1" value="2.5" class="ratingcalc" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
				<input type="radio" id="star2" name="rating1" value="2" class="ratingcalc" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
				<input type="radio" id="star1half" name="rating1" value="1.5" class="ratingcalc" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
				<input type="radio" id="star1" name="rating1" value="1" class="ratingcalc" /><label class = "full" for="star1" title="  big time - 1 star"></label>
				<input type="radio" id="star0half" name="rating1" value="0.5" class="ratingcalc" /><label class="half" for="star0half" title="  big time - 0.5 stars"></label>
			</fieldset>
			<span class="flleft coop">Cooperation</span>
		</div>
		<div class="clear">
			<fieldset class="rating2">
				<input type="radio" id="star25" name="rating2" value="5" class="ratingcalc" /><label class = "full" for="star25" title="Awesome - 5 stars"></label>
				<input type="radio" id="star24half" name="rating2" value="4.5" class="ratingcalc" /><label class="half" for="star24half" title="Pretty good - 4.5 stars"></label>
				<input type="radio" id="star24" name="rating2" value="4" class="ratingcalc" /><label class = "full" for="star24" title="Pretty good - 4 stars"></label>
				<input type="radio" id="star23half" name="rating2" value="3.5" class="ratingcalc" /><label class="half" for="star23half" title="Meh - 3.5 stars"></label>
				<input type="radio" id="star23" name="rating2" value="3" class="ratingcalc" /><label class = "full" for="star23" title="Meh - 3 stars"></label>
				<input type="radio" id="star22half" name="rating2" value="2.5" class="ratingcalc" /><label class="half" for="star22half" title="Kinda bad - 2.5 stars"></label>
				<input type="radio" id="star22" name="rating2" value="2" class="ratingcalc" /><label class = "full" for="star22" title="Kinda bad - 2 stars"></label>
				<input type="radio" id="star21half" name="rating2" value="1.5" class="ratingcalc" /><label class="half" for="star21half" title="Meh - 1.5 stars"></label>
				<input type="radio" id="star21" name="rating2" value="1" class="ratingcalc" /><label class = "full" for="star21" title="  big time - 1 star"></label>
				<input type="radio" id="star20half" name="rating2" value="0.5" class="ratingcalc" /><label class="half" for="star20half" title="  big time - 0.5 stars"></label>
			</fieldset>
			<span class="flleft coop">Skills</span>
		</div>
		<div class="clear">
			<fieldset class="rating3">
				<input type="radio" id="star35" name="rating3" value="5" class="ratingcalc" /><label class = "full" for="star35" title="Awesome - 5 stars"></label>
				<input type="radio" id="star34half" name="rating3" value="4.5" class="ratingcalc" /><label class="half" for="star34half" title="Pretty good - 4.5 stars"></label>
				<input type="radio" id="star34" name="rating3" value="4" class="ratingcalc" /><label class = "full" for="star34" title="Pretty good - 4 stars"></label>
				<input type="radio" id="star33half" name="rating3" value="3.5"  class="ratingcalc"/><label class="half" for="star33half" title="Meh - 3.5 stars"></label>
				<input type="radio" id="star33" name="rating3" value="3" class="ratingcalc" /><label class = "full" for="star33" title="Meh - 3 stars"></label>
				<input type="radio" id="star32half" name="rating3" value="2.5" class="ratingcalc" /><label class="half" for="star32half" title="Kinda bad - 2.5 stars"></label>
				<input type="radio" id="star32" name="rating3" value="2" class="ratingcalc" /><label class = "full" for="star32" title="Kinda bad - 2 stars"></label>
				<input type="radio" id="star31half" name="rating3" value="1.5" class="ratingcalc" /><label class="half" for="star31half" title="Meh - 1.5 stars"></label>
				<input type="radio" id="star31" name="rating3" value="1" class="ratingcalc" /><label class = "full" for="star31" title="  big time - 1 star"></label>
				<input type="radio" id="star30half" name="rating3" value="0.5" class="ratingcalc" /><label class="half" for="star30half" title="  big time - 0.5 stars"></label>
			</fieldset>
			<span class="flleft coop">Quality of Requirements</span>
		</div>
		<div class="clear">
			<fieldset class="rating4">
				<input type="radio" id="star45" name="rating4" value="5" class="ratingcalc" /><label class = "full" for="star45" title="Awesome - 5 stars"></label>
				<input type="radio" id="star44half" name="rating4" value="4.5" class="ratingcalc" /><label class="half" for="star44half" title="Pretty good - 4.5 stars"></label>
				<input type="radio" id="star44" name="rating4" value="4" class="ratingcalc" /><label class = "full" for="star44" title="Pretty good - 4 stars"></label>
				<input type="radio" id="star43half" name="rating4" value="3.5" class="ratingcalc" /><label class="half" for="star43half" title="Meh - 3.5 stars"></label>
				<input type="radio" id="star43" name="rating4" value="3" class="ratingcalc" /><label class = "full" for="star43" title="Meh - 3 stars"></label>
				<input type="radio" id="star42half" name="rating4" value="2.5" class="ratingcalc" /><label class="half" for="star42half" title="Kinda bad - 2.5 stars"></label>
				<input type="radio" id="star42" name="rating4" value="2" class="ratingcalc" /><label class = "full" for="star42" title="Kinda bad - 2 stars"></label>
				<input type="radio" id="star41half" name="rating4" value="1.5" class="ratingcalc" /><label class="half" for="star41half" title="Meh - 1.5 stars"></label>
				<input type="radio" id="star41" name="rating4" value="1" class="ratingcalc" /><label class = "full" for="star41" title="  big time - 1 star"></label>
				<input type="radio" id="star40half" name="rating4" value="0.5" class="ratingcalc" /><label class="half" for="star40half" title="  big time - 0.5 stars"></label>
			</fieldset>
			<span class="flleft coop">Avaliability</span>
		</div>
		<div class="clear">
			<fieldset class="rating5">
				<input type="radio" id="star55" name="rating5" value="5" class="ratingcalc" /><label class = "full" for="star55" title="Awesome - 5 stars"></label>
				<input type="radio" id="star54half" name="rating5" value="4.5" class="ratingcalc" /><label class="half" for="star54half" title="Pretty good - 4.5 stars"></label>
				<input type="radio" id="star54" name="rating5" value="4" class="ratingcalc"/><label class = "full" for="star54" title="Pretty good - 4 stars"></label>
				<input type="radio" id="star53half" name="rating5" value="3.5" class="ratingcalc" /><label class="half" for="star53half" title="Meh - 3.5 stars"></label>
				<input type="radio" id="star53" name="rating5" value="3" class="ratingcalc" /><label class = "full" for="star53" title="Meh - 3 stars"></label>
				<input type="radio" id="star52half" name="rating5" value="2.5" class="ratingcalc" /><label class="half" for="star52half" title="Kinda bad - 2.5 stars"></label>
				<input type="radio" id="star52" name="rating5" value="2" class="ratingcalc" /><label class = "full" for="star52" title="Kinda bad - 2 stars"></label>
				<input type="radio" id="star51half" name="rating5" value="1.5" class="ratingcalc" /><label class="half" for="star51half" title="Meh - 1.5 stars"></label>
				<input type="radio" id="star51" name="rating5" value="1" class="ratingcalc" /><label class = "full" for="star51" title="  big time - 1 star"></label>
				<input type="radio" id="star50half" name="rating5" value="0.5" class="ratingcalc" /><label class="half" for="star50half" title="  big time - 0.5 stars"></label>
			</fieldset>
			<span class="flleft coop">Set Reasonable Deadlines</span>
		</div>
		<div class="clear">
			<fieldset class="rating6">
				<input type="radio" id="star65" name="rating6" value="5" class="ratingcalc" /><label class = "full" for="star65" title="Awesome - 5 stars"></label>
				<input type="radio" id="star64half" name="rating6" value="4.5" class="ratingcalc" /><label class="half" for="star64half" title="Pretty good - 4.5 stars"></label>
				<input type="radio" id="star64" name="rating6" value="4" class="ratingcalc" /><label class = "full" for="star64" title="Pretty good - 4 stars"></label>
				<input type="radio" id="star63half" name="rating6" value="3.5" class="ratingcalc" /><label class="half" for="star63half" title="Meh - 3.5 stars"></label>
				<input type="radio" id="star63" name="rating6" value="3" class="ratingcalc" /><label class = "full" for="star63" title="Meh - 3 stars"></label>
				<input type="radio" id="star62half" name="rating6" value="2.5" class="ratingcalc" /><label class="half" for="star62half" title="Kinda bad - 2.5 stars"></label>
				<input type="radio" id="star62" name="rating6" value="2" class="ratingcalc" /><label class = "full" for="star62" title="Kinda bad - 2 stars"></label>
				<input type="radio" id="star61half" name="rating6" value="1.5" class="ratingcalc" /><label class="half" for="star61half" title="Meh - 1.5 stars"></label>
				<input type="radio" id="star61" name="rating6" value="1" class="ratingcalc" /><label class = "full" for="star61" title="  big time - 1 star"></label>
				<input type="radio" id="star60half" name="rating6" value="0.5" class="ratingcalc" /><label class="half" for="star60half" title="  big time - 0.5 stars"></label>
			</fieldset>
			<span class="flleft coop">Communication</span>
		</div>
		<div class="clear">
			<p class="flleft tot radiocont">Total Score:</p>
			<p class="flleft score radiocont" id="totalscore">0</p>
			<input type="hidden" name="total" class="totalscore"> 
		</div>
		<div class="clear">
			<p class="abovearea">Share this experience to this client to the Upwork community:</p>
			<div class="row">
				<div class="col-md-8">
					<textarea type="textarea" name="content" class="form-control feedarea" rows="9"></textarea>
				</div>
			</div>
			<!-- <p class="abovearea radiocont">See as <a href="#" class="feedlink">example of appropriate feedback</a></p> -->
		</div>
		<div class="row">
              <span class="offer-m-15">
                  <input type="submit" id="add_card" class="cust-btn-primary btn text-capitalize m-0 retpass post-end" value="Submit Feedback">
              </span>
              <span class="bill-p"><a href="{{URL('offerview/'.$id.'/'.$jobid)}}" class="bill-a-size empbut">Cancel</a></span>
         </div>
		<!-- <div class="row">
			<div class="col-md-8">
				<span><button class="clear profsetbut">Submit Feedback</button></span>
				<button class="empbut"> Cancel</button>
				<span><a href="{{URL('/offerview/'.$jobid)}}" class="empbut"> Cancel</a></span>		
			</div>
		</div> -->
		
		
	</form>
		</div>
		</div>
	  </div>
	</div>
</div>
@endsection
@section('footer')
<script>
$( document ).ready(function() {
	  a = 0;
         b = 0;
         c = 0;
         d = 0;
         e = 0;
         f = 0;
         answer = 0;
         total = 0;
  	 	$('.ratingcalc').change(function(){
  	 		answer = 0;
         total = 0;
  	 		a = $('[name=rating1]:checked').val();
  	 		b = $('[name=rating2]:checked').val();
  	 		c = $('[name=rating3]:checked').val();
  	 		d = $('[name=rating4]:checked').val();
  	 		e = $('[name=rating5]:checked').val();
  	 		f = $('[name=rating6]:checked').val();
  	 		if(a) total += parseFloat(a);
  	 		if(b) total += parseFloat(b); 
  	 	 	if(c) total += parseFloat(c);
  	 	 	if(d) total += parseFloat(d);
  	 	    if(e) total += parseFloat(e);
  	 	    if(f) total += parseFloat(f);

  	 	    average = total/6;
  	 	    average = average.toFixed(2);

  	 	    ans = average % 1;
  	 	    
  	 	    cals = ans.toFixed(2);
 			
 			
  	 	    if(cals > 0.50){
  	 	    	
  	 	    	ans1 = average/1;
  	 	    	ans2 = ans1 % 1;
  	 	    	answer= ans1 - ans2;
  	 	    	//alert(answer);
  	 	    	answer = parseFloat(answer) + 1.00;
  	 	    	
  	 	    	answer =  answer.toFixed(1);
  	 	    	$('#totalscore').html(answer);
  	 	    	$('.totalscore').val(answer);
  	 	    	//alert(answer);
  	 	    }else if(cals == 0){
  	 	         
  	 	    	ans1 = average/1;
  	 	    	ans2 = ans1 % 1;
  	 	    	answer= ans1 - ans2;
  	 	    	answer = answer.toFixed(1);
  	 	    	$('#totalscore').html(answer);
  	 	    	$('.totalscore').val(answer);
  	 	    	//alert(answer);
   	 	    }else{

   	 	    	ans1 = average/1;
  	 	    	ans2 = ans1 % 1;
  	 	    	answer= ans1 - ans2;
  	 	    	answer = parseFloat(answer) + 0.50;
  	 	    	answer = answer.toFixed(1);
  	 	    	$('#totalscore').html(answer);
  	 	    	$('.totalscore').val(answer);
   	 	    }
  	 	    
  	 		
  	 	});
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