<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Image;

class FileUpload extends Component
{
    use WithFileUploads;

    public $image_path, $name;

    public function submit()

    {

        $validatedData = $this->validate([

            'name' => 'required',

            'image_path' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',

        ]);



        $validatedData['image_path'] = $this->image_path->store('Infografias', 'public');



        Image::create($validatedData);



        session()->flash('message', 'Image successfully Uploaded.');

        return redirect()->route('images.dashboard');
    }

    public function render()
    {
        return view('livewire.file-upload');
    }
}
