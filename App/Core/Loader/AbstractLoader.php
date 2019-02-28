<?php declare(strict_types=1);

namespace MediSoft\Loader;

use Puli\Repository\Api\Resource\FilesystemResource;

/**
 * Class AbstractLoader
 * @package MediSoft\Loader
 */
abstract class AbstractLoader
{
    /**
     * Validate extension
     * @param FilesystemResource $resource
     * @return bool
     */
    public function validateExtension(FilesystemResource $resource)
    {
        return pathinfo($resource->getPath(), PATHINFO_EXTENSION) === $this->getExtension();
    }

    /**
     * Validate config. Config should be an array
     * @param $config
     * @return bool
     */
    public function validateConfig($config)
    {
        return is_array($config);
    }
}
