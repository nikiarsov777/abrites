<html>
    <div>@include('layouts.heads.head')</div>

<title>Abrites</title>

<body>
    <div>@include('auth.layouts.heads.navbar')</div>
    
    <div>
        <main class="py-4">
            @yield('content')
        </main>
        <canvas id=c style="z-index: -1; position: fixed;">

        </canvas>

        <script src="{{asset('/js/animation.js')}}" ></script>
    </div>
    
</body>

</html>