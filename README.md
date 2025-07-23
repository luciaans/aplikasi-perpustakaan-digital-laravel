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

- **Framework**: Laravel 10+
- **Database**: MySQL/PostgreSQL
- **Identifier**: ULID (Universally Unique Lexicographically Sortable Identifier)
- **Testing**: Postman Collection
- **ORM**: Eloquent
- **Architecture**: RESTful API

## Persyaratan Sistem

- PHP >= 8.1
- Composer >= 2.0
- Laravel >= 10.x
- MySQL >= 8.0 atau PostgreSQL >= 13

## Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/username/aplikasi-perpustakaan-digital.git
cd aplikasi-perpustakaan-digital
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Konfigurasi Database
Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=perpustakaan_digital
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Migrasi Database
```bash
php artisan migrate
php artisan db:seed
```

### 6. Jalankan Aplikasi
```bash
php artisan serve
```

API akan berjalan di `http://localhost:8000`

## Struktur Proyek

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

## Models dan Relationships

### User Model (app/Models/User.php)
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

### Author Model (app/Models/Author.php)
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

### Book Model (app/Models/Book.php)
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

### Loan Model (app/Models/Loan.php)
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

## Controllers Structure

### UserController (app/Http/Controllers/UserController.php)
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

### AuthorController (app/Http/Controllers/AuthorController.php)
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

### BookController (app/Http/Controllers/BookController.php)
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

### LoanController (app/Http/Controllers/LoanController.php)
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

## Migration Files

### Users Migration
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

### Authors Migration
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

### Books Migration
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

### Loans Migration
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

### Book-Author Pivot Migration
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

## API Routes

### Base URL
```
http://localhost:8000/api
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

### Endpoints Detail

#### Users
- `GET /api/users` - Mendapatkan semua pengguna
- `POST /api/users` - Membuat pengguna baru
- `GET /api/users/{id}` - Mendapatkan pengguna berdasarkan ID
- `PUT /api/users/{id}` - Mengupdate pengguna
- `DELETE /api/users/{id}` - Menghapus pengguna

#### Authors
- `GET /api/authors` - Mendapatkan semua penulis
- `POST /api/authors` - Membuat penulis baru
- `GET /api/authors/{id}` - Mendapatkan penulis berdasarkan ID
- `PUT /api/authors/{id}` - Mengupdate penulis
- `DELETE /api/authors/{id}` - Menghapus penulis

#### Books
- `GET /api/books` - Mendapatkan semua buku
- `POST /api/books` - Membuat buku baru
- `GET /api/books/{id}` - Mendapatkan buku berdasarkan ID
- `PUT /api/books/{id}` - Mengupdate buku
- `DELETE /api/books/{id}` - Menghapus buku

#### Loans
- `GET /api/loans` - Mendapatkan semua peminjaman
- `POST /api/loans` - Membuat peminjaman baru
- `GET /api/loans/{id}` - Mendapatkan peminjaman berdasarkan ID
- `PATCH /api/loans/{id}/return` - Mengembalikan buku
- `DELETE /api/loans/{id}` - Menghapus peminjaman

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

## Seeders

### DatabaseSeeder (database/seeders/DatabaseSeeder.php)
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

### Contoh UserSeeder
```php
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@perpustakaan.com',
            'password' => Hash::make('password'),
            'membership_date' => '2024-01-01',
        ]);
    }
}
```

## Testing

### Menggunakan Postman
1. Import file `Aplikasi Perpustakaan Digital API.postman_collection.json`
2. Set base URL ke `http://localhost:8000/api`
3. Jalankan requests sesuai kebutuhan

### Menggunakan Artisan Tinker
```bash
php artisan tinker

# Test membuat user
User::create(['name' => 'Test User', 'email' => 'test@test.com', 'password' => Hash::make('password'), 'membership_date' => '2024-01-01']);

# Test relasi
$book = Book::with('authors')->first();
$user = User::with('loans')->first();
```

## Struktur Database

### Tabel Users
- id (ULID, Primary Key)
- name (VARCHAR)
- email (VARCHAR, Unique)
- password (VARCHAR)
- membership_date (DATE)
- created_at, updated_at (TIMESTAMP)

### Tabel Authors
- id (ULID, Primary Key)
- name (VARCHAR)
- nationality (VARCHAR)
- birthdate (DATE)
- created_at, updated_at (TIMESTAMP)

### Tabel Books
- id (ULID, Primary Key)
- title (VARCHAR)
- isbn (VARCHAR, Unique)
- publisher (VARCHAR)
- year_published (YEAR)
- stock (INTEGER)
- created_at, updated_at (TIMESTAMP)

### Tabel Loans
- id (ULID, Primary Key)
- user_id (ULID, Foreign Key)
- book_id (ULID, Foreign Key)
- loan_date (DATE)
- due_date (DATE)
- return_date (DATE, Nullable)
- created_at, updated_at (TIMESTAMP)

### Tabel Book_Author (Pivot Table)
- id (BIGINT, Primary Key)
- book_id (ULID, Foreign Key)
- author_id (ULID, Foreign Key)
- created_at, updated_at (TIMESTAMP)

## Commands Artisan

### Database Commands
```bash
# Membuat migration
php artisan make:migration create_table_name

# Menjalankan migration
php artisan migrate

# Rollback migration
php artisan migrate:rollback

# Reset database
php artisan migrate:fresh --seed
```

### Model Commands
```bash
# Membuat model dengan migration
php artisan make:model ModelName -m

# Membuat model dengan controller dan migration
php artisan make:model ModelName -mcr
```

### Controller Commands
```bash
# Membuat controller
php artisan make:controller ControllerName

# Membuat API resource controller
php artisan make:controller ControllerName --api
```

## Environment Variables

```env
APP_NAME="Aplikasi Perpustakaan Digital"
APP_ENV=local
APP_KEY=base64:generated-key
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=perpustakaan_digital
DB_USERNAME=your_username
DB_PASSWORD=your_password

CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

## Deployment

### Persiapan Production
```bash
# Optimize aplikasi
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set environment ke production
APP_ENV=production
APP_DEBUG=false
```

### Server Requirements
- PHP >= 8.1
- Nginx/Apache
- MySQL/PostgreSQL
- Composer
- SSL Certificate

## Kontribusi

Proyek ini dikembangkan sebagai tugas kuliah. Jika ada saran atau perbaikan, silakan buat issue atau pull request.

## Lisensi

Proyek ini dibuat untuk keperluan akademik di Universitas Muhammadiyah Pontianak.
