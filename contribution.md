## Cara Clone Repository

Untuk melakukan clone repository ikuti langkah berikut:

1. Clone repository di folder yang kalian inginkan.

```console
git clone https://github.com/monnn-273/aqua-tani
```

2. Install vendor dengan menggunakan composer (pastikan sudah ada composer di sistem).

```console
composer install
```

3.  Buat file baru dengan nama ".env". Setelah itu copy semua yang ada di file ".env.example", kemudian paste ke dalam file ".env".
4.  Generate APP_KEY.

```console
php artisan key:generate
```

5.  Clear Cache.

```console
php artisan config:cache
```

6. Buat database mysql dengan nama db_angkot.
7. Jalankan migrate.

```console
php artisan migrate
```

8. Jalankan laravel.

```console
php artisan serve
```

## Database

1. Untuk mengisi database dengan data dummy jalankan perintah berikut dengan melakukan uncommand masing-masing Table Seeder yang ada pada file database > seeder

```bash
php artisan db:seed
```

2. Alternatif lain untuk menggunakan database juga adalah cukup mengimpor database dengan nama file aqua_tani.sql pada repository (JANGAN LAKUKAN MIGRASI TERLEBIH DAHULU)
