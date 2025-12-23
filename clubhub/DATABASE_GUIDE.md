# Panduan Akses Database ClubHub

## Informasi Database

- **Database Name**: `clubhub`
- **Host**: `127.0.0.1` (localhost)
- **Port**: `3306`
- **Username**: `root`
- **Password**: (kosong)

## Cara Mengakses Database

### 1. Menggunakan Laragon Database Manager (HeidiSQL)

1. Buka **Laragon**
2. Klik menu **Database** atau **HeidiSQL**
3. Koneksi otomatis akan menggunakan:
   - Host: `127.0.0.1`
   - User: `root`
   - Password: (kosong)
4. Pilih database `clubhub` dari daftar database

### 2. Menggunakan phpMyAdmin (jika tersedia)

1. Buka browser
2. Akses: `http://localhost/phpmyadmin` atau sesuai konfigurasi Laragon
3. Login dengan:
   - Username: `root`
   - Password: (kosong)
4. Pilih database `clubhub` dari sidebar kiri

### 3. Menggunakan Command Line (MySQL CLI)

```bash
mysql -u root -p clubhub
# Tekan Enter ketika diminta password (kosong)
```

### 4. Menggunakan Laravel Tinker

```bash
php artisan tinker
```

Kemudian di dalam tinker:
```php
// Lihat semua user
App\Models\User::all();

// Cari user tertentu
App\Models\User::where('email', 'admin@clubhub.com')->first();

// Buat user baru
App\Models\User::create([
    'name' => 'Nama User',
    'email' => 'email@example.com',
    'password' => bcrypt('password123'),
    'email_verified_at' => now()
]);

// Update user
$user = App\Models\User::find(1);
$user->name = 'Nama Baru';
$user->save();

// Hapus user
App\Models\User::find(1)->delete();
```

## Tabel-tabel di Database

1. **users** - Data pengguna/anggota
2. **cache** - Cache data
3. **cache_locks** - Lock untuk cache
4. **jobs** - Queue jobs
5. **job_batches** - Batch jobs
6. **failed_jobs** - Jobs yang gagal
7. **migrations** - Riwayat migrasi
8. **password_reset_tokens** - Token reset password
9. **sessions** - Data session

## Query SQL Berguna

### Melihat semua user
```sql
SELECT * FROM users;
```

### Melihat user dengan email tertentu
```sql
SELECT * FROM users WHERE email = 'admin@clubhub.com';
```

### Update password user
```sql
UPDATE users SET password = '$2y$12$...' WHERE email = 'admin@clubhub.com';
```

### Menghitung jumlah user
```sql
SELECT COUNT(*) as total_users FROM users;
```

## Lokasi File Database

- **MySQL Data**: Biasanya di `C:\laragon\bin\mysql\mysql-8.x.x\data\clubhub\`
- **Backup**: Disarankan backup secara berkala

## Backup Database

### Menggunakan Command Line
```bash
mysqldump -u root clubhub > backup_clubhub.sql
```

### Restore Database
```bash
mysql -u root clubhub < backup_clubhub.sql
```

## Catatan Penting

- Selalu backup database sebelum melakukan perubahan besar
- Password di database sudah di-hash menggunakan bcrypt
- Jangan edit data langsung di database kecuali Anda tahu apa yang Anda lakukan
- Gunakan Laravel Tinker atau Eloquent untuk manipulasi data yang aman

