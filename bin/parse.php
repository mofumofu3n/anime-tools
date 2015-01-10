<?php
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../config.php';

date_default_timezone_set('Asia/Tokyo');

use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseException;

ParseClient::initialize(PARSE_APP_ID, PARSE_REST_KEY, PARSE_MASTER_KEY);

$query = new ParseQuery("Feed");

try {
    $results = $query->find();

    foreach ($results as $object) {
        $id = $object->getObjectId();
        $title = $object->get('title');
        $url = $object->get('feedUrl');

        echo sprintf("id: %s, title: %s, url: %s \n", $id, $title, $url);
    }
} catch (ParseException $e) {
    var_dump($e);
}
