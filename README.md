Replaced generic Laravel README with project-specific documentation for the CinePanel movie CRUD application developed for XAMPP.

Changes
Installation guide: XAMPP-specific setup with database configuration for MariaDB
Migration commands: Documented php artisan migrate to create users, categorias, and peliculas tables
Seeder commands: Documented php artisan db:seed which populates:
4 movie categories (Acción, Comedia, Terror, Aventura)
Default admin user (admin@admin.com / 123456789)
8 sample movies (2 per category)
Quick reset: Added php artisan migrate:fresh --seed for database reset
Database schema: Documented table structures and foreign key relationships
Project structure: Mapped controllers, views, and routes for CRUD operations
Key Commands
# Create tables
php artisan migrate

# Populate initial data
php artisan db:seed

# Reset and repopulate
php artisan migrate:fresh --seed
Default credentials: admin@admin.com / 123456789
