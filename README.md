# backpack-task

Steps to setup the project
1. composer install
2. cp .env.example .env && php artisan key:generate
3. Fill your database credentials into DB_DATABASE, DB_USER and DB_PASSWORD
4. Run migrations with "php artisan migrate --seed"
5. Predefined user is "admin@mindhub.com" with password "secret"
6. Invoke "php artisan serve" to spin up a server (if you don't user Laravel Valet)
7. Go to http://127.0.0.1:8000/admin and login with the predefined admin
