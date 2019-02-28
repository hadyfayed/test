<?php
/**
 * Copyright (c) 2019. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use MediSoft\Factories\ConfigFactory;
use MediSoft\Factories\ProxyFactory;

/**
 * Class ConfigServiceProvider
 * @package App\Providers
 */
class ProxyServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
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
        $container->share(ProxyFactory::class)
            ->addMethodCall('set', [$container]);

        $aliases = $container->get(ConfigFactory::class)->get('app.aliases');
        foreach ($aliases as $alias => $link) {
            $container->get(ProxyFactory::class)->addAlias($alias, $link);
        }
        ProxyFactory::instance()->enable(ProxyFactory::ROOT_NAMESPACE_ANY);
    }

    /**
     *
     */
    public function register()
    {
        // TODO: Implement register() method.
    }
}
