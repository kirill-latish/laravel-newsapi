# Laravel Package for NewsAPI.org 

Laravel wrapper for [NewsAPI.org](https://newsapi.org) API calls. 
Documentation for the API can be found [here](https://newsapi.org/docs)

## Installation

**1-** Require the package via Composer in your `composer.json`.
```json
{
  "require": {
    "kirill-latish/laravel-newsapi": "^1.0"
  }
}
```

**2-** Run Composer to install or update the new requirement.

```bash
$ composer install
```

or

```bash
$ composer update
```

**3-** Add the service provider to your `app/config/app.php` file
```php
NewsAPI\NewsAPIServiceProvider::class,
```

**4-** Add the facade to your `app/config/app.php` file
```php
'NewsAPI' => NewsAPI\Facades\NewsAPI::class,
```

**5-** Publish the configuration file

```bash
$ php artisan vendor:publish --provider="NewsAPI\NewsAPIServiceProvider"
```

**6-** Review the configuration file and add your key (preferably through env: `'api_key' => env('NEWSAPI_KEY')` )

```
config/newsapi.php
```

## Usage

Refer to the official [docs](https://newsapi.org/docs) as to which calls can be made and check the calls in traits under [NewsAPI\Requests](NewsAPI\Requests).

For example, get all sources (if using facade):

```
use NewsAPI;

...

$response = NewsAPI::sources()->all();
```

The above returns an object containing a `sources` array.

Get a top headlines by country and category:

```

$response = NewsAPI::topHeadlines()->get([
            'country' => 'gb',
            'category'=>'sports'
        ]);
```

Get all news from bbc.co.uk in English for time period from 2018-05-01 to 2018-05-04 sorted by publication date:

```
        $response = NewsAPI::everything()->get([
            'language' => 'en',
            'domains'=>'bbc.co.uk',
            'from' => '2018-05-01',
            'to' => ''2018-05-04,
            'sortBy' => 'publishedAt',
        ]);
```

