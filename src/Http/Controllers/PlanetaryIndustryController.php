<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Http\Controllers;

use Seat\Web\Http\Controllers\Controller;
use Seat\Web\Http\DataTables\Character\Industrial\PlanetaryInteractionDataTable;
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
        $maincharacter_id = CharacterHelper::getMainCharacterCharacter($character_id);
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

        $db = DB::table('character_planets')->selectRaw('*')->get();
        return view('planetaryIndustry::debug', compact('db'));

        return view('planetaryIndustry::home', compact('character_name', 'labels', 'planets', 'linkedCharacters'));
    }
}