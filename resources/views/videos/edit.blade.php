<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Video
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <form action="{{route('videos.update', $video)}}" method="post" class="w-full border border-grey p-2">
                    @csrf
                    @method('put')
                    <label for="name" class="p-2"> Titulo
                        <br>
                        <input type="text" name="name" class="border border-gray-800 rounded px-1 m-2"
                            value="{{old('title', $video->name)}} ">
                    </label>
                    @error('title')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                    @enderror
                    <br>
                    <label for="description" class="p-2"> Descripción
                        <br>
                        <textarea name="description" cols="30" rows="10" class="border text-left">{{old('description', $video->description)}}</textarea>

                    </label>
                    @error('description')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                    @enderror
                    <div>
                        <button type="submit" value="Submit"
                            class="px-5 py-2 m-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">Actualizar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>