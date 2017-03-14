<?php

namespace Graphic\Services;

use Graphic\Interfaces\Services\ShapeFactoryInterface;
use Graphic\Interfaces\ShapeFactoryAwareInterface;
use ReflectionClass;
use ReflectionMethod;

/**
 * The simplest implementation of dependency injection service.
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
     * @param $obj
     * @return mixed
     */
    public static function resolveSetters($obj)
    {
        $reflectionClass = new ReflectionClass($obj);
        $settersInjection = array_intersect(self::$setters, array_keys($reflectionClass->getInterfaces()));
        if (!empty($settersInjection)) {
            foreach ($settersInjection as $interface) {
                $setterMethod = (new ReflectionClass($interface))->getMethods(ReflectionMethod::IS_PUBLIC)[0];
                $paramClass = $setterMethod->getParameters()[0]->getClass();
                if ($paramClass->isInterface() && array_key_exists($paramClass->getName(), self::$map)) {
                    $instance = self::make(self::$map[$paramClass->getName()]);
                } else {
                    $instance = self::make($paramClass->getName());
                }
                call_user_func_array([$obj, $setterMethod->getName()], [$instance]);
            }
        }

        return $obj;
    }

    /**
     * @param $class
     * @return object
     */
    public static function make($class)
    {
        $reflectionClass = new ReflectionClass($class);
        $args = [];
        $constructor = $reflectionClass->getConstructor();
        if ($constructor instanceof ReflectionMethod) {
            $constructorParams = $constructor->getParameters();
            foreach ($constructorParams as $reflectionParameter) {
                if ($reflectionParameter->getClass() instanceof ReflectionClass) {
                    if (($reflectionParameter->getClass())->isInterface() &&
                        array_key_exists(($reflectionParameter->getClass())->getName(), self::$map)) {
                        $instance = self::make(self::$map[($reflectionParameter->getClass())->getName()]);
                    } else {
                        $instance = self::make(($reflectionParameter->getClass())->getName());
                    }
                    $args[] = $instance;
                }
            }
            return $reflectionClass->newInstanceArgs($args);
        } else {
            return $reflectionClass->newInstanceWithoutConstructor();
        }
    }
}
