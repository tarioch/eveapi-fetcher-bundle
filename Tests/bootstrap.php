<?php
use Doctrine\Common\Annotations\AnnotationRegistry;

$directVendors = is_file($loaderFile = __DIR__.'/../vendor/autoload.php');
if (!$directVendors) {
    $transitiveVendors = is_file($loaderFile = __DIR__.'/../../../../../autoload.php');
    if (!$transitiveVendors) {
        throw new \LogicException('Could not find autoload.php in vendor Did you run "composer install --dev"?');
    }
}

$loader = require $loaderFile;

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));
