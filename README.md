# PHP Framework

## Installation:
Clone repository
```
git@github.com:philipphermes/php-framework.git
```
Install Dependency's
```
composer install
```

## Controllers:

create a new controller

```php
class Controller extends AbstractController
{
    public function __construct(TwigInterface $twig, ContainerInterface $container)
    {
        parent::__construct($twig, $container);
    }

    public function display(array $slugList): void
    {
        self::setTemplate('templateName');
        self::addParameter('slug', $slugList['slugName']);
        self::render();
    }

    public static function getRoute(): string
    {
        return '/your/url/path/{slugName}';
    }
}
```

add controller to [ControllerProvider]("https://github.com/philipphermes/php-framework/blob/main/src/Provider/ControllerProvider.php")

```php
class ControllerProvider implements ControllerProviderInterface
{
    /**
     * @return array<array-key, string>
     */
    public function getList(): array
    {
        return [
            Controller::class,
        ];
    }
}
```

## Dependency's

The Dependency's added here will be loaded in all Controllers

```php
class DependencyProvider implements DependencyProviderInterface
{
    public function __construct(
        private readonly ContainerInterface $container,
    )
    {
    }

    public function load(): void
    {
         $this->container->set(TestClass:class, new TestClass());
    }
}
```

## Templates

* Add templates to the /templates folder
* file extension: .html.twig
* Twig documentation: https://twig.symfony.com/doc/3.x/

## Env

* Add your env vars to the .env
* Varnames containing PATH will be changed like this
  * In env: `TWIG_TEMPLATE_PATH=/templates`
  * Changed to: `/home/user/PhpStorm/php-framework/src/Core/../../templates`
