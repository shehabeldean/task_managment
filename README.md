# Project Title

Task Management.

## Getting Started

### Dependencies

- PHP  ^8.2
- Laravel ^11.0
- Composer

### Installing

Step-by-step guide on setting up project:

1. Install dependencies::
   ```bash
   composer install

2. Copy .env.example to .env:
   ```bash
   cp .env.example .env


3. Set up  database in .env:
   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret
   
4. Generate an application key:
   ```bash
   php artisan key:generate

5. If you want to run one command to skip all next steps. You can run this one 
   ```bash
   php artisan app:start


if you didn't use this command you can skip it and run the following commands:


6. Run migrations and seed the database:
   ```bash
   php artisan migrate --seed

7. To queue work (For background jobs)
   ```bash
   php artisan queue:work 

8. Serve project 
   ```bash
   php artisan serve

9. To run tests
   ```bash
   php artisan test




