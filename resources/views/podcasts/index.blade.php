@extends('layouts.plantilla')

@section('headerScript')

<link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css" />

@endsection

@section('content')

<div class="custom-title">
        <h1>PODCAST</h1>
</div>
<div class="container d-flex justify-content-around flex-wrap ">

        <div class="row">


                @foreach ($podcasts as $item)
                <div class="col-lg-4 col-sm-6 col-xs-12 pt-3">
                        <div class="card text-white bg-info">
                                <div class="row g-0">
                                        <div class="col-md-5">
                                                <img class="w-100 h-100"
                                                        src="https://blog.hotmart.com/blog/2019/05/qualidade-de-audio-670x419.png">
                                        </div>
                                        <div class="col-md-7">
                                                <div class="card-header ">
                                                        <h5 class="card-title">{{$item->name}}</h5>

                                                </div>
                                                <div class="card-body" style="height: 200px; overflow-y: scroll;">

                                                        <p class="card-text">{{$item->description}}</p>

                                                </div>
                                        </div>
                                        <div class="card-footer ">
                                                <audio id="myVideo" class="w-100 js-player" playsinline controls
                                                        preload="meta">
                                                        <source src="{{ URL::asset('storage/'.$item->podcast_path) }}"
                                                                type="audio/mp3" />
                                                </audio>
                                        </div>
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