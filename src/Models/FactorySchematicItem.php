<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Models;

class FactorySchematicItem {
    /**
     * @var int
     */
    public int $typeID;

    /**
     * @var int
     */
    public int $quantity;

    /**
     * @var bool
     */
    public bool $isInput;

    /**
     * Constructor
     */
    public function __construct(int $typeID, int $quantity, bool $isInput) {
        $this->typeID = $typeID;
        $this->quantity = $quantity;
        $this->isInput = $isInput;
    }
}