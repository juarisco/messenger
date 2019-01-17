<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
</head>
<body>
    <div id="app">

        <b-navbar toggleable type="dark" variant="primary">
            <b-navbar-toggle target="nav_text_collapse"></b-navbar-toggle>
            <b-navbar-brand href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</b-navbar-brand>
            <b-collapse is-nav id="nav_text_collapse">
                <!-- Right Side Of Navbar -->
                <b-navbar-nav class="ml-auto">
                    <!-- Authentication Links -->
                    {{-- @guest
                        <b-nav-item href="{{ route('login') }}">Ingresar</b-nav-item>
                        <b-nav-item href="{{ route('register') }}">Registro</b-nav-item>
                    @else --}}
                        <!-- Navbar dropdowns -->
                        <b-nav-item-dropdown text="Username" right>
                            <b-dropdown-item href="#">Cerrar sesión</b-dropdown-item>
                        </b-nav-item-dropdown>
                    {{-- @endguest --}}
                </b-navbar-nav>
            </b-collapse>
        </b-navbar> 
                
        {{-- <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li> --}}

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
