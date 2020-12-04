@extends('layouts.plantilla')

@section('headerscripts')


@endsection

@section('content')

<div class="custom-title">
        <h1>VIDEOS</h1>
</div>
<div class="container d-flex justify-content-around flex-wrap ">

        <div class="row">
                @foreach ($videos as $item)
                <div class="col-4 border border-primary">


                        <video class="w-100 border border" src="{{ URL::asset('storage/'.$item->video_path) }}" controls></video>

                </div>
                @endforeach
        </div>
</div>

</div>


@endsection

@section('scripts')


@endsection