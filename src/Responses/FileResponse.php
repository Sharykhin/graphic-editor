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
        $areaCalculation = $this->calculator->calculate();

        echo "file output";
    }
}
