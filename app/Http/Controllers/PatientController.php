<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('Patients', compact('patients'));
    }

    public function create()
    {
        return view('Patient');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $patient = new Patient();
            $patient->name = $request->name;
            $patient->phone = $request->phone;
            $patient->save();

            DB::commit();

            return view('Patient', compact('patient'))->with('success', 'Data saved successfully.');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function show(patient $patient)
    {
        //
    }

    public function edit(patient $patient)
    {
        //
    }

    public function update(Request $request, patient $patient)
    {
        //
    }

    public function destroy(patient $patient)
    {
        //
    }
}
