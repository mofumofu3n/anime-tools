<?php
namespace AnimeTools;

use AnimeTools\Crawler;

class CrawlerTest extends \PHPUnit_Framework_TestCase
{

    public function setup()
    {
        $this->crawler = new Crawler('test');
        $this->contents = file_get_contents(__DIR__.'/file/rdf.xml');
    }

    public function testSuccess()
    {
        $result = $this->crawler->success(0, $this->contents);
        $this->assertEquals(true, $result);
    }
}
