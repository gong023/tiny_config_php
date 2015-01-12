<?php

namespace TinyConfig;

/**
 * Class TinyConfig
 *
 * @package TinyConfig
 */
class TinyConfig
{
    private static $config = [];

    /**
     * @param string $key
     * @param mixed  $value
     */
    public static function set($key, $value)
    {
        static::$config[$key] = $value;
    }

    /**
     * @param  string                   $key
     * @return mixed
     * @throws TinyConfigEmptyException
     */
    public static function get($key)
    {
        if (! self::has($key)) {
            throw new TinyConfigEmptyException();
        }

        return static::$config[$key];
    }

    /**
     * @param  string $key
     * @return bool
     */
    public static function has($key)
    {
        return array_key_exists($key, static::$config);
    }

    /**
     * @return array
     */
    public static function getAll()
    {
        return static::$config;
    }

    /**
     * @return array
     */
    public static function getKeys()
    {
        return array_keys(static::$config);
    }

    /**
     * @param string $key
     */
    public static function delete($key)
    {
        if (self::has($key)) {
            unset(static::$config[$key]);
        }
    }

    public static function deleteAll()
    {
        foreach (self::getKeys() as $key) {
            self::delete($key);
        }
    }
}
