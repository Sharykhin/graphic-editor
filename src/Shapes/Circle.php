<?php

namespace Graphic\Shapes;

use Graphic\Interfaces\Shapes\ShapeInterface;

/**
 * Class Circle
 * @package Graphic\Shapes
 */
class Circle implements ShapeInterface
{
    /** @var int $radius circle radius */
    private $radius;

    /**
     * Circle constructor.
     * @param int $radius
     */
    public function __construct(int $radius)
    {
        $this->radius = $radius;
    }

    /**
     * Calculate circle area
     * @return float
     */
    public function calculateArea()
    {
        echo "calculate circle area\n";
        return M_PI * pow($this->radius, 2);
    }
}
