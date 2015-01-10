<?php
namespace AnimeTools\Model;

use Parse\ParseObject;

class Feed
{
    private $parseObject;

    public function __construct($feedObject)
    {
        $this->parseObject = $feedObject;
    }

    public function getId()
    {
        return $this->parseObject->getObjectId();
    }

    public function getTitle()
    {
        return $this->parseObject->get('title');
    }

    public function getUrl()
    {
        return $this->parseObject->get('feedUrl');
    }
}
