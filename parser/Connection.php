<?php
namespace Parser;
/**
 * Class Connection
 *
 * @author  Ivan Eremin <coding.ebola@gmail.com>
 * @package Parser
 */
class Connection extends \PDO
{
    protected $db = 'parser';
    protected $host = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $charset = 'utf8';

    public function __construct()
    {
        $dsn = "mysql:dbname={$this->db};host={$this->host};charset={$this->charset}";
        parent::__construct($dsn, $this->username, $this->password);
        return $this;
    }
}