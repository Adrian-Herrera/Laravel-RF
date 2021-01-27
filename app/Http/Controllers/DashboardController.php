<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Video;
use App\Models\Image;
use App\Models\Podcast;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    public function dashboard()
    {

        $articulos = Articulo::all();
        // return $articulos;
        $infografias = Image::count();
        $videos = Video::count();
        $podcast = Podcast::count();

        return view('dashboard', compact('articulos', 'infografias', 'videos', 'podcast'));
    }
}
