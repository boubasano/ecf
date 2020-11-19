<?php


namespace App\Services;


use App\Entity\Meteo;

class ApiBuilder
{
    public function buildMeteoInfos ($meteoData)
    {
        $meteo = new Meteo();
        $meteo->setName($meteoData->location->name);
        $meteo->setWeatherDescriptions($meteoData->current->weather_descriptions[0]);
        $meteo->setTemperature($meteoData->current->temperature);
        $meteo->setHumidity($meteoData->current->humidity);
        $meteo->setWeatherIcons($meteoData->current->weather_icons[0]);
    }

}