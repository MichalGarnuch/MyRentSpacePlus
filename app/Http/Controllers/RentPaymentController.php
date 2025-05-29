<?php

namespace App\Http\Controllers;

use App\Models\RentPayment;
use App\Models\RentalAgreement;
use Illuminate\Http\Request;

class RentPaymentController extends Controller
{
    public function index()
    {
        $payments = RentPayment::with('rentalAgreement')
            ->orderBy('payment_date','desc')
            ->get();
        return view('rent_payments.index', compact('payments'));
    }

    public function create()
    {
        $agreements = RentalAgreement::pluck('id','id');
        return view('rent_payments.create', compact('agreements'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'rental_agreement_id' => 'required|exists:rental_agreements,id',
            'payment_date'        => 'required|date',
            'amount'              => 'required|numeric|min:0',
            'type'                => 'required|in:rent,owner_rent,media,commission',
            'status'              => 'required|in:paid,pending,overdue',
        ]);

        RentPayment::create($data);

        return redirect()->route('rent_payments.index')
            ->with('success','Płatność dodana');
    }

    public function show(RentPayment $rentPayment)
    {
        return view('rent_payments.show', compact('rentPayment'));
    }

    public function edit(RentPayment $rentPayment)
    {
        $agreements = RentalAgreement::pluck('id','id');
        return view('rent_payments.edit', compact('rentPayment','agreements'));
    }

    public function update(Request $request, RentPayment $rentPayment)
    {
        $data = $request->validate([
            'rental_agreement_id' => 'required|exists:rental_agreements,id',
            'payment_date'        => 'required|date',
            'amount'              => 'required|numeric|min:0',
            'type'                => 'required|in:rent,owner_rent,media,commission',
            'status'              => 'required|in:paid,pending,overdue',
        ]);

        $rentPayment->update($data);

        return redirect()->route('rent_payments.index')
            ->with('success','Płatność zaktualizowana');
    }

    public function destroy(RentPayment $rentPayment)
    {
        $rentPayment->delete();
        return redirect()->route('rent_payments.index')
            ->with('success','Płatność usunięta');
    }
}
