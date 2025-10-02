# Test Project
Build a catalog system with ordering functionality. The system contains two modules: Catalog (Categories + Products) and Orders. The Orders module cannot use the Catalog module directly. The site includes both an admin and a client part.

### Requirements
* Laravel 12
* nwidart/laravel-modules package for module management
* Livewire 3.x for interactive frontend components
* Filament 3.x for admin interfaces
* PostgreSQL database
* Pest 3 testing framework

# Setup
```bash
git clone https://github.com/den-is-ua/test-catalog.git test-store.dev
cd test-store.dev
```
Open terminal under root project
```bash
./install-with-docker.sh
```

Optioanal
Add to hosts: `127.0.0.1 test-catalog.dev`
```bash
nano /etc/hosts
```

# Run project
Run server
```bash
./run-services.sh
```

* Open your browser with `test-catalog.dev` or `127.0.0.1` address 
* Onen admin panel by path: `/admin`. Use credentials for email/password: `superuser@gmail.com`/`secret`
* Go into container: `docker exec -it catalog-app bash`

# Commands
```
# Ensure what you under catalog-app container!

# Lint
composer lint #Run larastan, duster

# Fix codestyle
composer fix #Run duster fix

# Test
composer test #Run tests

# Seeders
php artisan module:seed Catalog
php artisan module:seed Order
```

# DB
### Connection to local client
* Host: 127.0.0.1
* Port: 5444
* Username: postgres
* Password: secret

# Architectural solution
### Goal

Keep Order and Catalog independent. Order must never touch Catalog’s models directly. We achieve this via a small adapter module and shared contracts/DTOs.

### Modules and dependencies
Commons: hosts interfaces and DTO contracts only. No Eloquent.
OrderProductConverter (adapter): implements the Common interfaces by mapping Catalog data → OrderProductDTO.
Order: depends only on the interfaces + DTOs from Common.
Using service container functional to bind interfaces with implementation
```php
public function register(): void
{
    $this->app->bind(OrderProductConverterContract::class, OrderProductConverterService::class);
    $this->app->bind(ProductServiceContract::class, ProductService::class);
}
```