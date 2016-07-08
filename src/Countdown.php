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
        if ($this->start->isBefore('now') && $this->end->isAfter('now')) {
            return $this->start->countNumberOfWeekTo('now');
        }

        return $this->start->countNumberOfWeekTo($this->end);
    }

    private function computeNumberOfTotalBox()
    {
        return $this->start->countNumberOfWeekTo($this->end);
    }

    public function draw()
    {
        $i = 1;
        $str = '';

        for ($i; $i <= $this->totalOfBox; $i++)
        {
            $str .= ($i <= $this->nbrOfChecked) ? static::CHECKBOX_CHECKED : static::CHECKBOX_EMPTY;
            if ($i % static::YEAR === 0) {
                $str .= PHP_EOL;
            }
        }

        return $str;
    }
}
