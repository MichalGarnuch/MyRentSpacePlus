<?php

namespace App\Http\Controllers;

use App\Models\PaymentSchedule;
use App\Models\RentalAgreement;
use Illuminate\Http\Request;

class PaymentScheduleController extends Controller
{
    public function index()
    {
        $payment_schedules = PaymentSchedule::with('rentalAgreement')
            ->orderBy('due_date','asc')
            ->get();
        return view('payment_schedules.index', compact('payment_schedules'));
    }

    public function create()
    {
        $rental_agreements = RentalAgreement::pluck('id','id');
        return view('payment_schedules.create', compact('rental_agreements'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'rental_agreement_id' => 'required|exists:rental_agreements,id',
            'due_date'            => 'required|date',
            'amount'              => 'required|numeric|min:0',
            'type'                => 'required|in:rent,owner_rent,media,commission',
            'status'              => 'required|in:pending,paid,overdue',
        ]);

        PaymentSchedule::create($data);

        return redirect()->route('payment_schedules.index')
            ->with('success','Harmonogram płatności dodany');
    }

    public function show(PaymentSchedule $payment_schedules)
    {
        return view('payment_schedules.show', compact('payment_schedules'));
    }

    public function edit(PaymentSchedule $paymentSchedule)
    {
        $rental_agreements = RentalAgreement::pluck('id','id');
        return view('payment_schedules.edit', compact('paymentSchedule','rental_agreements'));
    }

    public function update(Request $request, PaymentSchedule $payment_schedules)
    {
        $data = $request->validate([
            'rental_agreement_id' => 'required|exists:rental_agreements,id',
            'due_date'            => 'required|date',
            'amount'              => 'required|numeric|min:0',
            'type'                => 'required|in:rent,owner_rent,media,commission',
            'status'              => 'required|in:pending,paid,overdue',
        ]);

        $payment_schedules->update($data);

        return redirect()->route('payment_schedules.index')
            ->with('success','Harmonogram płatności zaktualizowany');
    }

    public function destroy(PaymentSchedule $payment_schedules)
    {
        $payment_schedules->delete();
        return redirect()->route('payment_schedules.index')
            ->with('success','Harmonogram płatności usunięty');
    }
}
