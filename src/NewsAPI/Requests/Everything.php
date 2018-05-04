<?php

namespace NewsAPI\Requests;

class Everything extends BaseRequest {

    public $allowedParams = [
        'q',
        'sources',
        'domains',
        'from',
        'to',
        'language',
        'sortBy',
        'page',
        'pageSize',
    ];

    public $url = 'everything/';

}