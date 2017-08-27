<?php
namespace Bok\Controller;
/**
 * Class Base
 */
class Base {

    protected static $instance;

    // private constructor
    private function __construct() { }

    public static function getInstance() {
        $class = get_called_class();
        if (!self::$instance[$class]) {
            self::$instance[$class] = new $class();
        }
        return self::$instance[$class];
    }
}