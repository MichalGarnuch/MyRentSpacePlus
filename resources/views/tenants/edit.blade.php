@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <h1>Edytuj najemcę</h1>
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

    <form action="{{ route('tenants.update', $tenant) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="first_name" class="form-label">Imię:</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $tenant->first_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Nazwisko:</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $tenant->last_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telefon:</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $tenant->phone) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $tenant->email) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Aktualizuj</button>
        <a href="{{ route('tenants.index') }}" class="btn btn-secondary">Anuluj</a>
    </form>
@endsection
