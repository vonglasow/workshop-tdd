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
}
