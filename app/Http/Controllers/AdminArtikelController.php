<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AdminArtikelController extends Controller
{
    public function index(): View
    {
        $artikels = Artikel::latest()->get();

        return view('admin.artikel.index', compact('artikels'));
    }

    public function create(): View
    {
        return view('admin.artikel.artikel-create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:20480',
            'author' => 'required|min:10',
            'caption' => 'required|min:10',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/artikel', $image->hashName());

        Artikel::create([
            'title' => $request->title,
            'image' => $image->hashName(),
            'author' => $request->author,
            'caption' => $request->caption,
        ]);

        return redirect()->route('admin.artikel.index')->with(['success' => 'Artikel Berhasil Dibuat!']);
    }

    public function show(string $id): View
    {
        $artikel = Artikel::findOrFail($id);

        return view('admin.artikel.artikel-show', compact('artikel'));
    }

    public function edit(string $id): View
    {
        $artikel = Artikel::findOrFail($id);

        return view('admin.artikel.artikel-edit', compact('artikel'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'image' => 'image|mimes:jpeg,png,jpg|max:20480',
            'author' => 'required|min:10',
            'caption' => 'required|min:10',
        ]);

        $artikel = Artikel::findOrFail($id);

        if ($request->has('image')) {
            $image = $request->file('image');
            $image->storeAs('public/artikel', $image->hashName());

            Storage::delete('public/artikel/' . $artikel->image);

            $artikel->update([
                'title' => $request->title,
                'image' => $image->hashName(),
                'author' => $request->author,
                'caption' => $request->caption,
            ]);
        } else {
            $artikel->update([
                'title' => $request->title,
                'author' => $request->author,
                'caption' => $request->caption,
            ]);
        }

        return redirect()->route('admin.artikel.index')->with(['success' => 'Artikel Berhasil Diupdate!']);
    }

    public function destroy($id): RedirectResponse
    {
        $artikel = Artikel::findOrFail($id);
        Storage::delete('public/artikel/' . $artikel->image);
        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with(['success' => 'Artikel Berhasil Dihapus!']);
    }
}
