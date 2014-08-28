<?php

/*
 * PDigital ${year} - Open Software for Everyone
 * Visit http://pdigital.org
 */
 

namespace PDigitalOrg\Component\Collection\Tests;

use PDigitalOrg\Component\Collection\Collection;


/**
 * Class CollectionTest
 *
 * PHP version 5.5
 *
 * @category Components
 * @package  PDigitalOrg\Component\Collection\Tests
 * @author   Jorge Torres <jorge.torres@pdigital.org>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     link
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    const COLLECTION_ELEMENTS = 999;

    /**
     *
     */
    const DELETE_ELEMENTS = 123;

    /**
     *
     */
    public function testAddElements()
    {
        $collection = new Collection();

        for ($i=0; $i<self::COLLECTION_ELEMENTS; $i++) {
            $collection->add($i, $i);
        }

        $size = $collection->getSize();

        $this->assertEquals(self::COLLECTION_ELEMENTS, $size);

        return $collection;
    }

    /**
     * @depends testAddElements
     */
    public function testRemoveElements(Collection $collection)
    {
        for ($i=0; $i<self::DELETE_ELEMENTS; $i++) {
            $collection->remove($i);
        }

        $size = $collection->getSize();

        $this->assertEquals(self::COLLECTION_ELEMENTS-self::DELETE_ELEMENTS, $size);
    }
}
 