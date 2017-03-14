<?php

namespace Graphic\Responses;

/**
 * Class FileResponse
 * @package Graphic\Responses
 */
class FileResponse extends AbstractResponse
{
    /**
     * Implement abstract method output and return response as a file
     */
    public function output()
    {
        $array = $this->calculator->calculate();
        echo "\033[33mconvert array result: [" . implode(",", $array) . "] into a file representation\033[0m\n";
    }
}
