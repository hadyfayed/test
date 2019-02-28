<?php declare(strict_types=1);

namespace MediSoft\Proxies;

/**
 * Class Emitter
 * @package MediSoft\Proxies
 */
class Emitter extends AbstractProxy
{
    /**
     * @return string
     */
    protected static function accessor()
    {
        return \Zend\HttpHandlerRunner\Emitter\SapiEmitter::class;
    }
}
