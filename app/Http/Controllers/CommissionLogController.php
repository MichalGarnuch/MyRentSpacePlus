<?php

namespace App\Http\Controllers;

use App\Models\CommissionLog;
use App\Models\RentalAgreement;
use Illuminate\Http\Request;

class CommissionLogController extends Controller
{
    public function index()
    {
        $logs = CommissionLog::with('rentalAgreement')->orderBy('payment_date', 'desc')->get();
        return view('commission_logs.index', compact('logs'));
    }

    public function create()
    {
        $agreements = RentalAgreement::pluck('id', 'id');
        return view('commission_logs.create', compact('agreements'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'rental_agreement_id' => 'required|exists:rental_agreements,id',
            'commission_amount'   => 'required|numeric',
            'payment_date'        => 'required|date',
        ]);

        CommissionLog::create($data);

        return redirect()->route('commission_logs.index')
            ->with('success', 'Log prowizji dodany');
    }

    public function show(CommissionLog $commissionLog)
    {
        return view('commission_logs.show', compact('commissionLog'));
    }

    public function edit(CommissionLog $commissionLog)
    {
        $agreements = RentalAgreement::pluck('id','id');
        return view('commission_logs.edit', compact('commissionLog','agreements'));
    }

    public function update(Request $request, CommissionLog $commissionLog)
    {
        $data = $request->validate([
            'rental_agreement_id' => 'required|exists:rental_agreements,id',
            'commission_amount'   => 'required|numeric',
            'payment_date'        => 'required|date',
        ]);

        $commissionLog->update($data);

        return redirect()->route('commission_logs.index')
            ->with('success', 'Log prowizji zaktualizowany');
    }

    public function destroy(CommissionLog $commissionLog)
    {
        $commissionLog->delete();
        return redirect()->route('commission_logs.index')
            ->with('success', 'Log prowizji usunięty');
    }
}
