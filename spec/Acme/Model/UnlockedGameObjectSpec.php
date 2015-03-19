<?php

namespace spec\Acme\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UnlockedGameObjectSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Model\UnlockedGameObject');
    }
}
