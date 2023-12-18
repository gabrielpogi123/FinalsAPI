<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::all();
        return view('flights.index', compact('flights'));
    }

    public function create()
    {
        return view('flights.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'flight_no' => 'required|string',
            'departure_city' => 'required|string',
            'arrival_city' => 'required|string',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
        ]);

        Flight::create($request->all());

        return redirect()->route('flights.index')->with('success', 'Flight created successfully.');
    }

    public function edit($id)
    {
        $flight = Flight::findOrFail($id);
        return view('flights.edit', compact('flight'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'flight_no' => 'required|string',
            'departure_city' => 'required|string',
            'arrival_city' => 'required|string',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
        ]);

        $flight = Flight::findOrFail($id);
        $flight->update($request->all());

        return redirect()->route('flights.index')->with('success', 'Flight updated successfully.');
    }

    public function destroy($id)
    {
        $flight = Flight::findOrFail($id);
        $flight->delete();

        return redirect()->route('flights.index')->with('success', 'Flight deleted successfully.');
    }
}
