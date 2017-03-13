<?php

namespace Graphic\Calculators;

use Graphic\Interfaces\Calculators\CalculatorInterface;
use Graphic\Interfaces\Services\ShapeFactoryInterface;
use Graphic\Interfaces\ShapeFactoryAwareInterface;

class ShapeCalculator implements CalculatorInterface, ShapeFactoryAwareInterface
{
    protected $shapes;

    protected $shapeFactory;

    public function __construct(array $shapes)
    {
        $this->shapes = $shapes;
    }

    public function calculate()
    {

    }

    /**
     * @param ShapeFactoryInterface $shapeFactory
     */
    public function setShapeFactory(ShapeFactoryInterface $shapeFactory)
    {
        $this->shapeFactory = $shapeFactory;
    }

}