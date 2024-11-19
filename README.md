composer install
php artisan migrate
php artisan db:seed

Variables de entorno para probar en local
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:zPQMeP7FN3qMgJDYrkZM2GCrybsG1HXd9MMbSX1K7n8=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommercevue
DB_USERNAME=root
DB_PASSWORD=

Para este proyecto se van a usar productos de prueba los cuales crea laravel por defecto
