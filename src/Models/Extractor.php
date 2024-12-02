<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Models;

use DateTimeImmutable;

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
     * @var int
     */
    public int $initialQtyPerCycle;

    /**
     * @var float
     */
    public float $priceExtracted;

    /**
     * @var int
     */
    public int $amountExtracted;

    /**
     * @var float
     */
    public float $volumeExtracted;

    /**
     * @var DateTimeImmutable
     */
    public DateTimeImmutable $installTime;

    /**
     * @var DateTimeImmutable
     */
    public DateTimeImmutable $expiryTime;

    /**
     * @var DateTimeImmutable
     */
    public DateTimeImmutable $lastCycleStart;

    /**
     * @var ExtractorCycle[]
     */
    public array $cycles = array();

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
        $this->initialQtyPerCycle = 0;
        $this->priceExtracted = 0.0;
        $this->amountExtracted = 0;
        $this->volumeExtracted = 0.0;
        $this->installTime = new DateTimeImmutable("1900-01-01 00:00:00");
        $this->expiryTime = new DateTimeImmutable("1900-01-01 00:00:00");
        $this->lastCycleStart = new DateTimeImmutable("1900-01-01 00:00:00");
    }
}