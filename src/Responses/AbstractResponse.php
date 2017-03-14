<?php

namespace Graphic\Responses;

use Graphic\Interfaces\Calculators\CalculatorInterface;

/**
 * Class Response
 * @package Graphic\Responses
 */
abstract class AbstractResponse
{
    /** @var CalculatorInterface $calculator */
    protected $calculator;

    /**
     * Response constructor.
     * @param CalculatorInterface $calculator
     */
    public function __construct(CalculatorInterface $calculator)
    {
        $this->calculator = $calculator;
    }

    abstract public function output();
}
