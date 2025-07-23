# 📚 Aplikasi Perpustakaan Laravel

Sistem manajemen perpustakaan digital yang dibangun menggunakan Laravel untuk mengelola koleksi buku, anggota, dan transaksi peminjaman.

## ✨ Fitur Utama

- **Manajemen Buku**: CRUD buku dengan kategori, pengarang, dan penerbit
- **Manajemen Anggota**: Registrasi dan pengelolaan data anggota perpustakaan
- **Sistem Peminjaman**: Peminjaman dan pengembalian buku dengan tracking status
- **Dashboard Admin**: Panel kontrol untuk admin dengan statistik dan laporan
- **Sistem Denda**: Perhitungan otomatis denda keterlambatan
- **Pencarian & Filter**: Fitur pencarian buku berdasarkan judul, pengarang, atau kategori
- **Laporan**: Generate laporan peminjaman dan statistik perpustakaan
- **Notifikasi**: Reminder untuk pengembalian buku

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 10.x
- **Database**: MySQL 8.0+
- **Frontend**: Blade Template, Bootstrap 5
- **Authentication**: Laravel Sanctum
- **PDF Generator**: DomPDF
- **Image Upload**: Laravel Storage
- **Icons**: Font Awesome

## 📋 Prasyarat

Pastikan sistem Anda memiliki:

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL >= 8.0
- Web Server (Apache/Nginx)

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/username/perpustakaan-laravel.git
cd perpustakaan-laravel
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install
```

### 3. Konfigurasi Environment

```bash
# Copy file environment
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Konfigurasi Database

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=perpustakaan_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Migrasi Database

```bash
# Jalankan migrasi
php artisan migrate

# Jalankan seeder (opsional)
php artisan db:seed
```

### 6. Build Assets

```bash
# Compile assets
npm run build

# Atau untuk development
npm run dev
```

### 7. Storage Link

```bash
# Buat symbolic link untuk storage
php artisan storage:link
```

### 8. Jalankan Aplikasi

```bash
# Development server
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## 👤 Akun Default

Setelah menjalankan seeder, gunakan akun berikut:

**Admin:**
- Email: `admin@perpustakaan.com`
- Password: `password`

**User:**
- Email: `user@perpustakaan.com`
- Password: `password`

## 📁 Struktur Project

```
perpustakaan-laravel/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/
│   │   ├── Auth/
│   │   └── User/
│   ├── Models/
│   └── Services/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── resources/
│   ├── views/
│   │   ├── admin/
│   │   ├── auth/
│   │   └── layouts/
│   └── js/
├── routes/
│   ├── web.php
│   └── api.php
└── public/
    ├── css/
    ├── js/
    └── images/
```

## 🗄️ Database Schema

### Tabel Utama

- `users` - Data pengguna (admin & anggota)
- `books` - Data buku
- `categories` - Kategori buku
- `authors` - Data pengarang
- `publishers` - Data penerbit
- `borrowings` - Transaksi peminjaman
- `fines` - Data denda

### Relasi Database

- Book belongsTo Category, Author, Publisher
- Borrowing belongsTo User, Book
- Fine belongsTo Borrowing

## 🔧 Konfigurasi Tambahan

### Mail Configuration

Untuk fitur notifikasi email, konfigurasi SMTP di `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@gmail.com
MAIL_FROM_NAME="Perpustakaan App"
```

### File Upload Configuration

Sesuaikan ukuran maksimal upload di `config/filesystems.php`:

```php
'max_file_size' => 2048, // 2MB
'allowed_extensions' => ['jpg', 'jpeg', 'png', 'pdf'],
```

## 📊 API Endpoints

### Authentication
- `POST /api/login` - Login
- `POST /api/logout` - Logout
- `POST /api/register` - Register anggota

### Books
- `GET /api/books` - List semua buku
- `GET /api/books/{id}` - Detail buku
- `POST /api/books` - Tambah buku (Admin)
- `PUT /api/books/{id}` - Update buku (Admin)
- `DELETE /api/books/{id}` - Hapus buku (Admin)

### Borrowings
- `GET /api/borrowings` - List peminjaman user
- `POST /api/borrowings` - Pinjam buku
- `PUT /api/borrowings/{id}/return` - Kembalikan buku

## 🧪 Testing

```bash
# Jalankan semua tests
php artisan test

# Test dengan coverage
php artisan test --coverage

# Test spesifik feature
php artisan test --filter=BookTest
```

## 🚀 Deployment

### Shared Hosting

1. Upload semua file ke public_html
2. Pindahkan isi folder `public` ke root public_html
3. Edit `index.php` sesuaikan path
4. Set permission folder `storage` dan `bootstrap/cache` ke 755
5. Import database
6. Konfigurasi `.env` untuk production

### VPS/Cloud Server

```bash
# Set permission
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

# Optimize untuk production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 🔒 Keamanan

- Validasi input pada semua form
- CSRF protection
- SQL injection prevention menggunakan Eloquent ORM
- XSS protection dengan Blade templating
- Authentication middleware
- File upload validation

## 🤝 Kontribusi

Kami menyambut kontribusi dari developer lain:

1. Fork repository ini
2. Buat branch fitur (`git checkout -b feature/fitur-baru`)
3. Commit perubahan (`git commit -am 'Tambah fitur baru'`)
4. Push ke branch (`git push origin feature/fitur-baru`)
5. Buat Pull Request

## 📝 Changelog

### v1.0.0 (2024-01-15)
- Rilis awal aplikasi
- CRUD buku, anggota, peminjaman
- Dashboard admin
- Sistem denda

### v1.1.0 (2024-02-01)
- Tambah fitur notifikasi email
- Export laporan PDF
- Optimasi performance

## 🐛 Bug Reports

Jika menemukan bug, silakan buat issue di GitHub dengan detail:
- Langkah untuk reproduce bug
- Screenshot (jika ada)
- Environment details
- Error logs

## 📄 Lisensi

Aplikasi ini menggunakan [MIT License](https://opensource.org/licenses/MIT).

## 📞 Kontak

- Developer: [Nama Developer]
- Email: developer@email.com
- GitHub: [@username](https://github.com/username)

## 🙏 Acknowledgments

- Laravel Framework Team
- Bootstrap Team
- Font Awesome
- Komunitas PHP Indonesia

---

**⭐ Jika project ini membantu, jangan lupa berikan star di GitHub!**
