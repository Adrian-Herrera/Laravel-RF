<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Añadir Podcasts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg custom-editor">


                <form action="{{ route('podcasts.store') }}" method="POST" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="row">
                        <label>Nombre

                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </label>
                        @error('name')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                        @enderror
                        <label>Descripción

                            <div class="col-md-10">
                                <input type="text" name="description" class="form-control">
                            </div>
                        </label>
                        @error('description')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                        @enderror
                        <div class="col-md-10">
                            <input type="file" name="podcast_path" class="form-control" id="upload_file">
                        </div>
                        @error('video_path')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                        @enderror



                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success" id="submitButton">Crear</button>
                        </div>
                    </div>
                </form>
                
                    <progress id="bar" max="100"> </progress>
                    <div class="percent" id="percent">0%</div>
                
            </div>
        </div>
    </div>


</x-app-layout>