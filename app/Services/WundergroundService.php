<?php

namespace App\Services;

use GuzzleHttp\Client;

/**
 * Class WundergroundService
 * @package App\Services
 */
class WundergroundService
{
    /**
     * HTTP client.
     * @var Client
     */
    private $client;

    /**
     * WundergroundService constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Gets the weekly forecast for a given location.
     *
     * @param string $location
     * @return array
     * @internal param string $state
     * @internal param string $city
     */
    public function currentForecastFor(string $location): array
    {
        list($city, $state) = explode(",", $location);
        $endpoint = str_replace(["{state}", "{city}"], [$state, $city], env('WUNDERGROUND_API_FORECAST'));
        $json = $this->client->get($endpoint)->getBody();

        return \GuzzleHttp\json_decode($json, true);
    }

    /**
     * Gets the current conditions for a given location.
     *
     * @param string $location
     * @return array
     * @internal param string $city
     * @internal param string $state
     */
    public function currentConditionsFor(string $location): array
    {
        list($city, $state) = explode(",", $location);
        $endpoint = str_replace(["{state}", "{city}"], [$state, $city], env('WUNDERGROUND_API_CONDITION'));
        $json = $this->client->get($endpoint)->getBody();

        return \GuzzleHttp\json_decode($json, true);
    }

    public function currentRadarFor(string $location, $animated = false): string
    {
        list($city, $state) = explode(",", $location);
        $feature = $animated ? "animatedradar" : "radar";
        $endpoint = str_replace(["{feature}","{state}", "{city}"], [$feature, $state, $city],env('WUNDERGROUND_API_RADAR'));

        return $endpoint;
    }

    public function __call(string $name, array $arguments): array
    {
        $forecast = false;
        $endpoint = str_replace("And", "/", $name);

        if (strpos($endpoint, "Forecast")) {
            $forecast = true;
            $endpoint = str_replace("Forecast", "temp", $endpoint);
        }

        $endpoint = str_replace("For", "", $endpoint);

        if ($forecast) {
            $endpoint = str_replace("temp", "forecast", $endpoint);
        }

        $endpoint = strtolower($endpoint);
        list($city, $state) = explode(",", trim($arguments[0]));
        $state = trim($state);

        $api = str_replace(["{state}", "{city}"], [$state, $city], env('WUNDERGROUND_API'));
        $endpoint = rtrim("$endpoint", "/");
        $endpoint = str_replace("{features}", $endpoint, $api);

        $json = $this->client->get($endpoint)->getBody();

        return \GuzzleHttp\json_decode($json, true);
    }
}
