<?php

namespace Graphic\Attributes;

/**
 * Class BorderSizeAttribute
 * @package Graphic\Attributes
 */
class BorderSizeAttribute extends AbstractAttributeDecorator
{
    /** @var int $border */
    protected $border = 1;

    /**
     * @return mixed
     */
    public function calculateArea()
    {
       echo "apply attribute border {$this->border}\n";
       return $this->shape->calculateArea();
    }

    /**
     * @param $border
     */
    public function setBorder($border)
    {
        $this->border = $border;
    }
}