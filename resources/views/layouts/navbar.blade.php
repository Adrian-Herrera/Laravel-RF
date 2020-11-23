<nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
    <a class="navbar-brand custom-link" href="{{ url('/') }}">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link custom-link" href="{{ url('/articulos') }}">Articulos <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item  active">
                <a class="nav-link custom-link" href="{{ url('/videos') }}">Videos <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link custom-link" href="{{ url('/podcast') }}">Podcast <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link custom-link" href="{{ url('/infografias') }}">Infografias <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link custom-link" href="{{ url('/nosotros') }}">Nosotros <span class="sr-only">(current)</span></a>
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