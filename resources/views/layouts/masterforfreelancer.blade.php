<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')</title>
    <link href="{{ URL::asset('/css/bootstrap.min.css')}}	" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::asset('/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/ng-img-crop.css')}}">

    <script type="text/javascript" src="{{ URL::asset('/js/jquery-1.12.4.js')}}" /></script>
    <script type="text/javascript" src="{{ URL::asset('/js/bootstrap.min.js')}}" /></script>
    <script type="text/javascript" src="{{ URL::asset('/js/angular.min.js')}}" /></script>
    <script type="text/javascript" src="{{ URL::asset('/js/ng-img-crop.js')}}" /></script>
    <script type="text/javascript" src="{{ URL::asset('/js/jquery-ui.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('/js/script.js')}}" /></script>
    <link rel="icon" href="{{URL::asset('/images/favicon.ico')}}"  />
    <link rel="stylesheet" href="{{URL::asset('/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/css/font.css')}}">
    
    <link rel="preload" href="{{URL::asset('/css/font-async.css')}}" as="style" onload="this.rel='stylesheet'"  />
    <noscript><link rel="stylesheet" href="{{URL::asset('/css/font-async.css')}}"  /></noscript>
    <link href="{{URL::asset('/css/app.css')}}" rel="stylesheet" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  </head>
   <body ng-app="app" ng-controller="Ctrl" style="background-color:#f9f9f9 !important">
     @yield('header')
     <div class="body" >
       @yield('body')
     </div>
     <div class="footer">
     	@yield('footer')
     </div>
  </body>
</html>
