<nav style="background-color: #005b89" x-data="{ open: true }" class="w-full">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="order-last flex items-center lg:hidden">
                <!-- Mobile menu button-->
                <button id="menuBtn" @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed. -->
                    <svg x-bind:class="{ 'hidden': !open, 'block': open }" class="h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true" x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open. -->
                    <svg x-bind:class="{ 'hidden': open, 'block': !open }" class="h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex items-center justify-center lg:items-stretch lg:justify-start lg:w-full">
                <div class="flex-shrink-0 flex items-center">

                    <a href={{ url('/') }}>
                        <img class="block h-14 w-auto" src="images/LogoNavBar.png" alt="RiesgoFinancieroLogo">
                    </a>
                </div>
                <div class="hidden lg:flex lg:ml-6 py-3 justify-between w-full">
                    <div class="flex space-x-4 ">
                        <a class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{request()->routeIs('articulos.*') ? 'bg-gray-700 text-white' : ''}}"
                            href="{{ route('articulos.index') }}">Articulos</span></a>
                        <a class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{request()->routeIs('videos.*') ? 'bg-gray-700 text-white' : ''}}"
                            href="{{ route('videos.index') }}">Videos</span></a>
                        <a class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{request()->routeIs('podcasts.*') ? 'bg-gray-700 text-white' : ''}}"
                            href="{{ route('podcasts.index') }}">Podcast</span></a>
                        <a class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{request()->routeIs('images.*') ? 'bg-gray-700 text-white' : ''}}"
                            href="{{ route('images.index') }}">Infografias</span></a>
                        <a class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{request()->routeIs('nosotros.*') ? 'bg-gray-700 text-white' : ''}}"
                            href="{{ route('nosotros.index') }}">Nosotros</span></a>
                    </div>
                    <div class="flex space-x-4">
                        @if (Route::has('login'))

                        @auth
                        <a href="{{ url('/dashboard') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
                        @endif
                        @endauth

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--
      Mobile menu
    -->
    <div x-bind:class="{ 'hidden': open }" class="lg:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium {{request()->routeIs('articulos.*') ? 'bg-gray-900 text-white' : ''}}"
                href="{{ route('articulos.index') }}">Articulos</span></a>
            <a class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium {{request()->routeIs('videos.*') ? 'bg-gray-700 text-white' : ''}}"
                href="{{ route('videos.index') }}">Videos</span></a>
            <a class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium {{request()->routeIs('podcasts.*') ? 'bg-gray-700 text-white' : ''}}"
                href="{{ route('podcasts.index') }}">Podcast</span></a>
            <a class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium {{request()->routeIs('images.*') ? 'bg-gray-700 text-white' : ''}}"
                href="{{ route('images.index') }}">Infografias</span></a>
            <a class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium {{request()->routeIs('nosotros.*') ? 'bg-gray-700 text-white' : ''}}"
                href="{{ route('nosotros.index') }}">Nosotros</span></a>
        </div>
    </div>
</nav>