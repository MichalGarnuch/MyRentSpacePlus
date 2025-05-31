<?php

namespace App\Http\Controllers;

use App\Models\CommissionLog;
use App\Models\RentalAgreement;
use Illuminate\Http\Request;

class CommissionLogController extends Controller
{
    public function index()
    {
        // Pobieramy wszystkie wpisy, razem z relacją 'rentalAgreement'
        $commission_logs = CommissionLog::with('rentalAgreement')
            ->orderBy('payment_date', 'desc')
            ->get();

        // Upewniamy się, że widok otrzyma zmienną $commission_logs
        return view('commission_logs.index', compact('commission_logs'));
    }

    public function create()
    {
        // Pobieramy listę wszystkich umów, żeby zasilić <select>
        // Klucz i wartość w pluck('id','id') są takie same (możesz też zmienić na bardziej opisowe)
        $rental_agreements = RentalAgreement::pluck('id', 'id');

        // Przekazujemy widokowi zmienną $rental_agreements
        return view('commission_logs.create', compact('rental_agreements'));
    }

    public function store(Request $request)
    {
        // Walidacja
        $data = $request->validate([
            'rental_agreement_id' => 'required|exists:rental_agreements,id',
            'commission_amount'   => 'required|numeric',
            'payment_date'        => 'required|date',
        ]);

        CommissionLog::create($data);

        return redirect()->route('commission_logs.index')
            ->with('success', 'Wpis prowizji został dodany.');
    }

    public function edit(CommissionLog $commission_log)
    {
        // Ponownie pobieramy listę umów
        $rental_agreements = RentalAgreement::pluck('id', 'id');

        // Przekazujemy: pojedynczy $commission_log oraz $rental_agreements
        return view('commission_logs.edit', compact('commission_log', 'rental_agreements'));
    }

    public function update(Request $request, CommissionLog $commission_log)
    {
        $data = $request->validate([
            'rental_agreement_id' => 'required|exists:rental_agreements,id',
            'commission_amount'   => 'required|numeric',
            'payment_date'        => 'required|date',
        ]);

        $commission_log->update($data);

        return redirect()->route('commission_logs.index')
            ->with('success', 'Wpis prowizji został zaktualizowany.');
    }

    public function destroy(CommissionLog $commission_log)
    {
        $commission_log->delete();

        return redirect()->route('commission_logs.index')
            ->with('success', 'Wpis prowizji został usunięty.');
    }
}
