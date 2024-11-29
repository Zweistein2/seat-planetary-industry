<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Models;

class UserPlanets {
    /**
     * @var int
     */
    public int $mainCharacterId;

    /**
     * @var Planet[]
     */
    public array $planets = array();

    /**
     * @var float
     */
    public float $totalPriceExtracted;

    /**
     * @var int
     */
    public int $totalAmountExtracted;

    /**
     * @var float
     */
    public float $totalVolumeExtracted;

    /**
     * @var float
     */
    public float $totalPriceProduced;

    /**
     * @var int
     */
    public int $totalAmountProduced;

    /**
     * @var float
     */
    public float $totalVolumeProduced;

    /**
     * @var float
     */
    public float $totalPriceUsed;

    /**
     * @var int
     */
    public int $totalAmountUsed;

    /**
     * @var float
     */
    public float $totalVolumeUsed;

    /**
     *
     * Constructor
     *
     * @param int $mainCharacterId
     */
    public function __construct(int $mainCharacterId) {
        $this->mainCharacterId = $mainCharacterId;
        $this->totalPriceExtracted = 0.0;
        $this->totalAmountExtracted = 0;
        $this->totalVolumeExtracted = 0.0;
        $this->totalPriceProduced = 0.0;
        $this->totalAmountProduced = 0;
        $this->totalVolumeProduced = 0.0;
        $this->totalPriceUsed = 0.0;
        $this->totalAmountUsed = 0;
        $this->totalVolumeUsed = 0.0;
    }
}