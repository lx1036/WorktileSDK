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
     * @param mixed $offset
     * @return mixed
     */
    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @return mixed
     */
    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    /**
     * @return mixed
     */
    public function count()
    {
        // TODO: Implement count() method.
    }

    /**
     * @return mixed
     */
    public function getIterator()
    {
        // TODO: Implement getIterator() method.
    }

    /**
     * @return mixed
     */
    public function serialize()
    {
        // TODO: Implement serialize() method.

    }

    /**
     * @param string $serialized
     * @return mixed
     */
    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }

    /**
     * @return mixed
     */
    function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }
}
