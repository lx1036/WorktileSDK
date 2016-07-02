<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/2
 * Time: 19:55
 */

namespace Worktile\Support;

use Traversable;

class Collection implements \ArrayAccess, \Countable, \IteratorAggregate, \JsonSerializable, \Serializable
{

    /**
     * the collection data
     * @var array
     */
    protected $items = [];
    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
        return isset($this->items[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
        return isset($this->items[$offset]) ?$this->items[$offset] :null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @return mixed
     */
    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
        if ($this->offsetExists($offset)) {
            unset($this->items[$offset]);
        }
    }

    /**
     * @return mixed
     */
    public function count()
    {
        // TODO: Implement count() method.
        return count($this->items);
    }

    /**
     * @return mixed
     */
    public function getIterator()
    {
        // TODO: Implement getIterator() method.
        return new \ArrayIterator($this->items);
    }

    /**
     * @return mixed
     */
    public function serialize()
    {
        // TODO: Implement serialize() method.
        return serialize($this->items);
    }

    /**
     * @param string $serialized
     * @return mixed
     */
    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
        $this->items = unserialize($serialized);
    }

    /**
     * @return mixed
     */
    function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
        return $this->items;
    }
}
