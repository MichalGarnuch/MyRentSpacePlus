@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Płatności czynszowe</h1>
        <a href="{{ route('rent_payments.create') }}" class="btn btn-primary">Nowa płatność</a>
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
            @forelse($rent_payments as $rp)
                <tr>
                    <td>{{ $rp->id }}</td>
                    <td>{{ $rp->rentalAgreement->id }}</td>
                    <td>{{ $rp->payment_date->format('Y-m-d') }}</td>
                    <td>{{ number_format($rp->amount, 2) }} PLN</td>
                    <td>{{ ucfirst($rp->type) }}</td>
                    <td>{{ ucfirst($rp->status) }}</td>
                    <td>
                        <a href="{{ route('rent_payments.edit', $rp) }}" class="btn btn-sm btn-warning">Edytuj</a>
                        <form action="{{ route('rent_payments.destroy', $rp) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">Brak płatności</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
