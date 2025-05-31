@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Lokalizacje</h1>
        <a href="{{ route('locations.create') }}" class="btn btn-primary">Nowa lokalizacja</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Miasto</th>
            <th>Kod pocztowy</th>
            <th>Akcje</th>
        </tr>
        </thead>
        <tbody>
        @forelse($locations as $loc)
            <tr>
                <td>{{ $loc->id }}</td>
                <td>{{ $loc->city }}</td>
                <td>{{ $loc->postal_code }}</td>
                <td>
                    <a href="{{ route('locations.edit', $loc) }}" class="btn btn-sm btn-warning">Edytuj</a>
                    <form action="{{ route('locations.destroy', $loc) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Usuń</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Brak lokalizacji</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
