<header class="header">
    <div class="container">
        <nav class="hidden" role="accessibility">
            <ul role="menu">
                <li role="menuitem"><a href="#conteudo" accesskey="1">@lang('app.goToContent')</a></li>
            </ul>
        </nav>

        <ul class="nav nav-pills pull-right">
            @guest
                <li class="active">
                    <a href="{{ route('login') }}" title="@lang('auth.attempt')">
                        <span class="glyphicon glyphicon-log-in"></span> @lang('auth.login')
                    </a>
                </li>
            @endguest
            @auth
                <li>
                <span title="@lang('auth.isAuthenticated')" class="usuario-autenticado">
                    {{ auth()->user()->nome . ' ('. auth()->user()->matricula .')' }}
                </span>
                </li>
                <li class="active">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="glyphicon glyphicon-log-out"></span>
                        @lang('auth.logout')
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endauth
        </ul>

        <h3 class="text-muted">{{ config('app.name') }}</h3>

        @include('layouts.headers.menu')
    </div>
</header>
