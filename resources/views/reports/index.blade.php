@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Raporty</h1>
        <a href="{{ route('reports.create') }}" class="btn btn-primary">Nowy raport</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Użytkownik</th>
                <th>Typ raportu</th>
                <th>Data wygenerowania</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @forelse($reports as $rep)
                <tr>
                    <td>{{ $rep->id }}</td>
                    <td>{{ $rep->user->username }}</td>
                    <td>{{ ucfirst($rep->report_type) }}</td>
                    <td>{{ $rep->generated_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('reports.edit', $rep) }}" class="btn btn-sm btn-warning">Edytuj</a>
                        <form action="{{ route('reports.destroy', $rep) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Brak raportów</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
