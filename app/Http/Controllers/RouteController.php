<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        return view('home');
    }
    
}
