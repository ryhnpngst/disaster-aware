<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();

        return view('user.galeri.index', compact('galeris'));
    }
}
