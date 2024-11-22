<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Seat\Web\Http\Controllers\Controller;
use Zweistein2\Seat\PlanetaryIndustry\Helpers\CharacterHelper;
use Zweistein2\Seat\PlanetaryIndustry\Models\CharacterPlanets;

class PlanetaryIndustryController extends Controller {
    public function getCharacter() {
        $character_id = auth()->user()->main_character['character_id'];
        $character_name = CharacterHelper::getCharacterName($character_id);

        return view('planetaryIndustry::home', compact('character_name'));
    }

    public function getUser() {
        $character_id = auth()->user()->main_character['character_id'];
        $character_name = CharacterHelper::getCharacterName($character_id);
        $characters = CharacterHelper::getLinkedCharacters($character_id);
        $maincharacter_id = CharacterHelper::getMainCharacterCharacter($character_id)->character_id;
        $planets = new CharacterPlanets($character_id, $maincharacter_id, $character_name);

        $labels = array();
        $data = array();
        $prices = array();
        $linkedCharacters = [];

        $current_month = (date('m', time()));
        $current_year = (date('Y', time()) - 1);
        for ($i = 0; $i < 12; $i++) {
            if ($current_month == 12) {
                $current_year += 1;
                $current_month = 1;
            } else {
                $current_month += 1;
            }
            $labels[] = date('Y-m', strtotime($current_year . "-" . $current_month));
        }

        $planets->characterId = $character_id;
        $planets->labels = $labels;

        $linkedCharacters[0] = "All Characters";
        foreach($characters as $character) {
            $linkedCharacters[$character] = CharacterHelper::getCharacterName($character);
        }

        foreach ($labels as $label) {
            $datum = strtotime($label);
            $month = (int)date('m', $datum);
            $year = (int)date('Y', $datum);
        }

        $db = DB::table('character_planets as pl')
            ->select('pl.*', 'fa.pin_id', 'ex.pin_id', 'ex.product_type_id', 'ex.cycle_time', 'ex.qty_per_cycle', 'co.pin_id', 'co.type_id', 'co.amount')
            ->join('character_planet_factories as fa', 'fa.planet_id', '=', 'pl.planet_id')
            ->join('character_planet_extractors as ex', 'ex.planet_id', '=', 'pl.planet_id')
            ->join('character_planet_contents as co', 'co.planet_id', '=', 'pl.planet_id')
            ->join('character_planet_pins as pi', 'pi.planet_id', '=', 'pl.planet_id')
            ->get();
        $planetDB = DB::table('character_planets')
            ->select('*')
            ->get();
        $factoryDB = DB::table('character_planet_factories')
            ->select('*')
            ->get();
        $extractorDB = DB::table('character_planet_extractors')
            ->select('*')
            ->get();
        $contentDB = DB::table('character_planet_contents')
            ->select('*')
            ->get();
        $pinDB = DB::table('character_planet_pins')
            ->select('*')
            ->get();
        return view('planetaryIndustry::debug', compact('db', 'planetDB', 'factoryDB', 'extractorDB', 'contentDB', 'pinDB'));

        return view('planetaryIndustry::home', compact('character_name', 'labels', 'planets', 'linkedCharacters'));
    }
}