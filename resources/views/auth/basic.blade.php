@extends('layouts.app')

@section('content')

    <div class="ui middle aligned center aligned grid center-form">
        <div class="column" style="max-width: 450px">

            @if (url()->current() == route('login'))
                <h2 class="ui blue-text header">Log-in to your account</h2>
            @else
                <h2 class="ui blue-text header">Reset password for your account</h2>
            @endif

            <div class="ui buttons socials">
                <form action="{{ route('login.provider', ['social' => 'github']) }}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" data-inverted="" data-tooltip="Login or Register using GitHub" data-position="left center" class="ui button black-text"><i class="github icon"></i></button>
                </form>
                <div class="or"></div>
                <form action="{{ route('login.provider', ['social' => 'facebook']) }}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" data-inverted="" data-tooltip="Login or Register using Facebook" data-position="top right" class="ui button blue-text text-darken-3"><i class="facebook icon"></i></button>
                </form>
                <div class="or"></div>
                <form action="{{ route('login.provider', ['social' => 'twitter']) }}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" data-inverted="" data-tooltip="Login or Register using Twitter" data-position="top center" class="ui button blue-text"><i class="twitter icon"></i></button>
                </form>
                <div class="or"></div>
                <form action="{{ route('login.provider', ['social' => 'google']) }}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" data-inverted="" data-tooltip="Login or Register using Google" data-position="top center" class="ui button red-text"><i class="google icon"></i></button>
                </form>
                <div class="or"></div>
                <form action="{{ route('login.provider', ['social' => 'linkedin']) }}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" data-inverted="" data-tooltip="Login or Register using Linkedin" data-position="top center" class="ui button blue-text text-darken-4"><i class="linkedin icon"></i></button>
                </form>
                <div class="or"></div>
                @if (url()->current() == route('login.email'))
                <a href="{{ route('login') }}" data-inverted="" data-tooltip="Have password, click to Log-in" data-position="right center" class="ui button orange-text"><i class="remove icon"></i></a>
                @else
                <a href="{{ route('login.email') }}" data-inverted="" data-tooltip="Login without password, by using email" data-position="right center" class="ui button orange-text"><i class="mail outline icon"></i></a>
                @endif
            </div>

            @yield('form')

            <div class="ui message">
                @if (url()->current() == route('login'))
                    Forget your password? <a href="{{ route('user.reset') }}">Reset</a>
                @else
                    Already has an account? <a href="{{ route('login') }}">Login</a>
                @endif
            </div>

        </div>
    </div>

@endsection
