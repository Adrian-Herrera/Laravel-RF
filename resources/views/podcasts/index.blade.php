@extends('layouts.plantilla')

@section('headerScript')

<link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css" />

@endsection

@section('content')

<div class="custom-title">
        <h1>PODCAST</h1>
</div>
<div class="max-w-6xl mx-auto flex flex-row flex-wrap">

        @foreach ($podcasts as $item)
        <div class="w-full md:w-1/2 xl:w-1/3 p-3">



                <img class="w-full " src="https://blog.hotmart.com/blog/2019/05/qualidade-de-audio-670x419.png">


                <div class="border ">

                        <div class="h-20 flex" style="background-color: #27b8cf">

                                <h1 class="text-xl font-extrabold uppercase p-2 text-center text-white m-auto ">
                                        {{$item->name}}</h1>
                        </div>

                        <small id="date"
                                class="italic text-sm p-2"><?php echo date_format($item->created_at,"d/m/Y");  ?></small>
                        <p class="card-text overflow-y-auto text-justify p-2 h-40">{{$item->description}}</p>



                        <audio id="myVideo" class="w-full js-player" playsinline controls preload="meta">
                                <source src="{{ URL::asset('storage/'.$item->podcast_path) }}" type="audio/mp3" />
                        </audio>
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