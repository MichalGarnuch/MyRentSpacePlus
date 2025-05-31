{{-- resources/views/maintenance_requests/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Zgłoszenia serwisowe</h1>
        <a href="{{ route('maintenance_requests.create') }}" class="btn btn-primary">Nowe zgłoszenie</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Nr mieszkania</th>
                <th>Opis</th>
                <th>Data zgłoszenia</th>
                <th>Status</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @forelse($maintenance_requests as $req)
                <tr>
                    <td>{{ $req->id }}</td>
                    <td>{{ $req->apartment_id }}</td>
                    <td>{{ $req->description }}</td>
                    <td>{{ $req->request_date->format('Y-m-d') }}</td>
                    <td>{{ $req->status }}</td>
                    <td>
                        <a href="{{ route('maintenance_requests.edit', $req) }}" class="btn btn-sm btn-warning">
                            Edytuj
                        </a>

                        <form action="{{ route('maintenance_requests.destroy', $req) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Brak zgłoszeń serwisowych</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
