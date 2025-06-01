<?php

namespace App\Http\Controllers;

use App\Models\MediaUsage;
use App\Models\Apartment;
use App\Models\RentalAgreement;
use App\Models\MediaType;
use Illuminate\Http\Request;

class MediaUsageController extends Controller
{
    public function index()
    {
        $media_usages = MediaUsage::with(['apartment','rentalAgreement','mediaType'])
            ->orderBy('reading_date','desc')
            ->get();
        return view('media_usages.index', compact('media_usages'));
    }

    public function create()
    {
        $apartments      = Apartment::pluck('apartment_number','id');
        $rental_agreements = RentalAgreement::pluck('id','id');
        $media_types      = MediaType::pluck('name','id');
        return view('media_usages.create', compact('apartments','rental_agreements','media_types'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'apartment_id'        => 'required|exists:apartments,id',
            'rental_agreement_id' => 'nullable|exists:rental_agreements,id',
            'media_type_id'       => 'required|exists:media_types,id',
            'reading_date'        => 'required|date',
            'value'               => 'required|numeric',
            'archived'            => 'required|boolean',
        ]);

        MediaUsage::create($data);

        return redirect()->route('media_usages.index')
            ->with('success', 'Odczyt mediów dodany');
    }

    public function show(MediaUsage $media_usage)
    {
        return view('media_usages.show', compact('media_usage'));
    }

    public function edit(MediaUsage $mediaUsage)
    {
        $apartments = Apartment::pluck('apartment_number','id');
        $rental_agreements = RentalAgreement::pluck('id','id');
        $media_types = MediaType::pluck('name','id');
        return view('media_usages.edit', compact('mediaUsage','apartments','rental_agreements','media_types'));
    }

    public function update(Request $request, MediaUsage $mediaUsage)
    {
        $data = $request->validate([
            'apartment_id'        => 'required|exists:apartments,id',
            'rental_agreement_id' => 'nullable|exists:rental_agreements,id',
            'media_type_id'       => 'required|exists:media_types,id',
            'reading_date'        => 'required|date',
            'value'               => 'required|numeric',
            'archived'            => 'required|boolean',
        ]);

        $mediaUsage->update($data);

        return redirect()->route('media_usages.index')
            ->with('success', 'Odczyt mediów zaktualizowany');
    }

    public function destroy(MediaUsage $mediaUsage)
    {
        $mediaUsage->delete();
        return redirect()->route('media_usages.index')
            ->with('success', 'Odczyt mediów usunięty');
    }
}
