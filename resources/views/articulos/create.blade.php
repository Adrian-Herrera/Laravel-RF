<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Añadir Artículo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg custom-editor ">

                <form action="{{route('articulos.store')}}" method="post" enctype="multipart/form-data"
                    class="w-full border border-grey p-2 ">
                    @csrf
                    <label for="title" class="p-2"> Titulo
                        <br>
                        <input type="text" name="title" class="form-input" value="{{old('title')}} ">
                    </label>
                    @error('title')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                    @enderror
                    <br>
                    <label for="description" class="p-2"> Descripción
                        <br>
                        <textarea name="description" id="" cols="30" rows="10" maxlength="300"
                            class="form-input"></textarea>
                    </label>
                    @error('description')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                    @enderror
                    <br>
                    <label for="active" class="p-2"> Estado
                        <br>
                        <select name="active"
                            class="m-2 p-1 border focus:outline-none focus:ring focus:border-blue-300 ">

                            <option value="1">Publico</option>
                            <option value="0">Oculto</option>

                        </select>
                    </label>
                    <br>
                    <label for="imgURl" class="p-2"> Portada
                        <br>
                        <input type="file" accept=".jpg, .jpeg, .png" name="imgURL" class=" rounded px-1 m-2"
                            value="{{old('imgURL')}}">
                    </label>
                    @error('imgURL')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                    @enderror
                    <br>
                    <div class="m-2">
                        <label for="doc"  class="p-2 border border-blue-600 bg-white text-blue-600 cursor-pointer hover:bg-blue-600 hover:text-white">Añadir Documento</label>
                        <input type="file" name="files[]" id="doc" accept=".pdf" class="inputfile" multiple>
                        <div>
                            <table class="p-2 m-2">
                                <thead>
                                    <tr>
                                        <th class="border-b-2 border-blue-600">Documentos</th>

                                    </tr>
                                </thead>
                                <tbody id='file-list-display'>
                                    <th>Ningun archivo seleccionado</th>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <textarea name="text" id="editor"><p>Escriba aqui</p></textarea>
                    <div>
                        <button type="submit" value="Submit"
                            class="px-5 py-2 m-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">Crear</button>
                    </div>

                </form>


            </div>
        </div>
    </div>


    <script src="{{ URL::asset('js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: {
					items: [
						'heading',
						'|',
						'bold',
						'italic',
						'link',
						'bulletedList',
						'numberedList',
						'alignment',
						'|',
						'indent',
						'outdent',
						'|',
						'imageInsert',
						'blockQuote',
						'insertTable',
						'mediaEmbed',
						'undo',
						'redo',
						'|',
						'fontBackgroundColor',
						'fontColor',
						'fontSize',
						'fontFamily',
						'highlight',
						'horizontalLine',
						'underline',
						'|',
						'MathType',
						
					]
				},
				language: 'es',
				image: {
					styles: [
                            'alignLeft', 'alignCenter', 'alignRight'
                        ],

                        // Configure the available image resize options.
                        resizeOptions: [
                            {
                                name: 'imageResize:original',
                                label: 'Original',
                                value: null
                            },
                            {
                                name: 'imageResize:50',
                                label: '50%',
                                value: '50'
                            },
                            {
                                name: 'imageResize:75',
                                label: '75%',
                                value: '75'
                            }
                        ],

                        // You need to configure the image toolbar, too, so it shows the new style
                        // buttons as well as the resize buttons.
                        toolbar: [
                            'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
                            '|',
                            'imageResize',
                            '|',
                            'imageTextAlternative'
                        ]
				},
				table: {
					contentToolbar: [
						'tableColumn',
						'tableRow',
						'mergeTableCells',
						'tableCellProperties',
						'tableProperties'
					]
				},
				licenseKey: '',
            })
            .then(newEditor => {
                editor = newEditor;
            })
            .catch(error => {
                console.error(error);
            });

    </script>
    <script>
        var fileInput = document.getElementById('doc');
        var fileListDisplay = document.getElementById('file-list-display');
        
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

                // var btn = document.createElement("button");
                // btn.type= "button";
                // btn.addEventListener("click", function(){Eliminar(index)});
                // btn.onclick = "Eliminar()";
                // btn.innerText = "X";
                 
                // fileDisplayEl.innerHTML = (index + 1) + ': ' + file.name;
                fileDisplayName.innerHTML = file.name;
                // fileDisplayID.appendChild(btn);
                row.appendChild(fileDisplayName);
                // row.appendChild(fileDisplayID);

                fileListDisplay.appendChild(row);

                
            });
            
        };

        Eliminar = function(index) {

            // console.log(file.name);
            console.log("Antes");
            console.log(fileInput.files);

            fileList.splice(index,1);
            console.log(fileList);

            const ListFiles = new FileList();
            for (var i = 0; i < fileList.length; i++) {
                ListFiles.push(fileList[i]);
            }

            fileInput.files = ListFiles ;

            console.log("Despues");
            console.log(fileInput.files);

            renderFileList();
            return false;
        }
        
    </script>

</x-app-layout>