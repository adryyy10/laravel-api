# Laravel API

This Laravel project is designed to demonstrate how to fetch user data from the [Reqres API](https://reqres.in/) and insert them into a Laravel User model. Additionally, it incorporates various development tools and libraries, including [phpstan](https://phpstan.org/), [CircleCI](https://circleci.com/), [PHPUnit](https://phpunit.de/), and [Laravel Breeze](https://laravel.com/docs/8.x/starter-kits#breeze).

## Getting Started

Follow these instructions to set up and run the project on your local machine.

### Prerequisites

Before you begin, make sure you have the following prerequisites installed:

- [Composer](https://getcomposer.org/) - Dependency manager for PHP
- [PHP](https://www.php.net/downloads.php) - PHP 8.1 or higher

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/adryyy10/laravel-api.git
   ```
2. Dependencies:
   ```bash
   cd laravel-api
   composer install
   ```
3. Import users/resources from API to local DB:
   ```bash
   php artisan app:get-api-users
   php artisan app:get-api-resources
   ```
4. Run tests:
   ```bash
   php artisan test
   ```
5. Phpstan:
   ```bash
   ./vendor/bin/phpstan analyse --memory-limit=2G
   ```

6. Continuous Integration with CircleCI
   
    This project is configured for continuous integration with CircleCI. The configuration can be found in the .circleci/config.yml file.

### Author
Adria

### Contact
If you have any questions or need assistance, you can contact me at adriafigueresgarciauk@gmail.com.
