<?php

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use MediSoft\Factories\ConfigFactory;

/**
 * Class ConfigServiceProvider
 * @package App\Providers
 */
class ConfigServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    /**
     * @var array
     */
    protected $provides = [
        // ...
    ];

    /**
     * Method will be invoked on registration of a service provider implementing
     * this interface. Provides ability for eager loading of Service Providers.
     *
     * @return void
     */
    public function boot()
    {
        $container = $this->getContainer();
        $container->share(ConfigFactory::class)
            ->addMethodCall('create', [base_path('config')]);
        $providers = $container->get(ConfigFactory::class)->get('app.providers');
        foreach ($providers as $provider) {
            $container->addServiceProvider($provider);
        }
    }

    /**
     *
     */
    public function register()
    {
        // TODO: Implement register() method.
    }
}
