<?php

namespace Graphic\Calculators;

use Graphic\Interfaces\Calculators\CalculatorInterface;
use Graphic\Interfaces\Services\ShapeFactoryInterface;
use Graphic\Interfaces\ShapeFactoryAwareInterface;

/**
 * Class ShapeCalculator
 * @package Graphic\Calculators
 */
class ShapeCalculator implements CalculatorInterface, ShapeFactoryAwareInterface
{
    /** @var array $shapes */
    protected $shapes = [];

    /** @var ShapeFactoryInterface $shapeFactory */
    protected $shapeFactory;

    /**
     * ShapeCalculator constructor.
     * @param array $shapes
     */
    public function __construct(array $shapes)
    {
        $this->shapes = $shapes;
    }

    /**
     * @return array
     */
    public function calculate() : array
    {
        $totalArea = [];
        foreach ($this->shapes as $shape) {
            $shapeInstance = $this->shapeFactory->getShape($shape['type'], $shape['params']);
            $totalArea[] = $shapeInstance->calculateArea();
        }

        return $totalArea;
    }

    /**
     * @param ShapeFactoryInterface $shapeFactory
     */
    public function setShapeFactory(ShapeFactoryInterface $shapeFactory)
    {
        $this->shapeFactory = $shapeFactory;
    }
}
