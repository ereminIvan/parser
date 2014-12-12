<?php
/**
 * Created by PhpStorm.
 * @author: ebola
 */

namespace Parser;


class SchedulerTask
{
    protected $id;

    public function __construct($id = null)
    {
        $this->id = $id;
    }
} 