<html>
    @include('layouts.heads.head')

<title>Abrites</title>

<body>
    <span>@include('layouts.heads.navbar')</span>
    
    <div>
        <main class="py-4">
            @yield('content')
        </main>
        <canvas id=c style="z-index: -1; position: fixed; top:0;">

        </canvas>

        <script src="{{asset('/js/animation.js')}}" ></script>
    </div>
    
</body>

</html>