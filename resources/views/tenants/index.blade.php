@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Najemcy</h1>
        <a href="{{ route('tenants.create') }}" class="btn btn-primary">Nowy najemca</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Telefon</th>
            <th>Email</th>
            <th>Akcje</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tenants as $t)
            <tr>
                <td>{{ $t->id }}</td>
                <td>{{ $t->first_name }}</td>
                <td>{{ $t->last_name }}</td>
                <td>{{ $t->phone }}</td>
                <td>{{ $t->email }}</td>
                <td>
                    <a href="{{ route('tenants.edit', $t) }}" class="btn btn-sm btn-warning">Edytuj</a>
                    <form action="{{ route('tenants.destroy', $t) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Usuń</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Brak najemców</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
