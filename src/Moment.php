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

    public function countNumberOfDayTo($date)
    {
        return (int) $this->parseDate($date)->diff($this->date)->format('%a');
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

    private function parseDate($date)
    {
        return is_string($date) ? new \DateTime($date): $date->getDatetime();
    }
}
