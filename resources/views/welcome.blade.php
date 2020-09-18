<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/landio.css') }}" rel="stylesheet">
</head>
<body>
    <!-- <div id="app"> -->
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    <img src = "{{ asset('img/logo.png') }}" class = "head-logo" alt = "{{ config('app.name', 'DebateFace') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class = "nav-link" href = "{{ route('home') }}"> {{ __('Home') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class = "nav-link" href = "{{ route('join') }}"> {{ __('Watch / Join a Debate') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class = "nav-link" href = "{{ route('start') }}"> {{ __('Start a Debate') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class = "nav-link" href = "{{ route('home') }}"> {{ __('About') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class = "nav-link" href = "{{ route('home') }}"> {{ __('Contact Us') }} </a>
                        </li>
                        @if ( Auth::check() )
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fullname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- <br> -->
        
        <header class="jumbotron bg-inverse text-xs-center center-vertically" role="banner">
            <div class="container">
                <h1 class="display-3">Welcome to DebateFace!</h1>
                <h2 class="m-b-3">We’re the new social media platform for debate!<br> Users hop on, create a debate and invite other users to participate and spectate.<br> It’s that simple. Check out the steps below to get started.
                    <br>Make sure to join our email list because we’re going to have featured debates every week.<br> We’re talking big names and influencers going up against each other one on one.</h2>
            </div>
        </header>

        <section class="section-features text-xs-center">
            <div class="container">
                <div class="row">
                <div class="col-md-4">
                    <div class="card">
                    <div class="card-block">
                        <span class="icon-pen display-1"></span>
                        <h4 class="card-title">Option 1: Create a debate</h4>
                        <p class="card-text">To start a debate click “start a debate” on the menu. Set the rules, and invite your participants via email or link. Once you’re in a debate room you have tools and controls to moderate your debate. Give others your share link to watch the debate.</p>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                    <div class="card-block">
                        <span class="icon-thunderbolt display-1"></span>
                        <h4 class="card-title">Option 2: Join a debate</h4>
                        <p class="card-text">Browse public debate rooms or join a specific debate with unique debate number. You’ll receive an email or a unique link to be able to join the debate as one of the debate participants. A camera and microphone is necessary to contribute.</p>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card m-b-0">
                    <div class="card-block">
                        <span class="icon-heart display-1"></span>
                        <h4 class="card-title">Option 3: Watch a debate</h4>
                        <p class="card-text">Browse public debates or spectate a specific debate. Enjoy the show!</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <footer class="section-footer bg-inverse" role="contentinfo">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-5">
                        <div class="media">
                            <small class="media-body media-bottom">
                                &copy; DebateFace 2020. <br>
                                Designed and eveloped by Olive.
                            </small>
                        </div>
                    </div>
                    <!-- <div class="col-md-6 col-lg-7">
                        <ul class="nav nav-inline">
                            <li class="nav-item">
                                <a class="nav-link" href="./index-carousel.html"><small>NEW</small> Slides<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="ui-elements.html">UI Kit</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://github.com/tatygrassini/landio-html" target="_blank">GitHub</a></li>
                            <li class="nav-item"><a class="nav-link scroll-top" href="#totop">Back to top <span class="icon-caret-up"></span></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </footer>

        <!-- <div id="bgContent">
            <img src="{{asset('img/debate.jpg')}}" id="debateImg"/>
            <div style="margin: 30px 10px 0px 10px">
                <div>
                    <h1>Welcome to DebateFace!</h1>
                    <p>We’re the new social media platform for debate!<br> Users hop on, create a debate and invite other users to participate and spectate.<br> It’s that simple. Check out the steps below to get started.
                    <br>Make sure to join our email list because we’re going to have featured debates every week.<br> We’re talking big names and influencers going up against each other one on one.</p>
                </div>
                <div>
                    <h1>Option 1: Create a debate</h1>
                    <p>To start a debate click “start a debate” on the menu. Set the rules, and invite your participants via email or link.<br> Once you’re in a debate room you have tools and controls to moderate your debate. Give others your share link to watch the debate.</p>
                </div>
                <div>
                    <h1>Option 2: Join a debate</h1>
                    <p>Browse public debate rooms or join a specific debate with unique debate number. <br>You’ll receive an email or a unique link to be able to join the debate as one of the debate participants.<br> A camera and microphone is necessary to contribute.</p>
                </div>
                <div>
                    <h1>Option 3: Watch a debate</h1>
                    <p>Browse public debates or spectate a specific debate. Enjoy the show!</p>
                </div>
            </div>           
        </div>
        <main class="py-4">
            @yield('content')
        </main> -->
    <!-- </div> -->

</body>
</html>
