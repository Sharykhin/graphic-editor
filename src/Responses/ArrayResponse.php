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

        echo 'make output as array points: [' . implode(',', $array) . ']';
    }
}