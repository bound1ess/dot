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
     * @return array
     */
    public function getPaths()
    {
        return $this->paths;
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

    /**
     * @param string $path
     * @param mixed $value
     * @return void
     */
    public function add($path, $value)
    {
        $path = explode('.', $path);
        $last = array_pop($path);
    
        $data =& $this->data;

        foreach ($path as $element)
        {
            if ( ! isset ($data[$element]))
            {
                $data[$element] = [];
            }
            
            $data =& $data[$element];
        } 

        $data[$last] = $value;

        $this->cachePaths($this->data);                
    }

    /**
     * @param string $offset
     * @param mixed $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->add($offset, $value);
    }

    // @see \ArrayAccess
    public function offsetGet($offset) {}
    public function offsetUnset($offset) {}

    /**
     * @param array $data
     * @param string $path
     * @return void
     */
    protected function cachePaths(array $data, $path = '')
    {
        if ( ! $path)
        {
            $this->paths = [];
        }

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
