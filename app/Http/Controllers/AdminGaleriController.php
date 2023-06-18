<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminGaleriController extends Controller
{
    public function index(): View
    {
        $galeris = Galeri::latest()->get();

        return view('admin.galeri.index', compact('galeris'));
    }

    public function create(): View
    {
        return view('admin.galeri.galeri-create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:20480',
            'caption' => 'required|min:10',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/galeri', $image->hashName());

        Galeri::create([
            'title' => $request->title,
            'image' => $image->hashName(),
            'caption' => $request->caption,
        ]);

        Session::forget('success');

        return redirect()->route('admin.galeri.index')->with(['success' => 'Galeri Berhasil Dibuat!']);
    }  

    public function show(string $id): View
    {
        $galeri = Galeri::findOrFail($id);

        return view('admin.galeri.galeri-show', compact('galeri'));
    }

    public function edit(string $id): View
    {
        $galeri = Galeri::findOrFail($id);

        return view('admin.galeri.galeri-edit', compact('galeri'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'image' => 'image|mimes:jpeg,png,jpg|max:20480',
            'caption' => 'required|min:10',
        ]);

        $galeri = Galeri::findOrFail($id);

        if ($request->has('image')) {
            $image = $request->file('image');
            $image->storeAs('public/galeri', $image->hashName());

            Storage::delete('public/galeri/' . $galeri->image);

            $galeri->update([
                'title' => $request->title,
                'image' => $image->hashName(),
                'caption' => $request->caption,
            ]);
        } else {
            $galeri->update([
                'title' => $request->title,
                'caption' => $request->caption,
            ]);
        }

        Session::forget('success');

        return redirect()->route('admin.galeri.index')->with(['success' => 'Galeri Berhasil Diupdate!']);
    }

    public function destroy($id): RedirectResponse
    {
        $galeri = Galeri::findOrFail($id);
        Storage::delete('public/galeri/' . $galeri->image);
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with(['success' => 'Galeri Berhasil Dihapus!']);
    }
}
