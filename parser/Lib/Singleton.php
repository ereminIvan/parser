<?php
namespace Parser\Lib;
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
    private function __construct(){}

    final public static function getInstance()
    {
        if(!isset(static::$instance)) {
            $class = new \ReflectionClass(__CLASS__);
            static::$instance = $class->newInstanceArgs(func_get_args());
        }

        return static::$instance;
    }
}