@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <h1>Dodaj lokalizację</h1>
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

    <form action="{{ route('locations.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="city" class="form-label">Miasto:</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" required>
        </div>

        <div class="mb-3">
            <label for="postal_code" class="form-label">Kod pocztowy:</label>
            <input type="text" name="postal_code" id="postal_code" class="form-control" value="{{ old('postal_code') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Zapisz</button>
        <a href="{{ route('locations.index') }}" class="btn btn-secondary">Anuluj</a>
    </form>
@endsection
