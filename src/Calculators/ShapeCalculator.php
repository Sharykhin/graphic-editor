<?php

namespace Graphic\Calculators;

use Graphic\Interfaces\Calculators\CalculatorInterface;

class ShapeCalculator implements CalculatorInterface
{
    protected $shapes;

    public function __construct(array $shapes)
    {
        $this->shapes = $shapes;
    }

    public function calculate()
    {

    }

}