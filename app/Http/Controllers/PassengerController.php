<?php   

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;

class PassengerController extends Controller
{
    public function index()
    {
        $passengers = Passenger::all();
        return view('passengers.index', compact('passengers'));
    }
    public function create()
    {
        return view('passengers.create');
    }

    // Method for handling the store operation
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:passengers,email',
            'phone' => 'required|string|max:20',
        ]);

        Passenger::create($request->all());

        return redirect()->route('passengers.index')->with('success', 'Passenger created successfully.');
    }

    public function update(Request $request, Passenger $passenger)
    {
    $request->validate([
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'email' => 'required|email|unique:passengers,email,' . $passenger->id,
        'phone' => 'required|string|max:20',
    ]);

    $passenger->update($request->all());

    return redirect()->route('passengers.index')->with('success', 'Passenger updated successfully.');
    }
        public function edit(Passenger $passenger)
    {
        return view('passengers.edit', compact('passenger'));
    }

    public function destroy(Passenger $passenger)
    {
        $passenger->delete();

        return redirect()->route('passengers.index')->with('success', 'Passenger deleted successfully.');
    }

}