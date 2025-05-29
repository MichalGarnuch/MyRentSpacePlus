@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Mieszkania</h1>
        <a href="{{ route('apartments.create') }}" class="btn btn-primary">Nowe mieszkanie</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th><th>Nr</th><th>Piętro</th><th>Pow. m²</th><th>Status</th><th>Adres</th><th>Akcje</th>
        </tr>
        </thead>
        <tbody>
        @forelse($apartments as $a)
            <tr>
                <td>{{ $a->id }}</td>
                <td>{{ $a->apartment_number }}</td>
                <td>{{ $a->floor_number }}</td>
                <td>{{ $a->size_sqm }}</td>
                <td>{{ $a->status }}</td>
                <td>{{ $a->building->street }} {{ $a->building->building_number }}, {{ $a->building->location->city }}</td>
                <td>
                    <a href="{{ route('apartments.edit',$a) }}" class="btn btn-sm btn-warning">Edytuj</a>
                    <form method="POST" action="{{ route('apartments.destroy',$a) }}" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Usuń</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7" class="text-center">Brak mieszkań</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
