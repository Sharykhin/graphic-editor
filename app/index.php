<?php

require __DIR__ . '/../vendor/autoload.php';

use Graphic\Shapes\Circle;
use Graphic\Services\DI;
use Graphic\Calculators\ShapeCalculator;

$shapes = [
    ['type' => 'circle', 'params' => []],
    ['type' => 'circle', 'params' => []]
];
$circle = new Circle(2);

$calculator = DI::resolveSetters(new ShapeCalculator($shapes));
var_dump($calculator);