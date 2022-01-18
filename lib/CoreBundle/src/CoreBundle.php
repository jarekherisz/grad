<?php

namespace Grad\CoreBundle;

use Grad\CoreBundle\DependencyInjection\AddConsoleCommandPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Grad\CoreBundle\Component\HttpKernel\GradBundle\GradBundle;
use Symfony\Component\Config\Resource\ClassExistenceResource;

class CoreBundle extends GradBundle
{

    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $this->addCompilerPassIfExists($container, AddConsoleCommandPass::class, PassConfig::TYPE_BEFORE_REMOVING);
    }

    private function addCompilerPassIfExists(ContainerBuilder $container, string $class, string $type = PassConfig::TYPE_BEFORE_OPTIMIZATION, int $priority = 0)
    {
        $container->addResource(new ClassExistenceResource($class));

        if (class_exists($class)) {
            $container->addCompilerPass(new $class(), $type, $priority);
        }
    }

    public function getVersion()
    {
        return '0.0.1';
    }
}