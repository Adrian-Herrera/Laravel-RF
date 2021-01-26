<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Image;

class FileUpload extends Component
{
    use WithFileUploads;

    public $image_path, $name;

    protected $rules = [
        'name' => 'required|min:6',
        'image_path' => 'required|image|mimes:jpeg,png,jpg|max:5120',
    ];

    protected $messages = [
        'name.required' => 'El nombre no puede estar vacio.',
        'name.min' => 'El nombre debe contener mas de 6 caracteres.',
        'image_path.required' => 'Debe seleccionar una imagen.',
        'image_path.image' => 'Debe seleccionar una imagen de formato jpeg, png o jpg.',
        'image_path.mimes' => 'Debe seleccionar una imagen de formato jpeg, png o jpg.',
        'image_path.max' => 'La imagen no debe sobrepasar los 5MB.'
    ];

    // protected $validationAttributes = [
    //     'email' => 'email address'
    // ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()

    {

        $validatedData = $this->validate();

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
