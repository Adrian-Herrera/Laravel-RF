<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PodcastController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        $podcasts = Podcast::orderBy('id', 'desc')->paginate(10);

        return view('podcasts.index', compact('podcasts'));
    }

    public function dashboard()
    {
        $podcasts = Podcast::orderBy('id', 'desc')->paginate(10);

        return view('podcasts.dashboard', compact('podcasts'));
    }


    public function create()
    {
        return view('podcasts.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'podcast_path' => 'required|file|mimes:mp3',
        ]);

        $validatedData['podcast_path'] = $request->podcast_path->store('Podcasts', 'public');

        Podcast::create($validatedData);

        return route('podcasts.dashboard');
    }


    public function show(Podcast $podcast)
    {
        //
    }


    public function edit(Podcast $podcast)
    {
        return view('podcasts.edit', compact('podcast'));
    }


    public function update(Request $request, Podcast $podcast)
    {
        $podcast->update($request->all());

        return redirect()->route('podcasts.dashboard');
    }


    public function destroy(Podcast $podcast)
    {
        
        Storage::delete('public/' . $podcast->podcast_path);

        $podcast->delete();

        return redirect()->route('podcasts.dashboard');
    }
}
