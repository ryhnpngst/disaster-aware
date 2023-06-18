<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LaporanController extends Controller
{
    public function index()
    {
        return view('user.formAspirasi.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:20480',
            'content' => 'required|min:10',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/laporan', $image->hashName());

        Report::create([
            'title' => $request->title,
            'image' => $image->hashName(),
            'content' => $request->content,
        ]);

        return redirect()->route('index')->with(['success' => 'Aspirasimu Berhasil Dikirim!']);
    }
}
