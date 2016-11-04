@extends('layouts.app')

@section('content')

    <div class="ui middle aligned center aligned grid">
        <div class="column" style="max-width: 450px">
            <h2 class="ui blue-text header">
                Log-in to your account
            </h2>
            <div class="ui buttons socials">
                <a href="/login/github" data-inverted="" data-tooltip="Login or Register using GitHub" data-position="left center" class="ui button black-text"><i class="github icon"></i></a>
                <div class="or"></div>
                <a href="/login/facebook" data-inverted="" data-tooltip="Login or Register using Facebook" data-position="top right" class="ui button blue-text text-darken-3"><i class="facebook icon"></i></a>
                <div class="or"></div>
                <a href="/login/twitter" data-inverted="" data-tooltip="Login or Register using Twitter" data-position="top center" class="ui button blue-text"><i class="twitter icon"></i></a>
                <div class="or"></div>
                <a href="/login/google" data-inverted="" data-tooltip="Login or Register using Google" data-position="top center" class="ui button red-text"><i class="google icon"></i></a>
                <div class="or"></div>
                <a href="/login/linkedin" data-inverted="" data-tooltip="Login or Register using Linkedin" data-position="top left" class="ui button blue-text text-darken-4"><i class="linkedin icon"></i></a>
                <div class="or"></div>
                <a href="/login/email" data-inverted="" data-tooltip="Login without password, by using email" data-position="right center" class="ui button orange-text"><i class="mail outline icon"></i></a>
            </div>
            <form class="ui large form{{ count($errors) > 0 ? ' error' : '' }}" action="/login" method="post">
                {{ csrf_field() }}

                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="email" placeholder="E-mail address or Username" value="{{ old('email') }}" autofocus>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui slider checkbox">
                            <input tabindex="0" id="remember-me" class="hidden" type="checkbox" name="remember">
                            <label for="remember-me">Remember me on this computer</label>
                        </div>
                    </div>
                    <button type="submit" class="ui fluid large submit button blue white-text"><i class="sign in icon"></i> Login</button>
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
                Forget your password? <a href="/password/reset">Reset</a>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        jQuery(document).ready(function($) {
            $('.ui.checkbox').checkbox();
            $('.ui.form').form({
                fields: {
                    email: {
                        identifier  : 'email',
                        rules: [{
                            type   : 'empty',
                            prompt : 'Please enter your e-mail'
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
                    }
                }
            });
        });
    </script>
@endsection
