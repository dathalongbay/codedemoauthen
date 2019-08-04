@extends('admin.layouts.admin')

@section('content')
    <div id="page-wrapper" style="min-height: 428px;margin-left: 0">
        <div class="main-page signup-page">
            <h2 class="title1">SignUp Here</h2>
            <div class="sign-up-row widget-shadow">
                <h5>Personal Information :</h5>
                <form method="POST" action="{{ route('admin.register.store') }}">
                    @csrf

                    <div class="sign-u">
                        <input id="name" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>


                    @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif

                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">

                        <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>


                    @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                        <div class="clearfix"> </div>
                    </div>

                    <h6>Login Information :</h6>
                    <div class="sign-u">
                        <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                        <input id="password-confirm" type="password" class="" name="password_confirmation" required>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="sub_home">
                        <input type="submit" value="Submit">
                        <div class="clearfix"> </div>
                    </div>
                    <div class="registration">
                        Already Registered.
                        <a class="" href="{{ route('admin.auth.login') }}">
                            Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
