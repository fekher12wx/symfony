# 🎼 Symfony Learning Hub

A collection of Symfony PHP framework projects, examples, and learning resources.


## 🚀 About

This repository contains various Symfony applications, examples, and experiments for learning the Symfony PHP framework - from basic concepts to advanced implementations.

## ✨ What's Included

- **Basic Examples** - Core Symfony concepts and components
- **Web Applications** - Full-featured Symfony web apps
- **API Development** - REST APIs using Symfony
- **Database Integration** - Doctrine ORM examples
- **Security Examples** - Authentication and authorization
- **Testing** - PHPUnit testing examples

## 🛠️ Technologies

- **PHP** 8.1+
- **Symfony** 6.x/7.x
- **Doctrine ORM** - Database abstraction layer
- **Twig** - Template engine
- **MySQL/PostgreSQL** - Database systems
- **PHPUnit** - Testing framework
- **Composer** - Dependency management

## 🚀 Quick Start

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL/PostgreSQL (optional)
- Symfony CLI (recommended)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/fekher12wx/symfony.git
   cd symfony
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure environment**
   ```bash
   cp .env .env.local
   # Edit .env.local with your database credentials
   ```

4. **Set up database** (if using)
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

5. **Start the server**
   ```bash
   symfony serve
   # or
   php bin/console server:run
   ```

6. **Visit** http://localhost:8000

## 📁 Project Structure

```
symfony/
├── config/             # Configuration files
├── migrations/         # Database migrations
├── public/            # Web root directory
├── src/               # Application source code
│   ├── Controller/    # Controllers
│   ├── Entity/        # Doctrine entities
│   ├── Form/          # Form types
│   ├── Repository/    # Database repositories
│   └── Service/       # Business logic services
├── templates/         # Twig templates
├── tests/            # PHPUnit tests
├── var/              # Cache and logs
├── vendor/           # Composer dependencies
├── .env              # Environment variables
└── composer.json     # Dependencies
```

## 🎯 Learning Topics

### Core Concepts
- **Routing** - URL routing and controllers
- **Controllers** - Handling HTTP requests
- **Templates** - Twig templating engine
- **Services** - Dependency injection container
- **Configuration** - YAML, XML, and PHP configuration

### Database & Forms
- **Doctrine ORM** - Object-relational mapping
- **Forms** - Form creation and validation
- **Validation** - Data validation constraints
- **Security** - Authentication and authorization

### Advanced Topics
- **Events** - Event dispatcher and listeners
- **Commands** - Console commands
- **Testing** - Unit and functional testing
- **Performance** - Caching and optimization

## 💡 Key Examples

### Simple Controller
```php
<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'message' => 'Welcome to Symfony!'
        ]);
    }
}
```

### Entity Example
```php
<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private string $email;

    // Getters and setters...
}
```

## 🧪 Testing

```bash
# Run all tests
php bin/phpunit

# Run specific test
php bin/phpunit tests/Controller/HomeControllerTest.php

# Run with coverage
php bin/phpunit --coverage-html coverage
```

## 🚀 Deployment

### Production Setup
```bash
# Set environment to prod
echo 'APP_ENV=prod' > .env.local

# Clear and warm up cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

# Install production dependencies
composer install --no-dev --optimize-autoloader
```

## 📚 Resources

- [Symfony Documentation](https://symfony.com/doc/current/index.html)
- [Symfony Best Practices](https://symfony.com/doc/current/best_practices.html)
- [Doctrine ORM Documentation](https://www.doctrine-project.org/projects/orm.html)
- [Twig Documentation](https://twig.symfony.com/doc/)

## 🎯 Common Commands

```bash
# Create a new controller
php bin/console make:controller ProductController

# Create an entity
php bin/console make:entity Product

# Generate migration
php bin/console make:migration

# Run migrations
php bin/console doctrine:migrations:migrate

# Load fixtures
php bin/console doctrine:fixtures:load

# Clear cache
php bin/console cache:clear
```

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/new-example`)
3. Commit your changes (`git commit -m 'Add new Symfony example'`)
4. Push to the branch (`git push origin feature/new-example`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License.

---

**Happy Symfony Learning! 🎼**

*Building robust web applications with PHP*
