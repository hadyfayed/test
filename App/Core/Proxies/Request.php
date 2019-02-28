<?php declare(strict_types=1);

namespace MediSoft\Proxies;

/**
 * Class Request
 * @package MediSoft\Proxies
 */
class Request extends AbstractProxy
{
    /**
     * @return string
     */
    protected static function accessor()
    {
        return \Zend\Diactoros\ServerRequest::class;
    }
}
