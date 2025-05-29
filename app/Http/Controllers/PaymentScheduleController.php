<?php

namespace App\Http\Controllers;

use App\Models\PaymentSchedule;
use App\Models\RentalAgreement;
use Illuminate\Http\Request;

class PaymentScheduleController extends Controller
{
    public function index()
    {
        $schedules = PaymentSchedule::with('rentalAgreement')
            ->orderBy('due_date','asc')
            ->get();
        return view('payment_schedules.index', compact('schedules'));
    }

    public function create()
    {
        $agreements = RentalAgreement::pluck('id','id');
        return view('payment_schedules.create', compact('agreements'));
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

    public function show(PaymentSchedule $paymentSchedule)
    {
        return view('payment_schedules.show', compact('paymentSchedule'));
    }

    public function edit(PaymentSchedule $paymentSchedule)
    {
        $agreements = RentalAgreement::pluck('id','id');
        return view('payment_schedules.edit', compact('paymentSchedule','agreements'));
    }

    public function update(Request $request, PaymentSchedule $paymentSchedule)
    {
        $data = $request->validate([
            'rental_agreement_id' => 'required|exists:rental_agreements,id',
            'due_date'            => 'required|date',
            'amount'              => 'required|numeric|min:0',
            'type'                => 'required|in:rent,owner_rent,media,commission',
            'status'              => 'required|in:pending,paid,overdue',
        ]);

        $paymentSchedule->update($data);

        return redirect()->route('payment_schedules.index')
            ->with('success','Harmonogram płatności zaktualizowany');
    }

    public function destroy(PaymentSchedule $paymentSchedule)
    {
        $paymentSchedule->delete();
        return redirect()->route('payment_schedules.index')
            ->with('success','Harmonogram płatności usunięty');
    }
}
