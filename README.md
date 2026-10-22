# APNI Ads

A Laravel classifieds marketplace with a full seller/buyer loop: post a listing, browse by
category, keep a wishlist, add to cart, order, message the seller and leave a comment — plus a
jobs board with applications built on the same auth and roles.

## Stack

| Layer | Choice |
|---|---|
| Backend | PHP 8, Laravel 9 (`laravel/framework ^9.2`) |
| Auth | Laravel Breeze-style scaffolding, Sanctum personal access tokens |
| Database | MySQL |
| Frontend | Blade + Laravel Mix (`webpack.mix.js`) |

## Features

- **Listings** — ads modelled by `Ad`, grouped by `Category` (`AdController`, `CategoryController`).
- **Commerce** — `cart`, `order` and `wishlist` tables with their own controllers.
- **Messaging** — `Chat` between users on a listing (`ChatController`).
- **Comments** — per-listing discussion (`CommentController`).
- **Jobs board** — `job` and `job_application` tables with a dedicated controller pair
  (`JobController`, `JobApplicationController`).
- **Accounts** — registration, login, password reset and email verification under `Auth/`.

## Schema

`users`, `categories`, `ads`, `chats`, `orders`, `wishlists`, `carts`, `jobs`, `job_applications`,
plus the framework's password-reset and failed-jobs tables.

## Running it

```bash
composer install
npm install && npm run dev

cp .env.example .env
# then set GOOGLE_MAPS_KEY=<your key> in .env
php artisan key:generate
php artisan migrate --seed

php artisan serve
```

Credentials and other secrets are read from the environment — `.env` is not committed. The
Google Maps key is supplied through `GOOGLE_MAPS_KEY` and resolved via
`config('services.google_maps.key')`, so no key is ever stored in the template.
