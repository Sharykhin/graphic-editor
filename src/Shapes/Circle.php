<?php

namespace Graphic\Shapes;

class Circle
{
    private $radius;

    public function __construct(int $radius)
    {
        $this->radius = $radius;
    }

    public function calculateArea()
    {
        return M_PI * pow($this->radius, 2);
    }
}