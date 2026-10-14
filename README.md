# Barnabas Koncept — Laravel 12 Business Website

A dynamic, responsive portfolio/business website based directly on the PSA project proposal.

## Included
- Public Home, About, Services, Portfolio and Contact pages
- Dynamic services and portfolio projects from MySQL
- Admin login using Laravel session authentication
- Admin dashboard with statistics
- Full CRUD for Services and Portfolio Projects
- Image upload for portfolio projects
- Contact enquiry storage and admin inbox
- Site settings editable from the dashboard
- Responsive UI with Bootstrap 5 CDN + custom CSS
- Validation, CSRF protection, route middleware and password hashing

## Requirements
- PHP 8.2+
- Composer
- MySQL
- Node.js/NPM is optional because the UI uses Bootstrap CDN

## Installation

1. Create a fresh Laravel 12 application:
   `composer create-project laravel/laravel barnabas-koncept`
2. Copy the contents of this package into that Laravel project, replacing matching files.
3. Create a MySQL database, for example `barnabas_koncept`.
4. Copy `.env.example` to `.env` and set DB_DATABASE, DB_USERNAME and DB_PASSWORD.
5. Run:
   `php artisan key:generate`
   `php artisan migrate --seed`
6. Start:
   `php artisan serve`
7. Admin login:
   URL: `/admin/login`
   Email: `admin@barnabaskoncept.com`
   Password: `password`

IMPORTANT: Change the admin password before presenting/deploying the system.

## Storage
After installation run:
`php artisan storage:link`

Uploaded portfolio images are stored in `storage/app/public/portfolio`.

## Main routes
Public:
- /
- /about
- /services
- /portfolio
- /contact

Admin:
- /admin/login
- /admin/dashboard
- /admin/services
- /admin/portfolio
- /admin/messages
- /admin/settings

This package intentionally excludes the vendor directory and framework-generated files so it can be overlaid onto a normal Laravel installation.
