<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Añadir Podcasts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">


                <form action="{{ route('podcasts.store') }}" method="POST" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="row">
                        <label class="text-gray-600 font-light">Nombre

                            <div class="col-md-10">
                                <input type="text" name="name"
                                    class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500">
                            </div>
                        </label>
                        @error('name')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                        @enderror
                        <label>Descripción

                            <div class="col-md-10">
                                <input type="text" name="description" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500">
                            </div>
                        </label>
                        @error('description')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                        @enderror

                        <div class="col-md-10">
                            <label for="upload_file" class="inputfilelabel">Escoja un archivo

                            </label>
                            <input type="file" accept=".mp3" name="podcast_path" class="inputfile" id="upload_file">
                        </div>


                        @error('video_path')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                        @enderror

                        <div class="relative pt-1">
                            <div class="flex mb-2 items-center justify-between">
                                <div>
                                    <span
                                        class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-200"
                                        id="textStatus">
                                        Esperando
                                    </span>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs font-semibold inline-block text-blue-600" id="percent">
                                        0%
                                    </span>
                                </div>
                            </div>
                            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200">
                                <div style="width:0%" id="bar"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <button type="submit"
                                class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none"
                                id="submitButton">Subir Archivo</button>
                        </div>
                    </div>
                </form>



            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script type="text/javascript">
        // var bar = $('#bar');
        const bar = document.querySelector('#bar');
        var percent = $('#percent');
        var textStatus = $('#textStatus');
        $("#myForm").validate({
      
            rules: {
                name: {
                required: true,
                minlength: 5
                },
                description: {
                required: true,
                maxlength: 250
                }
            },
            messages: {
                name: {
                required: "Please Enter Name",
                maxlength: "Your last name maxlength should be 50 characters long."
                },
                description: {
                required: "Please Enter Body",
                maxlength: "Your last body maxlength should be 250 characters long."
                },
            }
        });
        $('#myForm').ajaxForm({
                       
            beforeSubmit: function() {
            var percentVal = 0;
            bar.style.cssText = 'width:0%';
            textStatus.html('Subiendo...');
            percent.html(percentVal + '%');
            },

            uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.style.cssText = 'width:'+percentComplete+'%';
            textStatus.html('Subiendo...');
            // bar.val(percentComplete);
            percent.html(percentVal);
            },
            
            success: function() {
            var percentVal = 100;
            bar.style.cssText = 'width:100%';
            // bar.val(percentVal);
            textStatus.html('Completado');
            percent.html(percentVal + '%');
            // console.log("success");
            },

            complete: function(xhr) {
                console.log(xhr); 
                if(xhr.responseText)
                {
                    window.location.href = xhr.responseText;
                }
                
            }
        }); 
    </script>
    <script>
        const file = document.querySelector('#upload_file');
        file.addEventListener('change', (e) => {
            // Get the selected file
            const [file] = e.target.files;
            // Get the file name and size
            const { name: fileName, size } = file;
            // Convert size in bytes to kilo bytes
            const fileSize = (size / 1000).toFixed(2);
            // Set the text content
            const fileNameAndSize = `${fileName} - ${fileSize}KB`;
            document.querySelector('.inputfilelabel').textContent = fileNameAndSize;
        });
    </script>
</x-app-layout>