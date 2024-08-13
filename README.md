### TESTE BACKEND MATTOS&CIA

##Tecnologias Utilizadas
PHP 8.1
Laravel 10
Composer
Docker
PostgreSql

## Pré-requisitos
Docker e Docker Compose instalados

## Execução
- git clone https:https://github.com/psempionato/mattos-api
- docker-compose up -d --build
- docker exec -it teste-matos-cia-backend-1 bash
- cd /var/www/api
- composer install
- php artisan migrate
- php artisan serve --host=0.0.0.0

