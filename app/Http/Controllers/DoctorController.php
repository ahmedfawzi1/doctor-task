<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors', compact('doctors'));
    }

    public function create()
    {
        return view('doctor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $doctor = new Doctor();
            $doctor->name = $request->name;
            $doctor->specialization = $request->specialization;
            $doctor->save();

            $weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            $data = [];

            foreach ($weekDays as $day) {
                if ($request->input($day)) {
                    $data[] = [
                        "doctor_id" => $doctor->id,
                        "day" => $day,
                        "start_time" => $request->input($day . '_start_time'),
                        "end_time" => $request->input($day . '_end_time'),
                    ];
                }
            }

            if (!empty($data)) {
                Schedule::insert($data);
            }

            DB::commit();

            return view('doctor', compact('doctor'))->with('success', 'Data saved successfully.');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

}
