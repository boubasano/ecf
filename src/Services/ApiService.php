<?php


namespace App\Services;


class ApiService
{
    public function requestData($url, $key, $ville)
    {
        $fullUrl = $url.$key.$ville;
        $meteoInfos = json_decode(file_get_contents($fullUrl));
        return $meteoInfos;
    }

}