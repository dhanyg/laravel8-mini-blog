# Laravel 8 Mini Blog
## Tentang  Aplikasi
Ini adalah web aplikasi mini blog dengan detail sebagai berikut:  
- Menu :
    - Beranda
    - Post : CRUD Post
    - Akun : CRUD Akun
    - Login / Logout
- Terdapat 2 Role :
    - Admin dapat membuat Akun baru dan Post baru (CRUD)
    - Author  hanya dapat membuat post baru (CRUD)
- User dummy untuk login melihat CRUD :
    - admin admin
    - author author
  
## Prasyarat Sistem
- PHP 7
- MySQL 5.7
- Composer v2
- NodeJS v20
  
## Instalasi
Tentukan direktori untuk menyimpan aplikasi ini (apabila menggunakan **XAMPP** bisa masuk ke dalam folder `htdocs`, apabila menggunakan **Laragon** bisa masuk ke dalam folder `www`) kemudian lakukan clone pada repository ini dengan cara:  
```
git clone https://github.com/dhanyg/laravel8-mini-blog.git
```

Kemudian masuk ke dalam direktori tersebut.  
```
cd laravel8-mini-blog
```

Lakukan instalasi Laravel beserta dependensi-dependensi yang dibutuhkan dengan menggunakan Composer serta NodeJS.  
```
composer install
npm install
npm run dev
```
  
Konfigurasi file `.env` dengan mengcopy file `.env.example`
```
cp .env.example .env
```  
  
Ubah beberapa konfigurasi berikut:  
- `APP_NAME`, isi dengan nama aplikasi yang ingin digunakan, misalnya "Laravel Blog".
- `APP_ENV`, ubah nilainya menjadi `production` apabila aplikasi siap untuk di-deploy atau biarkan bernilai `local` apabila aplikasi masih dalam proses pengembangan.
- `APP_URL`, isi dengan url atau nama domain yang akan digunakan.
- `DB_DATABASE`, isi dengan nama database yang akan digunakan, jadi pastikan sudah membuat databasenya terlebih dahulu.
- `DB_USERNAME`, isi dengan username yang akan digunakan untuk login ke database (nilai defaultnya adalah user _root_).
- `DB_PASSWORD`, isi dengan password yang digunakan untuk login ke database (nilai defaultnya adalah kosong atau tanpa password).
  
Selanjutnya _generate key_ dengan perintah:
```
php artisan key:generate
```
  
Selanjutnya lakukan _database migration_.
```
php artisan migrate --seed
```
 
Apabila tidak terjadi error maka proses instalasi dan konfigurasi telah selesai dan aplikasi siap untuk dijalankan.  
  
## Menjalankan Aplikasi
Ada dua cara untuk menjalankan aplikasi berbasis laravel ini.  
  
Pertama, apabila lokasi direktori aplikasi sudah berada di dalam `htdocs` atau `www` maka untuk mengaksesnya menggunakan url berikut:
```
http://localhost/laravel8-mini-blog/public
```
Diasumsikan bahwa aplikasi diletakkan di dalam direktori `htdocs` pada XAMPP atau `www` pada Laragon.  
  
Cara kedua adalah dengan menggunakan perintah artisan.
```
php artisan serve
```
Kemudian akses ke url:
```
http://127.0.0.1:8000
atau
http://localhost:8000
```
  
Login menggunakan username `admin` dan password `admin` atau username `author` dan password `author`.  
  
Selesai.