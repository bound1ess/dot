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

    function it_returns_the_data_array()
    {
        $this->toArray()->shouldReturn([
            'foo' => [
                'bar' => 42,
                'baz' => null,
            ],
        ]);
    }

    function it_returns_cached_paths()
    {
        $this->getPaths()->shouldReturn(['foo.bar', 'foo.baz']);
    }

    function it_checks_whether_an_element_exists()
    {
        $this->exists('foo.bar')->shouldBe(true);
        $this->exists('foo.bar')->shouldBe(
            isset ($this->getWrappedObject()['foo.bar'])
        );

        $this->exists('invalid.path')->shouldBe(false);
        $this->exists('invalid.path')->shouldBe(
            isset ($this->getWrappedObject()['invalid.path'])
        );
    }

    function it_adds_an_element()
    {
        $this->add('foo.faz', false);
        $this->add('smth', []);

        $this->getWrappedObject()['foo.some.path'] = true;

        $this->toArray()->shouldReturn([
            'foo' => [
                'bar'  => 42,
                'baz'  => null,
                'faz'  => false,
                'some' => [
                    'path' => true,
                ],
            ],
            'smth' => [],
        ]);
    }

}
