<?php

declare(strict_types=1);

namespace Tests\Feature\Http;

use Symfony\Component\DomCrawler\Crawler;
use Tests\TestCase;

class TestSeo extends TestCase
{
    protected Crawler $crawler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->crawler = new Crawler();
    }

    /**
     * @return string
     */
    protected function getTitle(): string
    {
        return $this->crawler->filter('title')->first()->text();
    }

    /**
     * @return string
     */
    protected function getDescription(): string
    {
        return $this->crawler->filter('meta[name="description"]')->first()->attr('content');
    }

    /**
     * @return string
     */
    protected function getCanonicalUrl(): string
    {
        return $this->crawler->filter('link[rel="canonical"]')->first()->attr('href');
    }
}
