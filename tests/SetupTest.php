<?php

use Illuminate\Support\Facades\Config;
use NewsAPI\NewsAPIClient;

class SetupTest extends TestCase {

    /**
     * @expectedException InvalidArgumentException
     *
     * @test
     */
    public function it_throws_an_exception_if_no_api_token_set()
    {
        Config::set('newsapi.api_key', '');

        $newsAPI = new NewsAPIClient();
    }

}