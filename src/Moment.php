<?php

namespace Workshop;

class Moment implements DateInterface
{
    private $date;

    public function __construct($date)
    {
        $this->date = new \DateTime($date);
    }

    public function getDatetime()
    {
        return $this->date;
    }

    public function countNumberOfWeekTo($date)
    {
    }

    public function isAfter($date)
    {
    }

    public function isBefore($date)
    {
    }
}
