<?php

namespace App\Http\Controllers;

use App\Models\RentalAgreement;
use App\Models\Apartment;
use App\Models\Tenant;
use App\Models\Owner;
use Illuminate\Http\Request;

class RentalAgreementController extends Controller
{
    public function index()
    {
        $rental_agreements = RentalAgreement::with(['apartment', 'tenant', 'owner'])
            ->orderBy('start_date', 'desc')
            ->get();

        return view('rental_agreements.index', compact('rental_agreements'));
    }

    public function create()
    {
        $apartments = Apartment::pluck('apartment_number', 'id');
        $tenants = Tenant::pluck('last_name', 'id');
        $owners = Owner::pluck('last_name', 'id');

        return view('rental_agreements.create', compact('apartments', 'tenants', 'owners'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'apartment_id' => 'required|exists:apartments,id',
            'tenant_id' => 'required|exists:tenants,id',
            'owner_id' => 'required|exists:owners,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'rent_amount' => 'required|numeric',
            'owner_rent' => 'nullable|numeric',
            'media_advance' => 'nullable|numeric',
            'company_commission' => 'nullable|numeric',
            'status' => 'required|in:active,terminated,expired',
        ]);

        RentalAgreement::create($data);

        return redirect()->route('rental_agreements.index')
            ->with('success', 'Umowa najmu dodana');
    }

    public function show(RentalAgreement $rental_agreement)
    {
        return view('rental_agreements.show', compact('rental_agreement'));
    }

    public function edit(RentalAgreement $rentalAgreement)
    {
        $apartments = Apartment::pluck('apartment_number', 'id');
        $tenants = Tenant::pluck('last_name', 'id');
        $owners = Owner::pluck('last_name', 'id');

        return view('rental_agreements.edit', compact('rentalAgreement', 'apartments', 'tenants', 'owners'));
    }

    public function update(Request $request, RentalAgreement $rental_agreement)
    {
        $data = $request->validate([
            'apartment_id' => 'required|exists:apartments,id',
            'tenant_id' => 'required|exists:tenants,id',
            'owner_id' => 'required|exists:owners,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'rent_amount' => 'required|numeric',
            'owner_rent' => 'nullable|numeric',
            'media_advance' => 'nullable|numeric',
            'company_commission' => 'nullable|numeric',
            'status' => 'required|in:active,terminated,expired',
        ]);

        $rental_agreement->update($data);

        return redirect()->route('rental_agreements.index')
            ->with('success', 'Umowa najmu zaktualizowana');
    }

    public function destroy(RentalAgreement $rental_agreement)
    {
        $rental_agreement->delete();

        return redirect()->route('rental_agreements.index')
            ->with('success', 'Umowa najmu usunięta');
    }
}
