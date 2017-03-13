<?php

require __DIR__ . '/../vendor/autoload.php';

use Graphic\Shapes\Circle;

$circle = new Circle(2);

echo $circle->calculateArea() . PHP_EOL;