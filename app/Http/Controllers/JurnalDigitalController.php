<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJurnalDigitalRequest;
use App\Http\Requests\UpdateJurnalDigitalRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\JurnalDigitalRepository;
use Illuminate\Http\Request;
use Flash;

class JurnalDigitalController extends AppBaseController
{
    /** @var JurnalDigitalRepository $jurnalDigitalRepository*/
    private $jurnalDigitalRepository;

    public function __construct(JurnalDigitalRepository $jurnalDigitalRepo)
    {
        $this->jurnalDigitalRepository = $jurnalDigitalRepo;
    }

    /**
     * Display a listing of the JurnalDigital.
     */
    public function index(Request $request)
    {
        $jurnalDigitals = $this->jurnalDigitalRepository->paginate(10);

        return view('jurnal_digitals.index')
            ->with('jurnalDigitals', $jurnalDigitals);
    }

    /**
     * Show the form for creating a new JurnalDigital.
     */
    public function create()
    {
        return view('jurnal_digitals.create');
    }

    /**
     * Store a newly created JurnalDigital in storage.
     */
    public function store(CreateJurnalDigitalRequest $request)
    {
        $input = $request->all();

        // Set user IDs
        $input['created_by'] = auth()->id();
        $input['updated_by'] = auth()->id();

        // Create first
        $jurnalDigital = $this->jurnalDigitalRepository->create($input);

        // Upload file AFTER model exists
        if ($request->hasFile('jurnal_file')) {
            $jurnalDigital->addMediaFromRequest('jurnal_file')
                ->toMediaCollection('jurnal_file');
        }

        Flash::success('Jurnal Digital saved successfully.');
        return redirect(route('jurnalDigitals.index'));
    }


    /**
     * Display the specified JurnalDigital.
     */
    public function show($id)
    {
        $jurnalDigital = $this->jurnalDigitalRepository->find($id);

        if (empty($jurnalDigital)) {
            Flash::error('Jurnal Digital not found');

            return redirect(route('jurnalDigitals.index'));
        }

        return view('jurnal_digitals.show')->with('jurnalDigital', $jurnalDigital);
    }

    /**
     * Show the form for editing the specified JurnalDigital.
     */
    public function edit($id)
    {
        $jurnalDigital = $this->jurnalDigitalRepository->find($id);

        if (empty($jurnalDigital)) {
            Flash::error('Jurnal Digital not found');

            return redirect(route('jurnalDigitals.index'));
        }

        return view('jurnal_digitals.edit')->with('jurnalDigital', $jurnalDigital);
    }

    /**
     * Update the specified JurnalDigital in storage.
     */
    public function update($id, UpdateJurnalDigitalRequest $request)
    {
        $jurnalDigital = $this->jurnalDigitalRepository->find($id);

        if (empty($jurnalDigital)) {
            Flash::error('Jurnal Digital not found');
            return redirect(route('jurnalDigitals.index'));
        }

        $input = $request->all();
        $input['updated_by'] = auth()->id();

        // Update data
        $jurnalDigital->update($input);

        // Replace file
        if ($request->hasFile('jurnal_file')) {
            $jurnalDigital->clearMediaCollection('jurnal_file');
            $jurnalDigital->addMediaFromRequest('jurnal_file')
                ->toMediaCollection('jurnal_file');
        }

        Flash::success('Jurnal Digital updated successfully.');
        return redirect(route('jurnalDigitals.index'));
    }


    /**
     * Remove the specified JurnalDigital from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $jurnalDigital = $this->jurnalDigitalRepository->find($id);

        if (empty($jurnalDigital)) {
            Flash::error('Jurnal Digital not found');

            return redirect(route('jurnalDigitals.index'));
        }

        $this->jurnalDigitalRepository->delete($id);

        Flash::success('Jurnal Digital deleted successfully.');

        return redirect(route('jurnalDigitals.index'));
    }
}
