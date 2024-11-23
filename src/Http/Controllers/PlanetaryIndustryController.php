<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Http\Controllers;

use DateTime;
use Exception;
use Illuminate\Support\Facades\DB;
use Seat\Web\Http\Controllers\Controller;
use Zweistein2\Seat\PlanetaryIndustry\Helpers\CharacterHelper;
use Zweistein2\Seat\PlanetaryIndustry\Models\Extractor;
use Zweistein2\Seat\PlanetaryIndustry\Models\Factory;
use Zweistein2\Seat\PlanetaryIndustry\Models\Planet;
use Zweistein2\Seat\PlanetaryIndustry\Models\Storage;
use Zweistein2\Seat\PlanetaryIndustry\Models\UserPlanets;

class PlanetaryIndustryController extends Controller {
    public function getCharacter() {
        $character_id = auth()->user()->main_character['character_id'];
        $character_name = CharacterHelper::getCharacterName($character_id);

        return view('planetaryIndustry::home', compact('character_name'));
    }

    public function getUser() {
        $character_id = auth()->user()->main_character['character_id'];
        $characters = CharacterHelper::getLinkedCharacters($character_id);
        $maincharacter_id = CharacterHelper::getMainCharacterCharacter($character_id)->character_id;
        $userPlanets = new UserPlanets($maincharacter_id);

        $labels = array();
        $linkedCharacters = array();

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

        $linkedCharacters[0] = "All Characters";
        foreach($characters as $character) {
            $linkedCharacters[$character] = CharacterHelper::getCharacterName($character);
        }

        foreach ($labels as $label) {
            $datum = strtotime($label);
            $month = (int)date('m', $datum);
            $year = (int)date('Y', $datum);
        }

        foreach($characters as $character) {
            $planets = DB::table('character_planets')
                ->select('planet_id', 'solar_system_id', 'planet_type')
                ->where('character_id', '=', $character)
                ->get();

            if(!$planets->isEmpty()) {
                foreach($planets as $planet) {
                    $userPlanet = new Planet($character, $planet->planet_id, $planet->solar_system_id, $planet->planet_type);

                    $extractors = DB::table('character_planet_pins as pi')
                        ->select('pi.pin_id', 'pi.install_time', 'pi.expiry_time', 'pi.last_cycle_start', 'ex.product_type_id', 'ex.cycle_time', 'ex.qty_per_cycle')
                        ->join('character_planet_extractors as ex', 'ex.pin_id', '=', 'pi.pin_id')
                        // todo: add storage
                        //->join('character_planet_contents as co', 'co.pin_id', '=', 'pi.pin_id')
                        ->where('pi.planet_id', '=', $userPlanet->planetId)
                        ->where('pi.character_id', '=', $character)
                        ->get();

                    foreach($extractors as $extractor) {
                        $planetExtractor = new Extractor($extractor->pin_id, $planet->planet_id, $character);

                        $planetExtractor->productTypeId = $extractor->product_type_id;
                        $planetExtractor->cycleTime = $extractor->cycle_time;
                        $planetExtractor->qtyPerCycle = $extractor->qty_per_cycle;
                        if($extractor->install_time) {
                            $planetExtractor->installTime = new DateTime($extractor->install_time);
                        }
                        if($extractor->expiry_time) {
                            $planetExtractor->expiryTime = new DateTime($extractor->expiry_time);
                        }
                        if($extractor->last_cycle_start) {
                            $planetExtractor->lastCycleStart = new DateTime($extractor->last_cycle_start);
                        }

                        $userPlanet->extractors[] = $planetExtractor;
                    }

                    $factories = DB::table('character_planet_pins as pi')
                        ->select('pi.pin_id', 'pi.type_id', 'pi.schematic_id', 'pi.last_cycle_start')
                        ->join('character_planet_extractors as ex', 'ex.pin_id', '=', 'pi.pin_id')
                        // todo: add storage
                        //->join('character_planet_contents as co', 'co.pin_id', '=', 'pi.pin_id')
                        ->whereNotNull('pi.schematic_id')
                        ->where('pi.planet_id', '=', $userPlanet->planetId)
                        ->where('pi.character_id', '=', $character)
                        ->get();

                    foreach($factories as $factory) {
                        $planetFactory = new Factory($factory->pin_id, $planet->planet_id, $character, $factory->type_id);

                        $planetFactory->schematicId = $factory->schematic_id;
                        if($factory->last_cycle_start) {
                            $planetFactory->lastCycleStart = new DateTime($factory->last_cycle_start);
                        }

                        $userPlanet->factories[] = $planetFactory;
                    }

                    $storages = DB::table('character_planet_contents as co')
                        ->select('pi.pin_id', 'pi.type_id', 'co.type_id', 'co.amount')
                        ->join('character_planet_pins as pi', 'pi.pin_id', '=', 'co.pin_id')
                        ->where('pi.planet_id', '=', $userPlanet->planetId)
                        ->where('pi.character_id', '=', $character)
                        ->get();

                    foreach($storages as $storage) {
                        if($userPlanet->storages && array_key_exists($storage->pin_id, $userPlanet->storages)) {
                            $planetStorage = $userPlanet->storages[$storage->pin_id];

                            $planetStorage->storageTypeId[] = $storage->type_id;
                            $planetStorage->storageAmount[] = $storage->amount;
                        } else {
                            $planetStorage = new Storage($storage->pin_id, $planet->planet_id, $character, $storage->type_id);

                            $planetStorage->storageTypeId[] = $storage->type_id;
                            $planetStorage->storageAmount[] = $storage->amount;

                            $userPlanet->storages[] = $planetStorage;
                        }
                    }

                    $userPlanets->planets[] = $userPlanet;
                }
            }
        }

        return view('planetaryIndustry::debug', compact($userPlanets));

        return view('planetaryIndustry::home', compact('character_name', 'labels', 'planets', 'linkedCharacters'));
    }
}