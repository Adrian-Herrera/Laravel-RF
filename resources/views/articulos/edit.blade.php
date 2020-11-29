<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Articulos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg custom-editor">
                <h1>Classic editor</h1>
                <form action="{{route('articulos.update' , $articulo)}}" method="post">
                    @csrf
                    @method('put')
                    <label for="name"> Titulo
                        <input type="text" name="name" value="{{$articulo->name}}">
                    </label>
                    <br>
                    <label for="description"> Descripcion
                        <input type="text" name="description" value="{{$articulo->description}}">
                    </label>
                    <br>
                    <label for="active"> Publico
                        <select name="active">
                            @if ($articulo->active == 1)

                            <option value="1" selected>Activo</option>
                            <option value="0">Deshabilitado</option>

                            @else

                            <option value="1">Activo</option>
                            <option value="0" selected>Deshabilitado</option>

                            @endif
                        </select>
                        {{-- <input type="text" name="active" value="{{$articulo->active}}"> --}}
                    </label>
                    <br>
                    <label for="imgURl"> Imagen URL
                        <input type="text" name="imgURL" value="{{$articulo->imgURL}}">
                    </label>
                    <br>
                    <textarea name="content" id="editor">
                        {{$articulo->text}}
                    </textarea>
                    <div>
                        <button type="submit" value="Submit">Actualizar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>