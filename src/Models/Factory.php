<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Models;

use DateTimeImmutable;

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
     * @var FactorySchematic
     */
    public FactorySchematic $schematic;

    /**
     * @var int
     */
    public int $storageTypeId;

    /**
     * @var int
     */
    public int $storageAmount;

    /**
     * @var float
     */
    public float $priceProduced;

    /**
     * @var int
     */
    public int $amountProduced;

    /**
     * @var float
     */
    public float $volumeProduced;

    /**
     * @var float
     */
    public float $priceUsed;

    /**
     * @var int
     */
    public int $amountUsed;

    /**
     * @var float
     */
    public float $volumeUsed;

    /**
     * @var DateTimeImmutable
     */
    public DateTimeImmutable $lastCycleStart;

    /**
     * @var DateTimeImmutable
     */
    public DateTimeImmutable $expiryTime;

    /**
     * @var FactoryCycle[]
     */
    public array $cycles = array();

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
        $this->storageTypeId = 0;
        $this->storageAmount = 0;
        $this->priceProduced = 0.0;
        $this->amountProduced = 0;
        $this->volumeProduced = 0.0;
        $this->priceUsed = 0.0;
        $this->amountUsed = 0;
        $this->volumeUsed = 0.0;
        $this->expiryTime = new DateTimeImmutable("1900-01-01 00:00:00");
        $this->lastCycleStart = new DateTimeImmutable("1900-01-01 00:00:00");
    }
}