<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Building;
use App\Models\Location;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    // wersja przed modernizacą na gita
    public function index()
    {
        $apartments = Apartment::with('building.location')->orderBy('apartment_number')->get();
        return view('apartments.index', compact('apartments'));
    }

    public function create()
    {
        $buildings = Building::with('location')->get();
        $locations = Location::all();
        return view('apartments.create', compact('buildings','locations'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'building_id'      => 'required|exists:buildings,id',
            'apartment_number' => 'required|string|max:50',
            'floor_number'     => 'required|integer',
            'size_sqm'         => 'required|numeric',
            'status'           => 'required|in:available,rented,maintenance',
        ]);

        Apartment::create($data);

        return redirect()->route('apartments.index')
            ->with('success', 'Mieszkanie dodane pomyślnie');
    }

    public function show(Apartment $apartment)
    {
        return view('apartments.show', compact('apartment'));
    }

    public function edit(Apartment $apartment)
    {
        $buildings = Building::with('location')->get();
        return view('apartments.edit', compact('apartment','buildings'));
    }

    public function update(Request $request, Apartment $apartment)
    {
        $data = $request->validate([
            'building_id'      => 'required|exists:buildings,id',
            'apartment_number' => 'required|string|max:50',
            'floor_number'     => 'required|integer',
            'size_sqm'         => 'required|numeric',
            'status'           => 'required|in:available,rented,maintenance',
        ]);

        $apartment->update($data);

        return redirect()->route('apartments.index')
            ->with('success', 'Mieszkanie zaktualizowane');
    }

    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route('apartments.index')
            ->with('success', 'Mieszkanie usunięte');
    }
}
