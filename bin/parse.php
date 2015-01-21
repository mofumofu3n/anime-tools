<?php
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../Config.php';

use AnimeTools\Crawler;
use AnimeTools\Model\ArticleBuilder;
use AnimeTools\Model\Feed;

use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseException;

// Parseへのアクセスを設定
$APP_ID = (isset(PARSE_APP_ID) ? PARSE_APP_ID : $_SERVER['PARSE_APP_ID']);
$REST_KEY  = (isset(PARSE_REST_KEY) ? PARSE_REST_KEY : $_SERVER['PARSE_REST_KEY']);
$MASTER_KEY  = (isset(PARSE_MASTER_KEY) ? PARSE_MASTER_KEY : $_SERVER['PARSE_MASTER_KEY']);


ParseClient::initialize($APP_ID, $REST_KEY, $MASTER_KEY);

date_default_timezone_set('Asia/Tokyo');

$query = new ParseQuery("Feed");

$feedArray = array();

try {
    $results = $query->find();

    for ($i = 0; $i < count($results); $i++) {
        $feed = new Feed($results[$i]);
        $simpleFeed = new SimpleFeed($i, $feed);
        $feedArray[$i] = $simpleFeed;
    }
        //echo sprintf("id: %s, title: %s, url: %s \n", $feed->getId(), $feed->getTitle(), $feed->getUrl());
        //addArticle($object);
} catch (ParseException $e) {
    var_dump($e);
}

$crawler = new Crawler($feedArray, $results);
$crawler->getContents();

class SimpleFeed
{
    public $id;
    public $url;

    public function __construct($index, $feed)
    {
        $this->id = $index;
        $this->url = $feed->getUrl();
    }
}
