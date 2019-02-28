<?php declare(strict_types=1);

namespace MediSoft\Proxies;

use Exception;
use MediSoft\Factories\ProxyFactory;
use Psr\Container\ContainerInterface;

/**
 * Class AbstractProxy
 * @package MediSoft\Proxies
 */
abstract class AbstractProxy
{

    /**
     * Call from attached instance
     * @param $name
     * @param array $arguments
     * @return mixed
     * @throws Exception
     */
    public static function __callStatic($name, array $arguments = [])
    {
        $container = ProxyFactory::getContainer();
        $object = $container->get(static::accessor());
        if (!method_exists($object, $name)) {
            throw static::getProxyException($name, $arguments);
        }
        // Try to avoid `call_user_func_array()`, it is very slow.
        switch (count($arguments)) {
            case 0:
                return $object->$name();
            case 1:
                return $object->$name($arguments[0]);
            case 2:
                return $object->$name($arguments[0], $arguments[1]);
            case 3:
                return $object->$name($arguments[0], $arguments[1], $arguments[2]);
            case 4:
                return $object->$name($arguments[0], $arguments[1], $arguments[2], $arguments[3]);
            default:
                return call_user_func_array(
                    [$object, $name],
                    $arguments
                );
        }
    }

    /**
     * Accessor name
     * @return string
     * @throws Exception
     */
    protected static function accessor()
    {
        throw new Exception(sprintf('Unknown accessor in %s', static::class));
    }

    /**
     * @param string $method
     * @param array $arguments
     * @return Exception
     */
    protected static function getProxyException(string $method, array $arguments): Exception
    {
        return new \Exception(
            sprintf(
                'Call to undefined method "%1$s" on class "%2$s" with arguments "%3$s".',
                $method,
                get_class(),
                json_encode($arguments)
            )
        );
    }

    /**
     * Get attached instance
     * @return mixed
     * @throws Exception
     */
    public static function __instance()
    {
        if (!(ProxyFactory::getContainer() instanceof ContainerInterface)) {
            throw new \RuntimeException('The Proxy Subject cannot be retrieved because the Container is not set.');
        }

        return ProxyFactory::getContainer()->get(static::accessor());
    }
}
