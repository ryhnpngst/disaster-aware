<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminAkunController extends Controller
{
    public function index(): View
    {
        $users = User::latest()->get();

        return view('admin.akun.index', compact('users'));
    }
}
