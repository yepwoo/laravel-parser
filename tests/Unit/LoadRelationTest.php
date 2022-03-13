<?php


namespace Yepwoo\LaravelParser\Test\Unit;


use Yepwoo\LaravelParser\LoadRelations;
use Yepwoo\LaravelParser\Test\TestCase;

class LoadRelationTest extends TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testChangeRelationMethod()
    {
        $LoadRelations = $this->getMockBuilder(LoadRelations::class)
                              ->disableOriginalConstructor()
                              ->onlyMethods(['changeRelationMethod'])
                              ->getMock();

        $args = 'load';
        $LoadRelations->method('changeRelationMethod')
                          ->withConsecutive([$args])->will($this->returnCallback(array($this, 'with')));


    }
}
