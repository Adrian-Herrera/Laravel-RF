<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Añadir Video
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg custom-editor">

                
                <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="row">
                        <label>Nombre

                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </label>
                        @error('name')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                        @enderror
                        <label>Descripción

                            <div class="col-md-10">
                                <input type="text" name="description" class="form-control" required>
                            </div>
                        </label>
                        @error('description')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                        @enderror
                        
                        <div class="col-md-10">
                            <input type="file" accept=".mp4" name="video_path" class="form-control" id="upload_file"
                                required>
                        </div>
                        @error('video_path')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                        @enderror

                        <progress id="bar" max="100"> </progress>
                        <div class="percent" id="percent">0%</div>


                        <div class="col-md-2">
                            <button type="submit"
                                class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none"
                                id="submitButton" class="">Subir Archivo</button>
                        </div>
                    </div>
                </form>



            </div>
        </div>
    </div>


</x-app-layout>