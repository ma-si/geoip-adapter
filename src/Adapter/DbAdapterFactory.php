<?php

/**
 * Geolocation GeoIp2 (http://mateuszsitek.com/projects/geolocation-geoip)
 *
 * @copyright Copyright (c) 2017-2018 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\GeoIp2\Adapter;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DbAdapterFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $client = $container->get(\GeoIp2\Database\Reader::class);
        $adapter = new DbAdapter($client);

        return $adapter;
    }

    /**
     * Backwards-compatibility
     *
     * @param ServiceLocatorInterface $container
     * @return DbAdapter|object
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function createService(ServiceLocatorInterface $container)
    {
        return $this($container, DbAdapter::class);
    }
}
