@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Typy mediów</h1>
        <a href="{{ route('media_types.create') }}" class="btn btn-primary">Nowy typ</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Nazwa</th>
                <th>Jednostka</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @forelse($media_types as $mt)
                <tr>
                    <td>{{ $mt->id }}</td>
                    <td>{{ $mt->name }}</td>
                    <td>{{ $mt->unit }}</td>
                    <td>
                        <a href="{{ route('media_types.edit', $mt) }}" class="btn btn-sm btn-warning">Edytuj</a>
                        <form action="{{ route('media_types.destroy', $mt) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">Brak typów mediów</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
