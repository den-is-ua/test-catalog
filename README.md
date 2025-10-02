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
* Go into container: `docker exec -it catalog-app bash`

# Commands
```
composer lint #Run larastan, duster
composer fix #Run duster fix
composer test #Run tests
php artisan module:seed Catalog
php artisan module:seed Order
```

# DB
### Connection to local client
* Host: 127.0.0.1
* Port: 5444
* Username: postgres
* Password: secret