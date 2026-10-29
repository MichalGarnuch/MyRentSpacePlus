@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Dziennik zdarzeń</h1>
    <p>Dziennik udostępniany jest administratorowi tylko do odczytu.</p>
    <table class="table">
        <thead><tr><th>Data</th><th>Użytkownik</th><th>Zdarzenie</th></tr></thead>
        <tbody>
        @forelse ($log_entries as $entry)
            <tr><td>{{ $entry->timestamp }}</td><td>{{ $entry->user?->name ?? '—' }}</td><td>{{ $entry->action }}</td></tr>
        @empty
            <tr><td colspan="3">Brak zdarzeń.</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $log_entries->links() }}
</div>
@endsection
