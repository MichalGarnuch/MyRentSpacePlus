{{-- resources/views/commission_logs/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <h1>Dodaj wpis prowizji</h1>
    </div>

    {{-- Wyświetlanie błędów walidacji --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('commission_logs.store') }}">
        @csrf

        <div class="mb-3">
            <label for="rental_agreement_id" class="form-label">Umowa najmu:</label>
            <select id="rental_agreement_id"
                    name="rental_agreement_id"
                    class="form-select"
                    required>
                <option value="">— Wybierz umowę —</option>

                {{-- Używamy $rental_agreements, które przekazał kontroler --}}
                @foreach($rental_agreements as $id => $label)
                    <option value="{{ $id }}"
                        {{ old('rental_agreement_id') == $id ? 'selected' : '' }}>
                        Umowa #{{ $id }}
                        {{-- (opcjonalnie możesz dopisać fragment z datą:
                            Umowa #{{ $id }} ({{ \App\Models\RentalAgreement::find($id)->start_date }}–…)
                            ale to spowoduje N+1 query – lepiej przekazać wektorycznie pełne dane z kontrolera) --}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="commission_amount" class="form-label">Kwota prowizji (PLN):</label>
            <input type="number"
                   step="0.01"
                   id="commission_amount"
                   name="commission_amount"
                   class="form-control"
                   value="{{ old('commission_amount') }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="payment_date" class="form-label">Data płatności:</label>
            <input type="date"
                   id="payment_date"
                   name="payment_date"
                   class="form-control"
                   value="{{ old('payment_date', now()->format('Y-m-d')) }}"
                   required>
        </div>

        <button type="submit" class="btn btn-success">Zapisz</button>
        <a href="{{ route('commission_logs.index') }}" class="btn btn-secondary">Anuluj</a>
    </form>
@endsection
