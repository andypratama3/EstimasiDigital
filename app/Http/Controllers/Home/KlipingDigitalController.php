<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\KlipingDigital;
use App\Http\Controllers\Controller;

class KlipingDigitalController extends Controller
{
    public function index()
    {
        $lastKliping = KlipingDigital::latest()->first();
        $klipings = KlipingDigital::where('is_protected', 0)->where('is_deleted', 0)->orderBy('created_at', 'desc')->paginate(15);

        return view('home.kliping.index', compact('lastKliping', 'klipings'));
    }

    public function show($id)
    {
        $kliping = KlipingDigital::where('id', $id)->firstOrFail();
        $klipingNew = KlipingDigital::orderBy('created_at', 'desc')->limit(5)->get();

        return view('home.kliping.show', compact('kliping', 'klipingNew'));
    }
}
