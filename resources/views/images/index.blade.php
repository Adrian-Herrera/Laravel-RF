@extends('layouts.plantilla')

@section('headerscripts')


@endsection

@section('content')

<div class="custom-title">
        <h1>INFOGRAFIAS</h1>
</div>
<div class="max-w-6xl mx-auto" x-data="modal()">


        <div class="flex flex-wrap">
                @foreach ($images as $item)
                <div class="w-full md:w-1/2 lg:w-1/3 p-3">
                        <div class=" w-full h-60 ">
                                <img src="{{ URL::asset('storage/'.$item->image_path) }}"
                                        class="w-full h-full object-cover object-top"
                                        x-on:click="open(), imgname = '{{$item->name}}', imgpath = '{{ URL::asset('storage/'.$item->image_path) }}'" />

                        </div>
                        <div class="border text-center py-1 px-1 " style="background-color: #005b89; color: white;">
                                <h5 class="">{{$item->name}}</h5>

                        </div>
                </div>
                @endforeach
        </div>

        <div class="fixed z-10 inset-0 " x-show="isOpen()">
                <div class="flex items-center justify-center h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0 ">
                        <!--
                    Background overlay, show/hide based on modal state.
              
                    Entering: "ease-out duration-300"
                      From: "opacity-0"
                      To: "opacity-100"
                    Leaving: "ease-in duration-200"
                      From: "opacity-100"
                      To: "opacity-0"
                  -->
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>

                        <!-- This element is to trick the browser into centering the modal contents. -->
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                aria-hidden="true">&#8203;</span>
                        <!--
                    Modal panel, show/hide based on modal state.
              
                    Entering: "ease-out duration-300"
                      From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                      To: "opacity-100 translate-y-0 sm:scale-100"
                    Leaving: "ease-in duration-200"
                      From: "opacity-100 translate-y-0 sm:scale-100"
                      To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                  -->
                        <div class="inline-block align-bottom bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-3 sm:align-middle sm:max-w-lg sm:w-full h-4/5 "
                                role="dialog" aria-modal="true" aria-labelledby="modal-headline"
                                x-on:click.away="close">
                                <div class="bg-white px-4 pt-3 pb-4 sm:p-6 sm:pb-4 h-full ">
                                        <div class="flex flex-col sm:items-start h-full">
                                                <div class="w-full text-center"
                                                        style="background-color: #005b89; color: white;">

                                                        <h1 class="text-lg" x-text="imgname">

                                                        </h1>
                                                </div>

                                                <div class="w-full h-full overflow-y-auto flex"
                                                        id="imgModal" >
                                                        <img :src="imgpath" alt="" class="w-full m-auto">

                                                </div>
                                        </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button type="button" x-on:click="close"
                                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                Salir
                                        </button>
                                </div>
                        </div>
                </div>
        </div>


</div>


@endsection

@section('scripts')

<script>
        var elmnt = document.getElementById("imgModal");
        
        function modal() {
            return {
                show: false,
                imgname: "String",
                imgpath: "",
                open() { this.show = true; },
                close() { this.show = false },
                isOpen() { elmnt.scrollTop = 0;
                        return this.show === true; },
            }
        }
</script>
{{-- <script>
        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute('data-bs-whatever')
        var source = button.getAttribute('data-bs-source')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = exampleModal.querySelector('.modal-title')
        var modalBodyInput = exampleModal.querySelector('.showPic')

        modalTitle.textContent = recipient
        modalBodyInput.src = source
})
</script> --}}

@endsection