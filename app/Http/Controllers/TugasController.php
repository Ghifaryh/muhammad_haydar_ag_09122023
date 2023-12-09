<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TugasController extends Controller
{
    function pertama()
    {
        return view('pages.tugas.pertama');
    }
    function kedua()
    {
        return view('pages.tugas.kedua');
    }
}
