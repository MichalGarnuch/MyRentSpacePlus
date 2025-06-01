@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <h1>Edytuj pozycję #{{ $paymentSchedule->id }}</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('payment_schedules.update', $paymentSchedule) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="rental_agreement_id" class="form-label">Umowa najmu:</label>
            <select id="rental_agreement_id" name="rental_agreement_id" class="form-select" required>
                <option value="">— Wybierz umowę —</option>
                @foreach($rental_agreements as $id => $label)
                    <option value="{{ $id }}"
                        {{ old('rental_agreement_id', $paymentSchedule->rental_agreement_id) == $id ? 'selected' : '' }}>
                        Umowa #{{ $label }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Data płatności:</label>
            <input type="date"
                   id="due_date"
                   name="due_date"
                   class="form-control"
                   value="{{ old('due_date', $paymentSchedule->due_date->format('Y-m-d')) }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Kwota (PLN):</label>
            <input type="number"
                   step="0.01"
                   id="amount"
                   name="amount"
                   class="form-control"
                   value="{{ old('amount', $paymentSchedule->amount) }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Typ płatności:</label>
            <select id="type" name="type" class="form-select" required>
                <option value="rent"      {{ old('type', $paymentSchedule->type) == 'rent' ? 'selected' : '' }}>Czynsz</option>
                <option value="deposit"   {{ old('type', $paymentSchedule->type) == 'deposit' ? 'selected' : '' }}>Kaucja</option>
                <option value="utilities" {{ old('type', $paymentSchedule->type) == 'utilities' ? 'selected' : '' }}>Media</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select id="status" name="status" class="form-select" required>
                <option value="pending"   {{ old('status', $paymentSchedule->status) == 'pending' ? 'selected' : '' }}>Oczekuje</option>
                <option value="paid"      {{ old('status', $paymentSchedule->status) == 'paid' ? 'selected' : '' }}>Opłacone</option>
                <option value="overdue"   {{ old('status', $paymentSchedule->status) == 'overdue' ? 'selected' : '' }}>Zaległe</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Zapisz zmiany</button>
        <a href="{{ route('payment_schedules.index') }}" class="btn btn-secondary">Anuluj</a>
    </form>
@endsection
