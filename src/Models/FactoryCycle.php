<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Models;

use DateTime;

class FactoryCycle {
    /**
     * @var int
     */
    public int $cycleIndex;

    /**
     * @var int
     */
    public int $produced;

    /**
     * @var int
     */
    public int $accumulatedProduced;

    /**
     * @var int
     */
    public int $used;

    /**
     * @var int
     */
    public int $accumulatedUsed;

    /**
     * Constructor
     */
    public function __construct(int $cycleIndex, int $produced, int $used, int $accumulatedProduced, int $accumulatedUsed) {
        $this->cycleIndex = $cycleIndex;
        $this->produced = $produced;
        $this->used = $used;
        $this->accumulatedProduced = $accumulatedProduced;
        $this->accumulatedUsed = $accumulatedUsed;
    }
}