<?php

require __DIR__ . '/../vendor/autoload.php';

use Graphic\Shapes\Circle;
use Graphic\Services\DI;
use Graphic\Calculators\ShapeCalculator;
use Graphic\Responses\ArrayResponse;
use Graphic\Responses\FileResponse;

$shapes = [
    [
        'type' => 'circle',
        'params' => [
            'radius' => 3,
            'color' => 'red',
            'border-size' => 2
        ]
    ],
    [
        'type' => 'circle',
        'params' => [
            'radius' => 5,
            'border-size'=> 4
        ]
    ],
    [
        'type' => 'square',
        'params' => [
            'length' => 5,
            'color'=> 'blue'
        ]
    ]
];

$calculator = DI::resolveSetters(new ShapeCalculator($shapes));

$longOpts  = array(
    "output:",
    "help"
);
$cliOptions = getopt(null, $longOpts);
if (isset($cliOptions['help'])) {
    echo "\033[32mUsage: php index.php --output [array|file] \033[0m\n";
    exit;
}
if (!isset($cliOptions['output']) ||
    (isset($cliOptions['output']) && !in_array($cliOptions['output'], ['array', 'file']))) {
    echo "\033[31m --output is required and must be array of file. \033[0m\n";
    exit;
}

$response = null;

switch ($cliOptions['output']) {
    case 'array':
        $response = new ArrayResponse($calculator);
        break;
    case 'file';
        $response = new FileResponse($calculator);
        break;
}

if (is_null($response)) {
    echo "\033[31m something went wrong. \033[0m\n";
    exit;
}

echo $response->output() . PHP_EOL;