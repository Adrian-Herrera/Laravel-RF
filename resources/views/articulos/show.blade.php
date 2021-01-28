@extends('layouts.plantilla')

@section('content')


<div class="container article-title">
    <div class="row p-1 d-flex flex-row justify-content-between">
        <div class="col-8 p-3 border-right " style="border-color: grey">
            <article class="ck-content">
                <header class="d-flex flex-column justify-content-between ">

                    <img src="{{ URL::asset('storage/'.$articulo->imgURL) }}" alt="" class="blog-image rounded m-2">

                    <h1 class="m-2">{{$articulo->title}}</h1>
                    

                    <div class="d-flex flex-row justify-content-between m-2">
                        <p class="article-info my-2">Escrito el: {{$articulo->created_at}}</p>
                        <p class="article-info my-2">Modificado el: {{$articulo->updated_at}}</p>
                    </div>

                    <div>
                        <p class="article-author m-2">Escrito por: Fulano</p>
                    </div>
                </header>
                <div class="p-2 custom-content">

                    {!!$articulo->text!!}
                    

                </div>
            </article>

        </div>

        <div class="col-4 p-1">
            <div class="sticky-top" style="padding-top: 56px;">

                <h1>Documentos</h1>
                <hr>
                <ul>
                @foreach ($documents as $item)
                    <div>
                        <div style="background:url('http://wwwimages.adobe.com/content/dam/acom/en/legal/images/badges/Adobe_PDF_file_icon_32x32.png');" class="w-20 cssonly">

                        </div>
                        <p></p>
                    </div>
                <li>
                    <p class="cssonly"><a class="text-decoration-none" href="{{ URL::asset('storage/'.$item->doc_path) }}"> {{$item->name}}</a></p>
                </li>
                
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>


@endsection