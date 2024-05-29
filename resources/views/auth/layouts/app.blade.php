<?php 
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.heads.head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Abrites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <style>
            label {
                color: #fff;
            }
        </style>
        <script src="/js/jquery.min.js"></script>
</head>
<body>
    <div>@include('auth.layouts.heads.navbar')</div>
    
    <div>
        
        <main class="py-4" >
            @yield('content')
        </main>
        <canvas id=c style="z-index: -1; position: fixed; top:0;">
        </canvas>

        <script src="{{asset('/js/animation.js')}}" ></script>
    </div>
    
</body>

</html>