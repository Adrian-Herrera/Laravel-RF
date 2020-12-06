@extends('layouts.plantilla')

@section('content')


<div class="container-fluid custom-body my-auto">


        <h1>Nosotros</h1>

        @foreach ($profiles as $item)

        <div class="row">
                <div class="col-3">

                        <div class="card p-3">
                                <div class="d-flex align-items-center">
                                        <div class="image"> <img
                                                        src="{{ URL::asset('storage/'.$item->profile_photo_path) }}"
                                                        class="rounded" width="155"> </div>
                                        <div class="ml-3 w-100">
                                                <h4 class="mb-0 mt-0">{{$item->name}}</h4> 
                                                <span>{{$item->email}}</span>
                                                {{-- <div
                                                        class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                                                        <div class="d-flex flex-column"> <span
                                                                        class="articles">Articles</span>
                                                                <span class="number1">38</span> </div>
                                                        <div class="d-flex flex-column"> <span
                                                                        class="followers">Followers</span> <span
                                                                        class="number2">980</span> </div>
                                                        <div class="d-flex flex-column"> <span
                                                                        class="rating">Rating</span>
                                                                <span class="number3">8.9</span> </div>
                                                </div>
                                                <div class="button mt-2 d-flex flex-row align-items-center"> <button
                                                                class="btn btn-sm btn-outline-primary w-100">Chat</button>
                                                        <button
                                                                class="btn btn-sm btn-primary w-100 ml-2">Follow</button>
                                                </div> --}}
                                        </div>
                                </div>
                        </div>
                </div>
        </div>

        @endforeach

</div>

@endsection