<?php

use NewsAPI\Facades\NewsAPI;

/**
 * @group top-headlines
 */
class TopHeadlinesTest extends TestCase {

    /**
     * @test
     */
    public function itRetrievesHeadlinesByCountry()
    {
        $response = NewsAPI::topHeadlines()->getByCountry('gb');
        $this->assertNotEmpty($response);
    }

    /**
     * @test
     */
    public function itRetrievesHeadlinesByCategory()
    {
        $response = NewsAPI::topHeadlines()->getByCategory('sports');
        $this->assertNotEmpty($response);
    }

    /**
     * @test
     */
    public function itRetrievesHeadlinesBySource()
    {
        $response = NewsAPI::topHeadlines()->getBySource('bbc-sport');
        $this->assertNotEmpty($response);
    }

    /**
     * @test
     */
    public function itRetrievesHeadlinesByParams()
    {
        $response = NewsAPI::topHeadlines()->get([
            'country' => 'gb',
            'category'=>'sports'
        ]);
        $this->assertNotEmpty($response);
    }



}