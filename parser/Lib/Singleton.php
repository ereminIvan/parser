<?php
namespace Lib;
/**
 * Class Singleton
 *
 * @author Ivan Eremin <coding.ebola@gmail.com>
 */
trait Singleton
{
    protected static $instance;

    private function __clone(){}
    private function __wakeup(){}

    final public static function getInstance()
    {
        if(!isset(self::$instance)) {
            $class = new \ReflectionClass(__CLASS__);
            self::$instance = $class->newInstanceArgs(func_get_args());
        }

        return self::$instance;
    }
}