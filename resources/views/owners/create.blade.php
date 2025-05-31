@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <h1>Dodaj właściciela</h1>
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

    <form action="{{ route('owners.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="first_name" class="form-label">Imię:</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Nazwisko:</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telefon:</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="commission_rate" class="form-label">Procent prowizji (%):</label>
            <input type="number" step="0.01" name="commission_rate" id="commission_rate" class="form-control" value="{{ old('commission_rate') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Zapisz</button>
        <a href="{{ route('owners.index') }}" class="btn btn-secondary">Anuluj</a>
    </form>
@endsection
