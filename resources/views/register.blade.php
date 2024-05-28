@extends('layouts.app')

@section('content')
    {{-- <section class="vh-100" style="background-color: #ff6219; opacity: .5;"> --}}
    <div class="container col col-xl-5 h-10" style="background-color: #0ee278; opacity: .5;">
        <div class="row d-flex justify-content-right align-items-center h-10">
            <div class="col col-xl-20">
                <div class="card3" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-5 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-3 text-black">

                                <form method="POST" action="/store">
                                    @csrf
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">{{ _('Register') }}</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">
                                        {{ _('Register account') }}</h5>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                        <input type="text" id="name" name="name" class="form-control form-control-lg" />
                                        <label class="form-label" for="name">{{ _('Name') }}</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="email">{{ _('Email') }}</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="password">{{ _('Password') }}</label>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmed') }}</span>
                                        @endif
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" />
                                        <label class="form-label" for="password_confirmation">{{ _('Confirm Password') }}</label>
                                    </div>
                                    <div class="pt-1 mb-4">
                                        <button data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                    </div>

                                    <a class="small text-muted" href="/password/reset">Forgot password?</a>
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                            href="/users/register" style="color: #393f81;">Register here</a></p>
                                    <a href="#!" class="small text-muted">Terms of use.</a>
                                    <a href="#!" class="small text-muted">Privacy policy</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- </section> --}}
@endsection
