@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card card-block">
                <h3 class="card-title">Login</h3>
                <hr>

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 col-form-label">E-Mail or Username:</label>

                        <div class="col-md-8">
                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <b>{{ $errors->first('email') }}</b>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 col-form-label">Password :</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control" name="password" aria-describedby="passwordHelpInline" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <b>{{ $errors->first('password') }}</b>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="remember">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Remember Me</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>

                    <div class="btn-group">
                        <a class="btn btn-sm btn-outline-success" data-toggle="tooltip" data-placement="left" title="Login or Register using GitHub" href="{{ url('/login/github') }}"><i class="fa fa-github fa-fw"></i> github</a>
                        <a class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Login or Register using Facebook" href="{{ url('/login/facebook') }}"><i class="fa fa-facebook fa-fw"></i> facebook</a>
                        <a class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Login or Register using Twitter" href="{{ url('/login/twitter') }}"><i class="fa fa-twitter fa-fw"></i> twitter</a>
                        <a class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Login or Register using Google" href="{{ url('/login/google') }}"><i class="fa fa-google fa-fw"></i> google</a>
                        <a class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Login or Register using LinkedIn" href="{{ url('/login/linkedin') }}"><i class="fa fa-linkedin fa-fw"></i> linkedin</a>
                        <a class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="right" title="Login without password using email" href="{{ url('/login/email') }}"><i class="fa fa-envelope fa-fw"></i> email</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
