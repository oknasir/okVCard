@extends('auth.basic')

@section('form')

    <form class="ui large form{{ count($errors) > 0 ? ' error' : '' }}" method="post" action="/password/reset">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="ui stacked segment">
            <div class="field">
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="email" placeholder="E-mail address" value="{{ $email or old('email') }}" autofocus>
                </div>
            </div>
            <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" name="password_confirmation" placeholder="Confirm password">
                </div>
            </div>
            <button type="submit" class="ui fluid large submit button blue white-text"><i class="refresh icon"></i> Reset Password</button>
        </div>

        <div class="ui error message">
            @if (count($errors) > 0)
                <ul class="list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

    </form>

@endsection

@section('scripts')
    <script>
        jQuery(document).ready(function($) {
            $('.ui.form').form({
                fields: {
                    email: {
                        identifier  : 'email',
                        rules: [{
                            type   : 'empty',
                            prompt : 'Please enter your e-mail'
                        }, {
                            type   : 'email',
                            prompt : 'Please enter a valid e-mail'
                        }]
                    },
                    password: {
                        identifier  : 'password',
                        rules: [{
                            type   : 'empty',
                            prompt : 'Please enter your password'
                        }, {
                            type   : 'length[5]',
                            prompt : 'Your password must be at least 5 characters'
                        }]
                    },
                    password_confirmation: {
                        identifier  : 'password_confirmation',
                        rules: [{
                            type   : 'empty',
                            prompt : 'Please enter confirmation password'
                        }, {
                            type   : 'length[5]',
                            prompt : 'Your password must be at least 5 characters'
                        }]
                    }
                }
            });
        });
    </script>
@endsection
