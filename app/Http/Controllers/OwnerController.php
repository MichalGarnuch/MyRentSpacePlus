<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::orderBy('last_name')->get();
        return view('owners.index', compact('owners'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'      => 'required|string|max:100',
            'last_name'       => 'required|string|max:100',
            'phone'           => 'required|string|max:15',
            'email'           => 'required|email|max:255',
            'commission_rate' => 'required|numeric|min:0',
        ]);

        Owner::create($data);

        return redirect()->route('owners.index')
            ->with('success', 'Właściciel dodany pomyślnie');
    }

    public function show(Owner $owner)
    {
        return view('owners.show', compact('owner'));
    }

    public function edit(Owner $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $data = $request->validate([
            'first_name'      => 'required|string|max:100',
            'last_name'       => 'required|string|max:100',
            'phone'           => 'required|string|max:15',
            'email'           => 'required|email|max:255',
            'commission_rate' => 'required|numeric|min:0',
        ]);

        $owner->update($data);

        return redirect()->route('owners.index')
            ->with('success', 'Właściciel zaktualizowany');
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index')
            ->with('success', 'Właściciel usunięty');
    }
}
