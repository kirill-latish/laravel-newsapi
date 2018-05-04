<?php

use Illuminate\Support\Facades\Config;
use NewsAPI\NewsAPIServiceProvider;

class TestCase extends Illuminate\Foundation\Testing\TestCase {



    public function setUp()
    {
        parent::setup();

        // A random account's token, replace it with a real token for testing
        Config::set('newsapi.api_key', '734457af512241948c9dc686a7905d23');

    }

    /**
     * Boots the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../vendor/laravel/laravel/bootstrap/app.php';

        $app->register(NewsAPIServiceProvider::class);

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }

}