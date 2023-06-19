<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcherInterface;

class AdminLaporanController extends Controller
{
    public function index(): View
    {
        $reports = Report::get();

        return view('admin.laporan.index', compact('reports'));
    }

    public function create(): View
    {
        return view('admin.laporan.laporan-create');
    }

    public function show(string $id): View
    {
        $report = Report::findOrFail($id);

        Session::forget('success');

        return view('admin.laporan.laporan-show', compact('report'));
    }

    public function destroy($id): RedirectResponse
    {
        $report = Report::findOrFail($id);
        Storage::delete('public/laporan/' . $report->image);
        $report->delete();

        return redirect()->route('admin.laporan.index')->with(['success' => 'Laporan Berhasil Dihapus!']);
    }

    public function validasi(Report $laporan)
    {
        $laporan->is_validated = true;
        $laporan->status = 'sedang diproses';
        $laporan->save();

        Session::forget('success');

        return redirect()->route('admin.laporan.index')->with(['success' => 'Laporan Berhasil Divalidasi!']);
    }

    public function selesai(Report $laporan)
    {
        $laporan->status = 'selesai diproses';
        $laporan->save();

        Session::forget('success');

        return redirect()->route('admin.laporan.index')->with(['success' => 'Laporan Berhasil Diselesaikan!']);
    }
}
