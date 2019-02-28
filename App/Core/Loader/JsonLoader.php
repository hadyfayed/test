<?php declare(strict_types=1);

namespace MediSoft\Loader;

use Puli\Repository\Api\Resource\FilesystemResource;

/**
 * Class JsonLoader
 * @package MediSoft\Loader
 */
class JsonLoader extends AbstractLoader
{
    /**
     * Return valid extension for this transformer
     * @return string
     */
    public function getExtension()
    {
        return 'json';
    }

    /**
     * Load config as Array from resource
     * @param FilesystemResource $resource
     * @return array|bool
     */
    public function load(FilesystemResource $resource)
    {
        if (!$this->validateExtension($resource)) {
            return false;
        }
        return $this->transform($resource);
    }

    /**
     * Transform resource into a config array
     * @param FilesystemResource $resource
     * @return array
     */
    public function transform(FilesystemResource $resource)
    {
        $config = json_decode($resource->getBody(), true);
        return $this->validateConfig($config) ? $config : [];
    }
}
