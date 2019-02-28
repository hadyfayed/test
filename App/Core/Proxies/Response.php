<?php declare(strict_types=1);

namespace MediSoft\Proxies;

/**
 * Class Response
 * @package MediSoft\Proxies
 */
class Response extends AbstractProxy
{
    /**
     * @return string
     */
    protected static function accessor()
    {
        return \Zend\Diactoros\Response::class;
    }
}
