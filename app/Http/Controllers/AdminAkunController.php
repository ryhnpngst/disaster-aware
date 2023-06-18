<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAkunController extends Controller
{
    public function index(): View
    {
        $users = User::latest()->get();

        return view('admin.akun.index', compact('users'));
    }

    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);

        if ($user->id == Auth::user()->id) {
            return redirect()->route('admin.akun.index')->with(['error' => 'Tidak dapat menghapus akun sendiri!']);
        } else {
            $user->delete();

            return redirect()->route('admin.akun.index')->with(['success' => 'Akun berhasil dihapus!']);
        }
    }
}
