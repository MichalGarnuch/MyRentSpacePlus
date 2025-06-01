@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Harmonogram płatności</h1>
        <a href="{{ route('payment_schedules.create') }}" class="btn btn-primary">Nowa pozycja</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Umowa #</th>
                <th>Data płatności</th>
                <th>Kwota</th>
                <th>Typ</th>
                <th>Status</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @forelse($payment_schedules as $ps)
                <tr>
                    <td>{{ $ps->id }}</td>
                    <td>{{ $ps->rentalAgreement->id }}</td>
                    <td>{{ $ps->due_date->format('Y-m-d') }}</td>
                    <td>{{ number_format($ps->amount, 2) }} PLN</td>
                    <td>{{ ucfirst($ps->type) }}</td>
                    <td>{{ ucfirst($ps->status) }}</td>
                    <td>
                        <a href="{{ route('payment_schedules.edit', $ps) }}" class="btn btn-sm btn-warning">Edytuj</a>
                        <form action="{{ route('payment_schedules.destroy', $ps) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">Brak pozycji</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
