<?php

/**
 * SocietoFilterableRoutingBundle
 * Copyright (C) 2011 Kousuke Ebihara
 *
 * This program is under the EPL/GPL/LGPL triple license.
 * Please see the Resources/meta/LICENSE file that was distributed with this file.
 */

namespace Societo\FilterableRoutingBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class RoutingParameterEvent extends Event
{
    private $em, $parameters = array();

    public function __construct($parameters, $em)
    {
        $this->parameters = $parameters;
        $this->em = $em;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    public function getEntityManager()
    {
        return $this->em;
    }
}
