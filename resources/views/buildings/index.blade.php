@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Budyki</h1>
        <a href="{{ route('buildings.create') }}" class="btn btn-primary">Nowy budynek</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Miasto</th>
            <th>Ulica</th>
            <th>Numer</th>
            <th>Piętra</th>
            <th>Koszty wspólne (PLN)</th>
            <th>Akcje</th>
        </tr>
        </thead>
        <tbody>
        @forelse($buildings as $b)
            <tr>
                <td>{{ $b->id }}</td>
                <td>{{ $b->location->city }} ({{ $b->location->postal_code }})</td>
                <td>{{ $b->street }}</td>
                <td>{{ $b->building_number }}</td>
                <td>{{ $b->total_floors }}</td>
                <td>{{ number_format($b->common_cost, 2) }} PLN</td>
                <td>
                    <a href="{{ route('buildings.edit', $b) }}" class="btn btn-sm btn-warning">Edytuj</a>
                    <form action="{{ route('buildings.destroy', $b) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Usuń</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Brak budynków</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
