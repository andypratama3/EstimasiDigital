<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\BukuDigital;
use Illuminate\Http\Request;
use App\Models\JurnalDigital;
use App\Models\KlipingDigital;

class DashboardController extends Controller
{
    public function __invoke()
    {

        // dd();

        $buku = BukuDigital::count();
        $kliping = KlipingDigital::count();
        $jurnal = JurnalDigital::count();
        return view('dashboard.index', compact(
            'buku',
            'kliping',
            'jurnal'
        ));
    }
}
