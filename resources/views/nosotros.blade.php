@extends('layouts.plantilla')

@section('content')





<div class="custom-title">
        <h1>NOSOTROS</h1>
</div>


<div class="max-w-6xl mx-auto flex flex-wrap justify-center md:mt-8">
        @foreach ($profiles as $item)

        <div class="w-full md:w-5/12 lg:w-1/3 bg-gray-200 p-5 my-8 mx-3 md:my-0 flex flex-col justify-center">
                <div class="w-full flex justify-center h-12">
                        
                        <div class=" h-24 w-24 ">
                                <img src="{{ URL::asset('storage/'.$item->profile_photo_path) }}"
                                        class="w-full h-full -mt-12 rounded-full  flex items-center justify-center border-4 border-white ">
                        </div>
                </div>
                <div class="rounded-md text-center flex flex-col mt-5">
                        <h4 class="font-bold text-lg">{{$item->name}}</h4>
                        <p class="italic">{{$item->email}}</p>
                </div>
        </div>


        @endforeach
</div>

@endsection