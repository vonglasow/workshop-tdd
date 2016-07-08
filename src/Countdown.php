<?php

namespace Workshop;

class Countdown
{
    const CHECKBOX_EMPTY = "\xE2\x98\x90";
    const CHECKBOX_CHECKED = "\xE2\x98\x91";
    const YEAR = 52;

    public function __construct(DateInterface $start, DateInterface $end)
    {
        if ($end->isBefore($start)) {
            throw new \Exception('start date cannot be after end date');
        }

        $this->start = $start;
        $this->end = $end;

        $this->nbrOfChecked = $this->computeNumberOfCheckedBox();
        $this->totalOfBox = $this->computeNumberOfTotalBox();
    }

    private function computeNumberOfCheckedBox()
    {
    }

    private function computeNumberOfTotalBox()
    {
    }
}
