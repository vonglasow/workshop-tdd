<?php

namespace Workshop\tests\units;

class Moment extends Test
{
    public function testNewInstance()
    {
        $this->assert('Test if we can create a new instance');
        $this->newTestedInstance('2016-01-02');
        $this->object($this->testedInstance)->isTestedInstance();
    }

    protected function testCountNumberOfDayToDataProvider()
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

    public function testCountNumberOfDayTo($start, $end, $expected)
    {
        $this->assert('Count number of day to date');
        $this->newTestedInstance($start);
        $this->integer($this->testedInstance->countNumberOfDayTo($end))
            ->isEqualTo($expected);
    }

    protected function testCountNumberOfWeekToDataProvider()
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

    public function testCountNumberOfWeekTo($start, $end, $expected)
    {
        $this->assert('Count number of week to date');
        $this->newTestedInstance($start);
        $this->integer($this->testedInstance->countNumberOfWeekTo($end))
            ->isEqualTo($expected);
    }
}
