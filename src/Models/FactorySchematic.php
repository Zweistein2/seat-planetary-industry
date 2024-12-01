<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Models;

use DateTime;

class FactorySchematic {
    /**
     * @var int
     */
    public int $schematicId;

    /**
     * @var int
     */
    public int $cycleTime;

    /**
     * Constructor
     */
    public function __construct(int $schematicId, int $cycleTime) {
        $this->schematicId = $schematicId;
        $this->cycleTime = $cycleTime;
    }
}