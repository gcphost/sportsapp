<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Sports App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    
        <script>
            window.APP_URL = '{{ env('APP_URL' )}}';
        </script>
    </head>
    <body>
        <div class="container">
            <div id="root"></div>
        </div>
    </body>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</html>
