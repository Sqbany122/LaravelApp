Aplikacja zosała utworzona przy użyciu Laravel 5.8. Za serwer bazodanowy posłużył znany program XAMPP.

Główny adres pod jakim działa aplikacja to "/public/products".

<h2>Instalacja aplikcaji</h2>

1. Instalacja bazy danych oraz uruchomienie aplikacji:<br /><br />
    Przy użyciu programu XAMPP należy stworzyć dwie bazy danych:
    - laravelapp - główna baza danych do której należy zaimportować plik (laravelapp.sql - znajduje się on w repozytorium),
    - laravel_tests_database - jest to testowa baza danych, która jest potrzebna do przeprowadzenia wszystkich zaimplementowanych testów jednostkowych.

2. Pliki aplikacji należy umieścić w folderze "htdocs" programu XAMPP.

<h4>Uwaga!</h4>
Do repozytorium nie został dodany folder "vendor". Z uwagi na to po umieszczeniu aplikacji w folderze "htdocs" należy przejść do lokalizacji katalogu używająć np.: wiersza poleceń, oraz wywołać komendę "composer install", która spowoduje doinstalowanie brakujących elementów.

<h2>Funkcjonalności</h2>

1. Zawarte funkcjonalności dostępne dla każdego konta oraz użytkownika niezalogowanego:
    - logowanie oraz rejestracja dla użytkownika (zostały przeze mnie stworzone dwa podstawowe konta "user" oraz "admin", które pozwalają na przeprowadzenie testów związanych z autoryzacją konkretnych użytkowników dla określonych podstron),
    - wyszukiwarka produktów,
    - sortowanie produktów po kategoriach,
    - strona główna czyli widok wszystkich produktów jakie znajdują się w systemie,
    - podstrona konkretnego produktu, która wyświetla się po naciśnięciu przycisku "Szczegóły",
    - wyświetlanie ilości produktów,

2. Elementy dostępne jedynie dla konta "admin"
    - podstrona edycji konkretnego produktu dostępna jedynie dla konta "admin" dostępna pod przyciskiem "Edytuj",
    - możliwość usunięcia produktu dostępna jedynie dla konta "admin" dostępna pod przyciskiem "Usuń",
    - podstrona dodawania produktu, dostępna jedynie dla konta 