<?php

/*
 * PDigital ${year} - Open Software for Everyone
 * Visit http://pdigital.org
 */

namespace PDigitalOrg\Component\Collection;

/**
 * Interface Collectible
 *
 * PHP version 5.5
 *
 * @category Components
 * @package  PDigitalOrg\Component\SortedCollection
 * @author   Jorge Torres <jorge.torres@pdigital.org>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     link
 */
interface Collectible
{
    /**
     * Adds a new element to Collection
     *
     * @param string $key   The key to index item
     * @param string $value The value to store
     *
     * @return mixed
     */
    public function add($key, $value);

    /**
     * Searches in the Collection for the given Key
     *
     * @param string $key The key to search for
     *
     * @return bool Returns true if $key element exists in the Collection,
     * false otherwise
     */
    public function exists($key);

    /**
     * Removes the requested $key if exists
     *
     * @param string $key The key to remove
     *
     * @return bool Returns the removed element if exists
     *
     * @throws \Exception An exception is raised if the element was not found
     */
    public function remove($key);

    /**
     * Gets the element
     *
     * @param string $key The key to search for
     *
     * @return mixed The element
     *
     * @throws \Exception An exception is raised if the element was not found
     */
    public function get($key);

    /**
     * Returns the number of elements in this Collection
     *
     * @return int
     */
    public function getSize();
}