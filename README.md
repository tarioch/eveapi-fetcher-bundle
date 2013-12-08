EVE Api Fetcher Bundle
======================

[![Latest Stable Version](https://poser.pugx.org/tarioch/eveapi-fetcher-bundle/v/stable.png)](https://packagist.org/packages/tarioch/eveapi-fetcher-bundle)
[![Build Status](https://travis-ci.org/tarioch/eveapi-fetcher-bundle.png)](https://travis-ci.org/tarioch/eveapi-fetcher-bundle)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/tarioch/eveapi-fetcher-bundle/badges/quality-score.png?s=10b11825f1bf7cc31108d785491a783f071418d4)](https://scrutinizer-ci.com/g/tarioch/eveapi-fetcher-bundle/)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/3172bec4-e7d2-467d-800c-debefc17b118/mini.png)](https://insight.sensiolabs.com/projects/3172bec4-e7d2-467d-800c-debefc17b118)

Copyright (C) 2013 by Patrick Ruckstuhl
All rights reserved.

Symfony bundle for automatic fetching of the EVE Online API, heavily inspired by [Yapeal](http://code.google.com/p/yapeal/) and makes use of [PhealNG](https://github.com/3rdpartyeve/phealng)

## LICENSE
EVE Api Fetcher Bundle is licensed under a MIT style license, see LICENSE.txt
for further information

## INSTALLATION
First you need to add `tarioch/eveapi-fetcher-bundle` to `composer.json`:

```json
{
   "require": {
        "tarioch/eveapi-fetcher-bundle": "dev-master"
    }
}
```

You also have to add `TariochEveapiFetcherBundle` and `TariochPhealBundle` to your `AppKernel.php`:

```php
// app/AppKernel.php
//...
class AppKernel extends Kernel
{
    //...
    public function registerBundles()
    {
        $bundles = array(
            ...
            new Tarioch\PhealBundle\TariochPhealBundle(),
            new Tarioch\PhealBundle\TariochEveapiFetcherBundle()
        );
        //...

        return $bundles;
    }
    //...
}
```

And you have to enable the annotation parsing for the bundle in your `config.yml`:

```yml
// app/config/config.yml
// ...
jms_di_extra:
    locations:
        all_bundles: false
        bundles: [TariochPhealBundle, TariochEveapiFetcherBundle]
```
