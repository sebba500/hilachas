# Hilachas

Hilachas es una aplicación web desarrollada en Laravel para la gestión de inventarios de prendas, materiales textiles y materias primas. Permite registrar, visualizar y administrar los diferentes elementos involucrados en el proceso textil.

## Características principales

- Gestión de inventario de prendas.
- Administración de materiales textiles.
- Control de materias primas.
- Interfaz de usuario con Bootstrap y FontAwesome.
- Funcionalidades de CRUD (crear, leer, actualizar, eliminar) para los recursos principales.
- Autenticación de usuarios y control de acceso para administradores.

## Instalación

1. Clona el repositorio:
   ```sh
   git clone https://github.com/sebba500/hilachas.git
   cd hilachas

2. Insatala dependencias
    ```sh
    composer install

3. Copia el archivo de entorno y configura tus variables:
    ```sh
    cp .env.example .env

4. Copia el archivo de entorno y configura tus variables:
    ```sh
    php artisan key:generate

5. Configura la base de datos en el archivo .env:
    ```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=hilachas
    DB_USERNAME=
    DB_PASSWORD=
    
6. ejecuta las migraciones
    ```sh
    php artisan migrate

7. Ejecuta el proyecto:
    ```sh
    php artisan serve
