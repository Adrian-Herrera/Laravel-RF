@extends('layouts.plantilla')

@section('content')

<div class=" max-w-6xl mx-auto">
    <div class="w-10/12 mx-auto">

        <div class="aspect-w-16 aspect-h-9">

            <img src="{{ URL::asset('storage/'.$articulo->imgURL) }}" alt="" class="">
        </div>
    </div>
    <div class="w-full mt-8 flex flex-col lg:flex-row">


        <article class="w-full xl:w-9/12 xl:border-r-2 xl:border-l-2 xl:px-3 mx-auto">
            <header class="flex flex-col">

                <h1 class="uppercase text-lg font-bold my-3 tracking-wide md:font-extrabold md:text-xl">
                    {{$articulo->title}}
                </h1>


                <div class="flex justify-between italic">
                    <p id="created_at">Escrito el: {{$articulo->created_at}}</p>
                    <p id="updated_at">Modificado el: {{$articulo->updated_at}}</p>
                </div>

                {{-- <div>
                <p class="">Escrito por: Fulano</p>
            </div> --}}
            </header>
            <div class="ck-content my-3">

                {!!$articulo->text!!}


            </div>
        </article>


        <div id="docs" class="w-full xl:w-3/12 xl:px-5 ">

            <h1 class="font-bold text-lg text-center">Documentos</h1>
            <hr>
            <ul>
                @foreach ($documents as $item)
                <div>
                    <div style="background:url('http://wwwimages.adobe.com/content/dam/acom/en/legal/images/badges/Adobe_PDF_file_icon_32x32.png');"
                        class="w-20 cssonly">

                    </div>
                    <p></p>
                </div>
                <li>
                    <p class="cssonly uppercase"><a class="text-decoration-none hover:text-gray-500"
                            href="{{ URL::asset('storage/'.$item->doc_path) }}"> {{$item->name}}</a></p>
                </li>

                @endforeach
            </ul>
        </div>
    </div>
</div>

<script>
    var doc = document.getElementById("docs");
    var docs = <?php echo $documents?>;
    // console.log(Object.keys(docs).length );
    if (docs.length == 0) {
        doc.classList.add("hidden");
    }

    let date1 = document.getElementById("created_at");
    let date2 = document.getElementById("updated_at");
    let created_at = "<?php echo $articulo->created_at ?>";
    let updated_at = "<?php echo $articulo->updated_at ?>";
    if (created_at == updated_at) {
        date2.classList.add("hidden");
    }
    date1.innerText = "Escrito el: " + moment(created_at).format("D MMMM YYYY"); 
    date2.innerText = "Modificado el: " + moment(updated_at).format("D MMMM YYYY"); 
</script>

@endsection