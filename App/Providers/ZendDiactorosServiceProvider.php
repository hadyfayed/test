<?php

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

/**
 * Class ZendDiactorosServiceProvider
 * @package App\Providers
 */
class ZendDiactorosServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    /**
     * @var array
     */
    protected $provides = [
        Response::class,
        SapiEmitter::class,
        ServerRequest::class
    ];

    /**
     *
     */
    public function register()
    {
    }

    /**
     * Method will be invoked on registration of a service provider implementing
     * this interface. Provides ability for eager loading of Service Providers.
     *
     * @return void
     */
    public function boot()
    {
        $this->getContainer()->share(Response::class);
        $this->getContainer()->share(SapiEmitter::class);
        $this->getContainer()->share(ServerRequest::class, function () {
            return ServerRequestFactory::fromGlobals(
                $_SERVER,
                $_GET,
                $_POST,
                $_COOKIE,
                $_FILES
            );
        });
    }
}
