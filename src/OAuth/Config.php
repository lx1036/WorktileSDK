<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/2
 * Time: 22:11
 */

namespace Worktile\OAuth;

class Config
{
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * Get an item from an array using "dot" notation.
     * @param $key
     * @param null $default
     * @return null
     */
    public function get($key, $default = null)
    {
        if (is_null($key)) {
            return $this->config;
        }

        if (isset($this->config[$key])) {
            return $this->config[$key];
        }

        foreach (explode('.', $key) as $segment) {
            if (! is_array($this->config) || ! array_key_exists($segment, $this->config)) {
                return $default;
            }
            $this->config = $this->config[$segment];
        }

        return $this->config;
    }
}
