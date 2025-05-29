<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Location;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::with('location')->orderBy('street')->get();
        return view('buildings.index', compact('buildings'));
    }

    public function create()
    {
        $locations = Location::all();
        return view('buildings.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'location_id'   => 'required|exists:locations,id',
            'street'        => 'required|string|max:255',
            'building_number' => 'required|string|max:50',
            'total_floors'  => 'required|integer|min:1',
            'common_cost'   => 'nullable|numeric',
        ]);

        Building::create($data);

        return redirect()->route('buildings.index')
            ->with('success', 'Budynek dodany pomyślnie');
    }

    public function show(Building $building)
    {
        return view('buildings.show', compact('building'));
    }

    public function edit(Building $building)
    {
        $locations = Location::all();
        return view('buildings.edit', compact('building','locations'));
    }

    public function update(Request $request, Building $building)
    {
        $data = $request->validate([
            'location_id'     => 'required|exists:locations,id',
            'street'          => 'required|string|max:255',
            'building_number' => 'required|string|max:50',
            'total_floors'    => 'required|integer|min:1',
            'common_cost'     => 'nullable|numeric',
        ]);

        $building->update($data);

        return redirect()->route('buildings.index')
            ->with('success', 'Budynek zaktualizowany');
    }

    public function destroy(Building $building)
    {
        $building->delete();
        return redirect()->route('buildings.index')
            ->with('success', 'Budynek usunięty');
    }
}
