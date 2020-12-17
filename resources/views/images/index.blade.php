@extends('layouts.plantilla')

@section('headerscripts')


@endsection

@section('content')

<div class="custom-title">
        <h1>INFOGRAFIAS</h1>
</div>
<div class="container ">


        <div class="row">
                @foreach ($images as $item)
                <div class="col-md-4 col-sm-6 col-xs-12 p-3">
                        <div class=" w-100" style="max-height: 300px; overflow: hidden;">
                                <img src="{{ URL::asset('storage/'.$item->image_path) }}" class="w-100 rounded-3 "
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        data-bs-whatever="{{$item->name}}"
                                        data-bs-source="{{ URL::asset('storage/'.$item->image_path) }}" />

                        </div>
                        <div class="border text-center py-1 px-1" style="background-color: #005b89; color: white;">
                                <h5 class="card-title">{{$item->name}}</h5>

                        </div>
                </div>
                @endforeach
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content ">
                                <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Imagen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">

                                        </button>
                                </div>
                                <div class="modal-body d-flex justify-content-around flex-wrap">
                                        <img class="showPic w-100" src="">
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                </div>
                        </div>
                </div>
        </div>


</div>


@endsection

@section('scripts')


<script>
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
</script>

@endsection