<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header class="cabecalho">
        <div id="logo"><a href="{{ url('/') }}"><img src="{{ asset('images/campuslink.png') }}" width="200px"
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
            <li id="calendar"><a href="{{ url('/') }}"><x-icons.home style="width: 25px; margin-right: 3px; text-align: center" />
                    Home
                </a></li>
            <hr>
            <li><a href="{{ url('/event') }}"><x-icons.presentation-chart-line style="width: 25px; margin-right: 3px" />
                    Eventos
                </a></li>
            <hr>
            <li id="calendar"><a href="{{ url('/event/create') }}"><x-icons.calendar
                        style="width: 25px; margin-right: 3px" />
                    Cadastar Evento
                </a></li>

            <hr>
            @auth
                <li id="shop"><a href="{{ url('/dashboard') }}"><x-icons.collection
                            style="width: 25px; margin-right: 3px" />
                        Meus Eventos
                    </a></li>
                <hr>
            @endauth
            @guest
                <li id="shop"><a href="{{ url('/login') }}"><x-icons.login style="width: 25px; margin-right: 3px" />
                        Entrar
                    </a></li>
            @endguest
            @auth
                <li id="shop">
                    <a href="#" id="toggleNav"><x-icons.cog style="width: 25px; margin-right: 3px" />
                        Olá, {{ explode(' ',trim(auth()->user()->name))[0] }}
                    </a>

                    <nav id="navMenu">
                        <ul class="menu-flutuante">
                            <li>
                                <form class="form-main" action="{{ url('/logout') }}" method="POST">
                                    @csrf
                                    <a href="/logout"
                                        onclick="event.preventDefault();
                                this.closest('form').submit();">
                                        Sair
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </nav>
                </li>

            @endauth
        </ul>

    </header>
    <div class="main-body">
        @yield('content')
    </div>
    <footer style="margin-top: 10px">
        <p>Developed by IC reservas &copy; 2024</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

<script>
    const toggleNav = document.getElementById('toggleNav');
    const navMenu = document.getElementById('navMenu');

    toggleNav.addEventListener('click', function(event) {
        event.preventDefault();
        navMenu.classList.toggle('active');
    });

    document.addEventListener('click', function(event) {

        if (!navMenu.contains(event.target) && !toggleNav.contains(event.target)) {
            navMenu.classList.remove('active');
        }
    });
</script>

</html>
