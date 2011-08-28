<?php

/**
 * SocietoFilterableRoutingBundle
 * Copyright (C) 2011 Kousuke Ebihara
 *
 * This program is under the EPL/GPL/LGPL triple license.
 * Please see the Resources/meta/LICENSE file that was distributed with this file.
 */

namespace Societo\FilterableRoutingBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Societo\FilterableRoutingBundle\DependencyInjection\Compiler\RouterPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * SocietoFilterableRoutingBundle
 *
 * @author Kousuke Ebihara <ebihara@php.net>
 */
class SocietoFilterableRoutingBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new RouterPass());
    }
}
