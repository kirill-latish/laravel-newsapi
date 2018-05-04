<?php

use NewsAPI\Facades\NewsAPI;

/**
 * @group everything
 */
class EverythingTest extends TestCase {

    /**
     * @test
     */
    public function itRetrievesEverythingByKeyword()
    {
        $response = NewsAPI::everything()->getByKeyword('football');
        $this->assertNotEmpty($response);
    }

    /**
     * @test
     */
    public function itRetrievesHeadlinesByDomains()
    {
        $response = NewsAPI::everything()->getByDomains('bbc.co.uk');
        $this->assertNotEmpty($response);
    }

    /**
     * @test
     */
    public function itRetrievesHeadlinesBySource()
    {
        $response = NewsAPI::everything()->getBySource('bbc-sport');
        $this->assertNotEmpty($response);
    }

    /**
     * @test
     */
    public function itRetrievesHeadlinesByParams()
    {
        $response = NewsAPI::everything()->get([
            'language' => 'en',
            'domains'=>'bbc.co.uk',
            'from' => '2018-05-01',
            'to' => '',
            'sortBy' => 'publishedAt',
        ]);
        $this->assertNotEmpty($response);
    }






}