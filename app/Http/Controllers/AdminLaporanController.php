<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcherInterface;

class AdminLaporanController extends Controller
{
    public function index(): View
    {
        $reports = Report::latest()->get();

        return view('admin.laporan.index', compact('reports'));
    }

    public function create(): View
    {
        return view('admin.laporan.laporan-create');
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

        return redirect()->route('laporan.index')->with(['success' => 'Laporan Berhasil Dibuat!']);
    }

    public function show(string $id): View
    {
        $report = Report::findOrFail($id);

        return view('admin.laporan.laporan-show', compact('report'));
    }

    public function edit(string $id): View
    {
        $report = Report::findOrFail($id);

        return view('admin.laporan.laporan-edit', compact('report'));
    } 

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'image' => 'image|mimes:jpeg,png,jpg|max:20480',
            'content' => 'required|min:10',
        ]);

        $report = Report::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/laporan', $image->hashName());

            Storage::delete('public/laporan/' . $report->image);

            $report->update([
                'title' => $request->title,
                'image' => $image->hashName(),
                'content' => $request->content,
            ]);
        } else {
            $report->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }

        return redirect()->route('laporan.index')->with(['success' => 'Laporan Berhasil Diupdate!']);
    }

    public function destroy($id): RedirectResponse
    {
        $report = Report::findOrFail($id);
        Storage::delete('public/laporan/' . $report->image);
        $report->delete();

        return redirect()->route('laporan.index')->with(['success' => 'Laporan Berhasil Dihapus!']);
    }

    public function validasi(Report $laporan)
    {
        $laporan->is_validated = true;
        $laporan->status = 'sedang diproses';
        $laporan->save();

        return redirect()->route('laporan.index')->with(['success' => 'Laporan Berhasil Divalidasi!']);
    }

    public function selesai(Report $laporan)
    {
        $laporan->status = 'selesai diproses';
        $laporan->save();

        return redirect()->route('laporan.index')->with(['success' => 'Laporan Berhasil Diselesaikan!']);
    }
}
