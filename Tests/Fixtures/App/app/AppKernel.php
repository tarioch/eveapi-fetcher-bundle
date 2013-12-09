<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        return array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
	    new Tarioch\PhealBundle\TariochPhealBundle(),
	    new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
	    new Liip\FunctionalTestBundle\LiipFunctionalTestBundle(),

            new Tarioch\EveapiFetcherBundle\TariochEveapiFetcherBundle(),
        );
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config.yml');
    }

    /**
     * @return string
     */
    public function getCacheDir()
    {
        return sys_get_temp_dir().'/TariochEveapiFetcherBundle/cache';
    }

    /**
     * @return string
     */
    public function getLogDir()
    {
        return sys_get_temp_dir().'/TariochEveapiFetcherBundle/logs';
    }
}
