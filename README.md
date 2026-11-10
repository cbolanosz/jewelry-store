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
   Alternatively, create the empty tables and import the test rows exported from our database:
   ```bash
   php artisan migrate
   mysql -u root -p jewelry_store < database/data.sql
   ```
6. Create the public link for the uploaded product images:
   ```bash
   php artisan storage:link
   ```

The project does not use NPM: Bootstrap is loaded from a CDN and the styles live in `public/css`.

The product catalog and admin lists use pagination. The home page includes a localized promotional banner.

## Running the application
```bash
php artisan serve
```

| Section | Route |
|---|---|
| End-user section (main route) | http://localhost:8000/ |
| Admin panel (admin role only) | http://localhost:8000/admin |

The admin panel also provides sales reports in PDF and Excel formats:
`/admin/reports/sales/pdf` and `/admin/reports/sales/excel`.

## Docker deployment on GCP

The production Docker setup runs Apache and Laravel in a container while
using MySQL installed on the GCP VM. The compose file uses host networking
because the production database configuration uses `DB_HOST=127.0.0.1`.
Never commit the real `.env`, database password or exchange-rate key.

### Prepare the GCP VM

1. Reserve or note the VM external IP and allow TCP ingress on port `80` in
   the VPC firewall.
2. Connect to the VM over SSH and install Git and Docker Compose if they are
   not already installed.
3. Install and start MySQL on the VM. Create the database and application
   user:

   ```sql
   CREATE DATABASE jewelry_store CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   CREATE USER 'usuario_del_servidor'@'localhost' IDENTIFIED BY 'clave_del_servidor';
   GRANT ALL PRIVILEGES ON jewelry_store.* TO 'usuario_del_servidor'@'localhost';
   FLUSH PRIVILEGES;
   ```

### Build and start the application

Run these commands on the VM:

```bash
git clone https://github.com/cbolanosz/jewelry-store.git
cd jewelry-store
cp .env.production.example .env
nano .env
docker compose build
APP_KEY=$(docker compose run --rm --entrypoint php app artisan key:generate --show)
sed -i "s|^APP_KEY=.*|APP_KEY=$APP_KEY|" .env
docker compose up -d --build
```

Set the real `APP_URL`, database credentials and `EXCHANGE_RATE_KEY` before
starting the container. Compose injects `.env` variables into the container;
the file does not need to be copied into the image. The entrypoint runs pending migrations and creates
the public storage link. It does not import `database/data.sql`
automatically, so existing production data cannot be overwritten by a restart.

### Load the exported data

After the container starts, import the test data once from the VM:

```bash
mysql -u usuario_del_servidor -p jewelry_store < database/data.sql
```

Alternatively, use the seeders instead of the SQL export:

```bash
docker compose exec app php artisan db:seed --force
```

Check the deployment and logs:

```bash
curl http://IP_DEL_SERVIDOR/up
docker compose ps
docker compose logs -f app
```

The application is then available at
`http://IP_DEL_SERVIDOR/`; the admin panel is at
`http://IP_DEL_SERVIDOR/admin`.

### Updating the deployment

```bash
cd jewelry-store
git pull origin main
docker compose up -d --build
docker compose exec app php artisan optimize:clear
```

The named Docker volumes preserve Laravel storage and uploaded product
images across container rebuilds.

## Dependency inversion exception

The sales report use case applies dependency inversion through the
`SalesReportGenerator` interface. `PdfSalesReportGenerator` and
`ExcelSalesReportGenerator` are the two concrete implementations, selected
by the service container according to the requested format. This is the
only exception to the project rule that normally prohibits custom interfaces
and dependency injection.

## Test credentials
| Role | Email | Password |
|---|---|---|
| Admin | `admin@jewelrymen.com` | `admin1234` |
| Client | `client@jewelrymen.com` | `client1234` |

## Documentation
The deliverable, the programming style guide and the programming rules are in the [project wiki](https://github.com/cbolanosz/jewelry-store/wiki).
