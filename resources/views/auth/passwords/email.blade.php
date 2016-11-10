@extends('auth.basic')

@section('form')

    <form class="ui large form{{ count($errors) > 0 ? ' error' : session('status') ? ' success' : '' }}" method="post" action="/password/email">
        {{ csrf_field() }}

        @if (session('status'))
            <div class="ui success message">
                {{ session('status') }}
            </div>
        @endif

        <div class="ui stacked segment">
            <div class="field">
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="email" placeholder="E-mail address or Username" value="{{ old('email') }}" autofocus>
                </div>
            </div>
            <button type="submit" class="ui fluid large submit button blue white-text"><i class="send icon"></i> Send email for Reset Password</button>
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
