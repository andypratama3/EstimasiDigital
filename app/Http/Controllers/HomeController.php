<?php

namespace App\Http\Controllers;

use App\Models\BukuDigital;
use Illuminate\Http\Request;
use App\Models\JurnalDigital;
use App\Models\KlipingDigital;

class HomeController extends Controller
{
    public function index()
    {
        $klipingDigital = KlipingDigital::limit(5)
                ->orderBy('created_at','asc')
                ->where('is_protected', 1)
                ->get();

        $jurnalDigital = JurnalDigital::limit(5)
                ->orderBy('created_at','asc')
                ->where('is_protected', 1)
                ->get();

        $bukuDigital = BukuDigital::limit(5)
                ->orderBy('created_at','asc')
                ->where('is_protected', 1)
                ->get();

        // dd($klipingDigital, $jurnalDigital, $bukuDigital);
        return view('home.index');
    }
}
