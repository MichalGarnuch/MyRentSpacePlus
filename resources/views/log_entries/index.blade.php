@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Logi systemowe</h1>
        <a href="{{ route('log_entries.create') }}" class="btn btn-primary">Nowy wpis</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Użytkownik</th>
                <th>Akcja</th>
                <th>Timestamp</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @forelse($log_entries as $le)
                <tr>
                    <td>{{ $le->id }}</td>
                    <td>{{ $le->user->username }}</td>
                    <td>{{ $le->action }}</td>
                    <td>{{ $le->timestamp->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('log_entries.edit', $le) }}" class="btn btn-sm btn-warning">Edytuj</a>
                        <form action="{{ route('log_entries.destroy', $le) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Brak wpisów w logu</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
