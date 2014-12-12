<?php
namespace Parser;
use \Parser\Lib\Singleton;

/**
 * Class Scheduler
 *
 * @author  Ivan Eremin <coding.ebola@gmail.com>
 * @package Parser
 */
class Scheduler
{
    use Singleton;

    protected $connection;

    /**
     * @param \Parser\Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connectin = $connection;
    }

    /**
     * @param $id
     *
     * @return \Parser\SchedulerTask
     */
    public function getTask($id)
    {
        return new SchedulerTask($id);
    }

    /**
     * @return \Parser\SchedulerTask
     */
    public function createTask()
    {
        return new SchedulerTask();
    }

//    public function createTaskFromXml(){}
} 