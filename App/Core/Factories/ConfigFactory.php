<?php declare(strict_types=1);

namespace MediSoft\Factories;

use MediSoft\Loader\JsonLoader;
use MediSoft\Loader\PhpLoader;
use MediSoft\Traits\Singleton;
use Puli\Repository\FilesystemRepository;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

/**
 * Class ConfigFactory
 * @package MediSoft\Factories
 */
class ConfigFactory
{
    use Singleton;

    /**
     * @var ConfigLocatorFactory
     */
    protected $base_path;

    /**
     * @param $repository
     * @return $this
     */
    public function create($repository)
    {
        if (is_string($repository)) {
            clearstatcache(true);
            if (!is_dir($repository)) {
                throw new FileNotFoundException($repository);
            }
            $repository = new FilesystemRepository($repository);
        }
        //if there is no valid instance cancel creation
        if (!($repository instanceof FilesystemRepository)) {
            throw new \RuntimeException(sprintf('Expected instance of FilesystemRepository. %s given', get_class($repository)));
        }
        $this->base_path = new ConfigLocatorFactory($repository);
        return $this;
    }

    /**
     * @param $path
     * @return array|mixed|string
     */
    public function get($path)
    {
        $file = strtok($path, '.');
        $path = preg_replace('/^' . preg_quote($file . '.') . '/', '', $path);
        $loader = $this->load('/' . $file . '.php');
        if (!is_array($loader)) {
            return '';
        }
        if (is_null($path)) {
            return $loader;
        }
        if (array_key_exists($path, $loader)) {
            return $loader[$path];
        }
        foreach (explode('.', $path) as $segment) {
            if (isset($loader[$segment])) {
                $loader = &$loader[$segment];
            } else {
                return '';
            }
        }
        return $loader;
    }

    /**
     * @param $path
     * @param array $loaders
     * @param array $config
     * @return array
     */
    public function load($path, array $loaders = [], array $config = [])
    {
        $resource = $this->base_path->locate($path);
        if (count($loaders) < 1) {
            $loaders = [
                new PhpLoader(),
                new JsonLoader()
            ];
        }
        foreach ($loaders as $loader) {
            if (pathinfo($resource->getPath(), PATHINFO_EXTENSION) !== $loader->getExtension()) {
                continue;
            }
            $config = $loader->load($resource);
            break;
        }
        return $config;
    }
}
