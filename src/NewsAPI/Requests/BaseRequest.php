<?php
/**
 * Created by PhpStorm.
 * User: kiril
 * Date: 04.05.2018
 * Time: 15:54
 */

namespace NewsAPI\Requests;


use NewsAPI\Exceptions\ApiRequestException;
use NewsAPI\NewsAPIClient;

abstract class BaseRequest extends NewsAPIClient
{
    public $allowedParams = [
        'q',
        'country',
        'category',
        'page',
        'pageSize',
        'sources'
    ];

    private $allowedCountryCodes = [
        'ae', 'ar', 'at', 'au', 'be', 'bg', 'br', 'ca', 'ch', 'cn', 'co', 'cu', 'cz', 'de', 'eg', 'fr', 'gb', 'gr',
        'hk', 'hu', 'id', 'ie', 'il', 'in', 'it', 'jp', 'kr', 'lt', 'lv', 'ma', 'mx', 'my', 'ng', 'nl', 'no', 'nz',
        'ph', 'pl', 'pt', 'ro', 'rs', 'ru', 'sa', 'se', 'sg', 'si', 'sk', 'th', 'tr', 'tw', 'ua', 'us', 've', 'za'
    ];

    private $allowedLanguages = [
        'ar', 'de', 'en', 'es', 'fr', 'he', 'it', 'nl', 'no', 'pt', 'ru', 'se', 'ud', 'zh'
    ];

    private $allowedSortBy = [
        'relevancy', 'popularity', 'publishedAt'
    ];

    private $allowedCategories = [
        'business', 'entertainment', 'general', 'health', 'science', 'sports', 'technology'
    ];

    public function getByCountry($countryCode) {

        return $this->get(['country'=> $countryCode]);
    }

    public function getByKeyword($keyword)
    {
        return $this->get(['q' => $keyword]);
    }

    public function getByDomains($domains)
    {
        return $this->get(['domains' => $domains]);
    }

    public function getBySource($sourceId)
    {
        return $this->call($this->url,['sources'=>$sourceId]);
    }

    public function get($params = [])
    {
        foreach($params as $paramName => $paramValue){
            if(!in_array($paramName,$this->allowedParams)){
                throw new ApiRequestException('Parameter '.$paramName.' is not allowed for this endpoint');
            }
        }

        if(isset($params['country'])){

            if(!in_array($params['country'],$this->allowedCountryCodes)){
                throw new ApiRequestException("Unsupported country code. Allowed codes are ".implode(", ",$this->allowedCountryCodes));
            }
        }

        if(isset($params['category'])){

            if(!in_array($params['category'],$this->allowedCategories)){
                throw new ApiRequestException("Unsupported category. Allowed categories are ".implode(", ",$this->allowedCategories));
            }
        }

        if(isset($params['language'])){

            if(!in_array($params['language'],$this->allowedLanguages)){
                throw new ApiRequestException("Unsupported language. Allowed languages are ".implode(", ",$this->allowedLanguages));
            }
        }

        if(isset($params['sortBy'])){

            if(!in_array($params['sortBy'],$this->allowedSortBy)){
                throw new ApiRequestException("Unsupported sorting. Allowed sortings are ".implode(", ",$this->allowedSortBy));
            }
        }

        return $this->call($this->url,$params);
    }


}