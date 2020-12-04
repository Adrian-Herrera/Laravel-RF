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

        <input type="text" class="form-control" id="exampleInputName" placeholder="Nombre..." wire:model="name">
        <br>
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror

    </div>

    <div class="form-group">

        <label for="exampleInputDescription">Titulo:</label>

        <input type="text" max="250" class="form-control" id="exampleInputDescription" placeholder="Descripción..."
            wire:model="description">
        <br>
        @error('description') <span class="text-danger">{{ $message }}</span> @enderror

    </div>

    <div class="form-group">

        <label for="video">File:</label>

        {{-- <input type="file" class="form-control" id="video_path" wire:model="video_path"> --}}
        {{-- <br> --}}
        
        <br>
        <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">
            <!-- File Input -->
            <input type="file" class="form-control" accept=".mp4" id="video" wire:model="video_path">

            <!-- Progress Bar -->
            <div x-show="isUploading">
                <progress max="100" x-bind:value="progress"></progress>
                <input type="text"  x-bind:value="progress" disabled>
            </div>
        </div>
        <br>
        <div wire:loading wire:target="video_path">Subiendo...</div>
        <br>
        @error('video_path') <span class="text-danger">{{ $message }}</span> @enderror

    </div>

    <button type="submit" class="btn btn-success">Save</button>

</form>