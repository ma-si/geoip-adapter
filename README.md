# Geolocation GeoIp2 Db Adapter

[![Build status][Master image]][Master]
[![Coverage Status][Master coverage image]][Master coverage]
[![Code Climate][Code Climate image]][Code Climate]
[![Packagist][Packagist image]][Packagist]

[![License][License image]][License]

## Installation

Install via composer:

```console
$ composer require --dev aist/geoip-adapter
```

## Configuration
Add your geoip database files to local config
```
return [
    'geoip' => [
        adapter => [
            \Aist\GeoIp2\Adapter\DbAdapter::class => [
                
            ],
        ],
        'files' => [
            'city' => '',
            'country' => '',
            'asn' => '',
        ],
    ],
];
```


  [Master image]: https://img.shields.io/travis/ma-si/geoip-adapter/master.svg?style=flat-square
  [Master]: https://secure.travis-ci.org/ma-si/geoip-adapter
  [Master coverage image]: https://img.shields.io/coveralls/ma-si/geoip-adapter/master.svg?style=flat-square
  [Master coverage]: https://coveralls.io/r/ma-si/geoip-adapter?branch=master
  [Code Climate image]: https://img.shields.io/codeclimate/github/ma-si/geoip-adapter.svg?style=flat-square
  [Code Climate]: https://codeclimate.com/github/ma-si/geoip-adapter
  [Packagist image]: https://img.shields.io/packagist/v/aist/geoip-adapter.svg?style=flat-square
  [Packagist]: https://packagist.org/packages/aist/geoip-adapter
  [License image]: https://poser.pugx.org/aist/geoip-adapter/license?format=flat-square
  [License]: https://opensource.org/licenses/BSD-3-Clause
