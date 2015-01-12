<?php
namespace AnimeTools;

use \Mofumofu3n\Crawler\AbstractCrawler;
use \Mofumofu3n\Crawler\Parser\ParserFactory;

class Crawler extends \Mofumofu3n\Crawler\AbstractCrawler
{
    public function __construct($feeds)
    {
        parent::__construct($feeds);
    }

    public function success($feedId, $content)
    {
        $decode = simplexml_load_string($content);
        $type = $decode->getName();

        $parser = ParserFactory::factory($type);
        $articles = $parser->parse($decode);

        var_dump($articles);
        return true;
    }

    protected function fail($code, $url)
    {

    }
}
