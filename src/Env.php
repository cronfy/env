<?php

namespace cronfy\env;

class Env {

    protected static $debug;

    /**
     * Helper function to get/set debug state
     * @param bool $value
     * @return bool
     */
    public static function isDebug($value = null) {
        if ($value !== null) {
            static::$debug = (bool) $value;
        }

        if (!is_null(static::$debug)) {
            return static::$debug;
        }

        return false;
    }

    protected static $vendorDir;

    /**
     * Helper function to get/set vendor directory
     * @param string $value
     * @return bool
     */
    public static function getVendorDir($value) {
        if (!$value !== null) {
            static::$vendorDir = $value;
        }

        return static::$vendorDir ?: dirname(dirname(dirname(__DIR__)));
    }

    static protected $_env;

    /**
     * Load environment data
     * @param array $data
     */
    public static function load($data) {
        static::$_env = $data;
    }

    /**
     * Get all environment
     * @return array
     */
    public static function export() {
        return static::$_env;
    }

    /**
     * Get environment variable
     *
     * @param $name
     * @param null $default
     * @return null
     * @throws \Exception
     */
    public static function get($name, $default = null) {
        if (!isset(static::$_env[$name])) {
            if (null === $default) {
                throw new \Exception("Environment variable $name is not set");
            } else {
                return $default;
            }
        }
        return static::$_env[$name];
    }

    /**
     * Set environment variable
     *
     * @param $name
     * @param mixed $value
     * @return mixed
     * @throws \Exception
     */
    public static function set($name, $value) {
        static::$_env[$name] = $value;
        return $value;
    }

}
