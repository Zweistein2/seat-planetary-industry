<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Http\Controllers;

use Seat\Web\Http\Controllers\Controller;
use Zweistein2\Seat\PlanetaryIndustry\Helpers\CharacterHelper;

class PlanetaryIndustryController extends Controller {
    public function getCharacter() {
        $character = auth()->user()->main_character['character_id'];

        return view('planetaryIndustry::home', compact('character'));
    }

    public function getUser() {
        $character = auth()->user()->main_character['character_id'];
        $characters = CharacterHelper::getLinkedCharacters($character);

        return view('planetaryIndustry::home', compact('character'));
    }
}