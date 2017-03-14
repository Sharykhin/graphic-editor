<?php

namespace Graphic\Attributes;

class ColorAttribute extends AbstractAttributeDecorator
{
    protected $color = 'white';

    public function calculateArea()
    {
        echo "apply attribute color {$this->color}\n";
        return $this->shape->calculateArea();
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }
}