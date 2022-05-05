<?php

namespace Payments;

use Exception;

abstract class Entity
{
    /**
     * @throws Exception
     */
    public function __construct(array $params = [])
    {
        foreach ($params as $property => $value) {
            $this->_setPropertyIfExists($property, $value);
        }
    }

    /**
     * @throws Exception
     */
    private function _setPropertyIfExists($property, $value): void
    {
        if (property_exists($this, $property)) {
            $setter = 'set' . strtoupper(substr($property, 0, 1)) . substr($property, 1);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            } else {
                throw new Exception('Suitable method `' . $setter . '` does not exists in the class `' . get_class($this) . '`');
            }
        } else {
            throw new Exception('Suitable property `' . $property . '` does not exists in the class `' . get_class($this) . '`');
        }
    }
}