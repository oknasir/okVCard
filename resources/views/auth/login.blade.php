@extends('auth.basic')

@section('form')

    <form class="ui large form{{ count($errors) > 0 ? ' error' : '' }}" action="{{ route('login') }}" method="post">
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

@endsection