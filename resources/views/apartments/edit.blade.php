@extends('layouts.app')

@section('content')
    <h1>Edytuj mieszkanie</h1>

    <form method="POST" action="{{ route('apartments.update', $apartment) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Numer mieszkania</label>
            <input type="text" name="apartment_number" value="{{ $apartment->apartment_number }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Piętro</label>
            <input type="number" name="floor_number" value="{{ $apartment->floor_number }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Powierzchnia (m²)</label>
            <input type="number" name="size_sqm" step="0.01" value="{{ $apartment->size_sqm }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select" required>
                <option value="wolne" @selected($apartment->status === 'wolne')>Wolne</option>
                <option value="wynajęte" @selected($apartment->status === 'wynajęte')>Wynajęte</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Budynek</label>
            <select name="building_id" class="form-select" required>
                @foreach($buildings as $b)
                    <option value="{{ $b->id }}" @selected($apartment->building_id == $b->id)>
                        {{ $b->street }} {{ $b->building_number }}, {{ $b->location->city }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Zapisz zmiany</button>
        <a href="{{ route('apartments.index') }}" class="btn btn-secondary">Anuluj</a>
    </form>
@endsection
