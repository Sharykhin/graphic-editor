<?php

namespace Graphic\Services;

use Graphic\Exceptions\UnsupportedShapeTypeException;
use Graphic\Interfaces\Services\ShapeFactoryInterface;
use Graphic\Interfaces\Shapes\ShapeInterface;
use Graphic\Shapes\Circle;
use Graphic\Shapes\Square;

/**
 * Class ShapeFactory
 * @package Graphic\Services
 */
class ShapeFactory implements ShapeFactoryInterface
{
    /**
     * @param string $type
     * @param array $params
     * @return ShapeInterface
     */
    public function getShape(string $type, array $params) : ShapeInterface
    {

        switch ($type) {
            case 'circle':
                return new Circle(12);
            case 'square':
                return new Square(2);
        }

        throw new UnsupportedShapeTypeException($type);
    }
}
