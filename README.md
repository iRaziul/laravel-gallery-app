## Laravel Image Gallery App

This is a simple image gallery app built with Laravel. It allows users to upload and view images.

![Image Gallery Application using Laravel](/screenshot.png "Laravel Image Gallery App")

# Requirements

-   PHP 8.1 or later
-   NodeJS and npm
-   PHP extensions according to Laravel.

### Getting Started

1. Clone the repository

```sh
git clone https://github.com/iRaziul/laravel-gallery-app.git
```

2. Change the directory

```sh
cd laravel-gallery-app
```

3. Install the dependencies:

```sh
composer install && npm install
```

4. Create a new database and configure the connection in `.env`
5. Migrate the database:

```sh
php artisan migrate
```

6. Seed the database with some sample data:

```sh
php artisan db:seed
```

7. Link the storage directory

```sh
php artisan storage:link
```

8. Build the assets

```sh
npm run build
```

9. Start the development server:

```sh
php artisan serve
```

### Contributing

This project is intended to be used for practice. Please create issues if you need new features or found any problems.

Contributions are welcome! Please fork the repository and submit a pull request with your changes.

### License

This project is licensed under the MIT License.

### Contact

If you have any questions or feedback, please contact me at [Twitter](https://twitter.com/raziulcse)
