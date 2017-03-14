<?php

namespace Graphic\Attributes;

/**
 * Class ColorAttribute
 * @package Graphic\Attributes
 */
class ColorAttribute extends AbstractAttributeDecorator
{
    /** @var string $color */
    protected $color = 'white';

    /**
     * @return mixed
     */
    public function calculateArea()
    {
        echo "apply attribute color {$this->color}\n";
        return $this->shape->calculateArea();
    }

    /**
     * @param string $color
     */
    public function setColor(string $color)
    {
        $this->color = $color;
    }
}