<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## How to Run Project

Untuk menjalankan projek dapat mengikuti langkah-langkah berikut.

- Jalankan ``` git clone https://github.com/muhammadramadhann/resepku.git ``` pada direktori lokal
- Buka folder proyek, lalu jalankan  ```composer install```
- Jalankan ```cp .env.example .env```
- Buka file .env dan ubah DB_DATABASE sesuai nama database diinginkan lalu buat database dengan nama tersebut di phpmyadmin (MySQL)
- Jalankan ```Run php artisan key:generate```
- Jalankan ```php artisan migrate``` untuk me-generate tabel kedalam database
- Jalankan ```php artisan serve```
- Masuk ke browser pada url <a href="http://localhost:8000">http://localhost:8000</a>

## Additional (Import Sample Data)

Apabila ingin menggunakan data sampel yang sudah ada, dapat melakukan import menggunakan file sql berikut.
- <a href="https://drive.google.com/file/d/1qcU_4vJH2zWKkeDAwS9r0PNTYi81-G43/view?usp=sharing">Data Resepku</a>

## Database ERD

![Resepku@1 25x](https://user-images.githubusercontent.com/83332442/176915726-4eb6c707-060e-43cc-91bf-09451b84362e.png)

## Preview

![home](https://user-images.githubusercontent.com/83332442/176915568-0f66cca1-647e-4fb9-be5e-a572ece541b5.png)

![add](https://user-images.githubusercontent.com/83332442/176915644-17e998b5-7004-49d3-a638-2a4e6ba89573.png)

![register](https://user-images.githubusercontent.com/83332442/176915662-a417f663-07c2-455d-813c-24c2dbce8803.png)

![login](https://user-images.githubusercontent.com/83332442/176915687-79cc5953-6e6b-4297-9830-4fd00531de4c.png)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
