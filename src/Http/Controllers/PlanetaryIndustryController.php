<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Http\Controllers;

use Seat\Web\Http\Controllers\Controller;
use Zweistein2\Seat\PlanetaryIndustry\Helpers\CharacterHelper;

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

        return view('planetaryIndustry::home', compact('character_name'));
    }
}