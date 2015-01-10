<?php
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../config.php';

use AnimeTools\Model\ArticleBuilder;
use AnimeTools\Model\Feed;
use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseException;

ParseClient::initialize(PARSE_APP_ID, PARSE_REST_KEY, PARSE_MASTER_KEY);

date_default_timezone_set('Asia/Tokyo');

$query = new ParseQuery("Feed");

try {
    $results = $query->find();

    foreach ($results as $object) {
        $feed = new Feed($object);
        echo sprintf("id: %s, title: %s, url: %s \n", $feed->getId(), $feed->getTitle(), $feed->getUrl());
        //addArticle($object);
    }
} catch (ParseException $e) {
    var_dump($e);
}

function addArticle($feedObject)
{
    $datetime = new \DateTime('2015-01-10T23:15:31+09:00');
    $article = new ArticleBuilder();
    $article->setFeedObject($feedObject)
        ->setTitle('テスト3')
        ->setUrl('http://example.com')
        ->setImageUrl('http://example.com')
        ->setPublished($datetime)
        ->save();
}
