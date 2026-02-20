<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

protected function configureContainer(ContainerBuilder $container, LoaderInterface $loader): void
{
    $confDir = dirname(__DIR__).'/config';

    $loader->load($confDir.'/packages/*.yaml', 'glob');

    if (is_dir($confDir.'/packages/'.$this->environment)) {
        $loader->load($confDir.'/packages/'.$this->environment.'/*.yaml', 'glob');
    }

    $loader->load($confDir.'/services.yaml');

    if (is_file($confDir.'/services_'.$this->environment.'.yaml')) {
        $loader->load($confDir.'/services_'.$this->environment.'.yaml');
    }
}

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import(__DIR__.'/Controller/', 'attribute')
            ->prefix('/');
    }
}
