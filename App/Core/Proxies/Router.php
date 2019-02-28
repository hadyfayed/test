<?php declare(strict_types=1);

namespace MediSoft\Proxies;

/**
 * Class Router
 * @package MediSoft\Proxies
 */
class Router extends AbstractProxy
{
    /**
     * @return string
     */
    protected static function accessor()
    {
        return \League\Route\Router::class;
    }
}
