# Aplikasi Perpustakaan Digital Backend Laravel

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

- **Framework**: Laravel
- **Database**: MySQL/PostgreSQL
- **Identifier**: ULID (Universally Unique Lexicographically Sortable Identifier)
- **Testing**: Postman Collection

## Persyaratan Sistem

- PHP >= 8.1
- Composer
- Laravel >= 10.x
- MySQL >= 8.0 atau PostgreSQL >= 13
- Node.js & NPM (untuk asset compilation)

## Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/username/aplikasi-perpustakaan-digital.git
cd aplikasi-perpustakaan-digital
```

### 2. Install Dependencies
```bash
composer install
npm install
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

Aplikasi akan berjalan di `http://localhost:8000`

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

## Testing

Untuk testing API, gunakan Postman Collection yang telah disediakan:
1. Import file `Aplikasi Perpustakaan Digital API.postman_collection.json`
2. Set base URL ke `http://localhost:8000/api`
3. Jalankan requests sesuai kebutuhan

## Struktur Database

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


---

