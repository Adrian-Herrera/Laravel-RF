<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Articulo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg custom-editor">

                <form action="{{route('articulos.update' , $articulo)}}" method="post" enctype="multipart/form-data"
                    class="w-full border border-grey p-2">
                    @csrf
                    @method('put')
                    <div class="w-full flex flex-col lg:flex-row">
                        <div class="w-full lg:w-7/12 p-2 ">
                            <label for="name" class="px-2">
                                Título
                                <br>
                                <input type="text" maxlength="250" name="title" class="form-input"
                                    value="{{$articulo->title}}">
                            </label>
                            <br>
                            <label for="description" class="p-2"> Descripción <small>*Maximo de 300 caracteres</small>
                                <br>
                                <textarea name="description" id="" cols="30" rows="10" maxlength="300"
                                    class="form-input">{{$articulo->description}}</textarea>
                            </label>
                            <label for="active" class="p-2"> Estado
                                <br>
                                <select name="active"
                                    class="m-2 p-1 border focus:outline-none focus:ring focus:border-blue-300">
                                    @if ($articulo->active == 1)

                                    <option value="1" selected>Público</option>
                                    <option value="0">Oculto</option>

                                    @else

                                    <option value="1">Público</option>
                                    <option value="0" selected>Oculto</option>

                                    @endif
                                </select>
                            </label>
                        </div>
                        <div class="w-full lg:w-5/12 h-auto p-2 ">
                            <label for="imgURl" class="p-2"> Portada
                                <br>
                                <small>*Se recomienda imagenes horizontales en
                                    proporción 16:9 para una mejor visualización</small>
                                <div class="aspect-w-16 aspect-h-9 m-auto">
                                    <img src="{{ URL::asset('storage/'.$articulo->imgURL) }}" alt="" class="">
                                </div>
                                <input type="file" accept=".jpg, .jpeg, .png" name="imgURL" class=" rounded px-1 m-2"
                                    value="">
                                <br>
                            </label>
                        </div>
                    </div>
                    <small>*Los archivos seran añadidos o eliminados al guardar los cambios</small>
                    <div class="w-full flex flex-col lg:flex-row">
                        <div class="w-full lg:w-1/2 border-2 p-5 m-3">
                            <table class="p-2 m-2 w-full">
                                <thead>
                                    <tr>
                                        <th class="border-b-2 border-blue-600">Documentos Nuevos</th>
                                        <th> <label for="doc"
                                                class="p-2 border border-blue-600 bg-white text-blue-600 cursor-pointer hover:bg-blue-600 hover:text-white">Añadir
                                                Documento</label></th>
                                    </tr>
                                </thead>
                                <tbody id='file-list-display'>
                                    <th>Ningun archivo seleccionado</th>
                                </tbody>
                            </table>

                            <input type="file" name="files[]" id="doc" accept=".pdf" class="inputfile" multiple>
                        </div>
                        <div x-data="docs()" class="w-full lg:w-1/2 border-2 p-5 m-3">

                            <table class="p-2 m-2 w-full">
                                <thead>
                                    <tr>
                                        <th class="border-b-2 border-blue-600">Documentos del artículo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $item)
                                    <tr>
                                        <td id="{{$item->id}}">{{$item->name}}</td>
                                        <td><button type="button" id="delete{{$item->id}}" class="bg-gray-300 p-1 m-1"
                                                x-on:click="add('{{$item->name}}', '{{$item->id}}');">Eliminar</button>
                                            <button type="button" id="restore{{$item->id}}"
                                                class="bg-gray-300 p-1 m-1 hidden"
                                                x-on:click="remove('{{$item->name}}', '{{$item->id}}')">Cancelar</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <input type="text" hidden name="listdocs[]" id="listdocs">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <textarea name="text" id="editor">{{$articulo->text}}</textarea>
                    <div>
                        <button type="submit" value="Submit"
                            class="px-5 py-2 m-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">Guardar
                            Cambios</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <script type='text/javascript' src="{{ URL::asset('js/ckeditor.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('js/editorConfig.js') }}"></script>
    <script>
        var fileInput = document.getElementById('doc');
        var fileListDisplay = document.getElementById('file-list-display');

        var listdocs = document.getElementById('listdocs'); 
        var fileList = [];

        fileInput.addEventListener('change', function (evnt) {
            fileList = [];
            for (var i = 0; i < fileInput.files.length; i++) {
                fileList.push(fileInput.files[i]);
            }
            renderFileList();
            
        });

        renderFileList = function () {
            fileListDisplay.innerHTML = '';
            fileList.forEach(function (file, index) {
                var row = document.createElement('tr');
                var fileDisplayName = document.createElement('td');
                var fileDisplayID = document.createElement('td');

                fileDisplayName.innerHTML = file.name;
                row.appendChild(fileDisplayName);

                fileListDisplay.appendChild(row);

                
            });
            
        };

        function docs() {
            return {
                docNames: String,
                fileName: [],
                
                add(data, item) {
                    // console.log(data);
                    this.fileName.push(item);
                    let row = document.getElementById(item);
                    row.classList.add("bg-red-200");

                    listdocs.value = this.fileName;

                    let deletebtn = document.getElementById('delete'+item);
                    let restorebtn = document.getElementById('restore'+item);

                    deletebtn.classList.add("hidden");
                    restorebtn.classList.remove("hidden");


                },
                remove(data, item) {
                    // console.log(data);
                    const index = this.fileName.indexOf(item);

                    if (index > -1) {
                        this.fileName.splice(index, 1);
                    }

                    let row = document.getElementById(item);
                    row.classList.remove("bg-red-200");

                    listdocs.value = this.fileName;

                    let deletebtn = document.getElementById('delete'+item);
                    let restorebtn = document.getElementById('restore'+item);

                    deletebtn.classList.remove("hidden");
                    restorebtn.classList.add("hidden");
                }
                
            }
        }

        
        
    </script>
</x-app-layout>