@extends('layouts.plantilla')

@section('headerScript')
{{-- <link href="https://unpkg.com/video.js@7/dist/video-js.min.css" rel="stylesheet" />

<!-- City -->
<link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet" />

<link rel="stylesheet" href="{{ URL::asset('css/videojs-playlist-ui.vertical.css') }}"> --}}


<link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css" />

@endsection

@section('content')

<div class="custom-title">
        <h1>VIDEOS</h1>
</div>
<div class="container d-flex justify-content-around flex-wrap ">

        <div class="row">


                @foreach ($videos as $item)
                <div class="col-6 p-2">
                        
                        <video id="myVideo" class="w-100 js-player" playsinline controls preload="meta">
                                <source src="{{ URL::asset('storage/'.$item->video_path) }}" type="video/mp4" />
                        </video>
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