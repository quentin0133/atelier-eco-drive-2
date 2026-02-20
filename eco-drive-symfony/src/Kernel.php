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
        $loader->load(__DIR__.'/../config/{packages}/*.yaml', 'glob');
        $loader->load(__DIR__.'/../config/{packages}/'.$this->environment.'/*.yaml', 'glob');
        $loader->load(__DIR__.'/../config/services.yaml', 'glob');
        $loader->load(__DIR__.'/../config/{services}_'.$this->environment.'.yaml', 'glob');
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import('src/Controller/', 'attribute');
    }
}
