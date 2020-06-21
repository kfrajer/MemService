<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'TBD') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{route('pages.index')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('pages.about')}}" class="nav-link">About</a>
                </li>               
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @auth

                    <li class="nav-item">
                        <a href="{{route('pages.signin')}}" class="nav-link">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('pages.tocPage')}}" class="nav-link">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('memManager.index')}}" class="nav-link">SQL Entries</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('memManager.create')}}" class="nav-link">New item</a>
                    </li>                    
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('pages.index')}}">
                                Dashboard
                            </a>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                @else

                    <li class="nav-item">
                        <a href="{{route('login')}}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('register')}}" class="nav-link">Register</a>
                    </li>

                @endauth

                <li class="nav-item">
                    <a href="{{asset('published-zdocs/docs/index.html')}}" target="_blank" class="nav-link">Docs</a>
                </li>
            
            </ul>
        </div>
    </div>
</nav>