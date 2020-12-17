@extends('layouts.plantilla')

@section('content')


<div class="container-fluid custom-body my-auto">


        <h1>Nosotros</h1>


        <div class="row">
                @foreach ($profiles as $item)
                <div class="col-md-4 col-sm-6 col-xs-12 my-2">
                        <div class="card p-3">
                                <div class="d-flex align-items-center">
                                        <div class="col-4 "> <img
                                                        src="{{ URL::asset('storage/'.$item->profile_photo_path) }}"
                                                        class="rounded img-fluid"> </div>
                                        <div class="col-8 p-2">
                                                <h4 class="fw-bold">{{$item->name}}</h4>
                                                <span>{{$item->email}}</span>
                                        </div>
                                </div>
                        </div>
                </div>
                @endforeach
        </div>


</div>

@endsection