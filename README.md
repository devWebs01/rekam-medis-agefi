# Klinik Agefi Dental Care Application

## Deskripsi Aplikasi

Aplikasi **Klinik Agefi Dental Care** adalah sistem manajemen sederhana yang dirancang untuk membantu klinik gigi mengelola data pasien, dokter, layanan, tarif, jadwal, riwayat tindakan, dan laporan. Aplikasi ini bertujuan untuk menyederhanakan proses administrasi dan pencatatan di klinik.

## Fitur-Fitur Utama

*   **Manajemen Pasien:** Menambah, melihat, mengedit, dan menghapus data pasien.
*   **Manajemen Dokter:** Menambah, melihat, mengedit, dan menghapus data dokter.
*   **Manajemen Layanan:** Menambah, melihat, mengedit, dan menghapus jenis layanan yang ditawarkan klinik.
*   **Manajemen Tarif:** Mengelola tarif untuk setiap layanan.
*   **Manajemen Jadwal:** Mengatur jadwal pertemuan pasien dengan dokter, termasuk pencatatan tindakan dan diagnosa.
*   **Riwayat Tindakan:** Melihat riwayat tindakan dan diagnosa pasien.
*   **Laporan Harian:** Menghasilkan laporan jadwal harian berdasarkan rentang tanggal.
*   **Manajemen Pengguna:** Mengelola akun pengguna (Dev dan User/Dokter) untuk akses sistem.

## Teknologi yang Digunakan

*   **Framework:** Laravel (PHP)
*   **Database:** MySQL (atau database relasional lain yang didukung Laravel)
*   **Frontend:** Bootstrap, jQuery, DataTables
*   **Bahasa:** PHP, JavaScript, HTML, CSS

## Panduan Instalasi

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan aplikasi ini di lingkungan lokal Anda:

1.  **Clone Repositori:**
    ```bash
    git clone <URL_REPOSITORI_ANDA>
    cd Klinik\ Agefi
    ```

2.  **Instal Dependensi Composer:**
    ```bash
    composer install
    ```

3.  **Instal Dependensi Node.js (NPM):n**
    ```bash
    npm install
    ```

4.  **Buat File `.env`:**
    Salin file `.env.example` menjadi `.env`:
    ```bash
    cp .env.example .env
    ```

5.  **Konfigurasi Database:**
    Buka file `.env` dan sesuaikan konfigurasi database Anda:
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=klinik_agefi # Ganti dengan nama database Anda
    DB_USERNAME=root         # Ganti dengan username database Anda
    DB_PASSWORD=             # Ganti dengan password database Anda
    ```

6.  **Generate Application Key:**
    ```bash
    php artisan key:generate
    ```

7.  **Jalankan Migrasi Database:**
    Ini akan membuat tabel-tabel yang diperlukan di database Anda.
    ```bash
    php artisan migrate
    ```

8.  **Jalankan Seeder (Opsional, untuk data dummy):**
    Ini akan mengisi database dengan data contoh untuk pasien, dokter, layanan, tarif, jadwal, diagnosa, dan pengguna default.
    ```bash
    php artisan db:seed
    ```

9.  **Compile Frontend Assets:**
    ```bash
    npm run dev
    # atau untuk produksi
    # npm run prod
    ```

10. **Jalankan Server Pengembangan:**
    ```bash
    php artisan serve
    ```
    Aplikasi akan tersedia di `http://127.0.0.1:8000` (atau port lain yang ditampilkan).

## Cara Penggunaan

Setelah instalasi, Anda dapat mengakses aplikasi melalui browser Anda.

### Kredensial Login Default (setelah `php artisan db:seed`):

*   **Admin (Dev Role):**
    *   **Username:** `dev`
    *   **Password:** `password`

*   **Dokter (User Role):**
    *   **Username:** `dokter`
    *   **Password:** `password`

### Struktur Navigasi (untuk peran Dev):

*   **Beranda:** Dashboard utama.
*   **Jadwal:** Manajemen jadwal pasien.
*   **Riwayat:** Melihat riwayat tindakan dan diagnosa.
*   **Laporan:** Menghasilkan laporan harian.
*   **Data Master:**
    *   **Pasien:** Manajemen data pasien.
    *   **Dokter:** Manajemen data dokter.
    *   **Tarif:** Manajemen tarif layanan.
    *   **Layanan:** Manajemen jenis layanan.
*   **Data Akun:**
    *   **User:** Manajemen akun pengguna.

### Struktur Navigasi (untuk peran User/Dokter):

*   **Beranda:** Dashboard utama.
*   **Jadwal:** Melihat jadwal yang terkait dengan dokter yang login, serta melakukan tindakan dan diagnosa.
*   **Riwayat:** Melihat riwayat tindakan dan diagnosa.

## Best Practices yang Diterapkan

*   **Routing:** Penggunaan `Route::resource` dan penamaan rute (`name`) untuk struktur URL yang lebih bersih dan mudah dikelola.
*   **Model & Migrasi:** Konsistensi antara definisi model dan skema database melalui migrasi.
*   **Seeding & Factories:** Pemanfaatan Faker dan Factory untuk menghasilkan data dummy yang realistis, mempermudah pengembangan dan pengujian.
*   **Blade Templates:** Penggunaan Blade templating engine untuk tampilan yang dinamis dan terstruktur.
*   **Middleware:** Implementasi middleware `HakRole` untuk otorisasi berbasis peran.

---