<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flights = Flight::with(['departure', 'destination', 'airline'])->get();
        return response()->json($flights);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$validatedData = $request->validate([
            'code' => 'required',
            'type' => 'required',
            'departure_id' => 'required|exists:airports,id',
            'destination_id' => 'required|exists:airports,id',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
            'airline_id' => 'required|exists:airlines,id'
        ]);

        $flight = Flight::create($validatedData);
        return response()->json($flight, 201);*/

        $validatedData = $request->validate([
            'code' => 'required|unique:flights',
            'type' => 'required|in:PASSENGER,FREIGHT',
            'departure_id' => 'required|exists:airports,id',
            'destination_id' => 'required|exists:airports,id',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'airline_id' => 'required|exists:airlines,id',
        ]);

        $flight = Flight::create($validatedData);
        return response()->json($flight, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flight = Flight::with(['departure', 'destination', 'airline'])->findOrFail($id);
        return response()->json($flight);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $flight = Flight::findOrFail($id);

        $validatedData = $request->validate([
            'code' => 'required|unique:flights,code,' . $flight->id,
            'type' => 'required|in:PASSENGER,FREIGHT',
            'departure_id' => 'required|exists:airports,id',
            'destination_id' => 'required|exists:airports,id',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'airline_id' => 'required|exists:airlines,id',
        ]);

        $flight->update($validatedData);
        return response()->json($flight, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = Flight::findOrFail($id);
        $flight->delete();
        return response()->json(null, 204);
    }
}
