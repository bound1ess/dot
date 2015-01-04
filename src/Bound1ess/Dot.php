<?php namespace Bound1ess;

class Dot {
    
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param array $data
     * @return Dot
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

}
