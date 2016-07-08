<?php

namespace Workshop\tests\units;

class Countdown extends Test
{
    public function testNewInstance()
    {
        $start = new \mock\Workshop\DateInterface();
        $end = new \mock\Workshop\DateInterface();
        $this->assert('Test if we can create a new instance');
        $this->newTestedInstance($start, $end);
        $this->object($this->testedInstance)->isTestedInstance();
        $this->exception(function () {
            $start = new \mock\Workshop\DateInterface();
            $this->calling($start)->isBefore = true;
            $end = new \mock\Workshop\DateInterface();
            $this->calling($end)->isBefore = true;
            $this->newTestedInstance($start, $end);
        });
    }
}
