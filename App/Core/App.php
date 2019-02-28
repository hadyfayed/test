<?php declare(strict_types=1);

namespace MediSoft;

use App\Providers\ConfigServiceProvider;
use App\Providers\ProxyServiceProvider;
use MediSoft\Traits\Singleton;

/**
 * Class App
 * @package MediSoft
 */
class App
{
    use Singleton;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $container = new \League\Container\Container;
        $container->delegate(new \League\Container\ReflectionContainer);

        $container->addServiceProvider(ConfigServiceProvider::class);
        $container->addServiceProvider(ProxyServiceProvider::class);

        $container->share(\League\Route\Router::class);
        return $container;
    }

    /**
     *
     */
    public static function run()
    {
        /* @var \Zend\HttpHandlerRunner\Emitter\SapiEmitter::class */
        Emitter::emit(
            /* @var \League\Route\Route::class */
            Router::dispatch(
                Request::__instance()
            )
        );
    }
}
