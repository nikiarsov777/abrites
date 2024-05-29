<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Abrites User Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/users/dashboard">
                    <i class="fa fa-home"></i>
                    {{ __('Home') }}
                    <span class="sr-only">(current)</span>
                </a>
            </li>


        </ul>
        @if (Session::has('user_id'))
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('login') ? 'active' : '' }}"
                                href="{{ route('login') }}">{{ __('client.login') }}</a>
                        </li>

                        @if (Route::has('register') && Config::get('database.connections.pgsql.search_path') != 'scho')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('register') ? 'active' : '' }}"
                                    href="{{ route('register') }}">{{ __('client.register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/users/whishlist" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fa fa-bell">
                                    <span class="badge badge-info">0</span>
                                </span>
                                {{ _('Whishlist') }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#">{{ _('Edit Wishlist') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('config') }}"
                                        onclick="event.preventDefault();
                            document.getElementById('config-form').submit();">{{ _('Config') }}</a>
                                    <form id="config-form" action="{{ route('config') }}" method="GET">
                                        @csrf
                                    </form>
                                </li>
                                <hr />
                                <li><a class="dropdown-item" href="{{ route('user_catalog') }}"
                                        onclick="event.preventDefault();
                        document.getElementById('catalog-form').submit();">{{ _('Catalog') }}</a>
                                    <form id="catalog-form" action="{{ route('user_catalog') }}" method="GET">
                                        @csrf
                                    </form>
                                </li>
                                <hr />
                                <li><a class="dropdown-item" href="{{ route('user_list') }}"
                                        onclick="event.preventDefault();
                            document.getElementById('users-form').submit();">{{ _('Users') }}</a>
                                    <form id="users-form" action="{{ route('user_list') }}" method="GET">
                                        @csrf
                                    </form>
                                </li>
                                <hr />
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ _('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        @endif
        <ul class="navbar-nav ">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{ __('Search') }}</button>
            </form>
        </ul>
    </div>
</nav>
