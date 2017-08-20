<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PHP Tasks</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css"/>

    @stack('styles')
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">PHP Tasks</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            @if (Auth::check())
                <ul class="nav navbar-nav">
                    <li><a href="/contacts">Contact List</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">
                            <span>{{ Auth::user()->name }}</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endif

        </div>
    </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>


@yield('content')


<script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('js/config.js') }}"></script>
<script src="{{ asset('libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/php-tasks-script.js') }}"></script>

@stack('scripts')

</body>
</html>
