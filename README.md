# Promise Component Config

> Manage Promise configuration by persistent storage.

## Installing

```
composer require ofcold/component-config
```

## Useing

```php

$config = new Promise\Component\Config\Repository

// Set initial configuration items
$config->addNamespace('your-path');

// Add a namespace to configuration.
$config->addNamespace(__DIR__ '/your-path/foo', 'user');

// Get a config item.
$config->get('foo');

// Get a namespace config item.
$config->get('user::foo.bar');
```

## Api

| Method | Description |
| :-----| :--------- |
| addNamespace(string $directory, ?string $namespace = null): void | Add a namespace to configuration. |
| has($key): bool | Determine if the given configuration value exists. |
| get($key, $default = null) |Get the specified configuration value. |
| getMany(array $keys): array | Get many configuration values. |
| set($key, $value = null): void |  Set a given configuration value. |
| prepend($key, $value): void |  Prepend a value onto an array configuration value. |
| push($key, $value): void |  Push a value onto an array configuration value. |
| all(): array |  Get all of the configuration items for the application.. |
