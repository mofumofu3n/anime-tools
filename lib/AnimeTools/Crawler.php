<?php
namespace AnimeTools;

use \Mofumofu3n\Crawler\AbstractCrawler;

class Crawler extends \Mofumofu3n\Crawler\AbstractCrawler
{
    public function __construct($feeds)
    {
        parent::__construct($feeds);
    }

    protected function success($feedId, $content)
    {
        var_dump($content);
    }

    protected function fail($code, $url)
    {

    }
}
