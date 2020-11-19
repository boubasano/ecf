<?php

namespace App\Entity;

use App\Repository\MeteoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass=MeteoRepository::class)
 * @UniqueEntity(fields={"name"},
 *     message="Votre selection se trouve dans l'historique de recherches")
 */
class Meteo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $weather_descriptions;

    /**
     * @ORM\Column(type="integer")
     */
    private $temperature;

    /**
     * @ORM\Column(type="integer")
     */
    private $humidity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $weather_icons;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getWeatherDescriptions(): ?string
    {
        return $this->weather_descriptions;
    }

    public function setWeatherDescriptions(string $weather_descriptions): self
    {
        $this->weather_descriptions = $weather_descriptions;

        return $this;
    }

    public function getTemperature(): ?int
    {
        return $this->temperature;
    }

    public function setTemperature(int $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getHumidity(): ?int
    {
        return $this->humidity;
    }

    public function setHumidity(int $humidity): self
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getWeatherIcons(): ?string
    {
        return $this->weather_icons;
    }

    public function setWeatherIcons(string $weather_icons): self
    {
        $this->weather_icons = $weather_icons;

        return $this;
    }

    public function getweather_icons(): ?string
    {
        return $this->weather_icons;
    }

    public function getweather_descriptions(): ?string
    {
        return $this->weather_descriptions;
    }


}
