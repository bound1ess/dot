# Dot

[![Build Status](https://travis-ci.org/bound1ess/dot.svg?branch=master)](https://travis-ci.org/bound1ess/dot)

Dot notation in PHP made simple.

## Installation

```shell
composer require bound1ess/dot:~1
```

## Usage

```php
$data = new Bound1ess\Dot([
    'foo' => [
        'bar' => 42,
        'baz' => null,
    ],    
]);

echo $data['foo.bar']; // 42

var_dump(isset ($data['foo.baz'])); // true

unset ($data['foo.bar']);

$data['foo.some.path'] = false;

var_dump($data->toArray()); // ['foo' => ['some' => ['path' => false], 'baz' => null]]
```

## License

The MIT license (see `LICENSE` file for more details).
