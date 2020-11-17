/**
 * build nos datas récupérés de l'api
 */
export function displayWeatherInfos(dataLocal)
{
    let name = dataLocal?.location?.name;
    let temperature = dataLocal?.current?.temperature;
    let weather_description = dataLocal?.current?.weather_descriptions;
    let humidity = dataLocal?.current?.humidity;
    let weather_icons = dataLocal?.current?.weather_icons;

    document.querySelector("#ville").innerHTML = name;
    document.querySelector("#temperature").innerHTML = temperature;
    document.querySelector("#conditions").innerHTML = weather_description;
    document.querySelector("#humidity").innerHTML = humidity;
    document.querySelector("#icons").innerHTML = weather_icons;
}

