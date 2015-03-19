<?php

namespace spec\Acme\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameObjectSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Model\GameObject');
    }
}
