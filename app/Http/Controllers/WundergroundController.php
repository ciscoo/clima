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
     * @internal param string $state
     * @internal param string $city
     */
    public function currentConditions(string $location) : View
    {
        list($city, $state) = explode(",", $location);
        $data = ['conditions' => $this->wundergroundService->currentForecastFor("$city, $state")];

        return view('pages.conditions', $data);
    }

    /**
     * Handles the index page, defaults to Racine, WI for the location.
     *
     * @return View
     */
    public function index() : View
    {
        $data = [
            'forecast' => $this->wundergroundService->currentForecastFor("Racine, WI"),
            'condition' => $this->wundergroundService->currentConditionsFor("Racine, WI")
        ];

        return view('pages.index', $data);
    }
}