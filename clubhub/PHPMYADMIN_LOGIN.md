# 🔐 Panduan Login phpMyAdmin di Laragon

## Informasi Login

Untuk mengakses phpMyAdmin di Laragon, gunakan kredensial berikut:

### Kredensial Login:
- **Nama Pengguna (Username)**: `root`
- **Kata Sandi (Password)**: *(kosong - biarkan kosong)*

## Langkah-langkah Login:

1. **Buka Browser** (Chrome, Firefox, Edge, dll)

2. **Akses phpMyAdmin**:
   - URL: `http://localhost/phpmyadmin`
   - Atau: `http://127.0.0.1/phpmyadmin`

3. **Masukkan Kredensial**:
   - Di kolom **"Nama Pengguna"**: ketik `root`
   - Di kolom **"Kata Sandi"**: **biarkan kosong** (jangan ketik apa-apa)

4. **Klik tombol "Masuk"** atau tekan **Enter**

5. **Setelah login**, Anda akan melihat daftar database di sidebar kiri

6. **Pilih database `clubhub`** untuk melihat dan mengelola data aplikasi ClubHub

## Catatan Penting:

⚠️ **Jika tidak bisa login:**
- Pastikan MySQL/MariaDB di Laragon sudah **running** (hijau)
- Cek apakah port 3306 tidak digunakan aplikasi lain
- Restart Laragon jika perlu

## Akses Database ClubHub:

Setelah login, Anda dapat:
- ✅ Melihat semua tabel di database `clubhub`
- ✅ Melihat data user (tabel `users`)
- ✅ Edit data langsung di database
- ✅ Export/Import database
- ✅ Menjalankan query SQL

## Tabel-tabel di Database ClubHub:

1. **users** - Data pengguna/anggota
2. **cache** - Cache data
3. **cache_locks** - Lock untuk cache
4. **jobs** - Queue jobs
5. **job_batches** - Batch jobs
6. **failed_jobs** - Jobs yang gagal
7. **migrations** - Riwayat migrasi
8. **password_reset_tokens** - Token reset password
9. **sessions** - Data session

## Tips:

- Gunakan **HeidiSQL** (Database Manager di Laragon) sebagai alternatif yang lebih cepat
- Backup database secara berkala untuk keamanan data
- Jangan edit data langsung di database kecuali Anda tahu apa yang Anda lakukan

---

**Selamat! Sekarang Anda bisa mengakses database ClubHub! 🎉**

