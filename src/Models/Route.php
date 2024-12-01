<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Models;

use DateTime;

class Route {
    /**
     * @var int
     */
    public int $routeId;

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
    public int $sourcePinId;

    /**
     * @var int
     */
    public int $targetPinId;

    /**
     * @var int
     */
    public int $contentTypeId;

    /**
     * @var int
     */
    public int $contentAmount;

    /**
     *
     * Constructor
     *
     * @param int $routeId
     * @param int $planetId
     * @param int $characterId
     */
    public function __construct(int $routeId, int $planetId, int $characterId) {
        $this->routeId = $routeId;
        $this->planetId = $planetId;
        $this->characterId = $characterId;
        $this->sourcePinId = 0;
        $this->targetPinId = 0;
        $this->contentTypeId = 0;
        $this->contentAmount = 0;
    }
}