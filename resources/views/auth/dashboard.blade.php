@extends('auth.layouts.app')

@section('content')
    <div class="row justify-content-center mt-5" >
        <div class="col-md-10">
            <div class="card" style="background-color: #000; opacity: .5;">
                <div class="card-header" style="color: #fff;">Dashboard :: {{ $title }}</div>
                <div class="card-body" >
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                    @endif
                    <div class="card-body" >
                        @include($page)
                        @yield('page')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
