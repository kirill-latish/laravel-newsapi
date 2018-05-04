<?php

use NewsAPI\Facades\NewsAPI;

/**
 * @group sources
 */
class SourcesTest extends TestCase {

    /**
     * @test
     */
    public function itRetrievesAllSources()
    {
        $response = NewsAPI::sources()->all();
        $this->assertNotEmpty($response);
    }

    /**
     * @test
     */
    public function itRetrievesSourcesByCountry()
    {
        $response = NewsAPI::sources()->getByCountry('gb');
        $this->assertNotEmpty($response);
    }

    /**
     * @test
     */
    public function itRetrievesSourcesByCategory()
    {
        $response = NewsAPI::sources()->getByCategory('sports');
        $this->assertNotEmpty($response);
    }

    /**
     * @test
     */
    public function itRetrievesSourcesBySource()
    {
        $response = NewsAPI::sources()->getBySource('bbc-sport');
        $this->assertNotEmpty($response);
    }

    /**
     * @test
     */
    public function itRetrievesSourcesByParams()
    {
        $response = NewsAPI::sources()->get([
            'country' => 'gb',
            'category'=>'sports'
        ]);

        dd($response);
        $this->assertNotEmpty($response);
    }


}