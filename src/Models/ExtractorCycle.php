<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Models;

class ExtractorCycle {
    /**
     * @var int
     */
    public int $cycleIndex;

    /**
     * @var int
     */
    public int $yield;

    /**
     * @var int
     */
    public int $accumulatedYield;

    /**
     * Constructor
     */
    public function __construct(int $cycleIndex, int $yield, int $accumulatedYield) {
        $this->cycleIndex = $cycleIndex;
        $this->yield = $yield;
        $this->accumulatedYield = $accumulatedYield;
    }
}