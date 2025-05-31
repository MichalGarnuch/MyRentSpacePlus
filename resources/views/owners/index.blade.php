@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Właściciele</h1>
        <a href="{{ route('owners.create') }}" class="btn btn-primary">Nowy właściciel</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Telefon</th>
            <th>Email</th>
            <th>Procent prowizji</th>
            <th>Akcje</th>
        </tr>
        </thead>
        <tbody>
        @forelse($owners as $o)
            <tr>
                <td>{{ $o->id }}</td>
                <td>{{ $o->first_name }}</td>
                <td>{{ $o->last_name }}</td>
                <td>{{ $o->phone }}</td>
                <td>{{ $o->email }}</td>
                <td>{{ number_format($o->commission_rate,2) }}%</td>
                <td>
                    <a href="{{ route('owners.edit', $o) }}" class="btn btn-sm btn-warning">Edytuj</a>
                    <form action="{{ route('owners.destroy', $o) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Usuń</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Brak właścicieli</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
