<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    
    public function index()
    {
        $images = Image::orderBy('id', 'desc')->paginate(10);

        return view('images.index', compact('images'));
    }

    public function dashboard()
    {
        $images = Image::orderBy('id', 'desc')->paginate(10);

        return view('images.dashboard', compact('images'));
    }

    
    public function create()
    {
        return view('images.create');
    }

    
    public function store(Request $request)
    {
        
    }

    
    public function show(Image $image)
    {
        //
    }

    
    public function edit(Image $image)
    {
        return view('images.edit', compact('image'));
    }

    
    public function update(Request $request, Image $image)
    {
        $image->update($request->all());

        return redirect()->route('images.dashboard')->with('actualizar', 'ok');
    }

    
    public function destroy(Image $image)
    {
        Storage::delete('public/'.$image->image_path);

        $image->delete();

        return redirect()->route('images.dashboard')->with('eliminar', 'ok');

    }
}
