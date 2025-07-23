# Aplikasi Perpustakaan Digital Backend - Laravel

## Informasi Mahasiswa
- **Nama**: Sayyid M Rizqi R Al Qadrie
- **NIM**: 221220049
- **Universitas**: Universitas Muhammadiyah Pontianak

## Deskripsi Proyek

Aplikasi Perpustakaan Digital API adalah sebuah layanan backend yang menyediakan kumpulan API untuk mendukung sistem perpustakaan digital. Aplikasi ini dirancang untuk mengelola data buku, pengguna, peminjaman, dan fungsi-fungsi lain yang dibutuhkan dalam sistem perpustakaan secara efisien dan terstruktur.

### Keunggulan
- Menggunakan **ULID (Universally Unique Lexicographically Sortable Identifier)** sebagai pengganti UUID untuk memberikan identifikasi unik yang lebih terstruktur dan dapat diurutkan secara kronologis
- API yang modular dan mudah diintegrasikan
- Mendukung pengembangan aplikasi web dan mobile berbasis perpustakaan
- Struktur data yang efisien dan terorganisir

## Fitur Utama

### 1. Manajemen Pengguna (Users)
- Melihat semua pengguna
- Membuat pengguna baru
- Melihat detail pengguna berdasarkan ID
- Mengupdate data pengguna
- Menghapus pengguna

### 2. Manajemen Penulis (Authors)
- Melihat semua penulis
- Menambah penulis baru
- Melihat detail penulis berdasarkan ID
- Mengupdate data penulis
- Menghapus penulis

### 3. Manajemen Buku (Books)
- Melihat semua buku
- Menambah buku baru
- Melihat detail buku berdasarkan ID
- Mengupdate data buku
- Menghapus buku
- Relasi many-to-many dengan penulis

### 4. Manajemen Peminjaman (Loans)
- Melihat semua peminjaman
- Membuat peminjaman baru
- Melihat detail peminjaman berdasarkan ID
- Mengembalikan buku
- Menghapus data peminjaman

## Teknologi yang Digunakan

### Backend (Laravel API)
- **Framework**: Laravel
- **Database**: MySQL/PostgreSQL
- **Identifier**: ULID (Universally Unique Lexicographically Sortable Identifier)
- **Testing**: Postman Collection

### Frontend (Next.js)
- **Framework**: Next.js dengan TypeScript
- **UI Components**: Custom components (Button, Card, Dialog, Table, dll.)
- **Styling**: CSS Modules / Tailwind CSS
- **State Management**: React Hooks
- **Authentication**: Custom auth components
- **Routing**: Next.js App Router

## Persyaratan Sistem

- PHP >= 8.1
- Composer
- Laravel >= 10.x
- MySQL >= 8.0 atau PostgreSQL >= 13
- Node.js >= 18.x & NPM
- TypeScript >= 5.x

## Instalasi

### Backend (Laravel API)

#### 1. Clone Repository
```bash
git clone https://github.com/username/aplikasi-perpustakaan-digital.git
cd aplikasi-perpustakaan-digital
```

#### 2. Install Dependencies
```bash
composer install
```

#### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

#### 4. Konfigurasi Database
Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=perpustakaan_digital
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

#### 5. Migrasi Database
```bash
php artisan migrate
php artisan db:seed
```

#### 6. Jalankan Backend API
```bash
php artisan serve
```

Backend API akan berjalan di `http://localhost:8000`

### Frontend (Next.js)

#### 1. Masuk ke Folder Frontend
```bash
cd digital-library
```

#### 2. Install Dependencies
```bash
npm install
# atau
yarn install
```

#### 3. Setup Environment Variables
```bash
cp .env.local.example .env.local
```

Edit file `.env.local`:
```env
NEXT_PUBLIC_API_URL=http://localhost:8000/api
```

#### 4. Jalankan Frontend Development Server
```bash
npm run dev
# atau
yarn dev
```

Frontend akan berjalan di `http://localhost:3000`

## API Endpoints

### Base URL
```
http://localhost:8000/api
```

### Users
- `GET /users` - Mendapatkan semua pengguna
- `POST /users` - Membuat pengguna baru
- `GET /users/{id}` - Mendapatkan pengguna berdasarkan ID
- `PUT /users/{id}` - Mengupdate pengguna
- `DELETE /users/{id}` - Menghapus pengguna

### Authors
- `GET /authors` - Mendapatkan semua penulis
- `POST /authors` - Membuat penulis baru
- `GET /authors/{id}` - Mendapatkan penulis berdasarkan ID
- `PUT /authors/{id}` - Mengupdate penulis
- `DELETE /authors/{id}` - Menghapus penulis

### Books
- `GET /books` - Mendapatkan semua buku
- `POST /books` - Membuat buku baru
- `GET /books/{id}` - Mendapatkan buku berdasarkan ID
- `PUT /books/{id}` - Mengupdate buku
- `DELETE /books/{id}` - Menghapus buku

### Loans
- `GET /loans` - Mendapatkan semua peminjaman
- `POST /loans` - Membuat peminjaman baru
- `GET /loans/{id}` - Mendapatkan peminjaman berdasarkan ID
- `PATCH /loans/{id}/return` - Mengembalikan buku
- `DELETE /loans/{id}` - Menghapus peminjaman

## Contoh Request

### Membuat User Baru
```json
POST /api/users
Content-Type: application/json

{
    "name": "Ahmad Santosa",
    "email": "ahmad@example.com",
    "password": "password123",
    "membership_date": "2024-01-01"
}
```

### Membuat Penulis Baru
```json
POST /api/authors
Content-Type: application/json

{
    "name": "Tere Liye",
    "nationality": "Indonesian",
    "birthdate": "1979-05-21"
}
```

### Membuat Buku Baru
```json
POST /api/books
Content-Type: application/json

{
    "title": "Bumi",
    "isbn": "978-6020331775",
    "publisher": "Gramedia Pustaka Utama",
    "year_published": "2014",
    "stock": 5,
    "author_ids": ["01HXX4EXAMPLE"]
}
```

### Membuat Peminjaman Baru
```json
POST /api/loans
Content-Type: application/json

{
    "user_id": "01HXX4EXAMPLE",
    "book_id": "01HXX4EXAMPLE", 
    "loan_date": "2024-01-20",
    "due_date": "2024-02-03"
}
```

## Menjalankan Aplikasi Lengkap

### 1. Jalankan Backend API
```bash
cd aplikasi-perpustakaan-digital
php artisan serve
```
Backend berjalan di: `http://localhost:8000`

### 2. Jalankan Frontend (Terminal Baru)
```bash
cd aplikasi-perpustakaan-digital/digital-library
npm run dev
```
Frontend berjalan di: `http://localhost:3000`

### 3. Akses Aplikasi
- **API Documentation**: `http://localhost:8000/api`
- **Web Application**: `http://localhost:3000`
- **Login Page**: `http://localhost:3000/login`
- **Dashboard**: `http://localhost:3000/dashboard`

## Testing

Untuk testing API, gunakan Postman Collection yang telah disediakan:
1. Import file `Aplikasi Perpustakaan Digital API.postman_collection.json`
2. Set base URL ke `http://localhost:8000/api`
3. Jalankan requests sesuai kebutuhan

## Struktur Proyek

### Backend (Laravel API)
```
aplikasi-perpustakaan-digital/
├── app/
│   ├── Console/
│   ├── Exceptions/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthorController.php
│   │   │   ├── BookController.php
│   │   │   ├── LoanController.php
│   │   │   └── UserController.php
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   │   ├── Author.php
│   │   ├── Book.php
│   │   ├── Loan.php
│   │   └── User.php
│   ├── Providers/
│   └── Services/
├── bootstrap/
├── config/
│   ├── app.php
│   ├── database.php
│   └── ...
├── database/
│   ├── factories/
│   ├── migrations/
│   │   ├── create_users_table.php
│   │   ├── create_authors_table.php
│   │   ├── create_books_table.php
│   │   ├── create_loans_table.php
│   │   └── create_book_author_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── UserSeeder.php
│       ├── AuthorSeeder.php
│       └── BookSeeder.php
├── public/
├── resources/
├── routes/
│   ├── api.php              # API routes
│   ├── web.php
│   └── console.php
├── storage/
├── tests/
├── vendor/
├── .env                     # Environment variables
├── .env.example
├── artisan
├── composer.json
└── composer.lock
```

### Models dan Relationships

#### User Model (app/Models/User.php)
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class User extends Model
{
    use HasUlids;

    protected $fillable = [
        'name',
        'email', 
        'password',
        'membership_date'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relationship
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
```

#### Author Model (app/Models/Author.php)
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Author extends Model
{
    use HasUlids;

    protected $fillable = [
        'name',
        'nationality',
        'birthdate'
    ];

    // Relationship
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_author');
    }
}
```

#### Book Model (app/Models/Book.php)
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Book extends Model
{
    use HasUlids;

    protected $fillable = [
        'title',
        'isbn',
        'publisher',
        'year_published',
        'stock'
    ];

    // Relationships
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
```

#### Loan Model (app/Models/Loan.php)
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Loan extends Model
{
    use HasUlids;

    protected $fillable = [
        'user_id',
        'book_id',
        'loan_date',
        'due_date',
        'return_date'
    ];

    protected $casts = [
        'loan_date' => 'date',
        'due_date' => 'date',
        'return_date' => 'date',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
```

### Controllers Structure

#### UserController (app/Http/Controllers/UserController.php)
```php
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()          // GET /api/users
    public function store(Request $request)    // POST /api/users
    public function show(User $user) // GET /api/users/{id}
    public function update(Request $request, User $user) // PUT /api/users/{id}
    public function destroy(User $user)        // DELETE /api/users/{id}
}
```

#### AuthorController (app/Http/Controllers/AuthorController.php)
```php
<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()          // GET /api/authors
    public function store(Request $request)    // POST /api/authors
    public function show(Author $author)       // GET /api/authors/{id}
    public function update(Request $request, Author $author) // PUT /api/authors/{id}
    public function destroy(Author $author)    // DELETE /api/authors/{id}
}
```

#### BookController (app/Http/Controllers/BookController.php)
```php
<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()          // GET /api/books
    public function store(Request $request)    // POST /api/books
    public function show(Book $book) // GET /api/books/{id}
    public function update(Request $request, Book $book) // PUT /api/books/{id}
    public function destroy(Book $book)        // DELETE /api/books/{id}
}
```

#### LoanController (app/Http/Controllers/LoanController.php)
```php
<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()          // GET /api/loans
    public function store(Request $request)    // POST /api/loans
    public function show(Loan $loan) // GET /api/loans/{id}
    public function returnBook(Loan $loan)     // PATCH /api/loans/{id}/return
    public function destroy(Loan $loan)        // DELETE /api/loans/{id}
}
```

### Migration Files

#### Users Migration
```php
<?php
// database/migrations/create_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('membership_date');
            $table->timestamps();
        });
    }
};
```

#### Authors Migration
```php
<?php
// database/migrations/create_authors_table.php

return new class extends Migration
{
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('nationality');
            $table->date('birthdate');
            $table->timestamps();
        });
    }
};
```

#### Books Migration
```php
<?php
// database/migrations/create_books_table.php

return new class extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('title');
            $table->string('isbn')->unique();
            $table->string('publisher');
            $table->year('year_published');
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }
};
```

#### Loans Migration
```php
<?php
// database/migrations/create_loans_table.php

return new class extends Migration
{
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->constrained()->onDelete('cascade');
            $table->foreignUlid('book_id')->constrained()->onDelete('cascade');
            $table->date('loan_date');
            $table->date('due_date');
            $table->date('return_date')->nullable();
            $table->timestamps();
        });
    }
};
```

#### Book-Author Pivot Migration
```php
<?php
// database/migrations/create_book_author_table.php

return new class extends Migration
{
    public function up()
    {
        Schema::create('book_author', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('book_id')->constrained()->onDelete('cascade');
            $table->foreignUlid('author_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }
};
```

### API Routes (routes/api.php)
```php
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;

Route::middleware('api')->group(function () {
    // Users Routes
    Route::apiResource('users', UserController::class);
    
    // Authors Routes  
    Route::apiResource('authors', AuthorController::class);
    
    // Books Routes
    Route::apiResource('books', BookController::class);
    
    // Loans Routes
    Route::apiResource('loans', LoanController::class);
    Route::patch('loans/{loan}/return', [LoanController::class, 'returnBook']);
});
```

### Seeders

#### DatabaseSeeder (database/seeders/DatabaseSeeder.php)
```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
        ]);
    }
}
```

### Configuration Files

#### Database Configuration (config/database.php)
- Konfigurasi koneksi database MySQL/PostgreSQL
- Connection pooling settings
- Query logging configuration

#### App Configuration (config/app.php)
- Application settings
- Service providers
- Middleware configuration
- ULID configuration

### Frontend (Next.js)
```
digital-library/
├── src/
│   ├── app/                    # App Router
│   │   ├── authors/
│   │   │   └── page.tsx
│   │   ├── books/
│   │   │   └── page.tsx
│   │   ├── catalog/
│   │   │   └── page.tsx
│   │   ├── dashboard/
│   │   │   └── page.tsx
│   │   ├── loans/
│   │   │   └── page.tsx
│   │   ├── login/
│   │   │   └── page.tsx
│   │   ├── users/
│   │   │   └── page.tsx
│   │   ├── layout.tsx
│   │   └── page.tsx
│   ├── components/
│   │   ├── auth/
│   │   │   ├── auth-guard.tsx
│   │   │   └── auth-provider.tsx
│   │   ├── dashboard/
│   │   └── ui/                 # Reusable UI Components
│   │       ├── app-sidebar.tsx
│   │       ├── author-list.tsx
│   │       ├── AuthorFormModal.tsx
│   │       ├── avatar.tsx
│   │       ├── book-list.tsx
│   │       ├── BookFormModal.tsx
│   │       ├── button.tsx
│   │       ├── card.tsx
│   │       ├── command.tsx
│   │       ├── dialog.tsx
│   │       ├── dropdown-menu.tsx
│   │       ├── input.tsx
│   │       ├── label.tsx
│   │       ├── loan-list.tsx
│   │       ├── LoanFormModal.tsx
│   │       ├── logout-button.tsx
│   │       ├── multi-select.tsx
│   │       ├── nav-user.tsx
│   │       ├── popover.tsx
│   │       ├── site-header.tsx
│   │       ├── table.tsx
│   │       ├── toaster.tsx
│   │       ├── user-list.tsx
│   │       └── UserFormModal.tsx
│   ├── lib/
│   │   ├── api.ts
│   │   ├── types.ts
│   │   └── utils.ts
│   ├── globals.css
│   └── favicon.ico
└── package.json
```

## Fitur Frontend

### 1. Dashboard
- Overview statistik perpustakaan
- Navigasi ke semua modul

### 2. Halaman Pengguna
- Daftar semua pengguna
- Form tambah/edit pengguna (Modal)
- Hapus pengguna

### 3. Halaman Penulis
- Daftar semua penulis
- Form tambah/edit penulis (Modal)
- Hapus penulis

### 4. Halaman Buku
- Daftar semua buku dengan informasi penulis
- Form tambah/edit buku dengan multi-select penulis
- Hapus buku

### 5. Halaman Peminjaman
- Daftar semua peminjaman
- Form buat peminjaman baru
- Fungsi pengembalian buku
- Hapus data peminjaman

### 6. Catalog
- Tampilan katalog buku untuk umum

### 7. Authentication
- Login system
- Auth guard untuk proteksi route
- Auth provider untuk state management

### Tabel Users
- id (ULID)
- name
- email
- password
- membership_date
- timestamps

### Tabel Authors
- id (ULID)
- name
- nationality
- birthdate
- timestamps

### Tabel Books
- id (ULID)
- title
- isbn
- publisher
- year_published
- stock
- timestamps

### Tabel Loans
- id (ULID)
- user_id (foreign key)
- book_id (foreign key)
- loan_date
- due_date
- return_date (nullable)
- timestamps

### Tabel Book_Author (Pivot Table)
- book_id (foreign key)
- author_id (foreign key)

## Kontribusi

Proyek ini dikembangkan sebagai tugas kuliah. Jika ada saran atau perbaikan, silakan buat issue atau pull request.

## Lisensi

Proyek ini dibuat untuk keperluan akademik di Universitas Muhammadiyah Pontianak.

