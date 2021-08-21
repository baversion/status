<?php

namespace App\Statuses\Traits;

use ReflectionObject;
use ReflectionProperty;

trait Status
{
    /**
     * @param string $method
     * @param array $arguments
     * @example status($id = null)
     * @return string|string[]
     */
    public function __call($method, $arguments)
    {
        if(!in_array($method, $this->privateProperties())) {
            return 'Error: The method ' . $method . ' doesn\'t exists!';
        }

        $property = $this->$method;

        $id = $arguments[0] ?? null;

        if($id) {
            return $property[$id] ?? $id;
        }
        return $property;
    }

    /**
     * Returns private properties of the class.
     *
     * @return array private properties
     */
    protected function privateProperties() : array
    {
        $reflection = new ReflectionObject($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED | ReflectionProperty::IS_STATIC);
        $accessibleProperties = [];
        foreach ($properties as $property) {
            $accessibleProperties[] = $property->getName();
        }
        $allProperties = array_keys(get_class_vars(self::class));
        return array_diff($allProperties, $accessibleProperties);
    }
}
