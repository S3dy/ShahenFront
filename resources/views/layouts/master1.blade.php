<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')</title>
    <link href="{{ URL::asset('public/css/bootstrap.min.css')}}	" rel="stylesheet" />
   <link rel="stylesheet" href="{{ URL::asset('public/css/ng-img-crop.css')}}">
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery-1.12.4.js')}}" /></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js')}}" /></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/angular.min.js')}}" /></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/ng-img-crop.js')}}" /></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery-ui.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/script.js')}}" /></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/admin.js')}}" /></script>
    <link rel="shortcut icon" href="{{URL::asset('public/images/favicon.ico')}}" type="image/x-icon"  />
    <link rel="stylesheet" href="{{URL::asset('public/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/css/font.css')}}">
    <link rel="preload" href="{{URL::asset('public/css/font-async.css')}}" as="style" onload="this.rel='stylesheet'"  />
  <noscript><link rel="stylesheet" href="{{URL::asset('public/css/font-async.css')}}"  /></noscript>
  <link href="{{URL::asset('public/css/app.css')}}" rel="stylesheet" />
 
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  </head>
   <body ng-app="app" ng-controller="doc">
     @yield('header')
     <div class="singup-body">
       @yield('body')
     </div>
     <div class="footer">
     	@yield('footer')
     </div>
  </body>
</html>
