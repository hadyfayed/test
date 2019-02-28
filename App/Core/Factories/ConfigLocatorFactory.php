<?php declare(strict_types=1);

namespace MediSoft\Factories;

use Puli\Repository\Api\Resource\FilesystemResource;
use Puli\Repository\FilesystemRepository;

/**
 * Class ConfigLocatorFactory
 * @package MediSoft\Factories
 */
class ConfigLocatorFactory
{
    /**
     * @var FilesystemRepository
     */
    private $repository;

    /**
     * Create locator by assign a repository instance
     * @param FilesystemRepository $repository
     */
    public function __construct(FilesystemRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Locate config files from path.
     * @param $path
     * @return FilesystemResource|bool
     */
    public function locate($path)
    {
        $repository = $this->getRepository();
        if (!$repository->contains($path)) {
            throw new \InvalidArgumentException(sprintf('Their is no path %s in repository.', $path));
        }
        $resource = $repository->get($path);
        if (!($resource instanceof FilesystemResource)) {
            throw new \RuntimeException(['Expect %s! %s given', FilesystemResource::class, get_class($resource)]);
        }
        return $resource;
    }

    /**
     * @return FilesystemRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }
}
