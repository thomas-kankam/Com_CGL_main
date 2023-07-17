# Laravel 8 Project README

This is a guide on how to get the Laravel 8 project up and running on your local machine. Follow the steps below to set up the project.

## Prerequisites

Before you begin, make sure you have the following installed on your machine:

-   PHP (version 7.4 or higher)
-   Composer
-   Node.js (version 14 or higher)
-   NPM
-   MySQL or any other compatible database

## Installation

1. Clone the repository to your local machine using Git:

```
git clone https://github.com/your-username/project-name.git
```

2. Change to the project directory:

```
cd project-name
```

3. Copy the `.env.example` file and rename it to `.env`:

```
cp .env.example .env
```

4. Update the `.env` file with your database credentials. Provide your database connection details in the following fields:

```
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. Install the project dependencies using Composer:

```
composer install
```

6. Generate the application key:

```
php artisan key:generate
```

7. Run the database migrations to set up the database schema:

```
php artisan migrate
```

8. (Optional) If your project includes seeders, run the database seeders to populate the database with sample data:

```
php artisan db:seed
```

9. Install the JavaScript dependencies using NPM:

```
npm install
```

10. Build the frontend assets:

```
npm run dev
```

## Running the Project

To start the project on your local machine, run the following command:

```
php artisan serve
```

This will start a local development server, and you will see the project running at `http://localhost:8000` in your web browser.

Note: If the default port `8000` is already in use, you can specify a different port by providing the `--port` flag followed by the desired port number.

Congratulations! The Laravel 8 project is now set up and running on your local machine. Feel free to explore the application and make any necessary modifications for your specific use case.
