<?php
/**
 * Created by PhpStorm.
 * @author: ebola
 */

namespace Parser;
use Lib\Singleton;

class Scheduler
{
    use Singleton;

    public function getTask($id)
    {
        return new SchedulerTask($id);
    }

    public function createTask()
    {
        return new SchedulerTask();
    }

//    public function createTaskFromXml(){}
} 