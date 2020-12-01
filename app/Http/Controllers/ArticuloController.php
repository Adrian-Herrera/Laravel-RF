<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

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
        return view('articulos.show', compact('articulo'));
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
            'imgURL' => 'required'
        ]);

        Articulo::create($request->all());

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
