@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card card-block">
                <h3 class="card-title">Reset Password</h3>
                <hr>

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 col-form-label">E-Mail Address :</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

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
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <b>{{ $errors->first('password') }}</b>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="col-md-4 col-form-label">Confirm Password :</label>
                        <div class="col-md-8">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <b>{{ $errors->first('password_confirmation') }}</b>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Reset Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
