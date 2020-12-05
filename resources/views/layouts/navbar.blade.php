<nav class="navbar navbar-expand-lg sticky-top navbar-dark custom-navbar ">
    <a class="navbar-brand custom-link" href="{{ url('/') }}">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list" fill="white"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item {{request()->routeIs('articulos.*') ? 'active' : ''}}">
                <a class="nav-link custom-link" href="{{ route('articulos.index') }}">Articulos <span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{request()->routeIs('videos.*') ? 'active' : ''}}">
                <a class="nav-link custom-link " href="{{ route('videos.index') }}">Videos <span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{request()->routeIs('podcasts.*') ? 'active' : ''}}">
                <a class="nav-link custom-link " href="{{ route('podcasts.index') }}">Podcast <span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{request()->routeIs('images.*') ? 'active' : ''}}">
                <a class="nav-link custom-link " href="{{ route('images.index') }}">Infografias <span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{request()->routeIs('nosotros.*') ? 'active' : ''}}">
                <a class="nav-link custom-link " href="{{ route('nosotros.index') }}">Nosotros <span
                        class="sr-only">(current)</span></a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li> --}}
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
            @if (Route::has('login'))

            @auth
            <li class="nav-item "><a href="{{ url('/dashboard') }}" class="nav-link custom-link">Dashboard</a></li>
            @else
            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link custom-link">Login</a></li>

            @if (Route::has('register'))
            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link custom-link">Register</a></li>
            @endif
            @endauth

            @endif
        </ul>

    </div>
</nav>