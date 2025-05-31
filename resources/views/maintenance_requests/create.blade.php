@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <h1>Dodaj zgłoszenie serwisowe</h1>
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

    <form method="POST" action="{{ route('maintenance_requests.store') }}">
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
            <label for="description" class="form-label">Opis:</label>
            <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="request_date" class="form-label">Data zgłoszenia:</label>
            <input type="date"
                   id="request_date"
                   name="request_date"
                   class="form-control"
                   value="{{ old('request_date', now()->format('Y-m-d')) }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select id="status" name="status" class="form-select" required>
                <option value="open"        {{ old('status') == 'open' ? 'selected' : '' }}>Otwarte</option>
                <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>W trakcie</option>
                <option value="closed"      {{ old('status') == 'closed' ? 'selected' : '' }}>Zamknięte</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Zapisz</button>
        <a href="{{ route('maintenance_requests.index') }}" class="btn btn-secondary">Anuluj</a>
    </form>
@endsection
