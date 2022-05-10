<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nnjeim\World\World;
use Nnjeim\World\WorldHelper;

class WorldController extends Controller
{
    public function __construct(WorldHelper $world)
    {
        $this->world = $world;
    }

    public function all_countries()
    {
        $actions =  World::countries();

        if ($actions->success) {
            $countries = $actions->data;
        }
        return view('location.world')->with(['countries' => $countries]);
    }

    public function get_state(Request $request)
    {
        // get states of the country
        $action = $this->world->states([
            'filters' => [
                'country_id' => $request->country ?? 1,
            ],
        ]);

        // get timezones of the country
        $action2 = $this->world->timezones([
            'filters' => [
                'country_id' => $request->country ?? 1,
            ],
        ]);

        // get currency of the country
        $action3 = $this->world->currencies([
            'filters' => [
                'country_id' => $request->country ?? 1,
            ],
        ]);

        if ($action->success || $action2->success || $action3->success) {
            $states = $action->data;
            $timezones = $action2->data;
            $currencies = $action3->data;
        }

        return response()->json([
            'states' => $states,
            'timezones' => $timezones,
            'currencies' => $currencies,
        ]);
    }


    public function get_city(Request $request)
    {
        $action =  World::states([
            'fields' => 'cities',
            'filters' => [
                'id' => $request->state,
            ]
        ]);

        if ($action->success) {
            $cities = $action->data[0]["cities"];
        }

        return response()->json([
            'cities' => $cities
        ]);
    }
}
