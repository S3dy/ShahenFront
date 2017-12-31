<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel 5.3 - Angular 2</title>

        <!-- 1. Load libraries -->
        <!-- Polyfill(s) for older browsers -->
        {{ Html::script('public/core-js/client/shim.min.js') }}
        {{ Html::script('public/zone.js/dist/zone.js') }}
        {{ Html::script('public/reflect-metadata/Reflect.js') }}
        {{ Html::script('public/systemjs/dist/system.src.js') }}
        {{ Html::script('public/systemjs.config.js') }}

        <script>
            System.import('public/app').catch(function(err){ console.error(err); });
        </script>
    </head>
    <!-- 3. Display the application -->
    <body>
    <my-app>Loading...</my-app>
    </body>
</html>
