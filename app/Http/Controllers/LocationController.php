<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::orderBy('city')->get();
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'city'        => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ]);

        Location::create($data);

        return redirect()->route('locations.index')
            ->with('success', 'Miejscowość dodana');
    }

    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    }

    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $data = $request->validate([
            'city'        => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ]);

        $location->update($data);

        return redirect()->route('locations.index')
            ->with('success', 'Miejscowość zaktualizowana');
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('locations.index')
            ->with('success', 'Miejscowość usunięta');
    }
}
