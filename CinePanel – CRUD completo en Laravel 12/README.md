# CinePanel - Sistema de Gestión de Películas

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

Sistema CRUD (Create, Read, Update, Delete) completo para la gestión de películas desarrollado con Laravel 12 y diseñado para funcionar en XAMPP.

## 📋 Características

- ✅ **CRUD completo de películas**: Crear, leer, actualizar y eliminar películas
- 🎭 **Sistema de categorías**: Acción, Comedia, Terror, Aventura
- 🔐 **Sistema de autenticación**: Login y registro de usuarios
- 🖼️ **Gestión de portadas**: Carga de imágenes para cada película
- 📱 **Interfaz responsive**: Diseño adaptable a diferentes dispositivos
- 🎯 **Middleware de autenticación**: Protección de rutas sensibles

## 🛠️ Requisitos del Sistema

- PHP >= 8.2
- Composer
- XAMPP (incluye Apache y MariaDB/MySQL)
- Node.js y NPM (para assets front-end)

## 📦 Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/Galfre77/Peliculas_Laravel.git
cd "CinePanel – CRUD completo en Laravel 12"
```

### 2. Instalar dependencias de PHP

```bash
composer install
```

### 3. Instalar dependencias de Node.js

```bash
npm install
```

### 4. Configurar el archivo de entorno

Copia el archivo de ejemplo y configúralo:

```bash
cp .env.example .env
```

Edita el archivo `.env` con la configuración de tu base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=peliculas
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generar la clave de aplicación

```bash
php artisan key:generate
```

### 6. Crear la base de datos

1. Inicia XAMPP y asegúrate de que Apache y MySQL estén corriendo
2. Accede a phpMyAdmin: `http://localhost/phpmyadmin`
3. Crea una nueva base de datos llamada `peliculas`

### 7. Ejecutar las migraciones

Este comando creará todas las tablas necesarias en la base de datos:

```bash
php artisan migrate
```

Las migraciones crearán las siguientes tablas:
- `users` - Usuarios del sistema
- `categorias` - Categorías de películas (Acción, Comedia, Terror, Aventura)
- `peliculas` - Información de las películas

### 8. Ejecutar los seeders

Los seeders poblarán la base de datos con datos iniciales:

```bash
php artisan db:seed
```

Este comando insertará:
- **Categorías predefinidas**: Acción, Comedia, Terror, Aventura
- **Usuario administrador por defecto**:
  - Email: `admin@admin.com`
  - Contraseña: `123456789`
- **8 películas de ejemplo** (2 por cada categoría)

### 9. Crear directorio de almacenamiento público

```bash
php artisan storage:link
```

### 10. Compilar assets

Para desarrollo:
```bash
npm run dev
```

Para producción:
```bash
npm run build
```

### 11. Iniciar el servidor

```bash
php artisan serve
```

La aplicación estará disponible en: `http://localhost:8000`

## 🎬 Uso de la Aplicación

### Credenciales por Defecto

Después de ejecutar los seeders, puedes acceder con:
- **Email**: `admin@admin.com`
- **Contraseña**: `123456789`

### Funcionalidades Principales

1. **Ver películas**: Accede a `/peliculas` para ver el listado completo
2. **Ver detalle**: Click en una película para ver su información completa
3. **Agregar película**: (Requiere login) Click en "Alta Película"
4. **Editar película**: (Requiere login) Accede al modo mantenimiento desde el detalle
5. **Eliminar película**: (Requiere login) Disponible en el modo mantenimiento

### Estructura de la Base de Datos

#### Tabla `peliculas`
- `idpelis` (PK): ID único de la película
- `titulo`: Título de la película
- `direccion`: Director de la película
- `año`: Año de lanzamiento
- `sinopsis`: Descripción de la película
- `portada`: Nombre del archivo de imagen
- `fecha_alta`: Fecha de registro
- `idcategoria` (FK): Referencia a la categoría

#### Tabla `categorias`
- `idcategoria` (PK): ID único de la categoría
- `nombre`: Nombre de la categoría

#### Tabla `users`
- `id` (PK): ID único del usuario
- `nombre`: Nombre del usuario
- `email`: Correo electrónico (único)
- `password`: Contraseña encriptada
- Timestamps de Laravel

## 🔄 Comandos Útiles

### Resetear base de datos y poblar con datos frescos

```bash
php artisan migrate:fresh --seed
```

Este comando elimina todas las tablas, las vuelve a crear y ejecuta los seeders.

### Ver rutas disponibles

```bash
php artisan route:list
```

### Limpiar caché

```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## 📁 Estructura del Proyecto

```
├── app/
│   ├── Http/Controllers/
│   │   ├── peliculaController.php      # CRUD de películas
│   │   ├── VistasController.php        # Vistas principales
│   │   ├── AutenticacionSessionController.php  # Login/Logout
│   │   └── UserController.php          # Gestión de usuarios
│   └── Models/
│       └── Pelicula.php                 # Modelo de película
├── database/
│   ├── migrations/
│   │   └── 2025_09_27_092155_create_peliculas__tables.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── plaSeeder.php                # Datos iniciales
├── resources/
│   └── views/
│       ├── peliculas.blade.php          # Lista de películas
│       ├── pelicula.blade.php           # Detalle de película
│       ├── pelicula-alta.blade.php      # Formulario de alta
│       └── pelicula-mto.blade.php       # Formulario de edición
├── routes/
│   └── web.php                          # Definición de rutas
└── public/
    └── images/                          # Portadas de películas
```

## 🚀 Despliegue en XAMPP

1. Copia el proyecto a `C:\xampp\htdocs\`
2. Asegúrate de que Apache y MySQL estén iniciados en XAMPP
3. Configura el archivo `.env` con las credenciales de tu base de datos
4. Ejecuta las migraciones y seeders
5. Accede a la aplicación desde `http://localhost:8000` (con `php artisan serve`)
   o configura un Virtual Host en Apache

## 🐛 Solución de Problemas

### Error de permisos en storage/logs

```bash
chmod -R 775 storage bootstrap/cache
```

### Error con la clave de aplicación

```bash
php artisan key:generate
```

### No se pueden cargar imágenes

Verifica que el directorio `public/images` exista y tenga permisos de escritura.

## 📝 Licencia

Este proyecto es software de código abierto bajo la [Licencia MIT](https://opensource.org/licenses/MIT).

## 🤝 Contribuciones

Las contribuciones son bienvenidas. Por favor, abre un issue o pull request para sugerencias o mejoras.
