# Blog Mini Project

This is a simple PHP blog application created during a diploma course in 2019.
It allows users to register, log in and publish blog posts with images using
CKEditor. Posts are stored in a MySQL database.

## Setup
1. Create a MySQL database using the SQL script from `sql/Dump20201031.sql`.
2. Configure your database credentials. You can either edit `config.php` or set
   the environment variables `DB_SERVER`, `DB_USERNAME`, `DB_PASSWORD` and `DB_NAME`.
   A `.env.example` file is provided as a reference.
3. Serve the project through a PHP-capable web server (e.g. `php -S` for local
   testing).

## Features
- User registration and login with hashed passwords.
- Create, list and view blog posts with uploaded images.

## Notes
This project was originally created as a learning exercise. Some areas such as
input validation and error handling could be improved further.

