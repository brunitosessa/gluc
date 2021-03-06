 <nav class="navbar navbar-expand-sm navbar-light bg-white shadow-lg">
    <div class="container-fluid">
        <a class="navbar-brand float-left" href="{{ url('/') }}">
            {{ config('app.name', 'Gluc') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto ml-auto text-center">
                    <li class="nav-item dropdown border-0">
                        <a class="nav-link py-0 pl-5" href="{{ route('admin.bars.index') }}">
                            <i class="fas fa-home fa-lg"></i>
                            <br>Bares
                        </a>
                    </li>

                    <li class="nav-item dropdown border-0">
                        <a class="nav-link py-0 pl-5" href="{{ route('admin.publicities.index') }}">
                            <i class="fas fa-ad fa-lg"></i>
                            <br>Publicidades
                        </a>
                    </li>
                    
                    <li class="nav-item dropdown border-0">
                        <a class="nav-link py-0 pl-5" href="{{ route('admin.events.index') }}">
                            <i class="fas fa-calendar-day fa-lg"></i>
                            <br>Eventos
                        </a>
                    </li>

                    <li class="nav-item dropdown border-0">
                        <a class="nav-link py-0 pl-5" href="#">
                            <i class="fas fa-star fa-lg"></i>
                            <br>Especiales
                        </a>
                    </li>

                    <li class="nav-item dropdown border-0">
                        <a class="nav-link py-0 pl-5" href="{{ route('charts.index') }}">
                            <i class="fas fa-chart-area fa-lg"></i>
                            <br>Estadísticas
                        </a>
                    </li>
                </ul>
            @endauth
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-crown fa-lg text-primary"></i>
                            {{ Auth::user()->name }} <span class="caret"></span>
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
                @endguest
            </ul>
        </div>
    </div>
</nav>