@extends('layouts.app')

@section('title', 'Panel główny')

@section('content')
    <div class="p-5 bg-light rounded-3">
        <h1 class="display-6">Witaj w MyRentSpacePlus</h1>
        <p class="lead">Wybierz z menu pozycję, aby zarządzać zasobami:</p>
        <hr class="my-4">

        <div class="row">
            <div class="col-md-4 mb-3">
                <a href="{{ route('apartments.index') }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-home fa-2x mb-2"></i>
                            <h5 class="card-title">Mieszkania</h5>
                            <p class="card-text">Dodawaj, edytuj, usuwaj i przeglądaj mieszkania.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('buildings.index') }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-city fa-2x mb-2"></i>
                            <h5 class="card-title">Budynki</h5>
                            <p class="card-text">Zarządzaj budynkami i ich lokalizacjami.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('locations.index') }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-map-marker-alt fa-2x mb-2"></i>
                            <h5 class="card-title">Lokacje</h5>
                            <p class="card-text">Przeglądaj i edytuj miasta oraz kody pocztowe.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4 mb-3">
                <a href="{{ route('rental_agreements.index') }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-file-contract fa-2x mb-2"></i>
                            <h5 class="card-title">Umowy najmu</h5>
                            <p class="card-text">Zarządzaj wszystkimi umowami najmu.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('rent_payments.index') }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-coins fa-2x mb-2"></i>
                            <h5 class="card-title">Płatności najmu</h5>
                            <p class="card-text">Rejestruj i przeglądaj wpłaty od najemców.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('payment_schedules.index') }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-calendar-alt fa-2x mb-2"></i>
                            <h5 class="card-title">Harmonogramy płatności</h5>
                            <p class="card-text">Zobacz zaplanowane terminy płatności.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4 mb-3">
                <a href="{{ route('media_types.index') }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-lightbulb fa-2x mb-2"></i>
                            <h5 class="card-title">Typy mediów</h5>
                            <p class="card-text">Dodawaj i edytuj typy mediów (Prąd, Gaz, Internet…).</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('media_usages.index') }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-tachometer-alt fa-2x mb-2"></i>
                            <h5 class="card-title">Odczyty mediów</h5>
                            <p class="card-text">Rejestruj odczyty zużycia mediów.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('maintenance_requests.index') }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-wrench fa-2x mb-2"></i>
                            <h5 class="card-title">Zgłoszenia serwisowe</h5>
                            <p class="card-text">Zarządzaj zgłoszeniami do serwisu.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4 mb-3">
                <a href="{{ route('commission_logs.index') }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-receipt fa-2x mb-2"></i>
                            <h5 class="card-title">Logi prowizji</h5>
                            <p class="card-text">Przeglądaj i dodawaj zapisy prowizji.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('reports.index') }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-chart-line fa-2x mb-2"></i>
                            <h5 class="card-title">Raporty</h5>
                            <p class="card-text">Generuj różne raporty (finanse, media…).</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('reviews.index') }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-star fa-2x mb-2"></i>
                            <h5 class="card-title">Recenzje</h5>
                            <p class="card-text">Zarządzaj opiniami o nieruchomościach.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4 mb-3">
                <a href="{{ route('users.index') }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-users fa-2x mb-2"></i>
                            <h5 class="card-title">Użytkownicy</h5>
                            <p class="card-text">Zarządzaj kontami użytkowników.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('notifications.index') }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-bell fa-2x mb-2"></i>
                            <h5 class="card-title">Powiadomienia</h5>
                            <p class="card-text">Przeglądaj i dodawaj notyfikacje.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('log_entries.index') }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-scroll fa-2x mb-2"></i>
                            <h5 class="card-title">Logi systemu</h5>
                            <p class="card-text">Historia akcji wykonanych w systemie.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
