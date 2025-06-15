@extends('layouts.app')

@section('title', 'Panel główny')

@section('content')
    <div class="p-5 bg-light rounded-3">
        <h1 class="display-6">Witaj w MyRentSpacePlus</h1>
        <p class="lead">Wybierz z menu pozycję, aby zarządzać zasobami:</p>
        <hr class="my-4">

        {{-- =======  I rząd kafelków  ======= --}}
        <div class="row">
            <x-dashboard.tile route="apartments.index"  icon="fa-home"           title="Mieszkania"
                              text="Dodawaj, edytuj, usuwaj i przeglądaj mieszkania." />
            <x-dashboard.tile route="buildings.index"   icon="fa-city"           title="Budynki"
                              text="Zarządzaj budynkami i ich lokalizacjami." />
            <x-dashboard.tile route="locations.index"   icon="fa-map-marker-alt" title="Lokacje"
                              text="Przeglądaj i edytuj miasta oraz kody pocztowe." />
        </div>

        {{-- =======  II rząd kafelków  ======= --}}
        <div class="row mt-3">
            <x-dashboard.tile route="rental_agreements.index" icon="fa-file-contract"
                              title="Umowy najmu" text="Zarządzaj wszystkimi umowami najmu." />
            <x-dashboard.tile route="rent_payments.index"     icon="fa-coins"
                              title="Płatności najmu" text="Rejestruj i przeglądaj wpłaty od najemców." />
            <x-dashboard.tile route="payment_schedules.index" icon="fa-calendar-alt"
                              title="Harmonogramy płatności" text="Zobacz zaplanowane terminy płatności." />
        </div>

        {{-- =======  III rząd kafelków  ======= --}}
        <div class="row mt-3">
            <x-dashboard.tile route="media_types.index"   icon="fa-lightbulb"
                              title="Typy mediów" text="Dodawaj i edytuj typy mediów (Prąd, Gaz, Internet…)." />
            <x-dashboard.tile route="media_usages.index"  icon="fa-tachometer-alt"
                              title="Odczyty mediów" text="Rejestruj odczyty zużycia mediów." />
            <x-dashboard.tile route="maintenance_requests.index" icon="fa-wrench"
                              title="Zgłoszenia serwisowe" text="Zarządzaj zgłoszeniami do serwisu." />
        </div>

        {{-- =======  IV rząd kafelków  ======= --}}
        <div class="row mt-3">
            <x-dashboard.tile route="commission_logs.index" icon="fa-receipt"
                              title="Logi prowizji" text="Przeglądaj i dodawaj zapisy prowizji." />
            <x-dashboard.tile route="reports.index"        icon="fa-chart-line"
                              title="Raporty" text="Generuj różne raporty (finanse, media…)."/>
            <x-dashboard.tile route="reviews.index"        icon="fa-star"
                              title="Recenzje" text="Zarządzaj opiniami o nieruchomościach." />
        </div>

        {{-- =======  V rząd kafelków  ======= --}}
        <div class="row mt-3">
            <x-dashboard.tile route="users.index"         icon="fa-users"
                              title="Użytkownicy" text="Zarządzaj kontami użytkowników." />
            <x-dashboard.tile route="notifications.index" icon="fa-bell"
                              title="Powiadomienia" text="Przeglądaj i dodawaj notyfikacje." />
            <x-dashboard.tile route="log_entries.index"   icon="fa-scroll"
                              title="Logi systemu" text="Historia akcji wykonanych w systemie." />
        </div>
    </div>
@endsection
