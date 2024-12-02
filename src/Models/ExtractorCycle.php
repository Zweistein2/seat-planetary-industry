<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Models;

use DateTimeImmutable;

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
     * @var DateTimeImmutable
     */
    public DateTimeImmutable $cycleEnd;

    /**
     * Constructor
     */
    public function __construct(int $cycleIndex, int $yield, int $accumulatedYield, DateTimeImmutable $cycleEnd) {
        $this->cycleIndex = $cycleIndex;
        $this->yield = $yield;
        $this->accumulatedYield = $accumulatedYield;
        $this->cycleEnd = $cycleEnd;
    }
}