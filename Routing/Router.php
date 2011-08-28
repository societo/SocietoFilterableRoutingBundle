<?php

/**
 * SocietoFilterableRoutingBundle
 * Copyright (C) 2011 Kousuke Ebihara
 *
 * This program is under the EPL/GPL/LGPL triple license.
 * Please see the Resources/meta/LICENSE file that was distributed with this file.
 */

namespace Societo\FilterableRoutingBundle\Routing;

use Symfony\Bundle\FrameworkBundle\Routing\Router as BaseRouter;
use Societo\FilterableRoutingBundle\Event\RoutingParameterEvent;

class Router extends BaseRouter
{
    private $dispatcher;
    private $em;

    public function match($url)
    {
        $parameters = parent::match($url);

        $event = new RoutingParameterEvent($parameters, $this->em);

        $this->dispatcher->dispatch('onSocietoMatchedRouteParameterFilter', $event);

        return $event->getParameters();
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        $event = new RoutingParameterEvent($parameters, $this->em);
        $this->dispatcher->dispatch('onSocietoGeneratingRouteParameterFilter', $event);

        return parent::generate($name, $event->getParameters(), $absolute);
    }

    public function setEventDispatcher($dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function setEntityManager($em)
    {
        $this->em = $em;
    }
}
