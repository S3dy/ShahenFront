@extends('layouts.master1')
@section('title', 'My Jobs - rbs')
@section('header')
  @include('providerheader')
@endsection
@section('body')
<form action="login" method="post">
<div >
  <br><br><br><br><br>
 <div class="row">
 <div class="col-md-4 col-md-offset-4">
 <center>
   <div class="panel panel-info">
     <div class="panel-heading">Company Details</div>
     <div class="panel-body">
       <ul class="list-group">


        </ul>
     </div>
   </div>
 </center>
</div>
</div>

</div>
</form>
@endsection


@section('footer')
<footer class="footer">
     <div class="container">
       <div class="row">
            <div>
                <div class="col-md-12 text-center  footer-margin">
                    <p class="copyright" id="p"> © 2015 - 2016 Sha7en LLC.</p>
                    <a href="#" onmouseout="this.style.color = '#7d7d7d'" class="footer-a">Terms of Service</a>
                    </br>
                    <a href="#" id="a" onmouseout="this.style.color = '#7d7d7d'" class="footer-a">Cookie Policy</a>

                </div>

            </div>

       </div>
     </div>

     </footer>
 @endsection
