<?php

namespace Graphic\Shapes;

use Graphic\Interfaces\Shapes\ShapeInterface;

/**
 * Class Square
 * @package Graphic\Shapes
 */
class Square implements ShapeInterface
{
    /** @var int $length */
    private $length;

    /**
     * Square constructor.
     * @param int $length
     */
    public function __construct(int $length)
    {
        $this->length = $length;
    }

    /**
     * Calculate square area
     * @return int
     */
    public function calculateArea()
    {
        return $this->length * 2;
    }
}