<?php declare(strict_types=1);

namespace MediSoft\Traits;

use MediSoft\Exceptions\SingletonException;

/**
 * Trait Singleton
 * @package MediSoft\Traits
 */
trait Singleton
{
    /**
     * @return mixed
     */
    public static function instance()
    {
        static $instance;
        $calledClass = get_called_class();
        if (is_null($instance) || !isset($instance)) {
            $instance = new $calledClass;
        }
        return $instance;
    }

    /**
     * @throws SingletonException
     */
    final public function __clone()
    {
        throw new SingletonException('You can not clone a singleton.');
    }

    /**
     * @throws SingletonException
     */
    final public function __sleep()
    {
        throw new SingletonException('You can not serialize a singleton.');
    }

    /**
     * @throws SingletonException
     */
    final public function __wakeup()
    {
        throw new SingletonException('You can not deserialize a singleton.');
    }
}
