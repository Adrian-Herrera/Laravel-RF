@extends('layouts.plantilla')

@section('headerscripts')


@endsection

@section('content')

<div class="custom-title">
        <h1>INFOGRAFIAS</h1>
</div>
<div class="container d-flex justify-content-around flex-wrap ">



        <div class="card-columns mt-2">
                @foreach ($images as $item)
                <div class="card">
                        <img src="{{ URL::asset('storage/'.$item->image_path) }}" class="card-img-top "
                                data-toggle="modal" data-target="#exampleModal" data-whatever="{{$item->name}}"
                                data-source="{{ URL::asset('storage/'.$item->image_path) }}" />

                </div>
                @endforeach
        </div>

        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content ">
                                <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body d-flex justify-content-around flex-wrap">
                                        <img class="showPic w-100" src="">
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                </div>
                        </div>
                </div>
        </div>


</div>


@endsection

@section('scripts')
<script>
        $(document).ready(function(){
                $('#exampleModal').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget) // Button that triggered the modal
                        var recipient = button.data('whatever') // Extract info from data-* attributes
                        var source = button.data('source')
                        var modal = $(this)
                        modal.find('.modal-title').text(recipient)
                        $('.showPic').attr('src', source);
                })
        });
</script>

@endsection