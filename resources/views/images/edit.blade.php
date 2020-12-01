<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Articulos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg custom-editor">

                <form action="{{route('articulos.update' , $articulo)}}" method="post"
                    class="w-full border border-grey p-2">
                    @csrf
                    @method('put')
                    <label for="name" class="p-2">
                        <div class=" bg-blue-400 w-auto">
                            Titulo</div>
                        <br>
                        <input type="text" maxlength="250" name="title"
                            class="border border-gray-800 rounded px-1 m-2 w-5/6" value="{{$articulo->title}}">
                    </label>
                    <br>
                    <label for="description" class="p-2"> Descripcion
                        <br>
                        <textarea name="description" id="" cols="30" rows="10" maxlength="300"
                            class="border border-gray-800 rounded px-1 m-2 w-5/6">{{$articulo->description}}</textarea>
                        {{-- <input type="text" name="description"class="border border-gray-800 rounded px-1 m-2" value="{{$articulo->description}}">
                        --}}
                    </label>
                    <br>
                    <label for="active" class="p-2"> Publico
                        <br>
                        <select name="active" class="m-2 p-1 bg-blue-300">
                            @if ($articulo->active == 1)

                            <option value="1" selected>Activo</option>
                            <option value="0">Deshabilitado</option>

                            @else

                            <option value="1">Activo</option>
                            <option value="0" selected>Deshabilitado</option>

                            @endif
                        </select>
                    </label>
                    <br>
                    <label for="imgURl" class="p-2"> Imagen URL
                        <br>
                        <input type="text" name="imgURL" class="border border-gray-800 rounded px-1 m-2 w-5/6"
                            value="{{$articulo->imgURL}}">
                    </label>
                    <br>
                    <textarea name="text" id="editor">{{$articulo->text}}</textarea>
                    <div>
                        <button type="submit" value="Submit"
                            class="px-5 py-2 m-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">Actualizar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>