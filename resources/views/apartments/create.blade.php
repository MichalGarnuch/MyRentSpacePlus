@extends('layouts.app')

@section('content')
    <h1>Dodaj mieszkanie</h1>
    <form action="{{ route('apartments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Numer mieszkania</label>
            <input name="apartment_number" class="form-control" value="{{ old('apartment_number') }}" required>
        </div>
        <div class="mb-3">
            <label>Piętro</label>
            <input type="number" name="floor_number" class="form-control" value="{{ old('floor_number') }}" required>
        </div>
        <div class="mb-3">
            <label>Powierzchnia (m²)</label>
            <input type="number" step="0.01" name="size_sqm" class="form-control" value="{{ old('size_sqm') }}" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select" required>
                <option value="available">Dostępne</option>
                <option value="rented">Wynajęte</option>
                <option value="maintenance">W naprawie</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Budynek</label>
            <select name="building_id" class="form-select" required>
                @foreach($buildings as $b)
                    <option value="{{ $b->id }}">{{ $b->street }} {{ $b->building_number }}, {{ $b->location->city }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Zapisz</button>
    </form>
@endsection
