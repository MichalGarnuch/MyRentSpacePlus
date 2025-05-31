@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <h1>Edytuj budynek</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buildings.update', $building) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="location_id" class="form-label">Miejscowość:</label>
            <select name="location_id" id="location_id" class="form-select" required>
                <option value="">-- Wybierz --</option>
                @foreach($locations as $loc)
                    <option value="{{ $loc->id }}" @if(old('location_id', $building->location_id) == $loc->id) selected @endif>
                        {{ $loc->city }} ({{ $loc->postal_code }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="street" class="form-label">Ulica:</label>
            <input type="text" name="street" id="street" class="form-control" value="{{ old('street', $building->street) }}" required>
        </div>

        <div class="mb-3">
            <label for="building_number" class="form-label">Numer budynku:</label>
            <input type="text" name="building_number" id="building_number" class="form-control" value="{{ old('building_number', $building->building_number) }}" required>
        </div>

        <div class="mb-3">
            <label for="total_floors" class="form-label">Liczba pięter:</label>
            <input type="number" name="total_floors" id="total_floors" class="form-control" value="{{ old('total_floors', $building->total_floors) }}" required>
        </div>

        <div class="mb-3">
            <label for="common_cost" class="form-label">Koszty wspólne (PLN):</label>
            <input type="number" step="0.01" name="common_cost" id="common_cost" class="form-control" value="{{ old('common_cost', $building->common_cost) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Aktualizuj</button>
        <a href="{{ route('buildings.index') }}" class="btn btn-secondary">Anuluj</a>
    </form>
@endsection
