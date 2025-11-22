<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\JurnalDigital;
use App\Http\Controllers\Controller;

class JurnalDigitalController extends Controller
{
    public function index()
    {
        $lastJurnal = JurnalDigital::latest()->first();
        $jurnals = JurnalDigital::where('is_protected', 0)->where('is_deleted_at', 0)->orderBy('created_at', 'desc')->paginate(10);

        return view('home.jurnal.index', compact('lastJurnal', 'jurnals'));
    }

    public function show($id)
    {
        $jurnal = JurnalDigital::where('id', $id)->firstOrFail();
        $jurnalNew = JurnalDigital::orderBy('created_at', 'desc')->limit(5)->get();

        return view('home.jurnal.show', compact('jurnal', 'jurnalNew'));
    }

    public function download($id)
    {
        $jurnal = JurnalDigital::where('id', $id)->firstOrFail();

        // Asumsikan file tersimpan di storage/app/public/jurnals/
        $filePath = storage_path('app/public/jurnals/' . $jurnal->file_name);

        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath, $jurnal->judul . '.pdf');
    }
}
