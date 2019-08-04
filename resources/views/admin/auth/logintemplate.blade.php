@extends('admin.layouts.admin')

@section('content')
    <div id="page-wrapper" style="min-height: 398px; margin-left: 0; margin-bottom: 0">
    <div class="main-page login-page ">
        <h2 class="title1">{{ __('Login admin') }}</h2>
        <div class="widget-shadow">
            <div class="login-body">
                <form action="{{ route('admin.auth.loginAdmin') }}" method="post">
                    @csrf

                    <input id="email" type="email" class="user {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>


                @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                    <input id="password" type="password" class="lock {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>


                @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif

                    <div class="forgot-grid">
                        <label class="checkbox">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <i></i>Remember me
                        </label>

                        @if (Route::has('password.request'))
                            <div class="forgot">
                                <a href="{{ route('password.request') }}">forgot password?</a>
                            </div>
                        @endif
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" name="Sign In" value="{{ __('Login admin') }}">
                    <div class="registration">
                        Don't have an account ?
                        <a class="" href="signup.html">
                            Create an account
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection
