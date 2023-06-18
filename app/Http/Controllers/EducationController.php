<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index() : View
    {
        $artikelCount = Artikel::count();
        $artikels = Artikel::latest()->offset(3)->limit(PHP_INT_MAX)->get();
        $artikelFirst = Artikel::latest()->first();
        $artikelSecond = Artikel::latest()->skip(1)->first();
        $artikelThird = Artikel::latest()->skip(2)->first();

        return view('user.edukasi.index', compact('artikelCount', 'artikels', 'artikelFirst', 'artikelSecond', 'artikelThird'));
    }

    public function show(string $id): View 
    {
        $artikel = Artikel::findOrFail($id);
        $artikelDate = $artikel->created_at->format('d F Y');

        return view('user.edukasi.edukasi-detail', compact('artikel', 'artikelDate'));
    }
}
