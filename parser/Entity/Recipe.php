<?php
namespace Parser\Entity;
use Parser\Entity;
use Parser\Connection;

/**
 * Class Recipe
 *
 * @author  Ivan Eremin <coding.ebola@gmail.com>
 * @package Parser\Entity
 */
class Recipe extends Entity
{
    protected $name;
    protected $source_href;
    protected $source_img;
    protected $source_id;
    protected $source_description;
    protected $xml_description;
    protected $_session_id;
    protected $_source_id;

    public function __construct(Connection $connection)
    {
        parent::__construct($connection);
    }

    /**
     * @return bool
     */
    public function save()
    {

        $q = $this->getConnection()->prepare('
              INSERT INTO parsed_recipes (
                name, source_href, source_img, source_id, source_description, xml_description, _session_id, _source_id
            ) VALUES (
              :name, :source_href, :source_img, :source_id, :source_description, :xml_description, :_session_id, :_source_id
          );');

        return $q->execute([
            ':name'                 => $this->name,
            ':source_href'          => $this->source_href,
            ':source_img'           => $this->source_img,
            ':source_id'            => $this->source_id,
            ':source_description'   => $this->source_description,
            ':xml_description'      => $this->xml_description,
            ':_session_id'          => $this->_session_id,
            ':_source_id'           => $this->_source_id,
        ]);// or die(print_r($q->errorInfo(), true));
    }

    /**
     * @param mixed $session_id
     */
    public function setSessionId($session_id)
    {
        $this->_session_id = $session_id;
    }

    /**
     * @return mixed
     */
    public function getSessionId()
    {
        return $this->_session_id;
    }

    /**
     * @param mixed $source_id
     */
    public function set_SourceId($source_id)
    {
        $this->_source_id = $source_id;
    }

    /**
     * @return mixed
     */
    public function get_SourceId()
    {
        return $this->_source_id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $source_description
     */
    public function setSourceDescription($source_description)
    {
        $this->source_description = $source_description;
    }

    /**
     * @return mixed
     */
    public function getSourceDescription()
    {
        return $this->source_description;
    }

    /**
     * @param mixed $source_href
     */
    public function setSourceHref($source_href)
    {
        $this->source_href = $source_href;
    }

    /**
     * @return mixed
     */
    public function getSourceHref()
    {
        return $this->source_href;
    }

    /**
     * @param mixed $source_id
     */
    public function setSourceId($source_id)
    {
        $this->source_id = $source_id;
    }

    /**
     * @return mixed
     */
    public function getSourceId()
    {
        return $this->source_id;
    }

    /**
     * @param mixed $source_img
     */
    public function setSourceImg($source_img)
    {
        $this->source_img = $source_img;
    }

    /**
     * @return mixed
     */
    public function getSourceImg()
    {
        return $this->source_img;
    }

    /**
     * @param mixed $xml_description
     */
    public function setXmlDescription($xml_description)
    {
        $this->xml_description = $xml_description;
    }

    /**
     * @return mixed
     */
    public function getXmlDescription()
    {
        return $this->xml_description;
    }
}