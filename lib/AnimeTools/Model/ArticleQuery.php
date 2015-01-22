<?php
namespace AnimeTools\Model;

use Parse\ParseQuery;

class ArticleQuery
{
    private $query;

    public function __construct()
    {
        $this->query = new ParseQuery('Article');
    }

    public function findUrlCount($url)
    {
        $this->query->equalTo("url", $url);
        $results = $this->query->find();

        return count($results);
    }
}
