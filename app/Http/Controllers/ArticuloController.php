<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticuloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {

        $articulos = Articulo::orderBy('id', 'desc')->paginate(10);

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
        return view('articulos.edit', compact('articulo'));
    }

    public function update(Request $request, Articulo $articulo)
    {

        $articulo->update($request->all());

        return redirect()->route('articulos.dashboard');
    }
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();

        return redirect()->route('articulos.dashboard');
    }
}
