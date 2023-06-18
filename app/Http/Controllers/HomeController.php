<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $artikels = Artikel::latest()->limit(3)->get();

        return view('user.index', compact('artikels'));
    }
}
