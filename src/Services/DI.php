<?php

namespace Graphic\Services;

use Graphic\Interfaces\Services\ShapeFactoryInterface;
use Graphic\Interfaces\ShapeFactoryAwareInterface;
use ReflectionClass;

/**
 * Class DI
 * @package Graphic\Services
 */
class DI
{
    /** @var array $map */
    protected static $map = [
        ShapeFactoryInterface::class => ShapeFactory::class
    ];

    /** @var array $setters */
    protected static $setters = [ShapeFactoryAwareInterface::class];

    /**
     * @param $class
     * @return mixed
     */
    public static function resolveObject($class)
    {
        $reflectionClass = new ReflectionClass($class);
        $settersInjection = array_intersect(self::$setters, array_keys($reflectionClass->getInterfaces()));
        if (!empty($settersInjection)) {
            foreach ($settersInjection as $interface) {
                switch ($interface) {
                    case ShapeFactoryAwareInterface::class:
                        // I don't use some kind of array_shift or reset since they work with reference that may affect
                        // bad memory usage since php works in COW way
                        $reflectionMethod = ((new ReflectionClass($interface))->getMethods())[0];
                        $instance = new self::$map[ShapeFactoryInterface::class];
                        call_user_func_array([$class, $reflectionMethod->getName()], [$instance]);
                        break;
                }
            }
        }
        return $class;
    }
}