# Título del proyecto 

Backend eCommerce

# Descripción

Aplicacion backend para el funcionamiento de eCommerce

# Dependencias
- Es necesario tener composer instalado
- Es necesario tener xampp con la version de php 8.2.12 y tener corriendo mysql y apache

# Instalación

### Clonar el repositorio
git clone https://github.com/JuanPedrazaD/backend-laravel-eCommerce.git

### Instalación de librerias
composer install

### Configuracion de rutas
php artisan install:api

### Configuración de base de datos
    
Realizar la creacion de tablas

```
- php artisan migrate
```

Ingresar sedes en la tabla sedes
```
- php artisan db:seed
```

Ingresar acciones en la tabla acciones
```
- php artisan db:seed --class=ImageSeeder
```

Para el correcto funcionamiento de la api es necesario:

1. Copiar el archivo .env.example y crear un archivo .env
2. En este archivo .env es necesario agregar valores a las variables 
    -APP_NAME=Laravel
    -APP_ENV=local
    -APP_KEY=base64:zPQMeP7FN3qMgJDYrkZM2GCrybsG1HXd9MMbSX1K7n8=
    -APP_DEBUG=true
    -APP_TIMEZONE=UTC
    -APP_URL=http://localhost

    -APP_LOCALE=en
    -APP_FALLBACK_LOCALE=en
    -APP_FAKER_LOCALE=en_US

    -DB_CONNECTION=mysql
    -DB_HOST=127.0.0.1
    -DB_PORT=3306
    -DB_DATABASE=ecommercevue
    -DB_USERNAME=root
    -DB_PASSWORD=
Despues de copiar estas variables es necesario realizar el siguiente comando

```
- php artisan config:clear
```

Por ultimo será necesario realizar el siguiente comando
```
- php artisan serve
```
