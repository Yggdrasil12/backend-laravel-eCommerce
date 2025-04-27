# Título del proyecto

Backend para ecommerce

# Descripción

Aplicación backend para el funcionamiento de un eCommerce, desarrollada con Laravel.

# Dependencias

-   Composer (para la gestión de dependencias PHP)
-   XAMPP con PHP 8.2.12 (o superior) y MySQL + Apache en ejecución

# Instalación

### Clonar el repositorio

Clona el repositorio utilizando Git:

git clone https://github.com/JuanPedrazaD/backend-laravel-eCommerce.git

### Instalación de dependencias

Ejecuta el siguiente comando para instalar las dependencias del proyecto:

```
composer install
```

### Configuracion de rutas

Configura las rutas necesarias para la API:

```
php artisan install:api
```

### Configuración de base de datos

Ejecuta el siguiente comando para crear las tablas en la base de datos:

```
- php artisan migrate
```

Para ingresar datos en la tabla sedes, usa el siguiente comando:

```
- php artisan db:seed
```

Para el correcto funcionamiento de la api es necesario:

1.  Copiar el archivo .env.example y crear un archivo .env
2.  En este archivo .env es necesario agregar valores a las variables
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
    -DB_DATABASE=inventario
    -DB_USERNAME=root
    -DB_PASSWORD=

    Despues de copiar estas variables es necesario realizar los siguientes comandos

```
- php artisan optimize
- php artisan config:clear
```

Por ultimo será necesario realizar el siguiente comando

```
- php artisan serve
```
