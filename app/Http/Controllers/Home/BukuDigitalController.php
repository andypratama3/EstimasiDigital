<?php

namespace App\Http\Controllers\Home;

use App\Models\BukuDigital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BukuDigitalController extends Controller
{
    public function index()
    {
        $lastBuku = BukuDigital::where('is_protected', 0)->where('is_deleted', 0)->latest()->first();
        $bukus = BukuDigital::where('is_protected', 0)->where('is_deleted', 0)->orderBy('created_at', 'asc')->get();


        return view('home.buku.index', compact('lastBuku','bukus'));
    }

    public function show($id)
    {
        $buku = BukuDigital::where('id', $id)->firstOrFail();

        $bukuNew = BukuDigital::where('is_protected', 0)
            ->where('is_deleted', 0)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('home.buku.show', compact('buku','bukuNew'));
    }
}
