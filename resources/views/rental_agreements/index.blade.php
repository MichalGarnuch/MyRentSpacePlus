@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Umowy najmu</h1>
        <a href="{{ route('rental_agreements.create') }}" class="btn btn-primary">Nowa umowa</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Mieszkanie</th>
                <th>Najemca</th>
                <th>Właściciel</th>
                <th>Od</th>
                <th>Do</th>
                <th>Czynsz</th>
                <th>Status</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @forelse($rental_agreements as $ra)
                <tr>
                    <td>{{ $ra->id }}</td>
                    <td>{{ $ra->apartment->apartment_number }}</td>
                    <td>{{ $ra->tenant->full_name }}</td>
                    <td>{{ $ra->owner->full_name }}</td>
                    <td>{{ $ra->start_date->format('Y-m-d') }}</td>
                    <td>{{ $ra->end_date->format('Y-m-d') }}</td>
                    <td>{{ number_format($ra->rent_amount, 2) }} PLN</td>
                    <td>{{ ucfirst($ra->status) }}</td>
                    <td>
                        <a href="{{ route('rental_agreements.edit', $ra) }}" class="btn btn-sm btn-warning">Edytuj</a>
                        <form action="{{ route('rental_agreements.destroy', $ra) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="9" class="text-center">Brak umów najmu</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
