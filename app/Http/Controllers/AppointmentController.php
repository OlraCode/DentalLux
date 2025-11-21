<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** @var User */
        $user = Auth::user();
        $appointments = $user->appointments;

        return view('appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'service' => 'required',
            'observations' => 'max:255'
        ]);

        $date = \DateTimeImmutable::createFromFormat('d/m/Y', $request->date);
        $time = new \DateTimeImmutable($request->time);

        $appointment = new Appointment();
        $appointment->date = $date;
        $appointment->time = $time;
        $appointment->service_id = Service::find($request->service)->id;
        $appointment->user_id = Auth::user()->id;
        $appointment->observations = $request->observations;
        $appointment->save();

        return redirect(route('appointment.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
