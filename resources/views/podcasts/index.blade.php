@extends('layouts.plantilla')

@section('headerScript')

<link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css" />

@endsection

@section('content')

<div class="custom-title">
        <h1>PODCAST</h1>
</div>
<div class="container d-flex justify-content-around flex-wrap ">

        <div class="row w-100">


                @foreach ($podcasts as $item)
                <div class="col-6 p-2 w-100">
                        <div class="card text-white bg-info">
                                <div class="card-header ">
                                        <h5 class="card-title">{{$item->name}}</h5>

                                </div>
                                <div class="card-body">

                                        <p class="card-text">{{$item->description}}</p>

                                </div>
                                <div class="card-footer ">
                                        <audio id="myVideo" class="w-100 js-player" playsinline controls preload="meta">
                                                <source src="{{ URL::asset('storage/'.$item->podcast_path) }}"
                                                        type="audio/mp3" />
                                        </audio>
                                </div>
                        </div>

                </div>
                @endforeach
        </div>
</div>

</div>


@endsection

@section('scripts')

<script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script>
<script>
        const players = Plyr.setup('.js-player');
</script>

@endsection