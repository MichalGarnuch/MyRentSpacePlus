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
        $agreements = RentalAgreement::with(['apartment','tenant','owner'])
            ->orderBy('start_date','desc')
            ->get();
        return view('agreements.index', compact('agreements'));
    }

    public function create()
    {
        $apartments = Apartment::pluck('apartment_number','id');
        $tenants    = Tenant::pluck('last_name','id');
        $owners     = Owner::pluck('last_name','id');
        return view('agreements.create', compact('apartments','tenants','owners'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'apartment_id'      => 'required|exists:apartments,id',
            'tenant_id'         => 'required|exists:tenants,id',
            'owner_id'          => 'required|exists:owners,id',
            'start_date'        => 'required|date',
            'end_date'          => 'required|date|after_or_equal:start_date',
            'rent_amount'       => 'required|numeric',
            'owner_rent'        => 'nullable|numeric',
            'media_advance'     => 'nullable|numeric',
            'company_commission'=> 'nullable|numeric',
            'status'            => 'required|in:active,terminated,expired',
        ]);

        RentalAgreement::create($data);

        return redirect()->route('agreements.index')
            ->with('success', 'Umowa najmu dodana');
    }

    public function show(RentalAgreement $agreement)
    {
        return view('agreements.show', ['agreement'=>$agreement]);
    }

    public function edit(RentalAgreement $agreement)
    {
        $apartments = Apartment::pluck('apartment_number','id');
        $tenants    = Tenant::pluck('last_name','id');
        $owners     = Owner::pluck('last_name','id');
        return view('agreements.edit', compact('agreement','apartments','tenants','owners'));
    }

    public function update(Request $request, RentalAgreement $agreement)
    {
        $data = $request->validate([
            'apartment_id'      => 'required|exists:apartments,id',
            'tenant_id'         => 'required|exists:tenants,id',
            'owner_id'          => 'required|exists:owners,id',
            'start_date'        => 'required|date',
            'end_date'          => 'required|date|after_or_equal:start_date',
            'rent_amount'       => 'required|numeric',
            'owner_rent'        => 'nullable|numeric',
            'media_advance'     => 'nullable|numeric',
            'company_commission'=> 'nullable|numeric',
            'status'            => 'required|in:active,terminated,expired',
        ]);

        $agreement->update($data);

        return redirect()->route('agreements.index')
            ->with('success', 'Umowa najmu zaktualizowana');
    }

    public function destroy(RentalAgreement $agreement)
    {
        $agreement->delete();
        return redirect()->route('agreements.index')
            ->with('success', 'Umowa najmu usunięta');
    }
}
