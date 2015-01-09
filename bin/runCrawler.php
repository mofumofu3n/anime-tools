<?php
require 'vendor/autoload.php';

require __DIR__.'/../lib/AnimeTools/Crawler.php';

$feedA = new SingleFeed();
$feedA->url = "http://yaraon.blog109.fc2.com/?xml";
$feedA->id = 0;

$crawler = new \AnimeTools\Crawler($feedA);
$crawler->getContents();

class SingleFeed
{
    public $url;
    public $id;
}
