<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    public function index()
    {

        $articulos = Articulo::orderBy('id', 'desc')->paginate(7);

        return view('articulos.index', compact('articulos'));
    }

    public function show(Articulo $articulo)
    {
        return view('articulos.show', compact('articulo'));
    }

    public function dashboard()
    {
        $articulos = Articulo::orderBy('id', 'desc')->paginate(10);

        return view('articulos.dashboard', compact('articulos'));
    }

    public function new()
    {
        return view('articulos.new');
    }

    public function edit(Articulo $articulo)
    {
        return view('articulos.edit', compact('articulo'));
    }

    public function update(Request $request, Articulo $articulo)
    {
        $articulo->name = $request->name;
        $articulo->description = $request->description;
        $articulo->active = $request->active;
        $articulo->text = $request->content;
        $articulo->imgURL = $request->imgURL;

        $articulo->save();

        return redirect()->route('articulos.dashboard');
    }

    public function store(Request $request)
    {
        $articulo = new Articulo();

        $articulo->name = $request->name;
        $articulo->description = $request->description;
        $articulo->active = $request->active;
        $articulo->text = $request->content;
        $articulo->imgURL = $request->imgURL;

        $articulo->save();
        return redirect()->route('articulos.dashboard');
    }
}
