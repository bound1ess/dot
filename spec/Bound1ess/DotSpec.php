<?php namespace spec\Bound1ess;

use PhpSpec\ObjectBehavior;

class DotSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith([
            'foo' => [
                'bar' => 42,
                'baz' => null,
            ],
        ]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Bound1ess\Dot');
    }

}
