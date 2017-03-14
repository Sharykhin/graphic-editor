<?php

namespace Graphic\Responses;

/**
 * Class ArrayResponse
 * @package Graphic\Responses
 */
class ArrayResponse extends AbstractResponse
{
    /**
     * Implement abstract method output and return the response as array points.
     */
    public function output()
    {
        $array = $this->calculator->calculate();
        echo "\033[33mmake output as array points: [" . implode(",", $array) . "]\033[0m\n";
    }
}