<?php

namespace App\Http\Controllers;

use App\Models\MediaType;
use Illuminate\Http\Request;

class MediaTypeController extends Controller
{
    public function index()
    {
        $types = MediaType::orderBy('name')->get();
        return view('media_types.index', compact('types'));
    }

    public function create()
    {
        return view('media_types.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'unit' => 'required|string|max:50',
        ]);

        MediaType::create($data);

        return redirect()->route('media_types.index')
            ->with('success', 'Typ mediów dodany');
    }

    public function show(MediaType $mediaType)
    {
        return view('media_types.show', compact('mediaType'));
    }

    public function edit(MediaType $mediaType)
    {
        return view('media_types.edit', compact('mediaType'));
    }

    public function update(Request $request, MediaType $mediaType)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'unit' => 'required|string|max:50',
        ]);

        $mediaType->update($data);

        return redirect()->route('media_types.index')
            ->with('success', 'Typ mediów zaktualizowany');
    }

    public function destroy(MediaType $mediaType)
    {
        $mediaType->delete();
        return redirect()->route('media_types.index')
            ->with('success', 'Typ mediów usunięty');
    }
}
