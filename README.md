Laravel Skill Test Submission
📌 Overview

This repository contains my submission for Laravel Skill Test 1.
The goal of this test is to implement RESTful routes for a Post model using Laravel 12, following Laravel best practices and the requirements defined in the original test repository.

The implementation focuses on:

Proper post visibility logic (draft, scheduled, published)

Authentication & authorization using Laravel built-in features

Clean controller logic with policies and query scopes

JSON-based responses suitable for passing to views

🛠 Tech Stack

Framework: Laravel 12

PHP: 8.4

Database: SQLite

Authentication: Laravel session & cookie-based auth

Frontend: Not required (API-focused test)

⚙️ Installation & Setup
git clone https://github.com/elwinspranata/laravel-skill-test-submission.git
cd laravel-skill-test-submission

composer install
cp .env.example .env
php artisan key:generate

php artisan migrate
php artisan db:seed

php artisan serve

🧪 Database Seeding

Sample users and posts are provided via seeders.

php artisan db:seed


Seeded posts include:

Draft posts

Scheduled posts

Published posts

This ensures that post visibility logic can be properly tested.

📝 Post Status Logic

Post visibility is determined without cron jobs, strictly through query logic.

Status	Condition
Draft	is_draft = true
Scheduled	is_draft = false AND published_at > now()
Published	is_draft = false AND (published_at IS NULL OR published_at <= now())

Scheduled posts become published automatically when queried after published_at.

🚀 Implemented Routes & Behavior
GET /posts — posts.index

Returns paginated (20 per page) list of active posts

Excludes draft and scheduled posts

Includes author (user) data

Returns JSON response

GET /posts/create — posts.create

Authenticated users only

Returns the string:

posts.create


ℹ️ Per test instructions, view rendering is not required.

POST /posts — posts.store

Authenticated users only

Validates input before creation

Creates a new post associated with the authenticated user

Returns appropriate HTTP response

GET /posts/{post} — posts.show

Returns a single published post

Returns 404 if the post is draft or scheduled

JSON response format

GET /posts/{post}/edit — posts.edit

Only the post author can access

Returns the string:

posts.edit

PUT/PATCH /posts/{post} — posts.update

Only the post author can update

Validates input before update

Returns appropriate HTTP response

DELETE /posts/{post} — posts.destroy

Only the post author can delete

Returns JSON response confirming deletion

🔐 Authorization & Policies

Authorization is handled using Laravel Policies:

PostPolicy ensures only the post author can:

Edit

Update

Delete

Policies are auto-discovered in Laravel 12 and enforced using Gate::authorize().

📂 Architecture Notes

Route Model Binding is used across all relevant routes

Query Scopes are used to encapsulate post visibility logic

No frontend/UI layer is implemented as it is not required by the test

Controller responses are designed to be view-ready or API-ready
