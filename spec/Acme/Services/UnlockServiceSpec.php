<?php

namespace spec\Acme\Services;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Acme\Model\User;
use Acme\Model\GameObject;

class UnlockServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Services\UnlockService');
    }

    function it_unlocks_object_if_user_has_enough_currencies(User $user, GameObject $object)
    {
      $user->getCurrencies()->willReturn([
        'silver' => 100,
        'gold' => 100
      ]);

      $object->getCost()->willReturn([
        ['currency' => 'silver', 'value' => 50],
        ['currency' => 'gold', 'value' => 50]
      ]);

      $user->setCurrencies(['silver' => 50, 'gold' => 50])->shouldBeCalled();
      $user->addUnlocked($object)->shouldBeCalled();

      $this->unlock($user, $object)->shouldReturn(true);
    }

    function it_doesnt_unlock_object_if_cost_is_higher_than_currencies(User $user, GameObject $object)
    {
      $user->getCurrencies()->willReturn([
        'silver' => 50,
        'gold' => 50
      ]);

      $object->getCost()->willReturn([
        ['currency' => 'silver', 'value' => 10],
        ['currency' => 'gold', 'value' => 150]
      ]);

      $user->setCurrencies(Argument::Any)->shouldNotBeCalled();
      $user->addUnlocked(Argument::Any)->shouldNotBeCalled();

      $this->unlock($user, $object)->shouldReturn(false);
    }
}
