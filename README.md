<h1 align="center">Arrays Component</h1>

<p align="center">
<a href="https://github.com/flextype-components/arrays/releases"><img alt="Version" src="https://img.shields.io/github/release/flextype-components/arrays.svg?label=version&color=green"></a> <a href="https://github.com/flextype-components/arrays"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=green" alt="License"></a> <a href="https://github.com/flextype-components/arrays"><img src="https://img.shields.io/github/downloads/flextype-components/arrays/total.svg?color=green" alt="Total downloads"></a> <a href="https://scrutinizer-ci.com/g/flextype-components/arrays?branch=master"><img src="https://img.shields.io/scrutinizer/g/flextype-components/arrays.svg?branch=master&color=green" alt="Quality Score"></a>
</p>
<br>

### Installation

With [Composer](https://getcomposer.org):

```
composer require flextype-components/arrays
```

### Usage

```php
use Flextype\Component\Arrays;
```

### Methods

| Method | Helper Function | Description |
|---|---|--|
| <a href="#array_set">`Arrays::set()`</a> | <a href="#array_set">`array_set()`</a> | Set an array item to a given value using "dot" notation. If no key is given to the method, the entire array will be replaced. |
| <a href="#array_get">`Arrays::get()`</a> | <a href="#array_get">`array_get()`</a> | Returns value from array using "dot notation". If the key does not exist in the array, the default value will be returned instead. |
| <a href="#array_delete">`Arrays::delete()`</a> | <a href="#array_delete">`array_delete()`</a> | Deletes an array value using "dot notation". |
| <a href="#array_has">`Arrays::has()`</a> | <a href="#array_has">`array_has()`</a> | Checks if the given dot-notated key exists in the array. |
| <a href="#array_dot">`Arrays::dot()`</a> | <a href="#array_dot">`array_dot()`</a> | Flatten a multi-dimensional associative array with dots. |
| <a href="#array_undot">`Arrays::undot()`</a> | <a href="#array_undot">`array_undot()`</a> | Expands a dot notation array into a full multi-dimensional array. |

<hr>

#### <a name="array_set"></a> Method: `Arrays::set()` Helper function: `array_set()`

Set an array item to a given value using "dot" notation. If no key is given to the method, the entire array will be replaced.

```php
Arrays::set($array, 'movies.the-thin-red-line.title', 'The Thin Red Line');
```

#### <a name="array_get"></a> Method: `Arrays::get()` Helper function: `array_get()`

Returns value from array using "dot notation".
If the key does not exist in the array, the default value will be returned instead.

```php
Arrays::get($array, 'movies.the-thin-red-line.title')
```

#### <a name="array_delete"></a> Method: `Arrays::delete()` Helper function: `array_delete()`

Deletes an array value using "dot notation".

```php
Arrays::delete($array, 'movies.the-thin-red-line');
```

#### <a name="array_has"></a> Method: `Arrays::has()` Helper function: `array_has()`

Checks if the given dot-notated key exists in the array.

```php
if (Arrays::has($array, 'movies.the-thin-red-line')) {
    // Do something...
}
```


#### <a name="array_dot"></a> Method: `Arrays::dot()` Helper function: `array_dot()`

Flatten a multi-dimensional associative array with dots.

```php
$array = [
            'movies' => [
                'the_thin_red_line' => [
                    'title' => 'The Thin Red Line',
                    'directed_by' => 'Terrence Malick',
                    'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                    'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.',
                ],
            ],
         ];

$newArray = Arrays::dot($array);
```


#### <a name="array_undot"></a> Method: `Arrays::undot()` Helper function: `array_undot()`

Expands a dot notation array into a full multi-dimensional array.

```php
$array = [
            'movies.the_thin_red_line.title' => 'The Thin Red Line',
            'movies.the_thin_red_line.directed_by' => 'Terrence Malick',
            'movies.the_thin_red_line.produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
            'movies.the_thin_red_line.decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.',
         ];

$newArray = Arrays::undot($array);
```

### License
[The MIT License (MIT)](https://github.com/flextype-components/arrays/blob/master/LICENSE.txt)
Copyright (c) 2020 [Sergey Romanenko](https://github.com/Awilum)
