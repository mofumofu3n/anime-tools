<?php
namespace AnimeTools;

use AnimeTools\Crawler;

class CrawlerTest extends \PHPUnit_Framework_TestCase
{

    public function setup()
    {

    }

    public function testSuccess()
    {
        $this->assertEmpty(array('foo'));
    }
}
