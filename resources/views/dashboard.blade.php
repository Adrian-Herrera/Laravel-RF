<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                @if ( Auth::user()->active == 1 )

                <p class="font-bold text-center text-xl border-b-2 text-gray-700">N° de publicaciones</p>
                <!-- Cards -->
                <div class="flex flex-wrap">
                    <div
                        class="w-full lg:w-6/12 xl:w-3/12 px-4 transition duration-500 ease-in-out transform hover:scale-105">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg transition duration-500 ease-in-out hover:bg-cool-gray-200">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-gray-500 uppercase font-bold text-xs">
                                            Articulos
                                        </h5>
                                        <span class="font-semibold text-xl text-gray-800">
                                            {{$articulos->count()}}
                                        </span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" width="100%">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div
                        class="w-full lg:w-6/12 xl:w-3/12 px-4 transition duration-500 ease-in-out transform hover:scale-105">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg transition duration-500 ease-in-out hover:bg-cool-gray-200">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-gray-500 uppercase font-bold text-xs">
                                            Infografías
                                        </h5>
                                        <span class="font-semibold text-xl text-gray-800">
                                            {{$infografias}}
                                        </span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" width="100%">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div
                        class="w-full lg:w-6/12 xl:w-3/12 px-4 transition duration-500 ease-in-out transform hover:scale-105">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg transition duration-500 ease-in-out hover:bg-cool-gray-200">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-gray-500 uppercase font-bold text-xs">
                                            Videos
                                        </h5>
                                        <span class="font-semibold text-xl text-gray-800">
                                            {{$videos}}
                                        </span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" width="100%">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div
                        class="w-full lg:w-6/12 xl:w-3/12 px-4 transition duration-500 ease-in-out transform hover:scale-105 ">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg transition duration-500 ease-in-out hover:bg-cool-gray-200 ">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-gray-500 uppercase font-bold text-xs">
                                            Podcast
                                        </h5>
                                        <span class="font-semibold text-xl text-gray-800">
                                            {{$podcast}}
                                        </span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" width="100%">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                            </svg>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <table class="w-4/5 table-auto mx-auto my-5">
                        <thead class="justify-between">
                            <tr class="font-bold text-lg text-center bg-gray-800">
                                <th class="px-6 py-3 text-gray-300">Articulos</th>
                                <th class="px-6 py-3 text-gray-300">Vistas Totales</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200">
                            @foreach ($articulos as $item)

                            <tr class="font-normal text-left bg-white border-4 border-gray-200 ">
                                <th class="font-semibold p-2">{{$item->title}}</th>
                                <th class="font-semibold p-2">{{visits($item)->count()}}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="w-4/5 mx-auto my-5 flex flex-row flex-wrap justify-between">
                        <div class=" text-left w-full lg:w-6/12 xl:w-3/12 ">
                            <div class=" border-2 border-gray-600 rounded-md m-2">
                                <div class="bg-gray-800 p-2">
                                    <p class="font-bold bg-gray-800 text-white">Vistas las ultimas 24 horas</p>
                                </div>
                                <p class="font-semibold bg-white p-2">
                                    {{visits('App\Models\Articulo')->period('day')->count()}} Vistas</p>
                            </div>
                        </div>
                        <div class=" text-left w-full lg:w-6/12 xl:w-3/12 ">
                            <div class=" border-2 border-gray-600 rounded-md m-2">
                                <div class="bg-gray-800 p-2">
                                    <p class="font-bold bg-gray-800 text-white">Vistas la ultima semana</p>
                                </div>
                                <p class="font-semibold bg-white p-2">
                                    {{visits('App\Models\Articulo')->period('week')->count()}} Vistas</p>
                            </div>
                        </div>
                        <div class=" text-left w-full lg:w-6/12 xl:w-3/12 ">
                            <div class=" border-2 border-gray-600 rounded-md m-2">
                                <div class="bg-gray-800 p-2">
                                    <p class="font-bold bg-gray-800 text-white">Vistas el ultimo mes</p>
                                </div>
                                <p class="font-semibold bg-white p-2">
                                    {{visits('App\Models\Articulo')->period('month')->count()}} Vistas</p>
                            </div>
                        </div>
                        <div class=" text-left w-full lg:w-6/12 xl:w-3/12 ">
                            <div class=" border-2 border-gray-600 rounded-md m-2">
                                <div class="bg-gray-800 p-2">
                                    <p class="font-bold bg-gray-800 text-white">Vistas el ultimo año</p>
                                </div>
                                <p class="font-semibold bg-white p-2">
                                    {{visits('App\Models\Articulo')->period('year')->count()}} Vistas</p>
                            </div>
                        </div>


                    </div>
                    {{-- <canvas id="myChart" width="400" height="200"></canvas> --}}
                </div>
                @else
                <div class="p-3">
                    <p class="text-lg">Su cuenta se encuentra deshabilitada</p>
                </div>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>