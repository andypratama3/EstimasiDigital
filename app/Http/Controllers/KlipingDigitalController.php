<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKlipingDigitalRequest;
use App\Http\Requests\UpdateKlipingDigitalRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\KlipingDigitalRepository;
use Illuminate\Http\Request;
use Flash;

class KlipingDigitalController extends AppBaseController
{
    /** @var KlipingDigitalRepository $klipingDigitalRepository*/
    private $klipingDigitalRepository;

    public function __construct(KlipingDigitalRepository $klipingDigitalRepo)
    {
        $this->klipingDigitalRepository = $klipingDigitalRepo;
    }

    /**
     * Display a listing of the KlipingDigital.
     */
    public function index(Request $request)
    {
        $klipingDigitals = $this->klipingDigitalRepository->paginate(10);

        return view('kliping_digitals.index')
            ->with('klipingDigitals', $klipingDigitals);
    }

    /**
     * Show the form for creating a new KlipingDigital.
     */
    public function create()
    {
        return view('kliping_digitals.create');
    }

    /**
     * Store a newly created KlipingDigital in storage.
     */
    public function store(CreateKlipingDigitalRequest $request)
    {
        $input = $request->all();

        $klipingDigital = $this->klipingDigitalRepository->create($input);

        Flash::success('Kliping Digital saved successfully.');

        return redirect(route('klipingDigitals.index'));
    }

    /**
     * Display the specified KlipingDigital.
     */
    public function show($id)
    {
        $klipingDigital = $this->klipingDigitalRepository->find($id);

        if (empty($klipingDigital)) {
            Flash::error('Kliping Digital not found');

            return redirect(route('klipingDigitals.index'));
        }

        return view('kliping_digitals.show')->with('klipingDigital', $klipingDigital);
    }

    /**
     * Show the form for editing the specified KlipingDigital.
     */
    public function edit($id)
    {
        $klipingDigital = $this->klipingDigitalRepository->find($id);

        if (empty($klipingDigital)) {
            Flash::error('Kliping Digital not found');

            return redirect(route('klipingDigitals.index'));
        }

        return view('kliping_digitals.edit')->with('klipingDigital', $klipingDigital);
    }

    /**
     * Update the specified KlipingDigital in storage.
     */
    public function update($id, UpdateKlipingDigitalRequest $request)
    {
        $klipingDigital = $this->klipingDigitalRepository->find($id);

        if (empty($klipingDigital)) {
            Flash::error('Kliping Digital not found');

            return redirect(route('klipingDigitals.index'));
        }

        $klipingDigital = $this->klipingDigitalRepository->update($request->all(), $id);

        Flash::success('Kliping Digital updated successfully.');

        return redirect(route('klipingDigitals.index'));
    }

    /**
     * Remove the specified KlipingDigital from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $klipingDigital = $this->klipingDigitalRepository->find($id);

        if (empty($klipingDigital)) {
            Flash::error('Kliping Digital not found');

            return redirect(route('klipingDigitals.index'));
        }

        $this->klipingDigitalRepository->delete($id);

        Flash::success('Kliping Digital deleted successfully.');

        return redirect(route('klipingDigitals.index'));
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'gambar_upload' => 'required|image|max:5120' // max 5MB
        ]);

        if ($request->hasFile('gambar_upload')) {
            $file = $request->file('gambar_upload');
            $path = $file->store('kliping-images', 'public');

            return response()->json([
                'status' => 'success',
                'url' => asset('storage/' . $path),
                'message' => 'Gambar berhasil diunggah'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'File tidak ditemukan'
        ], 400);
    }
}
