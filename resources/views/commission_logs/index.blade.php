{{-- resources/views/commission_logs/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Raporty prowizji</h1>
        <a href="{{ route('commission_logs.create') }}" class="btn btn-primary">Nowy wpis prowizji</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Umowa najmu</th>
                <th>Kwota prowizji</th>
                <th>Data płatności</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @forelse($commission_logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>Umowa #{{ $log->rental_agreement_id }}</td>
                    <td>{{ number_format($log->commission_amount, 2) }} PLN</td>
                    <td>{{ $log->payment_date->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('commission_logs.edit', $log) }}" class="btn btn-sm btn-warning">
                            Edytuj
                        </a>

                        <form action="{{ route('commission_logs.destroy', $log) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Brak wpisów prowizji</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
