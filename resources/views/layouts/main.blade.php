<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <div id="logo"><a href="{{ url('/') }}"><img src="{{ asset('images/pilar-logo.png') }}" width="150px"
                    height="95px"></a></div>
        <ul>
            <li class="campo-search">
                <form action="/" method="GET" id="form-home-page-header">
                    <input type="text" id="search-home-page" name="search" placeholder="Pesquisar Evento...">
                    <button type="submit" class="search-button"><x-icons.search
                            style="width: 30px; height:30px margin-right: 3px" /></button>
                </form>
            </li>
            <hr>
            <li><a href="{{ url('/event') }}"><x-icons.presentation-chart-line style="width: 25px; margin-right: 3px" />
                    <p>Eventos</p>
                </a></li>
            <hr>
            <li id="calendar"><a href="{{ url('/event/create') }}"><x-icons.calendar
                        style="width: 25px; margin-right: 3px" />
                    <p>Cadastar Evento</p>
                </a></li>

            <hr>
            @auth
                <li id="shop"><a href="{{ url('/dashboard') }}"><x-icons.collection
                            style="width: 25px; margin-right: 3px" />
                        <p>Meus Eventos</p>
                    </a></li>
                <hr>
            @endauth
            @guest
                <li id="shop"><a href="{{ url('/login') }}"><x-icons.login style="width: 25px; margin-right: 3px" />
                        <p>Entrar</p>
                    </a></li>
            @endguest
            @auth
                {{-- <li id="exit">
                    <form class="form-main" action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <a href="/logout"
                            onclick="event.preventDefault();
                    this.closest('form').submit();">
                            <x-icons.login style="width: 25px; margin-right: 3px" />
                            <p>Sair</p>
                        </a>
                    </form>
                </li>
                <hr> --}}
                <li id="shop">
                    <a href="#"><x-icons.cog style="width: 25px; margin-right: 3px" />
                        <p>Olá, {{ auth()->user()->name }}</p>
                    </a>
                </li>

            @endauth
        </ul>

    </header>
    <div class="main-body">
        @yield('content')
    </div>
    <footer>
        <p>Developed by IC reservas &copy; 2024</p>
    </footer>
</body>

</html>