# MyRentSpacePlus — przewodnik i audyt edukacyjny

**Stan przeglądu:** 29 października 2026 r.  
**Gałąź bazowa:** `main`  
**Analizowany commit:** `5328c2bb4490def5ecc148ee1d47dc1a0e79666b`  
**Mapa wszystkich plików śledzonych przez Git:** [1](AUDYT_MAPA_01.md)

> To jest przegląd reprezentatywnych części projektu z inwentaryzacją wszystkich śledzonych plików, a nie pełna, ręczna weryfikacja każdego wiersza ani certyfikat bezpieczeństwa. Mapa jest automatyczna; wymienienie pliku nie oznacza, że został przetestowany lub dokładnie przeczytany. Wyniki odnoszą się do powyższego commita. Inne gałęzie mogą zawierać inne wersje.

## Co robi projekt

Rozbudowywana wersja systemu najmu oparta na Laravelu.

## Jak czytać kod i jak przepływają dane

[`app/Http/Controllers/`](app/Http/Controllers) zawiera m.in. operacje na lokalach, [`app/Models/`](app/Models) dane domenowe, a [`routes/web.php`](routes/web.php) definiuje aktualnie dostępne trasy.

Podczas czytania zacznij od punktu wejścia, przejdź do funkcji odpowiadającej za żądanie lub działanie użytkownika, a potem do operacji na danych i wyniku. Mapa plików podaje ścieżki i automatycznie rozpoznane nazwy wybranych deklaracji.

## Co jest wartościowe w obecnym rozwiązaniu

`ApartmentController` waliduje część pól wejściowych i pobiera relacje budynku/lokalizacji.

## Ustalenia, luki i proponowany rozwój

- **Potwierdzone — brak podłączenia modułu:** `ApartmentController` odsyła do nazwy `apartments.index`, lecz w przejrzanym [`routes/web.php`](routes/web.php) nie ma rejestracji zasobu apartments. Istnienie kontrolera i widoków samo nie udostępnia funkcji; należy zdefiniować trasy pod właściwym middleware.

- **Potwierdzone — auth:** [`routes/auth.php`](routes/auth.php) istnieje, ale [`routes/web.php`](routes/web.php) go nie dołącza i definiuje własne logowanie. Sprawdź świadomie, które funkcje odzyskiwania hasła, rejestracji i weryfikacji są rzeczywiście dostępne.

- **Do rozwoju:** zastąpić ogólny README Laravela opisem modułów, bazy, logowania oraz testów.

## Sprawdzenia i ich granice

Nie uruchomiono PHP, Composera ani `artisan route:list`; stan tras opisano na podstawie plików repozytorium.

W kopii roboczej dostępne pliki Pythona sprawdzono dodatkowo parserem składni; sprawdzono też składnię odczytanych plików [`package.json`](package.json) i [`composer.json`](composer.json). Nie zastępuje to uruchomienia programu. Kod źródłowy tej gałęzi jest taki sam jak w commicie bazowym; dodane są wyłącznie dokumenty audytu i mapy.

## Jak zaplanować kolejne prace

Najpierw zajmij się punktami oznaczonymi jako krytyczne lub wysokie, następnie ustal, które uwagi wymagają testu na pełnym środowisku. Dla każdej zmiany przygotuj osobną gałąź, konkretny przypadek odtwarzający problem i test rezultatu. Nie traktuj propozycji jako potwierdzenia, że poprawka została już wdrożona.
