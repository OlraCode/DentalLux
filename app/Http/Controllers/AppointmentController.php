<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Collection;
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
        $appointment = new Appointment;
        return view('appointment.form', ['appointment' => $appointment, 'isEdit' => false]);
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

        $appointment = new Appointment();
        $appointment->setDate($request->date);
        $appointment->setTime($request->time);
        $appointment->service_id = Service::find($request->service)->id;
        $appointment->user_id = Auth::user()->id;
        $appointment->observations = $request->observations;

        $appointment->save();

        return redirect(route('appointment.confirm', ['appointment' => $appointment->id]));
    }

    public function confirm(Appointment $appointment)
    {
        return view('appointment.confirm', compact('appointment'));
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
        return view('appointment.form', ['appointment' => $appointment, 'isEdit' => true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $appointment->setTime($request->time);
        $appointment->setDate($request->date);
        $appointment->service_id = $request->service;
        $appointment->observations = $request->observations;

        $appointment->save();

        return redirect(route('appointment.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function listAvaliableTimes(Request $request)
    {
        $times = collect([
            '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00'
        ]);

        $date = \DateTimeImmutable::createFromFormat('d-m-Y', $request->date);
        $appointments = Appointment::where('date', $date->format('Y/m/d'))->get();

        $unavaliableTimes = collect($appointments->map(fn ($i) => $i->time->format('H:i')));

        $avaliableTimes = $times->diff($unavaliableTimes);

        return response()->json([
            'avaliableTimes' => array_values($avaliableTimes->toArray())
        ]);
    }
}
