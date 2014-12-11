<?php
namespace Parser;
/**
 * Class Schema
 * @package Parser
 */
class Schema
{
    /** @var string $initTag */
    protected $initTag;
    /** @var array $itemList */
    protected $itemList;

    /**
     * @param string $tag
     */
    public function setInitTag($tag)
    {
        $this->initTag = $tag;
    }

    /**
     * @param array $list
     */
    public function setItemList($list = [])
    {
        $this->itemList = $list;
    }

    /**
     * @return string
     */
    public function getInitTag()
    {
        return $this->initTag;
    }

    /**
     * @return array
     */
    public function getItemList()
    {
        return $this->itemList;
    }

}