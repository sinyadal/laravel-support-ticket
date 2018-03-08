<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand">Support Ticket</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li>
                            <a href="{{ route('login') }}" class="nav-link">Sign In</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownMenuLink" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @if(Auth::user()->is_admin)
                                <a href="{{ url('admin/tickets') }}" class="dropdown-item">See all tickets</a>
                                @else
                                <a href="{{ url('my_tickets') }}" class="dropdown-item">See all tickets</a>
                                <a href="{{ url('new_ticket') }}" class="dropdown-item">Open new ticket</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Sign out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>