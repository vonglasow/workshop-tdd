<?php

namespace Unittest;

use PHPUnit\Framework\TestCase;
use \Mockery as m;

/**
 * @runTestsInSeparateProcesses
 **/
class CountdownTest extends TestCase
{
    public function tearDown()
    {
        \Mockery::close();
    }

    /**
     * @test
     */
    public function createANewInstance()
    {
        $start = m::mock('overload:Workshop\DateInterface');
        $start->shouldReceive('isBefore')->andReturn(false);
        $start->shouldReceive('countNumberOfWeekTo')->andReturn(3);
        $end = m::mock('overload:Workshop\DateInterface');
        $end->shouldReceive('isBefore')->andReturn(false);
        $instance = new \Workshop\Countdown($start, $end);
        $this->assertInstanceOf('Workshop\Countdown', $instance);
    }

    /**
     * @test
     * @expectedException Exception
     * @expectedExceptionMessage start date cannot be after end date
     */
    public function raiseAnExceptionIfEndDateIsBeforeStartDateWhenCreatingANewInstance()
    {
        $start = m::mock('overload:Workshop\DateInterface');
        $start->shouldReceive('isBefore')->andReturn(true);
        $end = m::mock('overload:Workshop\DateInterface');
        $end->shouldReceive('isBefore')->andReturn(true);
        new \Workshop\Countdown($start, $end);
    }
}
