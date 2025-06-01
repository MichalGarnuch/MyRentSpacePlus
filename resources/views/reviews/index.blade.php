@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Opinie</h1>
        <a href="{{ route('reviews.create') }}" class="btn btn-primary">Nowa opinia</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Umowa #</th>
                <th>Użytkownik</th>
                <th>Ocena</th>
                <th>Komentarz</th>
                <th>Data utworzenia</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @forelse($reviews as $rv)
                <tr>
                    <td>{{ $rv->id }}</td>
                    <td>{{ $rv->rentalAgreement->id }}</td>
                    <td>{{ $rv->user->username }}</td>
                    <td>{{ $rv->rating }}/5</td>
                    <td>{{ $rv->comment ?? '-' }}</td>
                    <td>{{ $rv->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('reviews.edit', $rv) }}" class="btn btn-sm btn-warning">Edytuj</a>
                        <form action="{{ route('reviews.destroy', $rv) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">Brak opinii</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
