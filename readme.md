# ProZdrowie

## Docker
#### Dostępne kontenery:
- postgres - localhost:5432 lub z innych kontenerów: postgres:5432
- mysql - localhost:3306 lub z innych kontenerów: mysql:3306
- mailhog - http://localhost:8025 przydatny np. do resetowania hasła
- nginx - http://localhost:8000
- cli - `docker-compose run cli`

w mysql i postgres jest utworzona pusta baza danych "psat", użytkownik: "psat", hasło: "psat".
Przykładowa konfiguracja znajduje się w pliku `.env.example`

#### Workflow
1. Uruchamiamy kontenery: `docker-compose up -d`
2. Uruchamiamy cli: `docker-compose run cli`
3. Wszystkie komendy np. `composer install`, `php artisan migrate` uruchamiamy w cli. Dostępny jest też npm i yarn. Gdyby czegoś brakowało to można dodać w `/docker/cli/Dockerfile`
4. Aplikacja jest dostępna pod adresem http://localhost:8000 (jest uruchomiona na serwerze nginx)

Można też używać kontenerów pojendynczo np. samego postgresa lub mysql, a serwer php uruchomić na swojej maszynie. 
W takim wypadku trzeba dodać poniższe wpisy do swojego pliku /etc/hosts lub C:\Windows\System32\drivers\etc
```
127.0.0.1   postgres
127.0.0.1   mysql
127.0.0.1   mailhog
```
Uruchomienie pojenynczego kontenera: `docker-compose up -d postgres`

Zatrzymanie kontenerów: `docker-compose stop`
## About Laravel
Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.
