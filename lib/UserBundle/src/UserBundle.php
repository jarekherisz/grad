<?php

namespace Grad\UserBundle;

use Grad\CoreBundle\DependencyInjection\AddConsoleCommandPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Grad\CoreBundle\Component\HttpKernel\GradBundle\GradBundle;
use Symfony\Component\Config\Resource\ClassExistenceResource;

class UserBundle extends GradBundle
{

    public function build(ContainerBuilder $container)
    {
        parent::build($container);
    }

    public function getVersion()
    {
        return '0.0.1';
    }
}