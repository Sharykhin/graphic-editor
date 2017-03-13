<?php

namespace Graphic\Interfaces;

use Graphic\Interfaces\Services\ShapeFactoryInterface;

/**
 * Interface ShapeFactoryAwareInterface
 * @package Graphic\Interfaces
 */
interface ShapeFactoryAwareInterface
{
    /**
     * @param ShapeFactoryInterface $shapeFactory
     */
    public function setShapeFactory(ShapeFactoryInterface $shapeFactory) : void;
}