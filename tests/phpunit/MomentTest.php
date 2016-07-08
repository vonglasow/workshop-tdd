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

    /**
     * @test
     */
    public function defineIfNowIsAfterOrBeforeSomeDate()
    {
        $instance = new \Workshop\Moment('2015-01-02');
        $this->assertFalse($instance->isAfter('now'));
        $this->assertTrue($instance->isBefore('now'));

        $instance = new \Workshop\Moment('3015-01-02');
        $this->assertTrue($instance->isAfter('now'));
        $this->assertFalse($instance->isBefore('now'));
    }

    public function countNumberOfWeekProvider()
    {
        return [
            // start, end, count
            ['2016-01-01', '2016-01-02', 0],
            ['2016-01-01', '2016-01-06', 1],
            ['2016-01-02', '2016-01-03', 0],
            ['2016-01-02', '2016-01-04', 0],
            ['2016-01-02', '2016-01-05', 0],
            ['2015-01-02', '2016-01-02', 52],
            ['2016-01-01', '2016-01-01', 0],
            ['2016-01-01', '2016-01-08', 1],
            // leap year
            ['2016-01-01', '2017-01-01', 52],
        ];
    }

    /**
     * @test
     * @dataProvider countNumberOfWeekProvider
     */
    public function countNumberOfWeekTo($start, $end, $expected)
    {
        $instance = new \Workshop\Moment($start);
        $this->assertEquals($expected, $instance->countNumberOfWeekTo($end));
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
