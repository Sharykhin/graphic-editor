<?php

namespace Graphic\Attributes;

use Graphic\Interfaces\Shapes\ShapeInterface;

/**
 * Class AbstractAttributeDecorator
 * @package Graphic\Attributes
 */
abstract class AbstractAttributeDecorator implements ShapeInterface
{
    /** @var ShapeInterface $shape */
    protected $shape;

    /**
     * AbstractAttributeDecorator constructor.
     * @param ShapeInterface $shape
     */
    public function __construct(ShapeInterface $shape)
    {
        $this->shape = $shape;
    }

    abstract public function calculateArea();
}