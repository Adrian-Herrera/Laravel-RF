@extends('layouts.plantilla')

@section('content')

<div class="custom-title">
        <h1>INFOGRAFIAS</h1>
</div>
<div class="container d-flex justify-content-around flex-wrap ">


        @foreach ($images as $item)

        {{-- <img src="{{$item->image_path}}" class="infografia"> --}}

        <img src="{{ URL::asset('storage/'.$item->image_path) }}" class="infografia" />


        @endforeach








</div>


@endsection