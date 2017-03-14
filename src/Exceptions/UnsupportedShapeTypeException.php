<?php

namespace Graphic\Exceptions;

use Exception;
use LogicException;

/**
 * Class UnsupportedShapeTypeException
 * @package Graphic\Exceptions
 */
class UnsupportedShapeTypeException extends LogicException
{
    /** @var string $type */
    protected $type;

    /**
     * UnsupportedShapeTypeException constructor.
     * @param string $type
     * @param string $message
     * @param int $code
     * @param Exception|null $previous
     */
    public function __construct(string $type, $message = "Unsupported shape type", $code = 0, Exception $previous = null)
    {
        $this->type = $type;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }
}
