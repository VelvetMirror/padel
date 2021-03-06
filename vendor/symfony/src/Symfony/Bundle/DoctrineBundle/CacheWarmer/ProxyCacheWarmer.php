<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bundle\DoctrineBundle\CacheWarmer;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerInterface;

/**
 * The proxy generator cache warmer generates all entity proxies.
 *
 * In the process of generating proxies the cache for all the metadata is primed also,
 * since this information is necessary to build the proxies in the first place.
 *
 * @author Benjamin Eberlei <kontakt@beberlei.de>
 */
class ProxyCacheWarmer implements CacheWarmerInterface
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * This cache warmer is not optional, without proxies fatal error occurs!
     *
     * @return false
     */
    public function isOptional()
    {
        return false;
    }

    public function warmUp($cacheDir)
    {
        // we need the directory no matter the proxy cache generation strategy.
        $proxyCacheDir = $this->container->getParameter('doctrine.orm.proxy_dir');
        if (!file_exists($proxyCacheDir)) {
            if (false === @mkdir($proxyCacheDir, 0777, true)) {
                throw new \RuntimeException(sprintf('Unable to create the Doctrine Proxy directory (%s)', dirname($proxyCacheDir)));
            }
        } else if (!is_writable($proxyCacheDir)) {
            throw new \RuntimeException(sprintf('Doctrine Proxy directory (%s) is not writeable for the current system user.', $proxyCacheDir));
        }

        // if proxies are autogenerated we don't need to generate them in the cache warmer.
        if ($this->container->getParameter('doctrine.orm.auto_generate_proxy_classes') === true) {
            return;
        }

        foreach ($this->container->get('doctrine')->getEntityManagerNames() as $id) {
            $em = $this->container->get($id);
            $classes = $em->getMetadataFactory()->getAllMetadata();
            $em->getProxyFactory()->generateProxyClasses($classes);
        }
    }
}
