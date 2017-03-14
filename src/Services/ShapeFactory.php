<?php

namespace Graphic\Services;

use Graphic\Attributes\BorderSizeAttribute;
use Graphic\Attributes\ColorAttribute;
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
                $instance = new Circle($params['radius']);
                unset($params['radius']);
                break;
            case 'square':
                $instance = new Square($params['length']);
                unset($params['length']);
                break;
            default:
                throw new UnsupportedShapeTypeException($type, "<{$type}> is not supported shape type");
        }

        foreach ($params as $name => $value) {
            switch ($name) {
                case 'color':
                    $instance = new ColorAttribute($instance);
                    $instance->setColor($value);
                    break;
                case 'border-size':
                    $instance = new BorderSizeAttribute($instance);
                    $instance->setBorder($value);
                    break;
            }
        }

        return $instance;
    }
}
