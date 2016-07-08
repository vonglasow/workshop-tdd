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

    public function testDraw()
    {
        $this->assert('Test if we can draw a string with checkbox');
        $start = new \mock\Workshop\DateInterface();
        $this->calling($start)->countNumberOfWeekTo = 30;
        $end = new \mock\Workshop\DateInterface();
        $this->newTestedInstance($start, $end);
        $this->object($this->testedInstance)->isTestedInstance();
        $this->utf8String($this->testedInstance->draw())->isNotEmpty()->hasLength(30);

        $this->assert('Test if we can draw a string with only 1 checkbox');
        $start = new \mock\Workshop\DateInterface();
        $this->calling($start)->countNumberOfWeekTo = 1;
        $end = new \mock\Workshop\DateInterface();
        $this->newTestedInstance($start, $end);
        $this->object($this->testedInstance)->isTestedInstance();
        $this->utf8String($this->testedInstance->draw())->isNotEmpty()->hasLength(1);

        $this->assert('Test if we can draw a string with 10 checkbox checked and 10 checkbox empty');
        $start = new \mock\Workshop\DateInterface();
        $this->calling($start)->countNumberOfWeekTo = 0;
        $this->calling($start)->countNumberOfWeekTo[1] = 10;
        $this->calling($start)->countNumberOfWeekTo[2] = 20;
        $end = new \mock\Workshop\DateInterface();
        $this->newTestedInstance($start, $end);
        $this->object($this->testedInstance)->isTestedInstance();
        $this->utf8String($this->testedInstance->draw())
            ->isNotEmpty()
            ->contains(\Workshop\Countdown::CHECKBOX_CHECKED.\Workshop\Countdown::CHECKBOX_EMPTY)
            ->hasLength(20)
        ;
    }
}
