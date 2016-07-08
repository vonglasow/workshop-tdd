<?php

namespace Unittest;

use PHPUnit\Framework\TestCase;

class MomentTest extends TestCase
{
    /**
     * @test
     */
    public function createANewInstance()
    {
        $instance = new \Workshop\Moment('2016-01-02');
        $this->assertInstanceOf('Workshop\Moment', $instance);
    }

    public function countNumberOfDayProvider()
    {
        return [
            // start, end, count
            ['2016-01-02', '2016-01-03', 1],
            ['2016-01-02', '2016-01-04', 2],
            ['2016-01-02', '2016-01-05', 3],
            ['2016-01-02', '2016-01-06', 4],
            ['2016-01-01', '2016-01-06', 5],
            ['2015-01-02', '2016-01-02', 365],
            ['2016-01-01', '2016-01-01', 0],
            // leap year
            ['2016-01-01', '2017-01-01', 366],
        ];
    }

    /**
     * @test
     * @dataProvider countNumberOfDayProvider
     */
    public function countNumberOfDayTo($start, $end, $expected)
    {
        $instance = new \Workshop\Moment($start);
        $this->assertEquals($expected, $instance->countNumberOfDayTo($end));
    }
}
