<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Models;

class Storage {
    /**
     * @var int
     */
    public int $pinId;

    /**
     * @var int
     */
    public int $planetId;

    /**
     * @var int
     */
    public int $characterId;

    /**
     * @var int
     */
    public int $typeId;

    /**
     * @var int[]
     */
    public array $storageTypeId = array();

    /**
     * @var int[]
     */
    public array $storageAmount = array();

    /**
     *
     * Constructor
     *
     * @param int $pinId
     * @param int $planetId
     * @param int $characterId
     * @param int $typeId
     */
    public function __construct(int $pinId, int $planetId, int $characterId, int $typeId) {
        $this->pinId = $pinId;
        $this->planetId = $planetId;
        $this->characterId = $characterId;
        $this->typeId = $typeId;
    }
}