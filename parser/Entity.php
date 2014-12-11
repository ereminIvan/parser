<?php
namespace Parser;
/**
 * Class Entity
 *
 * @author  Ivan Eremin <coding.ebola@gmail.com>
 * @package Parser
 */
class Entity
{
    /** @var  string $id */
    protected  $id;

    /** @var Connection $connection */
    protected $connection;

    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Connection
     */
    public function getConnection()
    {
        return $this->connection;
    }
}