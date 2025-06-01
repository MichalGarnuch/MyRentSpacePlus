<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'MyRentSpacePlus'))</title>

    <!-- Bootstrap 5 CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-ENjdO4Dr2bkBIFxQpeoYkMThHBj6YldVx+o5Qm5Y5UN31YhEN3FxaFhp10TnCmHS" crossorigin="anonymous">

    <!-- (Opcjonalnie) Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-pVnVSpJwGeyhG8vJn/tl0QS0ifjJqf4+eT6NkmhHI596+xUsoMRWhRvbSWUi0zF1Vh8R7tJokbFSPPBuruPrwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Logo / Nazwa apki -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fa fa-building"></i> {{ config('app.name', 'MyRentSpacePlus') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- Zakładka: Mieszkania --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('apartments.*') ? 'active' : '' }}"
                       href="{{ route('apartments.index') }}">
                        <i class="fa fa-home"></i> Mieszkania
                    </a>
                </li>

                {{-- Dropdown: Budynki i Lokacje --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('buildings.*') || request()->routeIs('locations.*') ? 'active' : '' }}"
                       href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fa fa-city"></i> Nieruchomości
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('buildings.*') ? 'active' : '' }}"
                               href="{{ route('buildings.index') }}">
                                Budynki
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('locations.*') ? 'active' : '' }}"
                               href="{{ route('locations.index') }}">
                                Lokacje
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Dropdown: Wynajem --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('rental_agreements.*') || request()->routeIs('rent_payments.*') || request()->routeIs('payment_schedules.*') ? 'active' : '' }}"
                       href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fa fa-file-contract"></i> Wynajem
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('rental_agreements.*') ? 'active' : '' }}"
                               href="{{ route('rental_agreements.index') }}">
                                Umowy najmu
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('rent_payments.*') ? 'active' : '' }}"
                               href="{{ route('rent_payments.index') }}">
                                Płatności najmu
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('payment_schedules.*') ? 'active' : '' }}"
                               href="{{ route('payment_schedules.index') }}">
                                Harmonogram płatności
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Dropdown: Media --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('media_types.*') || request()->routeIs('media_usages.*') ? 'active' : '' }}"
                       href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fa fa-water"></i> Media
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('media_types.*') ? 'active' : '' }}"
                               href="{{ route('media_types.index') }}">
                                Typy mediów
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('media_usages.*') ? 'active' : '' }}"
                               href="{{ route('media_usages.index') }}">
                                Odczyty mediów
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Zakładka: Zgłoszenia serwisowe --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('maintenance_requests.*') ? 'active' : '' }}"
                       href="{{ route('maintenance_requests.index') }}">
                        <i class="fa fa-wrench"></i> Zgłoszenia serwisowe
                    </a>
                </li>

                {{-- Dropdown: Raporty i prowizje --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('commission_logs.*') || request()->routeIs('reports.*') || request()->routeIs('reviews.*') ? 'active' : '' }}"
                       href="#" id="navbarDropdown4" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fa fa-chart-line"></i> Raporty i prowizje
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown4">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('commission_logs.*') ? 'active' : '' }}"
                               href="{{ route('commission_logs.index') }}">
                                Logi prowizji
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('reports.*') ? 'active' : '' }}"
                               href="{{ route('reports.index') }}">
                                Raporty
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('reviews.*') ? 'active' : '' }}"
                               href="{{ route('reviews.index') }}">
                                Recenzje
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Dropdown: Użytkownicy i Logi --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('users.*') || request()->routeIs('notifications.*') || request()->routeIs('log_entries.*') ? 'active' : '' }}"
                       href="#" id="navbarDropdown5" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fa fa-users"></i> Użytkownicy & logi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown5">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('users.*') ? 'active' : '' }}"
                               href="{{ route('users.index') }}">
                                Użytkownicy
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('notifications.*') ? 'active' : '' }}"
                               href="{{ route('notifications.index') }}">
                                Powiadomienia
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('log_entries.*') ? 'active' : '' }}"
                               href="{{ route('log_entries.index') }}">
                                Logi systemu
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            {{-- Kawałek do profilu / wylogowania --}}
            <ul class="navbar-nav mb-2 mb-lg-0">
                {{--@auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li>
                                <a class="dropdown-item" href="{{ route('users.show', Auth::id()) }}">
                                    <i class="fa fa-id-badge me-1"></i> Mój profil
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger">
                                        <i class="fa fa-sign-out-alt me-1"></i> Wyloguj
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fa fa-sign-in-alt"></i> Zaloguj
                        </a>
                    </li>
                @endauth--}}
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Zamknij"></button>
        </div>
    @endif

    {{-- Miejsce na treść strony (podwidoki) --}}
    @yield('content')
</div>

{{-- Bootstrap 5 JS (CDN) --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-q2gyvXcJFOImMuZ/7vQ/GSMSiUW/aYNQk2ZgeHM0G0I+zcfR4IQpvEInCfzJo6uf"
        crossorigin="anonymous"></script>
@stack('scripts')
</body>
</html>
