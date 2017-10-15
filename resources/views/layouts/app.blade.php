<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
				<li><a href="{{ url('/characters') }}"><span class="glyphicon glyphicon-user"></span> Characters</a></li>
				<li><a href="{{ url('/skills') }}"><span class="glyphicon glyphicon-education"></span> Skills</a></li>
				<li><a href="{{ url('/skillgroups') }}"><span class="glyphicon glyphicon-list"></span> Skill Groups</a></li>
				<li><a href="{{ url('/traits') }}"><span class="glyphicon glyphicon-asterisk"></span> Traits</a></li>
				<li><a href="{{ url('/talents') }}"><span class="glyphicon glyphicon-star"></span> Talents</a></li>
				<li><a href="{{ url('/talentoptions') }}"><span class="glyphicon glyphicon-list"></span> Talent Options</a></li>
				<li><a href="{{ url('/weapons') }}"><span class="glyphicon glyphicon-screenshot"></span> Weapons</a></li>
				<li><a href="{{ url('/specialqualities') }}"><span class="glyphicon glyphicon-list"></span> Weapon Special Qualities</a></li>
                                <li><a href="{{ url('/logout') }}"><span class=" glyphicon glyphicon-log-out"></span> Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
	<div class="row">
	    <div class="col-lg-12">
		@yield('content')
	    </div>
	</div>
    </div>            

    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
