<nav class="ui fixed menu">

    <a {!! isset($web) && $web == true ? 'href="/"' : '[routerLink]="[\'/\']"' !!} class="header item">
        <button class="ui blue lighten-4 white-text button logo">ok</button><span style="width:4px;height:34px"></span>
        {{ config('app.name', 'Laravel') }}
    </a>

    @if(!isset($web) || $web != true)
        <tilled-icon class="item" (notify)="onNotify($event)" #menu></tilled-icon>
        <a [routerLink]="['/']" class="item">Go to first component</a>
        <a [routerLink]="['/edit']" class="item">Go to 2nd component</a>
    @endif

    <div class="right menu">

        <div class="ui category search item">
            <div class="ui transparent icon input">
                <input class="prompt" placeholder="Search in resume..." type="text">
                <i class="search link icon"></i>
            </div>
            <div class="results"></div>
        </div>

        @if (Auth::guest())

            <a class="item" href="{{ url('/login') }}">Login</a>
            <a class="item" href="{{ url('/register') }}">Register</a>

        @else

            <div class="ui simple dropdown item">
                {{ Auth::user()->name }}
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>

        @endif

    </div>

</nav>

@if(!isset($web) || $web != true)
    <section class="ui centered grid">

        <div class="ten wide column">

            <router-outlet></router-outlet>

        </div>

    </section>
@endif
