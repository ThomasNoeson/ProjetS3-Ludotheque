<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="iut Lens">
    <title>@yield('title', 'Base LaraVel')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

    <!-- Bootstrap core CSS -->
{{--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
--}}

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body style="padding-top: 50px; background-color:#6FA8DC;">

@section('navbar')
<nav style="background-color:#e06666;" class="color_Nav navbar navbar-expand-md navbar-dark bg-green-800 fixed-top">
    <a class="navbar-brand" href="{{ URL::route('home') }}"><span style="display:inline-block; color:whitesmoke; font-weight: bold; font-size:30px; text-shadow: #8E7CC3 0.1em 0.1em 0.2em" class="text-2xl pl-2"><img class="img-responsive" src="../images/logo.png" style="height:70px; weight:70px; display:inline-block;"> Horribilis Software</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a style="font-size:15px; color: white; text-shadow: black 0.1em 0.1em 0.2em;" class="nav-link" href="{{ URL::route('dashboard') }}">dashboard</a>
            </li>
            <li class="nav-item active">
                <a style="font-size:15px; color: white; text-shadow: black 0.1em 0.1em 0.2em;" class="nav-link" href="{{ URL::route('jeu_index') }}">Jeux</a>
            </li>

        </ul>
        <ul class="my-2 my-lg-0 navbar-nav">
            @guest
                <li class="my-2 my-sm-0"><a style="font-size:15px; color: white; text-shadow: white 0.1em 0.1em 0.2em;" class="btn btn-success" href="{{ URL::route('login') }}">Login</a></li>
            @endguest
            @auth
                    <li class="my-2 my-lg-0"><!-- Authentication --><span class="text-white">{{ Auth::user()->name }}</span>
                    <a href="{{url('user/profile')}}" style="font-size:15px; color: white; text-shadow: black 0.1em 0.1em 0.2em;" class="text-white no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Profil</a>
                    <form  method="POST" action="{{ route('logout') }}">

                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-dropdown-link>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</nav>
@show


<main role="main" class="container">

    <div class="starter-template" style="padding-top: 40px;">

        @yield('content')

    </div>

</main>

@section('js')
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
@show

</body>
</html>
