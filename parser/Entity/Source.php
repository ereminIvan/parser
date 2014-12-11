<?php
namespace Parser\Entity;
use Parser\Connection;
use Parser\Entity;

/**
 * Class Source
 *
 * @author  Ivan Eremin <coding.ebola@gmail.com>
 * @package Parser\Entity
 */
class Source extends Entity
{
    protected $id;
    protected $batch_url;
    protected $page_total;
    protected $page_current;
    protected $results_total;
    protected $results_current;
    protected $title;
    protected $type;

    /**
     * @param \Parser\Connection $connection
     * @param string             $title
     * @param string             $type
     */
    public function __construct(Connection $connection, $title, $type)
    {
        parent::__construct($connection);
        $this->get($title, $type);
    }

    /**
     * @param string $title
     * @param string $type
     *
     * @return $this
     */
    public function get($title, $type)
    {
        $q = $this->getConnection()->prepare('
            SELECT id, title, batch_url, results_total, results_current, page_total, page_current, type
            FROM _sources
            WHERE title=:title AND type=:type
        ');
        $q->execute([':title' => $title, ':type' => $type]);
        $source = $q->fetch(Connection::FETCH_ASSOC);

        $this->id = $source['id'];
        $this->batch_url = $source['batch_url'];
        $this->page_total = $source['page_total'];
        $this->page_current = $source['page_current'];
        $this->results_total = $source['results_total'];
        $this->results_current = $source['results_current'];
        $this->title = $source['title'];
        $this->type = $source['type'];

        return $this;
    }

    /**
     * @return bool
     */
    public function update()
    {
        $q = $this->getConnection()->prepare('
            UPDATE _sources
            SET
              title=:title,
              batch_url=:batch_url,
              results_total=:results_total,
              results_current=:results_current,
              page_total=:page_total,
              page_current=:page_current,
              type=:type
            WHERE id=:id
        ');
        return $q->execute([
            ':id'   => $this->id,
            ':title' => $this->title,
            ':type' => $this->type,
            ':batch_url' => $this->batch_url,
            ':results_total' => $this->results_total,
            ':results_current' => $this->results_current,
            ':page_total' => $this->page_total,
            ':page_current' => $this->page_current,
        ]);// or die(print_r($q->errorInfo()));
    }

    /**
     * @param mixed $batch_url
     */
    public function setBatchUrl($batch_url)
    {
        $this->batch_url = $batch_url;
    }

    /**
     * @return mixed
     */
    public function getBatchUrl()
    {
        return $this->batch_url;
    }

    /**
     * @param mixed $page_current
     */
    public function setPageCurrent($page_current)
    {
        $this->page_current = $page_current;
    }

    /**
     * @return int
     */
    public function getPageCurrent()
    {
        return $this->page_current;
    }

    /**
     * @param mixed $page_total
     */
    public function setPageTotal($page_total)
    {
        $this->page_total = $page_total;
    }

    /**
     * @return mixed
     */
    public function getPageTotal()
    {
        return $this->page_total;
    }

    /**
     * @param mixed $results_current
     */
    public function setResultsCurrent($results_current)
    {
        $this->results_current = $results_current;
    }

    /**
     * @return mixed
     */
    public function getResultsCurrent()
    {
        return $this->results_current;
    }

    /**
     * @param mixed $results_total
     */
    public function setResultsTotal($results_total)
    {
        $this->results_total = $results_total;
    }

    /**
     * @return mixed
     */
    public function getResultsTotal()
    {
        return $this->results_total;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }
}