<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Tentang Lazismu

LAZISMU adalah lembaga zakat tingkat nasional yang berkhidmat dalam pemberdayaan masyarakat melalui pendayagunaan secara produktif dana zakat, infaq, wakaf dan dana kedermawanan lainnya baik dari perseorangan, lembaga, perusahaan dan instansi lainnya.


## Cara Menjalankan
- Buat database terlebih dahulu
- Set FILESYSTEM_DRIVER=public di .env
- Set MIDTRANS_SERVER_KEY=Your Key
- Set MIDTRANS_CLIENT_KEY=Your Key

```powershell
cp .env.example .env
php artisan generate:key
php artisan queue:table
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

## Web Ini Dibangun Menggunakan
-  [Stisla](https://getstisla.com/).
-  [Spatie Laravel](https://github.com/spatie/laravel-permission).
-  [MaleFashion – Free Bootstrap 4 HTML5 eCommerce Website Template](https://themewagon.com/themes/free-bootstrap-4-html5-ecommerce-website-template-malefashion/).