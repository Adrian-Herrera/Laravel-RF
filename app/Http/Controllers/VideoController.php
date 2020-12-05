<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->paginate(10);

        return view('videos.index', compact('videos'));
    }

    public function dashboard()
    {
        $videos = Video::orderBy('id', 'desc')->paginate(10);

        return view('videos.dashboard', compact('videos'));
    }


    public function create()
    {
        return view('videos.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'video_path' => 'required|file|mimes:mp4',
        ]);

        $validatedData['video_path'] = $request->video_path->store('Videos', 'public');

        Video::create($validatedData);

        return route('videos.dashboard');
    }


    public function show(Video $video)
    {
        //
    }


    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }


    public function update(Request $request, Video $video)
    {
        $video->update($request->all());

        return redirect()->route('videos.dashboard');
    }


    public function destroy(Video $video)
    {
        
        Storage::delete('public/' . $video->video_path);

        $video->delete();

        return redirect()->route('videos.dashboard');
    }
}
