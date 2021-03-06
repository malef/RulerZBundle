<?php

namespace KPhoen\RulerZBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class ExecutorsPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $engineDefinition = $container->getDefinition('rulerz');

        foreach ($container->findTaggedServiceIds('rulerz.compilation_target') as $id => $attributes) {
            $engineDefinition->addMethodCall('registerCompilationTarget', array(new Reference($id)));
        }
    }
}
