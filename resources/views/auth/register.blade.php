                <div class="row g-0">

                    <div class="col-md-6 col-lg-5 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-3 text-black">

                            <form method="POST" action="/users/{{@$user->id}}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="form" value="config" />
                                <div class="d-flex align-items-center mb-3 pb-1">
                                    <i class="fas fa-cubes fa-2x me-3" style="color: #ffffff;"></i>
                                    <span class="h5 fw-bold mb-0" style="color: #ffffff;">{{ _('User Information') }}</span>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    <input type="text" id="name" name="name"
                                        class="form-control form-control-lg" value="{{@$user->name}}" />
                                    <label class="form-label" for="name">{{ _('Name') }}</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                    <input type="email" id="email" name="email"
                                        class="form-control form-control-lg" value="{{@$user->email}}"/>
                                    <label class="form-label" for="email">{{ _('Email') }}</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="password">{{ _('Password') }}</label>
                                </div>
                                <div data-mdb-input-init class="form-outline mb-4">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmed') }}</span>
                                    @endif
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control form-control-lg" />
                                    <label class="form-label"
                                        for="password_confirmation">{{ _('Confirm Password') }}</label>
                                </div>
                                <div class="pt-1 mb-4">
                                    <button data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-dark btn-lg btn-block"
                                        type="submit">{{ _('Update') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
