<form wire:submit.prevent="submit" enctype="multipart/form-data">

    <div>

        @if(session()->has('message'))

        <div class="alert alert-success">

            {{ session('message') }}

        </div>

        @endif


    </div>

    <div class="form-group">

        <label for="exampleInputName">Titulo:</label>

        <input type="text" class="form-control" id="exampleInputName" placeholder="Titulo..." wire:model="name">
        <br>
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror

    </div>

    <div class="form-group">

        <label for="exampleInputName">File:</label>

        <input type="file" class="form-control" id="exampleInputName" wire:model="image_path">
        <br>
        @error('image_path') <span class="text-danger">{{ $message }}</span> @enderror

    </div>

    <button type="submit" class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">Guardar</button>

</form>