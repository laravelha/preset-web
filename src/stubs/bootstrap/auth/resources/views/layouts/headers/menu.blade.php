<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-principal">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="menu-principal">
            <ul class="nav navbar-nav">
                <li class="{{ active_class(if_route('index')) }}" role="menuitem">
                    <a href="{{route('index')}}">@lang('app.index')</a>
                </li>
                @auth
                <li class="{{ active_class(if_route('home')) }}" role="menuitem">
                    <a href="{{route('home')}}">@lang('app.home')</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
