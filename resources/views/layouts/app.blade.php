<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/customeditor.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
        integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">
    </script>



</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-dropdown')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
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
						'ChemType'
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
    <script type="text/javascript">
        var bar = $('#bar');
    var percent = $('#percent');
    $('#myForm').ajaxForm({
        beforeSubmit: function() {
        document.getElementById("progress_div").style.display="block";
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
        },

        uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        console.log(percentVal);
        bar.width(percentVal)
        percent.thml(percentVal);
        },
        
        success: function() {
        var percentVal = '100%';
        bar.width(percentVal)
        percent.html(percentVal);
        console.log("success");
        },

        complete: function(xhr) {
            if(xhr.responseText)
            {
                // window.location.href = {{ route('videos.dashboard') }};
            }
            
        // }
    }); 
    </script>

</body>

</html>