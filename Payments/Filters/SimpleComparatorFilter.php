<?php

namespace Payments\Filters;


use Payments\Enum;
use Payments\Filter;
use Payments\Method;
use Payments\MethodList;
use Payments\Request;

class SimpleComparatorFilter extends Filter
{

    public function applyFilter(Request $request, MethodList $methods, MethodList &$filteredMethodList): void
    {
        // todo: how to manage different `include/exclude` combinations

        switch ($this->getApplyType()) {
            case 'include':
                $this->processInclude($request, $methods, $filteredMethodList);
                break;
            case 'exclude':
                $this->processExclude($request, $methods, $filteredMethodList);
                break;
        }
    }

    private function processInclude(Request $request, MethodList $methods, MethodList &$filteredMethodList)
    {
        foreach ($methods->getMethods() as $method) {
            if (!$filteredMethodList->isMethodExists($method)) {
                $this->processOneMethod($request, $method, $filteredMethodList);
            }
        }
    }

    private function processExclude(Request $request, MethodList $methods, MethodList &$filteredMethodList)
    {
        foreach ($filteredMethodList->getMethods() as $method) {
            $this->processOneMethod($request, $method, $filteredMethodList);
        }
    }

    private function processOneMethod(Request $request, Method $method, MethodList &$filteredMethodList)
    {
        $passed = $this->getConditionsGlue() == Enum::FILTER_CONDITION_GLUE_AND; // covering both types (AND/OR) of `glue`

        foreach ($this->conditions as $conditionSet) {

            $checkStatus = $this->checkOneMethodWithOneConditionSet($request, $method, $conditionSet);

            // @todo: can be combined. maybe.
            if (($this->getConditionsGlue() == Enum::FILTER_CONDITION_GLUE_AND) && !$checkStatus) $passed = false;
            if (($this->getConditionsGlue() == Enum::FILTER_CONDITION_GLUE_OR) && $checkStatus) $passed = true;

        }

        if ($passed) {
            switch ($this->applyType) {
                case Enum::FILTER_APPLY_TYPE_INCLUDE:
                    $filteredMethodList->addMethod($method);
                    break;
                case Enum::FILTER_APPLY_TYPE_EXCLUDE:
                    $filteredMethodList->excludeMethod($method);
                    break;
            }
        }
    }

    private function checkOneMethodWithOneConditionSet(Request $request, Method $method, array $conditionSet): bool
    {
        // can be extended with any mapper
        $getter = 'get' . strtoupper(substr($conditionSet['property'], 0, 1)) . substr($conditionSet['property'], 1);

        switch (true) {
            case in_array($conditionSet['property'], ['productType', 'amount', 'lang', 'countryCode', 'userOs']):
                $currentValue = $request->$getter();
                break;
            case in_array($conditionSet['property'], ['provider', 'name', 'commission', 'imageUrl', 'payUrl']):
                $currentValue = $method->$getter();
                break;
            default:
                $currentValue = null;
        }

        switch ($conditionSet['operator']) {
            case '=':
                $result = $currentValue == $conditionSet['data'];
                break;
            case '!=':
                $result = $currentValue != $conditionSet['data'];
                break;
            case '>':
                $result = $currentValue > $conditionSet['data'];
                break;
            case '<':
                $result = $currentValue < $conditionSet['data'];
                break;
            case 'in':
                $result = in_array($currentValue, $conditionSet['data']);
                break;

            // @todo: and so on

            default:
                $result = false;
        }

        return $result;
    }


}