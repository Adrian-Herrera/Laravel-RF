@extends('layouts.plantilla')

@section('headerScript')

<link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css" />

@endsection

@section('content')

<div class="custom-title">
        <h1>VIDEOS</h1>
</div>


<div class="max-w-6xl mx-auto flex flex-row flex-wrap">

        @foreach ($videos as $item)
        <div class="w-full md:w-1/2 xl:w-1/3 p-3">

                <video id="myVideo" class="js-player w-full" playsinline controls preload="meta">
                        <source src="{{ URL::asset('storage/'.$item->video_path) }}" type='video/mp4' />
                </video>
                <div class="w-full border">
                        <h1 class="text-xl font-extrabold uppercase p-2">{{$item->name}}</h1>
                        <small id="date"
                                class="italic text-sm p-2"><?php echo date_format($item->created_at,"d/m/Y");  ?></small>
                        <p class="text-justify p-2">{{$item->description}}</p>
                </div>
        </div>
        @endforeach

</div>

@endsection

@section('scripts')

<script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script>
<script>
        const players = Plyr.setup('.js-player');
</script>

@endsection