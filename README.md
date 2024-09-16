# Php Validation

A php package for validation.

## Installation

Install via composer

```bash 
composer require shoyim/php-validation
```

## Usage

```php

require 'vendor/autoload.php';

use Shoyim\PhpValidation\Validator;

$params = [
    'username' => 'shoyimobloqulov',
    'email' => 'admin@gmail.com',
    'password' => '123'
];

$validateRules = [
    'email' => 'required|email',
    'username' => 'required|string|min:5|max:10',
    'password' => 'required|password'
];

$validator = new Validator();
$validator->validate($validateRules, $params);

var_dump($validator->fails());
var_dump($validator->getErrors());

```
