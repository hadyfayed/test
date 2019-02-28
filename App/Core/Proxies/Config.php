<?php declare(strict_types=1);

namespace MediSoft\Proxies;

use MediSoft\Factories\ConfigFactory;

/**
 * Class Config
 * @package MediSoft\Proxies
 */
class Config extends AbstractProxy
{
    /**
     * @return string
     */
    protected static function accessor()
    {
        return ConfigFactory::class;
    }
}
