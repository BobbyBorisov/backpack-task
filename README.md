# backpack-task

Steps to setup the project
1. composer install
2. cp .env.example .env && php artisan key:generate
3. Fill your database credentials into DB_DATABASE, DB_USER and DB_PASSWORD
4. Run migrations with php artisan migrate --seed
5. Predefined user is "admin@mindhub.com" with password "secret"
