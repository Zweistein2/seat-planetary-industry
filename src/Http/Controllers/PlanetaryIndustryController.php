<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Http\Controllers;

use Seat\Web\Http\Controllers\Controller;
use Zweistein2\Seat\PlanetaryIndustry\Http\Datatables\CharacterPlanetaryIndustryDataTable;
use Zweistein2\Seat\PlanetaryIndustry\Http\Datatables\UserPlanetaryIndustryDataTable;

class PlanetaryIndustryController extends Controller {
    public function user(UserPlanetaryIndustryDataTable $dataTable) {
        return $dataTable->render("planetaryIndustry::planettable");
    }

    public function character(CharacterPlanetaryIndustryDataTable $dataTable) {
        return $dataTable->render("planetaryIndustry::planettable");
    }
}