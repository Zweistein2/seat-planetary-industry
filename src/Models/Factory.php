<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Models;

use DateTime;

class Factory {
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
     * @var int
     */
    public int $schematicId;

    /**
     * @var int
     */
    public int $storageTypeId;

    /**
     * @var int
     */
    public int $storageAmount;

    /**
     * @var DateTime
     */
    public DateTime $lastCycleStart;

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
        $this->schematicId = 0;
        $this->storageTypeId = 0;
        $this->storageAmount = 0;
        $this->lastCycleStart = new DateTime("1900-01-01 00:00:00");
    }
}