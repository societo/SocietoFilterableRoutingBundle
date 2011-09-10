<?php

/**
 * This file is applied CC0 <http://creativecommons.org/publicdomain/zero/1.0/>
 */

namespace Societo\FilterableRoutingBundle\Tests\Event;

use Societo\FilterableRoutingBundle\Event\RoutingParameterEvent;

class RoutingParameterEventTest extends \PHPUnit_Framework_TestCase
{
    public function testSetGetParameters()
    {
        $em = $this->getEntityManagerMock();
        $event = new RoutingParameterEvent(array('a'), $em);

        $this->assertEquals(1, count($event->getParameters()));

        $event->setParameters(array('a', 'b'));
        $this->assertEquals(2, count($event->getParameters()));
    }

    public function testGetEntityManager()
    {
        $em = $this->getEntityManagerMock();
        $event = new RoutingParameterEvent(array('a'), $em);

        $this->assertSame($em, $event->getEntityManager());
    }

    public function getEntityManagerMock()
    {
        return $this->getMock('Doctrine\\ORM\\EntityManager', array(), array(), '', false);
    }
}
