<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBukuDigitalRequest;
use App\Http\Requests\UpdateBukuDigitalRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BukuDigitalRepository;
use Illuminate\Http\Request;
use Flash;

class BukuDigitalController extends AppBaseController
{
    /** @var BukuDigitalRepository $bukuDigitalRepository*/
    private $bukuDigitalRepository;

    public function __construct(BukuDigitalRepository $bukuDigitalRepo)
    {
        $this->bukuDigitalRepository = $bukuDigitalRepo;
    }

    /**
     * Display a listing of the BukuDigital.
     */
    public function index(Request $request)
    {
        $bukuDigitals = $this->bukuDigitalRepository->paginate(10);

        return view('buku_digitals.index')
            ->with('bukuDigitals', $bukuDigitals);
    }

    /**
     * Show the form for creating a new BukuDigital.
     */
    public function create()
    {
        return view('buku_digitals.create');
    }

    /**
     * Store a newly created BukuDigital in storage.
     */
    public function store(CreateBukuDigitalRequest $request)
    {
        $input = $request->all();

        $bukuDigital = $this->bukuDigitalRepository->create($input);

        Flash::success('Buku Digital saved successfully.');

        return redirect(route('bukuDigitals.index'));
    }

    /**
     * Display the specified BukuDigital.
     */
    public function show($id)
    {
        $bukuDigital = $this->bukuDigitalRepository->find($id);

        if (empty($bukuDigital)) {
            Flash::error('Buku Digital not found');

            return redirect(route('bukuDigitals.index'));
        }

        return view('buku_digitals.show')->with('bukuDigital', $bukuDigital);
    }

    /**
     * Show the form for editing the specified BukuDigital.
     */
    public function edit($id)
    {
        $bukuDigital = $this->bukuDigitalRepository->find($id);

        if (empty($bukuDigital)) {
            Flash::error('Buku Digital not found');

            return redirect(route('bukuDigitals.index'));
        }

        return view('buku_digitals.edit')->with('bukuDigital', $bukuDigital);
    }

    /**
     * Update the specified BukuDigital in storage.
     */
    public function update($id, UpdateBukuDigitalRequest $request)
    {
        $bukuDigital = $this->bukuDigitalRepository->find($id);

        if (empty($bukuDigital)) {
            Flash::error('Buku Digital not found');

            return redirect(route('bukuDigitals.index'));
        }

        $bukuDigital = $this->bukuDigitalRepository->update($request->all(), $id);

        Flash::success('Buku Digital updated successfully.');

        return redirect(route('bukuDigitals.index'));
    }

    /**
     * Remove the specified BukuDigital from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bukuDigital = $this->bukuDigitalRepository->find($id);

        if (empty($bukuDigital)) {
            Flash::error('Buku Digital not found');

            return redirect(route('bukuDigitals.index'));
        }

        $this->bukuDigitalRepository->delete($id);

        Flash::success('Buku Digital deleted successfully.');

        return redirect(route('bukuDigitals.index'));
    }
}
