<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Models;

class Planet {
    /**
     * @var int
     */
    public int $characterId;

    /**
     * @var int
     */
    public int $planetId;

    /**
     * @var int
     */
    public int $solarSystemId;

    /**
     * @var string
     */
    public string $planetType;

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
     * @var Extractor[]
     */
    public array $extractors = array();

    /**
     * @var Factory[]
     */
    public array $factories = array();

    /**
     * @var Storage[]
     */
    public array $storages = array();

    /**
     *
     * Constructor
     *
     * @param int $characterId
     * @param int $planetId
     * @param int $solarSystemId
     * @param string $planetType
     */
    public function __construct(int $characterId, int $planetId, int $solarSystemId, string $planetType) {
        $this->characterId = $characterId;
        $this->planetId = $planetId;
        $this->solarSystemId = $solarSystemId;
        $this->planetType = $planetType;
        $this->priceExtracted = 0.0;
        $this->amountExtracted = 0;
        $this->volumeExtracted = 0.0;
        $this->priceProduced = 0.0;
        $this->amountProduced = 0;
        $this->volumeProduced = 0.0;
        $this->priceUsed = 0.0;
        $this->amountUsed = 0;
        $this->volumeUsed = 0.0;
    }
}