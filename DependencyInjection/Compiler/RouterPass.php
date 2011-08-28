<?php

/**
 * SocietoFilterableRoutingBundle
 * Copyright (C) 2011 Kousuke Ebihara
 *
 * This program is under the EPL/GPL/LGPL triple license.
 * Please see the Resources/meta/LICENSE file that was distributed with this file.
 */

namespace Societo\FilterableRoutingBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class RouterPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('router.default')) {
            return;
        }

        $definition = $container->getDefinition('router.default');

        $calls = $definition->getMethodCalls();
        $definition->addMethodCall('setEventDispatcher', array(new Reference('event_dispatcher')));
        $definition->addMethodCall('setEntityManager', array(new Reference('doctrine.orm.entity_manager')));
        $definition->setMethodCalls(array_merge($definition->getMethodCalls(), $calls));
    }
}
