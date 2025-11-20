<?php

namespace App\Http\Controllers\Home;

use App\Models\BukuDigital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BukuDigitalController extends Controller
{
    public function index()
    {
        $lastBuku = BukuDigital::latest()->first();
        $bukus = BukuDigital::orderBy('created_at', 'asc')->get();
        return view('home.buku.index', compact('lastBuku','bukus'));
    }

    public function show($id)
    {
        $buku = BukuDigital::where('id', $id)->firstOrFail();

        return view('home.buku.show', compact('buku'));
    }
}
