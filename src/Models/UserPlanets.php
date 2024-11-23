<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Models;

class UserPlanets {
    /**
     * @var int
     */
    public int $mainCharacterId;

    /**
     * @var Planet[]
     */
    public array $planets = array();

    /**
     *
     * Constructor
     *
     * @param int $mainCharacterId
     */
    public function __construct(int $mainCharacterId) {
        $this->mainCharacterId = $mainCharacterId;
    }
}