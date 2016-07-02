<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/2
 * Time: 21:26
 */

namespace Worktile\Support;

class Arr
{
    /**
     * Get an item from an array using "dot" notation.
     * @param $array
     * @param $key
     * @param null $default
     * @return mixed
     */
    public static function get($array, $key, $default = null)
    {
        if (is_null($key)) {
            return $array;
        }

        if (isset($array[$key])) {
            return $array[$key];
        }

        foreach (explode('.', $key) as $segment) {
            if (! is_array($array) || ! array_key_exists($segment, $array)) {
                return $default;
            }
            $array = $array[$segment];
        }

        return $array;
    }
}
