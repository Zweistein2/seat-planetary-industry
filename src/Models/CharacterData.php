<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Models;

class CharacterData {
    /**
     * @var int
     */
    public $characterId;

    /**
     * @var int
     */
    public $mainCharacterId;

    /**
     * @var string
     */
    public $characterName;

    /**
     * @var int
     */
    public $volume;

    /**
     * @var int
     */
    public $priceSummary;

    /**
     * @var array
     */
    public $planets = [];

    /**
     * @var array
     */
    public $cycleHistory = [];


    /**
     *
     * Constructor
     *
     * @param int $characterId
     * @param int $mainCharacterId
     * @param string $characterName
     */
    public function __construct(int $characterId, int $mainCharacterId, string $characterName)
    {
        $this->characterId = $characterId;
        $this->characterName = $characterName;
        $this->mainCharacterId = $mainCharacterId;
        $this->volume = 0;
        $this->priceSummary = 0;
    }

    /**
     * @param int $value
     * @return void
     */
    public function addToPriceSummary(int $value): void {
        $this->priceSummary += $value;
    }

    /**
     * @param int $volume
     * @return void
     */
    public function addVolume(int $volume): void {
        $this->volume += $volume;
    }
}