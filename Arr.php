<?php

/**
 * @package Flextype Components
 *
 * @author Sergey Romanenko <awilum@yandex.ru>
 * @link http://components.flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Component\Arr;

class Arr
{
    /**
     * Subval sort
     *
     * $new_array = Arr::subvalSort($old_array, 'sort');
     *
     * @param  array  $array  Array
     * @param  string $subkey Key
     * @param  string $order  Order type DESC or ASC
     * @return array
     */
     public static function subvalSort(array $array, string $subkey, string $order = 'ASC') : array
     {
         if (count($array) != 0 || (!empty($array))) {
             foreach ($array as $k => $v) {
                 $b[$k] = function_exists('mb_strtolower') ? mb_strtolower($v[$subkey]) : strtolower($v[$subkey]);
             }
             if ($order == null || $order == 'ASC') {
                 asort($b);
             } elseif ($order == 'DESC') {
                 arsort($b);
             }
             foreach ($b as $key => $val) {
                 $c[] = $a[$key];
             }
             return $c;
         }
     }

    /**
     * Sets an array value using "dot notation".
     *
     * Arr::set($array, 'foo.bar', 'value');
     *
     * @access  public
     * @param   array    $array  Array you want to modify
     * @param   string   $path   Array path
     * @param   mixed    $value  Value to set
     */
    public static function set(array &$array, string $path, $value)
    {
        // Get segments from path
        $segments = explode('.', $path);

        // Loop through segments
        while (count($segments) > 1) {
            $segment = array_shift($segments);
            if (!isset($array[$segment]) || !is_array($array[$segment])) {
                $array[$segment] = [];
            }
            $array =& $array[$segment];
        }
        $array[array_shift($segments)] = $value;
    }

    /**
     * Returns value from array using "dot notation".
     * If the key does not exist in the array, the default value will be returned instead.
     *
     * $login = Arr::get($_POST, 'login');
     *
     * $array = array('foo' => 'bar');
     * $foo = Arr::get($array, 'foo');
     *
     * $array = array('test' => array('foo' => 'bar'));
     * $foo = Arr::get($array, 'test.foo');
     *
     * @param  array  $array   Array to extract from
     * @param  string $path    Array path
     * @param  mixed  $default Default value
     * @return mixed
     */
    public static function get(array $array, string $path, $default = null)
    {
        // Get segments from path
        $segments = explode('.', $path);

        // Loop through segments
        foreach ($segments as $segment) {

            // Check
            if (! is_array($array) || !isset($array[$segment])) {
                return $default;
            }

            // Write
            $array = $array[$segment];
        }

        // Return
        return $array;
    }

    /**
     * Deletes an array value using "dot notation".
     *
     * Arr::delete($array, 'foo.bar');
     *
     * @access  public
     * @param  array   $array Array you want to modify
     * @param  string  $path  Array path
     * @return boolean
     */
    public static function delete(array &$array, string $path) : bool
    {
        // Get segments from path
        $segments = explode('.', $path);

        // Loop through segments
        while (count($segments) > 1) {
            $segment = array_shift($segments);

            if (! isset($array[$segment]) || !is_array($array[$segment])) {
                return false;
            }

            $array =& $array[$segment];
        }

        unset($array[array_shift($segments)]);

        return true;
    }

    /**
     * Checks if the given dot-notated key exists in the array.
     *
     * if (Arr::keyExists($array, 'foo.bar')) {
     *     // Do something...
     * }
     *
     * @param  array   $array The search array
     * @param  mixed   $path  Array path
     * @return boolean
     */
    public static function keyExists(array $array, $path) : bool
    {
        foreach (explode('.', $path) as $segment) {
            if (! is_array($array) or ! array_key_exists($segment, $array)) {
                return false;
            }

            $array = $array[$segment];
        }

        return true;
    }

    /**
     * Returns a random value from an array.
     *
     * Arr::random(array('php', 'js', 'css', 'html'));
     *
     * @access  public
     * @param  array $array Array path
     * @return mixed
     */
    public static function random(array $array)
    {
        return $array[array_rand($array)];
    }

    /**
     * Returns TRUE if the array is associative and FALSE if not.
     *
     * if (Arr::isAssoc($array)) {
     *     // Do something...
     * }
     *
     * @param  array   $array Array to check
     * @return boolean
     */
    public static function isAssoc(array $array) : bool
    {
        return (bool) count(array_filter(array_keys($array), 'is_string'));
    }


    /**
    * Overwrites an array with values from input arrays.
    * Keys that do not exist in the first array will not be added!
    *
    * $array1 = array('name' => 'john', 'mood' => 'happy', 'food' => 'bacon');
    * $array2 = array('name' => 'jack', 'food' => 'tacos', 'drink' => 'beer');
    *
    * // Overwrite the values of $array1 with $array2
    * $array = Arr::overwrite($array1, $array2);
    *
    * // The output of $array will now be:
    * array('name' => 'jack', 'mood' => 'happy', 'food' => 'tacos')
    *
    * @param   array   $array1 master array
    * @param   array   $array2 input arrays that will overwrite existing values
    * @return  array
    */
    public static function overwrite(array $array1, array $array2) : array
    {
        foreach (array_intersect_key($array2, $array1) as $key => $value) {
            $array1[$key] = $value;
        }

        if (func_num_args() > 2) {
            foreach (array_slice(func_get_args(), 2) as $array2) {
                foreach (array_intersect_key($array2, $array1) as $key => $value) {
                    $array1[$key] = $value;
                }
            }
        }

        return $array1;
    }
}
