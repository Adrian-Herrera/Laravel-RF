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
                <form action="{{route('articulos.store')}}" method="post">
                    @csrf
                    <label for="name"> Titulo
                        <input type="text" name="name">
                    </label>
                    <br>
                    <label for="description"> Descripcion
                        <input type="text" name="description">
                    </label>
                    <br>
                    <label for="active"> Publico
                        <select name="active">

                            <option value="1">Activo</option>
                            <option value="0">Deshabilitado</option>

                        </select>
                    </label>
                    <br>
                    <label for="imgURl"> Imagen URL
                        <input type="text" name="imgURL">
                    </label>
                    <br>
                    <textarea name="content" id="editor">
                        <p>Escriba el texto aqui</p>
                    </textarea>
                    <div>
                        <button type="submit" value="Submit">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>