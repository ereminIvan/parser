<?php
namespace Parser\Entity;
use Parser\Entity;
use Parser\Connection;

/**
 * Class Session
 *
 * @author  Ivan Eremin <coding.ebola@gmail.com>
 * @package Parser\Entity
 */
class Session extends Entity
{
    protected $id;
    protected $last_page_url;
    protected $last_page;
    protected $_source_id;
    protected $create_at;
    protected $finished_at;

    public function __construct(Connection $connection, $sourceId)
    {
        parent::__construct($connection);
        $stmt = $connection->prepare('INSERT INTO _sessions (_source_id, created_at) VALUES (:_source_id, NOW());');
        $stmt->execute([
            ':_source_id'   => $sourceId,
        ]);
        $this->id = $connection->lastInsertId();
    }

    public function finish()
    {
        $q = $this->getConnection()->prepare('
            UPDATE _sessions
            SET
              last_page = :last_page,
              last_page_url = :last_page_url,
              _source_id = :_source_id,
              finished_at = NOW()
            WHERE id = :id');

        return $q->execute([
            ':id'               => $this->getId(),
            ':last_page_url'    => $this->last_page_url,
            ':last_page'        => $this->last_page,
            ':_source_id'       => $this->_source_id
        ]);
    }

    /**
     * @param mixed $source_id
     */
    public function setSourceId($source_id)
    {
        $this->_source_id = $source_id;
    }

    /**
     * @return mixed
     */
    public function getSourceId()
    {
        return $this->_source_id;
    }

    /**
     * @param mixed $create_at
     */
    public function setCreateAt($create_at)
    {
        $this->create_at = $create_at;
    }

    /**
     * @return mixed
     */
    public function getCreateAt()
    {
        return $this->create_at;
    }

    /**
     * @param mixed $last_page
     */
    public function setLastPage($last_page)
    {
        $this->last_page = $last_page;
    }

    /**
     * @return mixed
     */
    public function getLastPage()
    {
        return $this->last_page;
    }

    /**
     * @param mixed $last_page_url
     */
    public function setLastPageUrl($last_page_url)
    {
        $this->last_page_url = $last_page_url;
    }

    /**
     * @return mixed
     */
    public function getLastPageUrl()
    {
        return $this->last_page_url;
    }

    /**
     * @param mixed $finished_at
     */
    public function setFinishedAt($finished_at)
    {
        $this->finished_at = $finished_at;
    }

    /**
     * @return mixed
     */
    public function getFinishedAt()
    {
        return $this->finished_at;
    }

}