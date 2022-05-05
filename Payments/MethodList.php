<?php

namespace Payments;

use Exception;

class MethodList
{
    /** @var Method[] */
    private array $methods = [];

    /**
     * @throws Exception
     */
    public function __construct(JsonDataProvider $methodsDataProvide = null)
    {
        if (!is_null($methodsDataProvide)) {
            foreach ($methodsDataProvide->getData() as $method) {
                $this->methods[] = new Method($method);
            }
        }
    }

    public function addMethod(Method $method): MethodList
    {
        $this->methods[] = $method;
        return $this;
    }

    public function getMethods(): array
    {
        return $this->methods;
    }

    public function isMethodExists(Method $method): bool
    {
        foreach ($this->methods as $existingMethod) {
            if ($existingMethod->getName() == $method->getName()) return true;
        }
        return false;
    }

    public function excludeMethod(Method $method): void
    {
        foreach ($this->methods as $key => $existingMethod) {
            if ($existingMethod->getName() == $method->getName()) {
                unset($this->methods[$key]);
                return;
            }
        }
    }

}