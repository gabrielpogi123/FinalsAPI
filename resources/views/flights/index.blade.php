@extends('home')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-semibold mb-4">Flights</h2>

        <div class="mb-4">
            <a href="{{ route('flights.create') }}" class="bg-green-500 text-white py-2 px-4 rounded">Create Flight</a>
        </div>

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <br>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="p-2 border border-gray-300">ID</th>
                    <th class="p-2 border border-gray-300">Flight Number</th>
                    <th class="p-2 border border-gray-300">Departure City</th>
                    <th class="p-2 border border-gray-300">Arrival City</th>
                    <th class="p-2 border border-gray-300">Departure Time</th>
                    <th class="p-2 border border-gray-300">Arrival Time</th>
                    <th class="p-2 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                    <tr>
                        <td class="p-2 border border-gray-300">{{ $flight->id }}</td>
                        <td class="p-2 border border-gray-300">{{ $flight->flight_no }}</td>
                        <td class="p-2 border border-gray-300">{{ $flight->departure_city }}</td>
                        <td class="p-2 border border-gray-300">{{ $flight->arrival_city }}</td>
                        <td class="p-2 border border-gray-300">{{ $flight->departure_time }}</td>
                        <td class="p-2 border border-gray-300">{{ $flight->arrival_time }}</td>
                        <td class="p-2 border border-gray-300">
                            <a href="{{ route('flights.edit', ['flight' => $flight->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                            <form action="{{ route('flights.destroy', ['flight' => $flight->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
