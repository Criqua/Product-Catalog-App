# Product-Catalog-App

A Laravel web application developed for the *Web Design & E-Commerce* course as part of an academic practice. This system provides a management interface for products and categories, following web development best practices. It features an MVC architecture with Eloquent ORM, Blade templating, and full CRUD operations. The user interface is fully localized in Spanish via Laravel’s localization tools, while all source code (models, migrations, routes, controllers, views) remains in English.

## Features

- **Category Management**: create, read, update, and delete categories  
- **Product Management**: create, read, update, and delete products  
- **Input Validation**: required names, positive numeric prices, and valid category associations  
- **Listing**: display each product’s associated category name  
  
---

## Quick Setup

> **Note:** This project requires **PHP 8.4.x, Composer, Node.js & npm**. If these requirements are already settled and you've cloned the repository, run the following commands on your terminal:

    composer install
    cp .env.example .env
    php artisan key:generate
    npm install
    npm run build
    php artisan migrate
    php artisan serve


You're all set!
