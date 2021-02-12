<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticuloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {

        $articulos = Articulo::orderBy('id', 'desc')->paginate(5);

        return view('articulos.index', compact('articulos'));
    }

    public function show(Articulo $articulo)
    {

        visits($articulo)->increment();

        $documents = Document::all()->where('article_id', $articulo->id);

        return view('articulos.show', compact('articulo', 'documents'));
    }

    public function dashboard()
    {
        $articulos = Articulo::orderBy('id', 'desc')->paginate(10);

        return view('articulos.dashboard', compact('articulos'));
    }

    public function create()
    {
        return view('articulos.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:250',
            'description' => 'required',
            'imgURL' => 'required',

        ]);

        $article_id = Articulo::create([
            'title' => $request->title,
            'description' => $request->description,
            'imgURL' => $request->imgURL->store('Portada', 'public'),
            'text' => $request->text,
            'active' => $request->active,
        ]);

        if ($request->hasFile('files')) {
            $files = $request->file('files');
            foreach ($files as $file) {
                Document::create([
                    'name' => $file->getClientOriginalName(),
                    'article_id' => $article_id->id,
                    'doc_path' => $file->store('Documents', 'public'),
                ]);
            }
        }
        return redirect()->route('articulos.dashboard');
    }

    public function edit(Articulo $articulo)
    {
        $documents = Document::all()->where('article_id', $articulo->id);

        return view('articulos.edit', compact('articulo', 'documents'));
    }

    public function update(Request $request, Articulo $articulo)
    {
       

        if ($request->imgURL == null) {
            $temp = Articulo::find($articulo)->first();

            $temp->title = $request->title;
            $temp->description = $request->description;
            $temp->imgURL = $articulo->imgURL;
            $temp->text = $request->text;
            $temp->active = $request->active;
            $temp->save();
        } else {
            echo "Original path " . $articulo->imgURL . "\n";
            Storage::delete('public/' . $articulo->imgURL);
            $temp = Articulo::find($articulo)->first();

            $temp->title = $request->title;
            $temp->description = $request->description;
            $imgpath = $request->file('imgURL')->store('Portada', 'public');
            $temp->imgURL = $imgpath;
            $temp->text = $request->text;
            $temp->active = $request->active;
            $temp->save();
        }

        if ($request->hasFile('files')) {
            $files = $request->file('files');
            foreach ($files as $file) {
                Document::create([
                    'name' => $file->getClientOriginalName(),
                    'article_id' => $articulo->id,
                    'doc_path' => $file->store('Documents', 'public'),
                ]);
            }
        }

        
        if ($request->listdocs[0] != null) {
            $temp = $request->listdocs[0];
            $temp2 = explode(",", $temp);
            foreach ($temp2 as $doc) {

                $document = Document::find($doc);
                $document->delete();
                Storage::delete('public/' . $doc);
            }
        }



        return redirect()->route('articulos.dashboard');
    }
    public function destroy(Articulo $articulo)
    {
        Storage::delete('Portada/' . $articulo->imgURL);
        $articulo->delete();

        return redirect()->route('articulos.dashboard');
    }
}
