<?php

namespace Graphic\Interfaces\Services;

use Graphic\Interfaces\Shapes\ShapeInterface;

/**
 * Interface ShapeFactoryInterface
 * @package Graphic\Services
 */
interface ShapeFactoryInterface
{
    public function getShape(string $type, array $params) : ShapeInterface;
}