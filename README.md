# Coding Blog Website (Fullstack Laravel)

## Description

####  This blog website project was built to provide different solutions for different coding problems. This project was built to practice SEO optimazation.

# Getting Started

## Installation

#### Clone the repository

```
git https://github.com/cur1ousFranz/laravel-blog.git
```
#### Navigate to main directory

```
cd laravel-blog
```
#### Install required dependencies

```
composer install
```

#### Copy the example env file and make the required configuration changes in the .env file

```
cp .env.example .env
```

#### Generate a new application key

```
php artisan key:generate
```

#### Run the database migrations (Set the database connection in .env before migrating)

```
php artisan migrate
```

#### Start local development server.

```
php artisan serve
```

#### You can now access the server at http://127.0.0.1:8000

### Features

* Display all blog by category and tags (CRUD).
* Create and Update blog post (CRUD).
* SEO Optimization
