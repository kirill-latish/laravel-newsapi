<?php

namespace NewsAPI\Facades;

use Illuminate\Support\Facades\Facade;

class NewsAPI extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'newsapi';
    }

}