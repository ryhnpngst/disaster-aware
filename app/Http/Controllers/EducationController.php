<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index() {
        return view('user.edukasi.index');
    }

    public function detail() {
        return view('user.edukasi.detail');
    }
}
