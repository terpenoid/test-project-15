<?php

namespace Payments;

class FilterManager
{
    public function processFilter(Request $request, DataProvider $filterDataProvider, MethodList $methods): MethodList
    {
        $filteredMethodList = new MethodList();
        $filterChain = new FilterChain();

        foreach ($filterDataProvider->getData() as $filterEntityArray) {
            $filterClassName = 'Payments\\Filters\\' . $filterEntityArray['filterType'] . 'Filter';
            /** @var Filter $filter */
            $filter = new $filterClassName($filterEntityArray);
            $filterChain->addFilter($filter);
        }

        $filterChain->processFilter($request, $methods, $filteredMethodList);

        return $filteredMethodList;
    }
}