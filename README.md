# Laravel - bun - typescript PREACT

<img width="300" src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="150">
<img src="https://user-images.githubusercontent.com/709451/182802334-d9c42afe-f35d-4a7b-86ea-9985f73f20c3.png" width="150">
<br>
by Yonatan Vigilio Lavado
<br><br>

# Getting Started

## Sin Docker

```bash
bun install
# eliminar .git/ para iniciar uno nuevo
# empezar modo de desarrollo
bun serve
bun dev

# to access permission
chmod -R 777 storage
```

## Con Docker

1. Instalar paquetes npm

```bash
bun install
```

2. Iniciar contenedor

```bash
bun compose up -d
```

Abrir vite

```bash
bun dev
```

Detener contenedor y iniciar contenedor

```bash
docker container stop hashdecontenedor
docker container start hashdecontenedor
```

Ver logs de contenedor

```bash
docker container logs hashdecontenedor -f
# -f ver en tiempo real
```

3. Detener todos los contenedores de la imagen

```bash
docker compose down
```

4. Si modificaste package.json (instalar o desintalar dependencia ) Detener contenedor de la imagen "docker compose down" y instalar dependencia pnpm add \*. Volver a construir contenedor y iniciar contenedor

```BASH
# volver a contruir construir contenedor y iniciar
docker compose up -d --build
```

### Opcional en el terminal

Ver filesystem de tus contenedor

```bash
# server
docker exec -it hashdecontenedor sh
```

### Producción

1. Verificar y modificar .env a producción
2. Verificar errores de eslint

```bash
pnpm biome:check
pnpm biome:format
```

3. Insertar tu api de postman y dia en tu aplicación

```bash
docker compose down
docker compose -f docker-compose.production.yml up -d --build
```

3. Verás que se iniciará en modo de producción en el contenedor

# INSTALL

1-
sudo apt update
sudo apt install software-properties-common

2-
sudo apt install apt-transport-https lsb-release ca-certificates wget
wget -qO - https://packages.sury.org/php/apt.gpg | sudo apt-key add -
echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/php.list
sudo apt update

3-
sudo apt install php8.1 php8.1-fpm php8.1-mysql php8.1-xml php8.1-mbstring php8.1-curl php8.1-zip php8.1-gd php8.1-bcmath

4-
php -v

5- COMPONSER
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

sudo mv composer.phar /usr/local/bin/composer

---

## sudo apt install php8.1-soap

php artisan key:generate
si usas db-php artisan migrate

# nginx

sudo nano /etc/nginx/sites-available/facturacion

```ngnix
  GNU nano 5.4         /etc/nginx/sites-available/facturacion
server {
    listen 80;
    server_name facturacion.vigilio-services.com www.facturacion.vigilio-servic>

    root /var/www/facturacion/public;  # Ruta a la carpeta public de Laravel
    index index.php index.html index.htm;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;  # Asegúrate de usar la>
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;  # Denegar acceso a archivos .htaccess
    }
}
```
sudo ln -s /etc/nginx/sites-available/facturacion /etc/nginx/sites-enabled
sudo certbot --nginx -d www.facturacion.vigilio-services.com -d facturacion.vigilio-services.com
sudo chown -R www-data:www-data /var/www/facturacion/app/Services/cache
sudo chown -R www-data:www-data /var/www/facturacion/storage
