# PHP environment

Provides framework agnostic access to environment data, that can be loaded as array.

Example:

```php
// any environment loader can be used, we just need $anvironment to be an array
$environment = (new josegonzalez\Dotenv\Loader(__DIR__ . '/.env'))
    ->parse()
    ->toArray();

// load envirinment data
Env::load($environment);

// use environment variables
echo Env::get('MYSQL_USER');

// set variables
Env::set('MYSQL_USER', 'value');
```
