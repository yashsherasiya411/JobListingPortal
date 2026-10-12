# Job Listing Portal (Laravel)

Users can register, log in, post jobs, edit or delete their own jobs, and anyone can browse and search listings.

This zip contains only the project-specific files. Laravel itself is installed with Composer.

## Requirements
- PHP 8.2+ and Composer
- (Optional) MySQL. Laravel 11 uses SQLite by default, which needs no setup.

## Setup
1. Create a fresh Laravel app:

       composer create-project laravel/laravel job-portal
       cd job-portal

2. Copy everything from this zip's `app`, `database`, `resources` and `routes` folders into the same folders of `job-portal`. Say "yes" when asked to replace `app/Models/User.php`, `routes/web.php` and `database/seeders/DatabaseSeeder.php`.
3. Create the tables and sample data:

       php artisan migrate --seed

4. Start the server and open http://127.0.0.1:8000

       php artisan serve

Demo login after seeding: `demo@example.com` / `password123`

## MySQL (optional)
In `.env` set `DB_CONNECTION=mysql`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, create the empty database, then run `php artisan migrate --seed`.

## What each file does
- `app/Models/JobListing.php` - job model (table `job_listings`)
- `app/Http/Controllers/JobController.php` - list/search, create, edit, delete with owner check
- `app/Http/Controllers/AuthController.php` - register, login, logout
- `database/migrations/..._create_job_listings_table.php` - table definition
- `routes/web.php` - public and logged-in routes
- `resources/views/` - Blade templates (Bootstrap layout)
