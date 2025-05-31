@extends('layouts.app')

@section('content')
<div class="mb-3">
    <h1>Edytuj typ medium #{{ $media_type->id }}</h1>
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

<form method="POST" action="{{ route('media_types.update', $media_type) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nazwa:</label>
        <input type="text"
               id="name"
               name="name"
               class="form-control"
               value="{{ old('name', $media_type->name) }}"
               required>
    </div>

    <div class="mb-3">
        <label for="unit" class="form-label">Jednostka:</label>
        <input type="text"
               id="unit"
               name="unit"
               class="form-control"
               value="{{ old('unit', $media_type->unit) }}"
               required>
    </div>

    <button type="submit" class="btn btn-success">Zapisz zmiany</button>
    <a href="{{ route('media_types.index') }}" class="btn btn-secondary">Anuluj</a>
</form>
@endsection
