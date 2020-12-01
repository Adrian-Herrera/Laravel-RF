<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Añadir Infografia
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg custom-editor">
                
                {{-- <form action="{{route('images.store')}}" method="post" class="w-full border border-grey p-2">
                    @csrf
                    <label for="name" class="p-2"> Titulo
                        <br>
                        <input type="text" name="title" class="border border-gray-800 rounded px-1 m-2"
                            value="{{old('title')}} ">
                    </label>
                    @error('title')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                    @enderror

                    
                </form> --}}
                
                @livewire('file-upload')
            </div>
        </div>
    </div>
</x-app-layout>