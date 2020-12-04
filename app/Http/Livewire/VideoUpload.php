<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Video;
use SebastianBergmann\Environment\Console;

class VideoUpload extends Component
{
    use WithFileUploads;

    public $video_path, $name, $description;

    protected $rules = [
        'name' => 'required|min:6',
        'description' => 'required|max:250',
        'video_path' => 'required|mimes:mp4|max:500000',
    ];

    protected $messages = [
        'name.required' => 'El nombre no puede estar vacio.',
        'name.min' => 'El nombre debe contener mas de 6 caracteres.',
        'description.required' => 'La descripción no puede estar vacio.',
        'description.max' => 'La descripción no puede contener mas de 250 caracteres.',
        'video_path.required' => 'Debe seleccionar un video.',
        'video_path.file' => 'Debe seleccionar un video de formato mp4.',
        'video_path.mimes' => 'Debe seleccionar un video de formato mp4.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()

    {

        $validatedData = $this->validate();

        $validatedData['video_path'] = $this->video_path->store('Videos', 'public');

        Video::create($validatedData);

        session()->flash('message', 'Video successfully Uploaded.');

        return redirect()->route('videos.dashboard');
    }

    public function render()
    {
        return view('livewire.video-upload');
    }
}
