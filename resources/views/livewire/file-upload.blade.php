<form wire:submit.prevent="submit" enctype="multipart/form-data">

    <div>

        @if(session()->has('message'))

        <div class="alert alert-success">

            {{ session('message') }}

        </div>

        @endif


    </div>

    <div class="form-group">

        <label for="exampleInputName">Título

            <input type="text" class="form-input" id="exampleInputName" wire:model="name">
        </label>
        <br>
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror

    </div>

    <div class="form-group">

        <label for="exampleInputName">

            <input type="file" class="form-control" accept=".jpg,.jpeg,.png" id="exampleInputName" wire:model="image_path">

            {{-- <div class="col-md-10 my-2">
            <label for="upload_file" class="inputfilelabel">Escoja un archivo

            </label>
            <input type="file" accept=".jpg,.jpeg,.png" name="image_path" class="inputfile" id="upload_file" wire:model="image_path">
        </div> --}}
        </label>
        @error('image_path') <span class="text-danger">{{ $message }}</span> @enderror

    </div>
    <br>
    <button type="submit"
        class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">Guardar</button>

</form>