<?php
namespace Parser;
/**
 * Class Browser
 *
 * @author  Ivan Eremin <coding.ebola@gmail.com>
 * @package Parser
 */
class Browser
{
    /**
     * @var array
     */
    protected $userAgents = [
        'Opera/9.80 (Windows NT 6.2; Win64; x64) Presto/2.12.388 Version/12.15',
        'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.101 Safari/537.36',
        'Mozilla/5.0 (X11; Linux x86_64; rv:34.0) Gecko/20100101 Firefox/34.0',
    ];

    /**
     * @var resource
     */
    private $curl;


    public function __construct()
    {
        $this->curl = curl_init();
        curl_setopt_array($this->curl,[
            CURLOPT_USERAGENT       => $this->userAgents[mt_rand(0, count($this->userAgents) - 1)],
            CURLOPT_FOLLOWLOCATION  => true,
            CURLOPT_RETURNTRANSFER  => true,
        ]);
    }

    /**
     * @param $url
     *
     * @return string
     */
    public function get($url)
    {
        curl_setopt($this->curl, CURLOPT_URL, $url);
        return $this->exec();
    }

    /**
     * @return string
     */
    public function exec()
    {
        return curl_exec($this->curl);
    }

    public function close()
    {
        curl_close($this->curl);
    }
}