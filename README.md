EVE Api Fetcher Bundle
======================

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
