# Arr Component
![version](https://img.shields.io/badge/version-1.2.0-brightgreen.svg?style=flat-square "Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-components/arr/blob/master/LICENSE)

The Array Component contains methods that can be useful when working with arrays.

### Installation

```
composer require flextype-components/arr
```

### Usage

```php
use Flextype\Component\Arr\Arr;
```

Subval sort
```php
$new_array = Arr::subvalSort($old_array, 'sort');
```

Sets an array value using "dot notation".
```php
Arr::set($array, 'foo.bar', 'value');
```

Return value from array using "dot notation".  
If the key does not exist in the array, the default value will be returned instead.
```php
$login = Arr::get($_POST, 'login');  

$array = array('foo' => 'bar');  
$foo = Arr::get($array, 'foo');  

$array = array('test' => array('foo' => 'bar'));  
$foo = Arr::get($array, 'test.foo');
```

Delete an array value using "dot notation".
```php
Arr::delete($array, 'foo.bar');
```

Checks if the given dot-notated key exists in the array.
```php  
if (Arr::keyExists($array, 'foo.bar')) {
    // Do something...
}
```

Returns a random value from an array.
```php
$random = Arr::random(array('php', 'js', 'css', 'html'));
```

Returns TRUE if the array is associative and FALSE if not.
```php
if (Arr::isAssoc($array)) {
    // Do something...
}
```

Returns TRUE if the array is associative and FALSE if not.
```php
$array1 = array('name' => 'john', 'mood' => 'happy', 'food' => 'bacon');
$array2 = array('name' => 'jack', 'food' => 'tacos', 'drink' => 'beer');

// Overwrite the values of $array1 with $array2
$array = Arr::overwrite($array1, $array2);

// The output of $array will now be:
array('name' => 'jack', 'mood' => 'happy', 'food' => 'tacos')
```

Converts an array to a JSON string
```php
$array = [
  'cat'  => 'miao',
  'dog'  => 'wuff',
  'bird' => 'tweet'
];

echo a::json($array);
// output: {"cat":"miao","dog":"wuff","bird":"tweet"}
```

Returns the first element of an array
```php
$array = [
  'cat',
  'dog',
  'bird',
];

$first = a::first($array);
// first: 'cat'
```

Returns the last element of an array
```php
$array = [
  'cat',
  'dog',
  'bird',
];

$last = a::last($array);
// first: 'bird'
```

## License
See [LICENSE](https://github.com/flextype-components/arr/blob/master/LICENSE)
