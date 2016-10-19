<?php

namespace App\Http\Controllers;

use App\Services\WundergroundService;
use \Illuminate\View\View;

/**
 * Class WundergroundController
 * @package App\Http\Controllers
 */
class WundergroundController extends Controller
{
    /**
     * @var WundergroundService
     */
    private $wundergroundService;

    /**
     * HomeController constructor.
     *
     * @param WundergroundService $wundergroundService
     */
    public function __construct(WundergroundService $wundergroundService)
    {
        $this->wundergroundService = $wundergroundService;
    }

    /**
     * Returns a view with the current conditions for a given location.
     *
     * @param string $location
     * @return View
     * @internal param string $stateK
     * @internal param string $city
     */
    public function currentConditions(string $location): View
    {
        list($city, $state) = explode(",", $location);
        $json = $this->wundergroundService->conditionsAndForecastAndRadarFor($city, $state, false);
        $radarImage = $this->wundergroundService->currentRadarFor("$city, $state", true);

        $data = [
            'locationName' => $json['current_observation']['display_location']['full'],
            'temperature' => $json['current_observation']['temp_f'],
            'feelsLike' => $json['current_observation']['feelslike_f'],
            'currentObserIcon' => $json['current_observation']['icon_url'],
            'currentObserWeather' => $json['current_observation']['weather'],
            'forecasts' => $json['forecast']['txt_forecast']['forecastday'],
            'radarImage' => $radarImage
        ];

        return view('pages.conditions', $data);
    }

    /**
     * Handles the index page, defaults to Racine, WI for the location.
     *
     * @return View
     */
    public function index(): View
    {
        $json = $this->wundergroundService->conditionsAndForecastAndRadarFor("Racine, WI", false);
        $radarImage = $this->wundergroundService->currentRadarFor("Racine, WI", true);

        $data = [
          'locationName' => $json['current_observation']['display_location']['full'],
          'temperature' => $json['current_observation']['temp_f'],
          'feelsLike' => $json['current_observation']['feelslike_f'],
          'currentObserIcon' => $json['current_observation']['icon_url'],
          'currentObserWeather' => $json['current_observation']['weather'],
          'forecasts' => $json['forecast']['txt_forecast']['forecastday'],
          'radarImage' => $radarImage
        ];

        return view('pages.index', $data);
    }
}
