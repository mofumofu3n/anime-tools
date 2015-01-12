<?php
namespace AnimeTools;

require __DIR__.'/../../config.php';

use AnimeTools\Crawler;

use Parse\ParseClient;
use Parse\ParseQuery;
use Parse\ParseException;

class CrawlerTest extends \PHPUnit_Framework_TestCase
{

    public function setup()
    {
        // Parseの設定読み込み
        ParseClient::initialize(PARSE_APP_ID, PARSE_REST_KEY, PARSE_MASTER_KEY);
        
        // ParseのFeedクラスから取得
        // TODO たぶんモックにしたほうがいい
        $query = new ParseQuery("Feed");

        try {
            $results = $query->find();
        } catch (ParseException $e) {
            var_dump($e);
        }

        $this->crawler = new Crawler('test', $results);
        $this->contents = file_get_contents(__DIR__.'/file/rdf.xml');
    }

    public function testSuccess()
    {
        $result = $this->crawler->success(0, $this->contents);
        $this->assertEquals(true, $result);
    }
}
