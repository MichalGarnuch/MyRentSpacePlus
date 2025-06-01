@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <h1>Dodaj odczyt medium</h1>
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

    <form method="POST" action="{{ route('media_usages.store') }}">
        @csrf

        <div class="mb-3">
            <label for="apartment_id" class="form-label">Mieszkanie:</label>
            <select id="apartment_id" name="apartment_id" class="form-select" required>
                <option value="">— Wybierz mieszkanie —</option>
                @foreach($apartments as $id => $number)
                    <option value="{{ $id }}" {{ old('apartment_id') == $id ? 'selected' : '' }}>
                        Mieszkanie #{{ $number }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="media_type_id" class="form-label">Typ medium:</label>
            <select id="media_type_id" name="media_type_id" class="form-select" required>
                <option value="">— Wybierz typ —</option>
                @foreach($media_types as $id => $name)
                    <option value="{{ $id }}" {{ old('media_type_id') == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="rental_agreement_id" class="form-label">Umowa najmu:</label>
            <select id="rental_agreement_id" name="rental_agreement_id" class="form-select">
                <option value="">— (opcjonalnie) —</option>
                @foreach($rental_agreements as $id => $label)
                    <option value="{{ $id }}" {{ old('rental_agreement_id') == $id ? 'selected' : '' }}>
                        Umowa #{{ $label }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="reading_date" class="form-label">Data odczytu:</label>
            <input type="date"
                   id="reading_date"
                   name="reading_date"
                   class="form-control"
                   value="{{ old('reading_date', now()->format('Y-m-d')) }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="value" class="form-label">Wartość:</label>
            <input type="number"
                   step="0.01"
                   id="value"
                   name="value"
                   class="form-control"
                   value="{{ old('value') }}"
                   required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox"
                   id="archived"
                   name="archived"
                   class="form-check-input"
                {{ old('archived') ? 'checked' : '' }}>
            <label for="archived" class="form-check-label">Zarchiwizowane</label>
        </div>

        <button type="submit" class="btn btn-success">Zapisz</button>
        <a href="{{ route('media_usages.index') }}" class="btn btn-secondary">Anuluj</a>
    </form>
@endsection
