# Laravel Skill Test – Post Management

## 📌 Overview
This repository contains a technical test implementation using **Laravel 12** focused on building RESTful routes for a Post model.

The implementation covers:
- Draft, scheduled, and published post handling
- Authentication and authorization using Laravel policies
- Clean query logic without cron jobs
- Preserved commit history as required

This submission intentionally focuses on **backend logic and data integrity**.

---

## ⚙️ Tech Stack
- PHP 8.4
- Laravel 12
- Database: SQLite
- Authentication: Laravel session & cookie-based authentication
- Frontend: Not implemented (API-focused test)

---

## 🚀 Installation & Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
