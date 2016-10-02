<?php

namespace App\Http\Controllers;

use App\Services\WundergroundService;

class WundergroundController extends Controller
{
    /**
     * @var WundergroundService
     */
    private $wundergroundService;

    /**
     * HomeController constructor.
     * @param WundergroundService $wundergroundService
     */
    public function __construct(WundergroundService $wundergroundService)
    {
        $this->wundergroundService = $wundergroundService;
    }

    public function currentConditions(string $state, string $city)
    {
        return $this->wundergroundService->currentForecastFor($state, $city);
        return response()->view()->width();
    }

    public function index() {
        $forecast = $this->wundergroundService->currentForecastFor("WI", "Racine");
        return view('pages.index')
            ->with('city', 'Racine')
            ->with('state', 'WI')
            ->with('forecast', $forecast);
    }
}