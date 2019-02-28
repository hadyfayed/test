<?php declare(strict_types=1);

namespace MediSoft\Factories;

use MediSoft\AliasLoader;
use MediSoft\Interfaces\AliasLoaderInterface;
use MediSoft\Traits\Singleton;
use Psr\Container\ContainerInterface;

/**
 * Class ProxyFactory
 * @package MediSoft\Factories
 */
class ProxyFactory
{
    use Singleton;

    /**
     *
     */
    const ROOT_NAMESPACE_GLOBAL = false;
    /**
     *
     */
    const ROOT_NAMESPACE_ANY = true;


    /**
     * @var ContainerInterface
     */
    protected static $container = null;

    /**
     * @var AliasLoaderInterface
     */
    protected static $aliasLoader = null;

    /**
     * @param ContainerInterface $container Container that holds the actual instances
     * @return mixed
     */
    public static function set(ContainerInterface $container)
    {
        self::$container = $container;
        self::$aliasLoader = AliasLoader::instance();
        return self::instance();
    }

    /**
     * @return ContainerInterface
     */
    public static function getContainer()
    {
        return self::$container;
    }

    /**
     * @param ContainerInterface $container
     * @return mixed
     */
    public static function setContainer(ContainerInterface $container)
    {
        self::$container = $container;
        return self::instance();
    }

    /**
     * @param bool $rootNamespace
     * @return bool
     */
    public function enable($rootNamespace = self::ROOT_NAMESPACE_GLOBAL)
    {
        if (self::$aliasLoader->isRegistered()) {
            return true;
        }

        if (self::$aliasLoader->register($rootNamespace)) {
            ProxyFactory::setContainer(self::$container);
        }
        return self::$aliasLoader->isRegistered();
    }

    /**
     * @param $alias
     * @param $proxyFqcn
     * @return $this
     */
    public function addAlias($alias, $proxyFqcn)
    {
        self::$aliasLoader->addAlias($alias, $proxyFqcn);
        return $this;
    }
}
