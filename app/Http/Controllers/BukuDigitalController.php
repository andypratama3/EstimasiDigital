<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBukuDigitalRequest;
use App\Http\Requests\UpdateBukuDigitalRequest;
use App\Repositories\BukuDigitalRepository;
use Illuminate\Http\Request;

class BukuDigitalController extends AppBaseController
{
    private $bukuDigitalRepository;

    public function __construct(BukuDigitalRepository $bukuDigitalRepo)
    {
        $this->bukuDigitalRepository = $bukuDigitalRepo;
    }

    /** Display list */
    public function index(Request $request)
    {
        $bukuDigitals = $this->bukuDigitalRepository->paginate(10);
        return view('buku_digitals.index', compact('bukuDigitals'));
    }

    /** Show create form */
    public function create()
    {
        return view('buku_digitals.create');
    }

    /** Store */
    public function store(CreateBukuDigitalRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = auth()->id();
        $input['updated_by'] = auth()->id();

        // Create data
        $bukuDigital = $this->bukuDigitalRepository->create($input);

        // Upload COVER
        if ($request->hasFile('cover')) {
            $bukuDigital->addMediaFromRequest('cover')
                ->toMediaCollection('cover');
        }

        // Upload FILE BUKU
        if ($request->hasFile('buku_file')) {
            $bukuDigital->addMediaFromRequest('buku_file')
                ->toMediaCollection('buku_file');
        }

        return redirect()
            ->route('bukuDigitals.index')
            ->with('success', 'Buku Digital berhasil disimpan.');
    }

    /** Show */
    public function show($id)
    {
        $bukuDigital = $this->bukuDigitalRepository->find($id);

        if (!$bukuDigital) {
            return redirect()
                ->route('bukuDigitals.index')
                ->with('error', 'Buku Digital tidak ditemukan.');
        }

        return view('buku_digitals.show', compact('bukuDigital'));
    }

    /** Edit */
    public function edit($id)
    {
        $bukuDigital = $this->bukuDigitalRepository->find($id);

        if (!$bukuDigital) {
            return redirect()
                ->route('bukuDigitals.index')
                ->with('error', 'Buku Digital tidak ditemukan.');
        }

        return view('buku_digitals.edit', compact('bukuDigital'));
    }

    /** Update */
    public function update($id, UpdateBukuDigitalRequest $request)
    {
        $bukuDigital = $this->bukuDigitalRepository->find($id);

        if (!$bukuDigital) {
            return redirect()
                ->route('bukuDigitals.index')
                ->with('error', 'Buku Digital tidak ditemukan.');
        }

        $input = $request->all();
        $input['updated_by'] = auth()->id();

        // Update main data
        $bukuDigital->update($input);

        // Replace COVER
        if ($request->hasFile('cover')) {
            $bukuDigital->clearMediaCollection('cover');
            $bukuDigital->addMediaFromRequest('cover')
                ->toMediaCollection('cover');
        }

        // Replace FILE BUKU
        if ($request->hasFile('buku_file')) {
            $bukuDigital->clearMediaCollection('buku_file');
            $bukuDigital->addMediaFromRequest('buku_file')
                ->toMediaCollection('buku_file');
        }

        return redirect()
            ->route('bukuDigitals.index')
            ->with('success', 'Buku Digital berhasil diperbarui.');
    }

    /** Delete */
    public function destroy($id)
    {
        $bukuDigital = $this->bukuDigitalRepository->find($id);

        if (!$bukuDigital) {
            return redirect()
                ->route('bukuDigitals.index')
                ->with('error', 'Buku Digital tidak ditemukan.');
        }

        // Hapus media
        $bukuDigital->clearMediaCollection('cover');
        $bukuDigital->clearMediaCollection('buku_file');

        // Hapus data
        $this->bukuDigitalRepository->delete($id);

        return redirect()
            ->route('bukuDigitals.index')
            ->with('success', 'Buku Digital berhasil dihapus.');
    }
}
