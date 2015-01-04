<?php namespace Bound1ess;

class Dot implements \ArrayAccess {
    
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var array
     */
    protected $paths = [];

    /**
     * @param array $data
     * @return Dot
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    
        $this->cachePaths($data);
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
        return in_array($path, $this->paths, true);
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

    /**
     * @param array $data
     * @param string $path
     * @return void
     */
    protected function cachePaths(array $data, $path = '')
    {
        $appendToPath = function($one, $two)
        {
            return $one ? "{$one}.{$two}" : $two;
        };

        foreach ($data as $key => $value)
        {
            if (is_array($value))
            {
                $this->cachePaths($value, $appendToPath($path, $key));
            }
            else
            {
                $this->paths[] = $appendToPath($path, $key);
            }
        }        
    }
    
}
