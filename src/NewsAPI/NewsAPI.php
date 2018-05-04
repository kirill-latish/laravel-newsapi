<?php

namespace NewsAPI;

use NewsAPI\Requests\Everything;
use NewsAPI\Requests\Sources;
use NewsAPI\Requests\TopHeadlines;

class NewsAPI {

    public function sources()
    {
        return new Sources();
    }

    public function topHeadlines()
    {
        return new TopHeadlines();
    }

    public function everything()
    {
        return new Everything();
    }

}