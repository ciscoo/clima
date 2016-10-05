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
    public function currentForecastFor(string $location) : array
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
    public function currentConditionsFor(string $location) : array
    {
        list($city, $state) = explode(",", $location);
        $endpoint = str_replace(["{state}", "{city}"], [$state, $city], env('WUNDERGROUND_API_CONDITION'));
        $json = $this->client->get($endpoint)->getBody();

        return \GuzzleHttp\json_decode($json, true);
    }
}