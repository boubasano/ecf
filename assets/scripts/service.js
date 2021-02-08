import {displayWeatherInfos} from "./services/apiDataBuilder";

/**
 * renvoie des données recupérées à partir de l'IP
 */

export async function main() {
    let ip = await fetch("http://api.ipify.org?format=json")
        .then((response) => response.json())
        .then((json) => json.ip);
    let ville = await fetch("http://ip-api.com/json/" + ip)
        .then((response) => response.json())
        .then((json) => json.city);
    let meteo = await fetch(
        "http://api.weatherstack.com/current?access_key=a8428b479404066eb4cc869472318314&lang=fr&query=" +
        ville
    )
        .then((response) => response.json())
        .then((json) => json);

    displayWeatherInfos(meteo);
}

