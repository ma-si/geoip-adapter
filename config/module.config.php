<?php

/**
 * Geolocation GeoIp2 (http://mateuszsitek.com/projects/geolocation-geoip)
 *
 * @copyright Copyright (c) 2017-2018 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

return [
    'service_manager' => [
        'factories' => [
            \Aist\Geolocation\Adapter\AdapterInterface::class => \Aist\GeoIp2\Adapter\DbAdapterFactory::class,
            \GeoIp2\Database\Reader::class => \Aist\GeoIp2\Reader\ReaderFactory::class,
            \Aist\GeoIp2\Adapter\DbAdapter::class => \Aist\GeoIp2\Adapter\DbAdapterFactory::class,
        ],
    ],
];
