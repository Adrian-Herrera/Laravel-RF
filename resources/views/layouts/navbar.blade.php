<nav class="navbar navbar-expand-lg sticky-top navbar-dark custom-navbar ">
    <div class="container-fluid">
        <a class="navbar-brand custom-link" href="{{ url('/') }}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
            <div class="navbar-nav me-auto mb-2 mb-lg-0">

                <a class="nav-link custom-link {{request()->routeIs('articulos.*') ? 'active' : ''}}"
                    href="{{ route('articulos.index') }}">Articulos</span></a>
                <a class="nav-link custom-link {{request()->routeIs('videos.*') ? 'active' : ''}}"
                    href="{{ route('videos.index') }}">Videos</span></a>
                <a class="nav-link custom-link {{request()->routeIs('podcasts.*') ? 'active' : ''}}"
                    href="{{ route('podcasts.index') }}">Podcast</span></a>
                <a class="nav-link custom-link {{request()->routeIs('images.*') ? 'active' : ''}}"
                    href="{{ route('images.index') }}">Infografias</span></a>
                <a class="nav-link custom-link {{request()->routeIs('nosotros.*') ? 'active' : ''}}"
                    href="{{ route('nosotros.index') }}">Nosotros</span></a>
            </div>
            <div class="navbar-nav">
                @if (Route::has('login'))

                @auth
                <a href="{{ url('/dashboard') }}" class="nav-link custom-link">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="nav-link custom-link">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="nav-link custom-link">Register</a>
                @endif
                @endauth

                @endif
            </div>
        </div>
    </div>
</nav>