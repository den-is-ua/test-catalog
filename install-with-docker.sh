#!/bin/bash
docker compose build --build-arg uid=$(id -u) --build-arg gid=$(id -g)
docker compose up -d

docker exec -it catalog-db psql -U postgres -d postgres -c "CREATE DATABASE catalog;"

docker exec catalog-app composer install
docker exec catalog-app cp .env.example .env
docker exec catalog-app php artisan key:generate
docker exec catalog-app php artisan migrate
docker exec catalog-app npm install
docker exec catalog-app php artisan create-superuser
