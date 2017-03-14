<?php

namespace Graphic\Attributes;

class BorderSizeAttribute extends AbstractAttributeDecorator
{
    protected $border = 1;

    public function calculateArea()
    {
       echo "apply attribute border {$this->border}\n";
       return $this->shape->calculateArea();
    }

    public function setBorder($border)
    {
        $this->border = $border;
    }
}