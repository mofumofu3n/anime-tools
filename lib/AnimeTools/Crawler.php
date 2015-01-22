<?php
namespace AnimeTools;

use Mofumofu3n\Crawler\AbstractCrawler;
use Mofumofu3n\Crawler\Model\StructArticle;
use Mofumofu3n\Crawler\Parser\ParserFactory;

use AnimeTools\Model\ArticleBuilder;
use AnimeTools\Model\ArticleQuery;

class Crawler extends \Mofumofu3n\Crawler\AbstractCrawler
{
    private $feedObject;

    public function __construct($feeds, $feedObject)
    {
        parent::__construct($feeds);
        $this->feedObject = $feedObject;
    }

    public function success($feedId, $content)
    {
        $decode = simplexml_load_string($content);
        $type = $decode->getName();

        $parser = ParserFactory::factory($type);

        if (!isset($parser)) {
            return;
        }

        $articles = $parser->parse($decode);

        foreach ($articles as $article) {
            $articleQuery = new ArticleQuery();
            $count = $articleQuery->findUrlCount($article[StructArticle::ARTICLE_LINK]);
            if ($count > 0) {
                // すでに保存済み
                continue;
            }
            $this->addArticle($this->feedObject[$feedId], $article);
        }

        return true;
    }
    
    /**
     * 記事を保存する
     * @param mixed $feedObject
     * @param mixed $article
     * @access private
     * @return void
     */
    private function addArticle($feedObject, $article)
    {
        $articleObject = new ArticleBuilder();
        $articleObject->setFeedObject($feedObject)
            ->setTitle($article[StructArticle::ARTICLE_TITLE])
            ->setUrl($article[StructArticle::ARTICLE_LINK])
            ->setImageUrl($article[StructArticle::ARTICLE_IMAGE])
            ->setPublished((String)$article[StructArticle::ARTICLE_PUBLISHED_DATE])
            ->save();
    }

    protected function fail($code, $url)
    {

    }
}
