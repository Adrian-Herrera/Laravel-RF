<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

use Livewire\WithFileUploads;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    
    public function index()
    {
        $images = Image::all();

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
        //
    }

    
    public function update(Request $request, Image $image)
    {
        //
    }

    
    public function destroy(Image $image)
    {
        //
    }
}
