@extends('layouts.auth')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5" style="background-color: rgba(255, 255, 255, 0.8);">
                <div class="card-body p-0">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="p-5">
                                    <x-kemenkes-logo class="img-fluid mx-auto d-block" />
                                <div class="text-center">
                                    <h1 class="h3 text-gray-900 font-weight-bold mb-4 mt-0">{{ __('SISTEM INFORMASI LABORATORIUM RSUD SENOPATI') }}</h1>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger border-left-danger" role="alert">
                                        <ul class="pl-4 my-2">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}" class="user">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Password') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Login Sebagai</label>
                                        <select class="form-control rounded-pill" name="role" id="role" required>
                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="atlm" {{ old('role') == 'atlm' ? 'selected' : '' }}>ATLM</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>

                                <hr>
                                <div class="d-flex justify-content-between">
                                    @if (Route::has('password.request'))
                                    <div class="text-start">
                                        <a class="small" href="{{ route('password.request') }}">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                    </div>
                                    @endif

                                    @if (Route::has('register'))
                                    <div class="text-end ms-auto">
                                        <a class="small" href="{{ route('register') }}">{{ __('Create an Account!') }}</a>
                                    </div>
                                    @endif
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
