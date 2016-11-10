@extends('layouts.app')

@section('content')

    <div class="ui middle aligned center aligned grid center-form">
        <div class="column" style="max-width: 450px">

            <h2 class="ui blue-text header">Create new account</h2>

            <form class="ui large form{{ count($errors) > 0 ? ' error' : '' }}" role="form" method="POST" action="/register">
                {{ csrf_field() }}

                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="child icon"></i>
                            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" autofocus>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="at icon"></i>
                            <input type="email" name="email" placeholder="E-mail address" value="{{ old('email') }}">
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
                    <button type="submit" class="ui fluid large submit button blue white-text"><i class="add user icon"></i> Register</button>
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

            <div class="ui message">
                Already has an account? <a href="{{ route('login') }}">Login</a>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        jQuery(document).ready(function($) {
            $('.ui.form').form({
                fields: {
                    name: {
                        identifier  : 'name',
                        rules: [{
                            type   : 'empty',
                            prompt : 'Please enter your full name'
                        }]
                    },
                    username: {
                        identifier  : 'username',
                        rules: [{
                            type   : 'empty',
                            prompt : 'Please enter your username'
                        }]
                    },
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
