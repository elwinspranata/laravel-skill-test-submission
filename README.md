Laravel Skill Test Submission
📌 Overview

This repository contains a Laravel-based implementation for a technical skill test.
The project focuses on backend correctness, query logic, authorization, and data integrity, rather than UI completeness.

All requirements listed in the test instructions have been implemented and verified through seed data and query scopes.

🛠 Tech Stack

Laravel: 12.x

PHP: ≥ 8.2

Database: SQLite

Authentication: Laravel default auth

Frontend: Not implemented (backend-focused submission)

🚀 Installation & Setup
git clone https://github.com/elwinspranata/laravel-skill-test-submission.git
cd laravel-skill-test-submission

composer install
cp .env.example .env
php artisan key:generate

php artisan migrate --seed
php artisan serve


The application will be available at:

http://127.0.0.1:8000

🧪 Seeded Test Data

Seeders are included to demonstrate all required post states:

Published posts

Draft posts

Scheduled posts (future published_at)

Posts owned by different users

This allows reviewers to immediately test edge cases without manual setup.

📝 Post Status Logic

Post visibility is determined by the following rules:

Status	Condition
Draft	is_draft = true
Scheduled	is_draft = false AND published_at > now()
Published	is_draft = false AND (published_at <= now() OR published_at IS NULL)

This logic is implemented in the Post model using the scopePublished() query scope and does not rely on cron jobs, as required.

📚 Implemented Routes & Behavior
GET /posts

Returns published posts only

Pagination: 20 posts per page

Automatically includes scheduled posts when published_at <= now()

Uses scopePublished()

GET /posts/create

Requires authentication

Returns a string identifier:

'posts.create'


Note: This follows the test requirement and intentionally does not render a view.

POST /posts

Requires authentication

Creates a new post for the authenticated user

Validation handled via request data

Supports draft, scheduled, and published states

GET /posts/{post}

Returns a post only if published

Unpublished posts return 404

Visibility is enforced explicitly in the controller

GET /posts/{post}/edit

Requires authentication

Requires ownership (policy-based)

Returns a string identifier:

'posts.edit'

PUT /posts/{post}

Requires authentication

Requires ownership (PostPolicy@update)

Updates post data safely

DELETE /posts/{post}

Requires authentication

Requires ownership (PostPolicy@delete)

Returns JSON response on success

🔐 Authorization (Policy)

Authorization is handled using PostPolicy:

update: Only the post owner can update

delete: Only the post owner can delete

Policies are auto-discovered using Laravel 12’s default policy registration.

🧠 Design Decisions
Why do create and edit return strings?

The test specification only requires that these routes exist and respond correctly.
Returning string identifiers ensures:

Routes are functional

No assumptions are made about UI frameworks

The submission stays backend-focused, as intended

Why inline validation instead of Form Requests?

Inline validation was used to keep the implementation concise and focused on test requirements.
This can easily be refactored to Form Requests in a production scenario.

✅ Requirement Checklist
Requirement	Status
Pagination (20 items)	✅
Draft / Scheduled / Published logic	✅
No cron dependency	✅
Authorization via policy	✅
Route model binding	✅
Seeded test data	✅
README documentation	✅
🧾 Notes for Reviewer

This submission prioritizes correct logic, data handling, and authorization

UI rendering is intentionally omitted

All core Laravel best practices relevant to the test scope are followed

👤 Author

Elwin Pranata Negara
