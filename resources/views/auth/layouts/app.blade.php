<?php 
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
?>
<!DOCTYPE html>
<html lang="en">

    @include('auth.layouts.heads.head')

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