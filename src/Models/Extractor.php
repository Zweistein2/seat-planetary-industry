<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Models;

use DateTime;

class Extractor {
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
    public int $productTypeId;

    /**
     * @var int
     */
    public int $cycleTime;

    /**
     * @var int
     */
    public int $qtyPerCycle;

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
    public DateTime $installTime;

    /**
     * @var DateTime
     */
    public DateTime $expiryTime;

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
     */
    public function __construct(int $pinId, int $planetId, int $characterId) {
        $this->pinId = $pinId;
        $this->planetId = $planetId;
        $this->characterId = $characterId;
        $this->productTypeId = 0;
        $this->cycleTime = 0;
        $this->qtyPerCycle = 0;
        $this->storageTypeId = 0;
        $this->storageAmount = 0;
        $this->installTime = new DateTime("1900-01-01 00:00:00");
        $this->expiryTime = new DateTime("1900-01-01 00:00:00");
        $this->lastCycleStart = new DateTime("1900-01-01 00:00:00");
    }
}