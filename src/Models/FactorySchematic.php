<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Models;

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
     * @var FactorySchematicItem[]
     */
    public array $items = array();

    /**
     * Constructor
     */
    public function __construct(int $schematicId, int $cycleTime) {
        $this->schematicId = $schematicId;
        $this->cycleTime = $cycleTime;
    }
}