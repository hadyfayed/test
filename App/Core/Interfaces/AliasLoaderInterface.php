<?php declare(strict_types=1);

namespace MediSoft\Interfaces;

/**
 * Interface AliasLoaderInterface
 * @package MediSoft\Interfaces
 */
interface AliasLoaderInterface
{
    /**
     * @param $alias
     * @param $fqcn
     * @return mixed
     */
    public function addAlias($alias, $fqcn);

    /**
     * @return mixed
     */
    public function isRegistered();

    /**
     * @param $fqcn
     * @return mixed
     */
    public function load($fqcn);

    /**
     * @param bool $rootNamespace
     * @return mixed
     */
    public function register($rootNamespace = false);
}
