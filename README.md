## Deskripsi Program

Aplikasi leaderboard

## Akses Aplikasi

| Layanan          | URL                          | Keterangan             |
| ---------------- | ---------------------------- | ---------------------- |
| Dashboard admin  | http://127.0.0.1:8000/admin  | Akses dashboard admin  |
| Dashboard mentor | http://127.0.0.1:8000/mentor | Akses dashboard mentor |

## Instalasi

- Install depedency program laravel

```bash
composer install
```

- Copy .env.example

```bash
cp .env.example .env
```

- Generate key

```bash
php artisan key:generate
```

- Migrate database

```bash
php artisan migrate --seed
```

- Aktifkan storage link

```bash
php artisan storage:link
```

## Run Program (Local Phase)

- Run php artisan serve

```bash
php artisan serve
```

- Akses program di http://127.0.0.1:[port-program]

```bash
http://127.0.0.1:8000
```
