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
    }
}