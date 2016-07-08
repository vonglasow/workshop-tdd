<?php

namespace Workshop;

interface DateInterface
{
    public function isBefore($date);

    public function isAfter($date);

    public function countNumberOfWeekTo($date);
}
