<?php
namespace Parser\Service\Schema;
use Parser\Entity;
use Parser\Connection;
use Parser\Service\Parser;
use Parser\Entity\Session;
use Parser\Entity\Source;

/**
 * Class Afisha
 *
 * @author  Ivan Eremin <coding.ebola@gmail.com>
 * @package Parser\Service\Schema
 */
class Afisha extends Parser
{
    protected $parseUrl;
    protected $Source;
    protected $Connection;
    protected $lastPage;

    public function __construct(Source $source, Connection $connection)
    {
        $this->Connection = $connection;
        $this->Source = $source;
        $this->lastPage = $source->getPageCurrent() + 1;
        $this->parseUrl = sprintf($source->getBatchUrl(), $this->lastPage);
    }

    public function getParseUrl()
    {
        return $this->parseUrl;
    }

    public function getLastPage()
    {
        return $this->lastPage;
    }

    public function parse(\nokogiri $parser, Session $session)
    {
        foreach($parser->get('.b-recipe__figure')->toArray() as $recipeItem) {
            $recipe = new Entity\Recipe($this->Connection);
            $recipe->setName($recipeItem['a'][0]['img'][0]['alt']);
            $recipe->setSourceHref($recipeItem['a'][0]['href']);
            $recipe->setSourceImg($recipeItem['a'][0]['img'][0]['src']);

            preg_match('#\d+$#', $recipeItem['a'][0]['id'], $sourceId);
            $recipe->setSourceId(isset($sourceId[0]) ? $sourceId[0] : '');

            $recipe->setSessionId($session->getId());
            $recipe->set_SourceId($this->Source->getId());

            $recipe->save();
        }
    }
}