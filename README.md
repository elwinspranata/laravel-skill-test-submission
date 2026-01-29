Overview

This project is a Laravel Blog Post Management API built to fulfill the requirements of the Laravel Skill Test.
The application demonstrates proper usage of MVC architecture, Form Request Validation, Authorization Policies, RESTful controllers, and clean Eloquent queries.

🧩 Features

CRUD Blog Posts (Create, Read, Update, Delete)

Authentication using Laravel default auth

Authorization using PostPolicy

Validation using Form Request

RESTful API responses (JSON)

Clean and readable controller structure

Ownership-based access control

🛠 Tech Stack

Laravel (latest stable)

PHP 8+

MySQL

Laravel Policies & Form Requests

📂 Project Structure
app/
 ├── Http/
 │   ├── Controllers/
 │   │   └── PostController.php
 │   ├── Requests/
 │   │   ├── StorePostRequest.php
 │   │   └── UpdatePostRequest.php
 ├── Models/
 │   └── Post.php
 ├── Policies/
 │   └── PostPolicy.php
routes/
 └── api.php
database/
 └── migrations/

⚙️ Installation & Setup
1️⃣ Clone Repository
git clone https://github.com/elwinspranata/laravel-skill-test-submission.git
cd laravel-skill-test-submission

2️⃣ Install Dependencies
composer install

3️⃣ Environment Configuration
cp .env.example .env
php artisan key:generate


Configure your database credentials in .env.

4️⃣ Run Migration
php artisan migrate

5️⃣ Run Server
php artisan serve

🔐 Authentication

This project uses Laravel authentication.
All Post endpoints require an authenticated user.

📌 API Endpoints
Method	Endpoint	Description
GET	/api/posts	Get all posts
POST	/api/posts	Create a new post
GET	/api/posts/{id}	Show a single post
PUT	/api/posts/{id}	Update a post (owner only)
DELETE	/api/posts/{id}	Delete a post (owner only)
🛡 Authorization (Policy)

Authorization is handled using PostPolicy:

Only the post owner can update or delete their post

Policy registered in AuthServiceProvider

Example:

public function update(User $user, Post $post)
{
    return $user->id === $post->user_id;
}

✅ Validation (Form Request)

Validation logic is separated using Form Request:

StorePostRequest

UpdatePostRequest

Example rules:

return [
    'title' => 'required|string|max:255',
    'content' => 'required|string',
];

🧠 Controller Best Practices

Uses Form Request

Uses Policy authorization

No validation or authorization logic inside controller

Uses auth()->id() instead of passing user ID manually

Returns JSON responses consistently

📊 Query Best Practice (Index)
Post::with('user')
    ->latest()
    ->paginate(10);


Uses eager loading

Uses pagination

Uses latest ordering

🚀 Conclusion

This project fully implements:

Laravel MVC principles

Clean controller logic

Proper validation & authorization

Secure ownership control

RESTful API standards

All requirements listed in the skill test README have been carefully implemented and reviewed.

👤 Author

Elwin Pranata Negara
