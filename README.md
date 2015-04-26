EVE Api Fetcher Bundle
======================

[![Latest Stable Version](https://poser.pugx.org/tarioch/eveapi-fetcher-bundle/v/stable.png)](https://packagist.org/packages/tarioch/eveapi-fetcher-bundle)
[![Build Status](https://travis-ci.org/tarioch/eveapi-fetcher-bundle.png)](https://travis-ci.org/tarioch/eveapi-fetcher-bundle)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/tarioch/eveapi-fetcher-bundle/badges/quality-score.png?s=10b11825f1bf7cc31108d785491a783f071418d4)](https://scrutinizer-ci.com/g/tarioch/eveapi-fetcher-bundle/)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/3172bec4-e7d2-467d-800c-debefc17b118/mini.png)](https://insight.sensiolabs.com/projects/3172bec4-e7d2-467d-800c-debefc17b118)

Copyright (C) 2013 - 2015 by Patrick Ruckstuhl
All rights reserved.

Symfony bundle for automatic fetching of the EVE Online API, heavily inspired by [Yapeal](http://code.google.com/p/yapeal/) and makes use of [PhealNG](https://github.com/3rdpartyeve/phealng)

## LICENSE
EVE Api Fetcher Bundle is licensed under a MIT style license, see LICENSE.txt
for further information

## Dependencies ##
 - Gearman Server + PHP Module: http://gearman.org/
 - Symfony http://symfony.com
 - Optional: Supervisord http://supervisord.org

## INSTALLATION ##
First you need to add `tarioch/eveapi-fetcher-bundle` to `composer.json`:

```json
{
   "require": {
        "tarioch/eveapi-fetcher-bundle": "dev-master"
    }
}
```

### Bundles ###
You have to add the following Bundles to your `AppKernel.php`:

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
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle()
            new Tarioch\PhealBundle\TariochPhealBundle(),
            new Tarioch\PhealBundle\TariochEveapiFetcherBundle()
        );
        //...

        return $bundles;
    }
    //...
}
```

### Configuration ###
You have to add the following things to your config

  - Annotation parsing
  - Entity manager
  - Doctrine migrations
  - Gearman

```yml
// app/config/config.yml
// ...
jms_di_extra:
    locations:
        all_bundles: false
        bundles: [TariochPhealBundle, TariochEveapiFetcherBundle]

doctrine:
    dbal:
        connections:
                eveapi:
                        driver:   "%database_driver%"
                        host:     "%database_host%"
                        port:     "%database_port%"
                        dbname:   "%database_eveapi_name%"
                        user:     "%database_user%"
                        password: "%database_password%"
                        charset:  UTF8
                        mapping_types:
                                enum: string

    orm:
        entity_managers:
                eveapi:
                        connection: eveapi
                        mappings:
                                TariochEveapiFetcherBundle: ~
                                
doctrine_migrations:
    # workaround, see http://stackoverflow.com/questions/17066670/symfony2-change-migration-directory
    dir_name: '%kernel.root_dir%/../vendor/tarioch/eveapi-fetcher-bundle/Tarioch/EveapiFetcherBundle/DoctrineMigrations'
    
gearman:
    bundles:
        TariochEveapiFetcherBundle:
            name: TariochEveapiFetcherBundle
            active: true
            include:
                - Component/Worker
    defaults:
        method: doNormal
        iterations: 50
        callbacks: false
        job_prefix: null
        generate_unique_key: true
        workers_name_prepend_namespace: false

    servers:
        localhost:
            host: 127.0.0.1
            port: 4730

```

## Database ##
For getting the correct database schema, run

```
php app/console doctrine:migrations:migrate --em=eveapi
```

## Running ##
The best way to run this is to have a minutely cron job that schedules missing api calls and use supervisord for actually running the workers.

### Cronjob ###
```
* * * * * su www-data -c '/usr/bin/php /path/to/app/console eve:api:schedule --env=prod'
```
### Supervisord ###
http://supervisord.org

```
[program:evetool]
process_name=evetool%(process_num)s
command=/usr/bin/php /path/to/app/console gearman:worker:execute TariochEveapiFetcherBundleComponentWorkerTariochEveapiFetcherEveWorker --env=prod --no-interaction
numprocs=10
autostart=true
autorestart=true
user=www-data
```

## Getting started ##
Simply insert a key into the table apiKey and all available and implemented api data will be fetched.

## Help ##
Feel free to open an issue if you have an issues or questions.
