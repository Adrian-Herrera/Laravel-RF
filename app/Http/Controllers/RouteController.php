<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function articulos()
    {
        return view('articulos');
    }
    public function podcast()
    {
        return view('podcast');
    }
    public function videos()
    {
        return view('videos');
    }
    public function infografias()
    {
        return view('infografias');
    }
    public function nosotros()
    {
        return view('nosotros');
    }
}
