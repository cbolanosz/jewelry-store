# Jewelry Men

**Jewelry Men** is a web application for selling luxury watches (such as Rolex, Audemars Piguet and Richard Mille) and fine jewelry made of gold, diamonds and other precious stones. Payments are simulated inside the application.

Developed by **God's programmers**: Cristian Bolaños (architect), Pablo José Benítez Trujillo and Diego Mesa.

## Requirements
- PHP 8.3 or higher
- Composer
- MySQL 8

## Installation
1. Clone the repository and enter the project folder:
   ```bash
   git clone https://github.com/cbolanosz/jewelry-store.git
   cd jewelry-store
   ```
2. Install the PHP dependencies:
   ```bash
   composer install
   ```
3. Create the environment file and the application key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Create a MySQL database named `jewelry_store` and set the connection in `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=jewelry_store
   DB_USERNAME=root
   DB_PASSWORD=
   ```
5. Create the tables and load the test data:
   ```bash
   php artisan migrate --seed
   ```
6. Create the public link for the uploaded product images:
   ```bash
   php artisan storage:link
   ```

The project does not use NPM: Bootstrap is loaded from a CDN and the styles live in `public/css`.

## Running the application
```bash
php artisan serve
```

| Section | Route |
|---|---|
| End-user section (main route) | http://localhost:8000/ |
| Admin panel (admin role only) | http://localhost:8000/admin |

## Test credentials
| Role | Email | Password |
|---|---|---|
| Admin | `admin@jewelrymen.com` | `admin1234` |
| Client | `client@jewelrymen.com` | `client1234` |

## Documentation
The deliverable, the programming style guide and the programming rules are in the [project wiki](https://github.com/cbolanosz/jewelry-store/wiki).
