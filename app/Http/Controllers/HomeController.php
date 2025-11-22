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
                ->where('is_deleted','!=', 1)
                ->get();

        $jurnalDigital = JurnalDigital::limit(5)
                ->orderBy('created_at','asc')
                ->where('is_protected', 1)
                ->where('is_deleted','!=', 1)
                ->get();

        $bukuDigital = BukuDigital::limit(5)
                ->orderBy('created_at','asc')
                ->where('is_protected', 1)
                ->where('is_deleted','!=', 1)
                ->get();

        $countkliping = $klipingDigital->count();
        $countjurnal = $jurnalDigital->count();
        $countbuku = $bukuDigital->count();

        // dd($klipingDigital, $jurnalDigital, $bukuDigital);
        return view('home.index', compact('klipingDigital','jurnalDigital','bukuDigital','countkliping','countjurnal','countbuku'));
    }
}
