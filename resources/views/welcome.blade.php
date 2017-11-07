@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>LOGIN</h3>
            <form class="form-horizontal" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') && Session::get('last_auth_attempt') == 'login' ? ' has-error' : '' }}">

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder= "Email" >

                        @if ($errors->has('email') && Session::get('last_auth_attempt') == 'login' )
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') && Session::get('last_auth_attempt') == 'login' ? ' has-error' : '' }}">
                    

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">

                        @if ($errors->has('password') && Session::get('last_auth_attempt') == 'login')
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-1 col-md-offset-5">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i> Login
                        </button>
                    </div>
                </div>
            </form>

            <h3>REGISTER</h3>

               
            <form class="form-horizontal" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') && Session::get('last_auth_attempt') == 'register' ? ' has-error' : '' }}">

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">

                        @if ($errors->has('email') && Session::get('last_auth_attempt') == 'register' )
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') && Session::get('last_auth_attempt') == 'register' ? ' has-error' : '' }}">
                    
                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">

                        @if ($errors->has('name') && Session::get('last_auth_attempt') == 'register' )
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') && Session::get('last_auth_attempt') == 'register' ? ' has-error' : '' }}">

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">

                        @if ($errors->has('password') && Session::get('last_auth_attempt') == 'register' )
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') && Session::get('last_auth_attempt') == 'register' ? ' has-error' : '' }}">
                    
                    <div class="col-md-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Re-type Password">

                        @if ($errors->has('password_confirmation') && Session::get('last_auth_attempt') == 'register')
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-1 col-md-offset-5">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i> Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
