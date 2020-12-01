@extends('layouts.plantilla')

@section('content')

<div class="custom-title">
        <h1>ARTICULOS</h1>
</div>
<div class="container-fluid custom-body">
        @foreach ($articulos as $item)

        <div class="row my-2 item">
                <div class="col-3 p-3">

                        <img src={{$item->imgURL}} alt="" class="img-fluid rounded">
                </div>
                <div class="col-4 p-3">

                        <h1>
                                {{$item->title}}
                        </h1>
                </div>
                <div class="col-5 p-3">

                        <p>
                                {{$item->description}}
                        </p>

                        
                        <a href="{{ route('articulos.show', $item) }}" class="btn btn-primary">Ver mas</a>
        
                </div>
        </div>


        @endforeach

        {{$articulos->links()}}





</div>


@endsection