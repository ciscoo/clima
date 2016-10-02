<?php

namespace App\Services;

use GuzzleHttp\Client;

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

    public function currentForecastFor(string $state, string $city) : array {
        $endpoint = str_replace(["{state}", "{city}"], [$state, $city], env('WUNDERGROUND_API_FORECAST'));
        $json = $this->client->get($endpoint)->getBody();

//        print("<pre>".print_r(json_decode($json, true),true)."</pre>"); die();
        return json_decode($json, true);
    }
}