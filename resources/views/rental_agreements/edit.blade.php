@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <h1>Edytuj umowę #{{ $rentalAgreement->id }}</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('rental_agreements.update', $rentalAgreement) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="apartment_id" class="form-label">Mieszkanie:</label>
            <select id="apartment_id" name="apartment_id" class="form-select" required>
                <option value="">— Wybierz mieszkanie —</option>
                @foreach($apartments as $id => $number)
                    <option value="{{ $id }}"
                        {{ old('apartment_id', $rentalAgreement->apartment_id) == $id ? 'selected' : '' }}>
                        Mieszkanie #{{ $number }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tenant_id" class="form-label">Najemca:</label>
            <select id="tenant_id" name="tenant_id" class="form-select" required>
                <option value="">— Wybierz najemcę —</option>
                @foreach($tenants as $id => $name)
                    <option value="{{ $id }}"
                        {{ old('tenant_id', $rentalAgreement->tenant_id) == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="owner_id" class="form-label">Właściciel:</label>
            <select id="owner_id" name="owner_id" class="form-select" required>
                <option value="">— Wybierz właściciela —</option>
                @foreach($owners as $id => $name)
                    <option value="{{ $id }}"
                        {{ old('owner_id', $rentalAgreement->owner_id) == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="start_date" class="form-label">Data rozpoczęcia:</label>
                <input type="date"
                       id="start_date"
                       name="start_date"
                       class="form-control"
                       value="{{ old('start_date', $rentalAgreement->start_date->format('Y-m-d')) }}"
                       required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="end_date" class="form-label">Data zakończenia:</label>
                <input type="date"
                       id="end_date"
                       name="end_date"
                       class="form-control"
                       value="{{ old('end_date', $rentalAgreement->end_date->format('Y-m-d')) }}"
                       required>
            </div>
        </div>

        <div class="mb-3">
            <label for="rent_amount" class="form-label">Czynsz (PLN):</label>
            <input type="number"
                   step="0.01"
                   id="rent_amount"
                   name="rent_amount"
                   class="form-control"
                   value="{{ old('rent_amount', $rentalAgreement->rent_amount) }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="owner_rent" class="form-label">Część dla właściciela (PLN):</label>
            <input type="number"
                   step="0.01"
                   id="owner_rent"
                   name="owner_rent"
                   class="form-control"
                   value="{{ old('owner_rent', $rentalAgreement->owner_rent) }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="media_advance" class="form-label">Zaliczka na media (PLN):</label>
            <input type="number"
                   step="0.01"
                   id="media_advance"
                   name="media_advance"
                   class="form-control"
                   value="{{ old('media_advance', $rentalAgreement->media_advance) }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="company_commission" class="form-label">Prowizja (PLN):</label>
            <input type="number"
                   step="0.01"
                   id="company_commission"
                   name="company_commission"
                   class="form-control"
                   value="{{ old('company_commission', $rentalAgreement->company_commission) }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select id="status" name="status" class="form-select" required>
                <option value="active"    {{ old('status', $rentalAgreement->status) == 'active' ? 'selected' : '' }}>Aktywna</option>
                <option value="terminated"{{ old('status', $rentalAgreement->status) == 'terminated' ? 'selected' : '' }}>Zakończona</option>
                <option value="pending"   {{ old('status', $rentalAgreement->status) == 'pending' ? 'selected' : '' }}>Oczekiwanie</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Zapisz zmiany</button>
        <a href="{{ route('rental_agreements.index') }}" class="btn btn-secondary">Anuluj</a>
    </form>
@endsection
