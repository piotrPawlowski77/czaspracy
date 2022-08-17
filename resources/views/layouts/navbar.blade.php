<nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Strona główna</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">O firmie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('currentShifts') }}">Kto na zmianie</a>
                </li>
            </ul>
            <form class="d-flex removeMarker">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Logowanie') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Rejestracja') }}</a>
                                        </li>
                                    @endif
                                @else

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('adminHome') }}"> Panel administracyjny </a>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Witaj {{ Auth::user()->name }}
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        </ul>
                                    </li>
                                @endguest
            </form>
        </div>
    </div>
</nav>



