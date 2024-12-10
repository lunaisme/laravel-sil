# Laravel-Sil

Proyek ini adalah aplikasi berbasis Laravel untuk mengelola informasi yang ada di dalam laboratorium, seperti pemeriksaan, pengelolaan alat, pengujian, dan lain-lain.

## Prerequisites

Sebelum memulai, pastikan Anda memiliki hal-hal berikut:

-   [Laragon] terinstal di sistem Anda.
-   [Composer] terinstal (Laragon biasanya sudah menyertakannya).
-   PHP dan MySQL yang sudah terkonfigurasi dengan baik.

## Cara Mengkloning Proyek

Berikut adalah panduan yang diperbarui untuk mengkloning repositori menggunakan ZIP di GitHub, serta mengganti langkah-langkah yang relevan:

### Cara Mengkloning Repositori

#### Metode 1: Menggunakan Git

1. **Kloning Repositori**

    Buka terminal dan jalankan perintah berikut:

    ```bash
    git clone https://github.com/lunaisme/laravel-sil.git
    ```

2. **Navigasi ke Direktori Proyek**

    ```bash
    cd laravel-sil
    ```

3. **Instalasi Dependensi**

    Jalankan perintah berikut untuk menginstal dependensi proyek:

    ```bash
    composer install
    ```

#### Metode 2: Menggunakan ZIP

1. **Unduh ZIP**

    - Kunjungi halaman repositori di GitHub: [https://github.com/lunaisme/laravel-sil](https://github.com/lunaisme/laravel-sil).
    - Klik tombol **Code** dan pilih **Download ZIP**.

2. **Ekstrak ZIP**

    - Setelah unduhan selesai, ekstrak file ZIP ke lokasi yang Anda inginkan.

3. **Navigasi ke Direktori Proyek**

    Buka terminal dan arahkan ke direktori tempat Anda mengekstrak file ZIP:

    ```bash
    cd path/to/laravel-sil
    ```

    Gantilah `path/to` dengan jalur ke folder tempat Anda mengekstrak file.

4. **Instalasi Dependensi**

    Jalankan perintah berikut untuk menginstal dependensi proyek:

```bash
composer install
```

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

Kemudian, buka file `.env` dan sesuaikan pengaturan database Anda sesuai dengan konfigurasi Laragon.

Generate Kunci Aplikasi Jalankan perintah berikut untuk menghasilkan kunci aplikasi:

```bash
php artisan key:generate
```

Migrasi Database Jika proyek Anda menggunakan migrasi, jalankan perintah berikut untuk membuat tabel di database:

```bash
php artisan migrate
```

Jalankan Server Jika Anda menggunakan Laragon, Anda dapat menjalankan server dengan mengakses URL proyek di browser, seperti `http://laravel-sil.test`.

# Cara Menggunakan

```bash
php artisan serve
```
