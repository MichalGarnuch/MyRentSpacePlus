# MyRentSpacePlus: spójny routing zasobów i uprawnienia administratora

Branch: `wersja-inzynierska-2026`. Stan bazowy: `main` / `5328c2bb4490def5ecc148ee1d47dc1a0e79666b`. Data wykonania: 29.10.2026.

To autorski wariant rozwojowy konkretnego fragmentu projektu. Branch zachowuje pełne drzewo kodu z wersji bazowej i zawiera opisane poniżej zmiany. [Wcześniejszy audyt](https://github.com/MichalGarnuch/MyRentSpacePlus/tree/audyt-edukacyjny-2026) jest na osobnym branchu. Nie wykonywano merge ani wdrożenia.

## Wcześniejsza luka funkcjonalna

Istniały kontrolery i widoki zasobów, ale brakowało tras potrzebnych do ich użycia. Przywróciłem routes zasobów zgodnie z rzeczywistymi metodami kontrolerów. Nazwy `rental_agreements`, `media_usages`, `commission_logs` itd. zachowują konwencję używaną przez istniejące formularze; URI mogą zawierać myślniki bez zmiany nazw route. Kontroler prowizji nie ma show, więc taka trasa nie jest rejestrowana.

## Kontrola dostępu na granicy routingu

Grupa zasobów wymaga `auth` i `can:manage-rentals`. Gate w `AppServiceProvider` dopuszcza rolę admin. Samo logowanie nie daje najemcy dostępu do zarządzania wszystkimi mieszkańcami, płatnościami i użytkownikami. Logowanie ma limit 5 żądań na minutę. Formularze Laravel nadal korzystają z istniejącej ochrony CSRF.

To administracyjny model dostępu, nie gotowy portal najemcy. Dane użytkownika muszą w przyszłości być filtrowane jego relacjami, a polityki powinny rozstrzygać uprawnienie do konkretnego zasobu. Nie wolno rozszerzyć Gate na wszystkie role bez tej warstwy.

## Dziennik nie jest formularzem CRUD

`LogEntryController` ma teraz tylko index z paginacją 100 i stabilnym sortowaniem po czasie i id. Ujednoliciłem nazwę widoku i zmiennej z `log_entries/index`. Usunąłem z dziennika przyciski ręcznego dopisywania, zmiany i usuwania oraz trasy tych operacji. Historia zdarzeń jest widokiem odczytowym, a nie edytowalną tabelą dla operatora.

To nie czyni dziennika odpornym na modyfikacje przez administratora bazy. Pełny audyt wymaga zapisu zdarzeń po stronie usług, ograniczeń uprawnień bazy, retencji i ewentualnego zewnętrznego, dopisywalnego magazynu. Nie dodałem tu pozornej „niezmienności” przez samą etykietę UI.

## Testy i zakres następnego etapu

Test HTTP potwierdza przekierowanie gościa i 403 dla najemcy (GET i POST). Drugi sprawdza Gate dla administratora, zarejestrowane zasoby i ich middleware oraz brak nieistniejącego show i mutacji logów. `route:list` wykonało rzeczywiste wykrycie tras.

Przywrócenie trasy nie dowodzi poprawności każdego istniejącego CRUD. Kolejny etap to test każdego admin flow z migracjami, w szczególności brakujących widoków i powiązań formularzy, walidacja kwot i dat oraz izolacja organizacji. W tym branchu usuwam podstawową niespójność routingu i dostępu, nie deklaruję pełnej gotowości systemu finansowego.


## Konfiguracja CI i wynik pełnej baterii

Po publikacji GitHub odrzucił wcześniej istniejący pusty `schedule` w workflow, zanim uruchomił jakikolwiek job. Usunąłem nieważną sekcję. Osobny workflow `Engineering contracts` uruchamia rzeczywiste dwa nowe testy na PHP 8.3 i SQLite. Jego nazwa opisuje zakres; nie oznacza zaliczenia pełnej baterii.

Wykonałem również pełne 27 testów: zestaw nadal ma 3 błędy i 14 niepowodzeń. Wśród przyczyn są brak stanu `unverified` w factory, nieudostępnione ścieżki rejestracji/resetu/weryfikacji i brak manifestu Vite. Nie przywracam publicznej rejestracji tylko po to, aby starszy test Breeze zaświecił się na zielono. Trzeba najpierw ustalić i wdrożyć pełny kontrakt kont. Raport zachowuje te niepowodzenia jako dług do rozwiązania, a nowe testy nie zastępują pełnej baterii.

## Weryfikacja wykonana w tej sesji

| Sprawdzenie | Wynik i znaczenie |
|---|---|
| PHPUnit --filter EngineeringAccessTest | PASS: 2 testy dostępu i rejestracji tras |
| php artisan route:list --except-vendor | PASS: rozpoznano kontrolery i trasy |
| php -l zmienionych plików | PASS |
| Pełny vendor/bin/phpunit, 27 testów | FAIL: 3 błędy i 14 niepowodzeń w istniejących obszarach auth/UI; szczegóły w opisie |

### Granice weryfikacji

Nowe testy dostępu przechodzą, lecz pełna bateria 27 testów pozostaje nieprzechodząca (3 błędy, 14 niepowodzeń). Brak testów wszystkich CRUD na bazie, browser QA i asset builda. Braki kontraktu kont i widoków wymagają rozwiązania przed wdrożeniem.

## Mapa zmian

- [`.github/workflows/engineering-contracts.yml`](.github/workflows/engineering-contracts.yml)
- [`tests/Feature/EngineeringAccessTest.php`](tests/Feature/EngineeringAccessTest.php)
- [`.github/workflows/tests.yml`](.github/workflows/tests.yml)
- [`app/Http/Controllers/LogEntryController.php`](app/Http/Controllers/LogEntryController.php)
- [`app/Providers/AppServiceProvider.php`](app/Providers/AppServiceProvider.php)
- [`resources/views/log_entries/index.blade.php`](resources/views/log_entries/index.blade.php)
- [`routes/web.php`](routes/web.php)
