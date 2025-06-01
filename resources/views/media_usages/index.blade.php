@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Zużycie mediów</h1>
        <a href="{{ route('media_usages.create') }}" class="btn btn-primary">Nowy odczyt</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Nr mieszkania</th>
                <th>Typ medium</th>
                <th>Data</th>
                <th>Wartość</th>
                <th>Zarchiwizowane</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @forelse($media_usages as $mu)
                <tr>
                    <td>{{ $mu->id }}</td>
                    <td>{{ $mu->apartment->apartment_number }}</td>
                    <td>{{ $mu->mediaType->name }} ({{ $mu->mediaType->unit }})</td>
                    <td>{{ $mu->reading_date->format('Y-m-d') }}</td>
                    <td>{{ number_format($mu->value, 2) }}</td>
                    <td>{{ $mu->archived ? 'Tak' : 'Nie' }}</td>
                    <td>
                        <a href="{{ route('media_usages.edit', $mu) }}" class="btn btn-sm btn-warning">Edytuj</a>
                        <form action="{{ route('media_usages.destroy', $mu) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">Brak odczytów</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
