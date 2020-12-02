@extends('layouts.plantilla')

@section('content')


<div class="container article-title">
    <div class="row p-1 d-flex flex-row justify-content-between">
        <div class="col-8 p-3 border-right " style="border-color: grey">
            <article class="ck-content">
                <header class="d-flex flex-column justify-content-between ">

                    <img src="{{$articulo->imgURL}}" alt="" class="blog-image rounded m-2">

                    <h1 class="m-2">{{$articulo->title}}</h1>

                    <div class="d-flex flex-row justify-content-between m-2">
                        <p class="article-info my-2">Escrito el: 24/11/2020</p>
                        <p class="article-info my-2">Modificado el: 24/11/2020</p>
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

                <h1>Redes Sociales</h1>
                <hr>
                <ul>
                    <li>
                        <a href="">Facebook</a>
                    </li>
                    <li>
                        <a href="">Twitter</a>
                    </li>
                    <li>
                        <a href="">Youtube</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


@endsection