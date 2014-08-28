<?php

/*
 * PDigital ${year} - Open Software for Everyone
 * Visit http://pdigital.org
 */

namespace PDigitalOrg\Component\Collection;

/**
 * Class Collection
 *
 * PHP version 5.5
 *
 * @category Components
 * @package  PDigitalOrg\Component\SortedCollection
 * @author   Jorge Torres <jorge.torres@pdigital.org>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     link
 */
class Collection implements Collectible
{
    /**
     * The maximum number of items that this Collection can store.
     * 0 (zero) is understood as infinite
     */
    const DEFAULT_MAX_ITEMS = 0;

    /**
     * @var array
     */
    private $_items;

    /**
     * @var int
     */
    private $_maxElements;

    /**
     * @var int
     */
    private $_count;

    /**
     * {@inheritdoc}
     */
    public function __construct($maxElements=self::DEFAULT_MAX_ITEMS)
    {
        $this->_items = array();
        $this->_count = 0;
        $this->_maxElements = $maxElements;
    }

    /**
     * {@inheritdoc}
     */
    public function add($key, $value)
    {
        if ($this->_maxElements > 0 && $this->_count == $this->_maxElements) {
            throw new \Exception('Collection limits reach!');
        }

        $this->_items[$key] = $value;

        $this->_count++;
    }

    /**
     * {@inheritdoc}
     */
    public function remove($key)
    {
        if (isset($this->_items[$key])) {
            $removedItem = $this->_items[$key];

            unset($this->_items[$key]);
            $this->_count--;

            return $removedItem;
        }

        throw new \Exception('Key not found!');
    }

    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        if (isset($this->_items[$key])) {
            return $this->_items[$key];
        }

        throw new \Exception('Key not found!');
    }

    /**
     * {@inheritdoc}
     */
    public function exists($key)
    {
        if (isset($this->_items[$key])) {
            return true;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getSize()
    {
        return $this->_count;
    }

    /**
     * @param int $max
     */
    public function setMaxElements($max)
    {
        $this->_maxElements = $max;
    }

    /**
     * @return int
     */
    public function getMaxElements()
    {
        return $this->_maxElements;
    }
}
