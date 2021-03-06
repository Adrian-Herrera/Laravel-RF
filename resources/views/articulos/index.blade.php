@extends('layouts.plantilla')

@section('content')

<div class="custom-title">
        <h1>ARTICULOS</h1>
</div>
<div class="max-w-6xl mx-auto">
        @foreach ($articulos as $item)

        <div class="w-full p-5 xl:p-0 xl:m-3 flex flex-col xl:flex-row transform xl:hover:scale-105 transition ease-in-out hover:shadow-xl duration-300">
                <div class="h-40 md:h-56 xl:w-1/2 xl:h-72">
                        <a href="{{ route('articulos.show', $item) }}">
                                <img src={{ URL::asset('storage/'.$item->imgURL) }} alt="" class="w-full h-full object-cover">
                        </a>
                </div>
                <div class="w-full xl:w-1/2 border xl:border-l-0 flex flex-col justify-between">
                        <div>

                                <a href="{{ route('articulos.show', $item) }}">
                                        <h1 class="font-extrabold text-xl pt-3 pl-1 mx-2 border-b-2 border-blue-800">
                                                {{$item->title}}
                                        </h1>
                                </a>


                                <div class="p-3">
                                        <small id="date" class="italic"><?php echo date_format($item->created_at,"d/m/Y");  ?></small>
                                        <p >{{$item->description}}</p>
                                </div>

                        </div>

                </div>
        </div>


        @endforeach

        {{$articulos->links()}}





</div>



@endsection