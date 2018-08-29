<?php

/**
 * Geolocation GeoIp2 (http://mateuszsitek.com/projects/geolocation-geoip)
 *
 * @copyright Copyright (c) 2017-2018 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\GeoIp2\Adapter;

use Aist\Geolocation\Entity\Location;
use GeoIp2\Exception\AddressNotFoundException;
use MaxMind\Db\Reader;

class DbAdapter implements \Aist\Geolocation\Adapter\AdapterInterface
{
    /**
     * @var Reader
     */
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function get($ip)
    {
        $location = new Location();
        $location->setIpAddress($ip);

        try {
            $record = $this->client->city($ip);

            $location
                ->setCity(isset($record->city) ? $record->city->name : null)
                ->setContinentCode(isset($record->continent) ? $record->continent->code : null)
                ->setContinentName(isset($record->continent) ? $record->continent->name : null)
                ->setCountryCode(isset($record->country) ? $record->country->isoCode : null)
                ->setCountryName(isset($record->country) ? $record->country->name : null)
                ->setLatitude(isset($record->location) ? $record->location->latitude : null)
                ->setLongitude(isset($record->location) ? $record->location->longitude : null)
                ->setZip(isset($record->postal) ? $record->postal->code : null);
            if (!empty($record->subdivisions)) {
                foreach ($record->subdivisions as $subdivision) {
                    $location
                        ->setRegionCode($subdivision->isoCode)
                        ->setRegionName($subdivision->name);
                }
            }
        } catch (AddressNotFoundException $e) {

        }

        return $location;
    }
}
