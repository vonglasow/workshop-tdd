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
}
