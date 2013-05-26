<?php

require_once 'ArraySorting.php';

class ArraySortingTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ArraySorting
     */
    protected $object;
    
    public function setUp()
    {
        $this->object = new ArraySorting();
    }
    
    /**
     * @dataProvider sortTestData
     */
    public function testSortByMultiCols($arr, $sortBy, $expectedResult)
    {
        //var_dump($arr);
        $result = $this->object->sortByMultiCols($arr, $sortBy);
        
        $this->assertEquals($expectedResult, $result);
    }
    
    public function sortTestData()
    {
        $arr1 = array(
            array(
                'id' => 1,
                'firstname' => 'aaa1',
                'lastname' => 'bbb1',
            ),
            array(
                'id' => 2,
                'firstname' => 'aaa1',
                'lastname' => 'bbb2',
            ),
            array(
                'id' => 3,
                'firstname' => 'aaa3',
                'lastname' => 'bbb3',
            ),
        );
        
        $sort1 = array('firstname' => SORT_ASC, 'lastname' => SORT_DESC);
        
        $arr1res = array(
            array(
                'id' => 2,
                'firstname' => 'aaa1',
                'lastname' => 'bbb2',
            ),
            array(
                'id' => 1,
                'firstname' => 'aaa1',
                'lastname' => 'bbb1',
            ),
            array(
                'id' => 3,
                'firstname' => 'aaa3',
                'lastname' => 'bbb3',
            ),
        );
        
        $arr2 = array(
            array(
                'id' => 1,
                'vardas' => 'aaa',
                'pavarde' => 'bbb0',
            ),
            array(
                'id' => 2,
                'vardas' => 'ccc',
                'pavarde' => 'bbb1',
            ),
            array(
                'id' => 3,
                'vardas' => 'ccc',
                'pavarde' => 'bbb2',
            ),
        );
        
        $sort2 = array('vardas' => SORT_DESC, 'pavarde' => SORT_DESC);
        
        $arr2res = array(
            array(
                'id' => 3,
                'vardas' => 'ccc',
                'pavarde' => 'bbb2',
            ),
            array(
                'id' => 2,
                'vardas' => 'ccc',
                'pavarde' => 'bbb1',
            ),
            array(
                'id' => 1,
                'vardas' => 'aaa',
                'pavarde' => 'bbb0',
            ),
        );
        
        return array(
            array($arr1, $sort1, $arr1res),
            array($arr2, $sort2, $arr2res),
        );
    }
}