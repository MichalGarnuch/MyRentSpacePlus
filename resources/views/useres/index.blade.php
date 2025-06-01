@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Użytkownicy</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Nowy użytkownik</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Rola</th>
                <th>ID związane</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $usr)
                <tr>
                    <td>{{ $usr->id }}</td>
                    <td>{{ $usr->username }}</td>
                    <td>{{ ucfirst($usr->role) }}</td>
                    <td>{{ $usr->related_id ?? '-' }}</td>
                    <td>
                        <a href="{{ route('users.edit', $usr) }}" class="btn btn-sm btn-warning">Edytuj</a>
                        <form action="{{ route('users.destroy', $usr) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Brak użytkowników</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
