# First web laravel

A Laravel web application built while learning full-stack development with Laravel.

## 📖 About This Project

This project was developed as a hands-on learning exercise while following the course [Curso de Laravel](https://platzi.com/cursos/desarrollo-laravel/) on [Platzi](https://platzi.com).

## Tech Stack

- PHP 8.3
- Laravel 13.17
- SQLite
- Tailwind CSS 4
- Vite

## ⚙️ Installation & Setup

1. Clone the repository:
   `git clone https://github.com/JosenRomero/first-web-laravel.git`
2. Install dependencies:
   `composer install && npm install`
3. Copy the environment file:
   `cp .env.example .env`
4. Generate the application key:
   `php artisan key:generate`
   This creates a unique encryption key for your application and stores it in the .env file.
5. Configure your database in `.env`, then run migrations:
   option 1: `php artisan migrate` Empty database (only tables)
   option 2: `php artisan migrate --seed` Database with sample data
6. Start the development environment::
   `composer run dev`

## 📚 Commands

```bash

# Run all pending migrations
php artisan migrate

# Rollback all migrations and re-run them with seeders
php artisan migrate:refresh --seed

# View all available make commands
php artisan list make


# Create a model with migration and factory
# Example `php artisan make:model Question -mf`
php artisan make:model Name -mf

# Create a controller
# Example `php artisan make:controller PageController`
php artisan make:controller NameController

# Create a Blade component with view
# Example `php artisan make:component forum/layouts/home --view`
php artisan make:component name --view

# Create a Livewire component
# Example `php artisan make:livewire Comment`
php artisan make:livewire Name

# Create a policy for authorization
# Example `php artisan make:policy QuestionPolicy`
php artisan make:policy NamePolicy

# Create a form request for validation
# Example `php artisan make:request SaveQuestionRequest`
php artisan make:request NameRequest

# Installing Packages
# Use `composer require package --dev` for packages only needed during development
composer require package

```
