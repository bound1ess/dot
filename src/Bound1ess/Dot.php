<?php namespace Bound1ess;

class Dot implements \ArrayAccess {
    
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

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }

    /**
     * @param string $path
     * @return boolean
     */
    public function exists($path)
    {

    }

    /**
     * @param string $offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return $this->exists($offset);        
    }

    // @see \ArrayAccess
    public function offsetGet($offset) {}
    public function offsetSet($offset, $value) {}
    public function offsetUnset($offset) {}

}
