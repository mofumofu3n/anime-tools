<?php
namespace AnimeTools\Model;

use Parse\ParseObject;

class ArticleBuilder
{
    private $object;

    public function __construct()
    {
        $this->object = new ParseObject('Article');
    }

    public function setFeedObject($feedObject)
    {
        $this->object->set('feed', $feedObject);
        return $this;
    }

    public function setTitle($title)
    {
        $this->object->set('title', $title);
        return $this;
    }

    public function setUrl($url)
    {
        $this->object->set('url', $url);
        return $this;
    }

    public function setImageUrl($imageUrl)
    {
        $this->object->set('image', $imageUrl);
        return $this;
    }

    public function save()
    {
        $this->object->save();
    }
}
