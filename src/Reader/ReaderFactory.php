<?php

/**
 * Geolocation GeoIp2 (http://mateuszsitek.com/projects/geolocation-geoip)
 *
 * @copyright Copyright (c) 2017-2018 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\GeoIp2\Reader;

use Aist\GeoIp2\Exceptions\InvalidParameterException;
use GeoIp2\Database\Reader;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ReaderFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return Reader|object
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException
     * @throws InvalidParameterException
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');

        if (empty($config['geoip']['source'])) {
            throw new InvalidParameterException('Source is not defined');
        }

        $adapter = new Reader($config['geoip']['source']);

        return $adapter;
    }

    /**
     * Backwards-compatibility
     *
     * @param ServiceLocatorInterface $container
     * @return Reader|object
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException
     * @throws InvalidParameterException
     */
    public function createService(ServiceLocatorInterface $container)
    {
        return $this($container, Reader::class);
    }
}
