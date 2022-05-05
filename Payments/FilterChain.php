<?php

namespace Payments;

class FilterChain
{
    private FilterList $filterList;

    public function __construct()
    {
        $this->filterList = new FilterList();
    }

    public function addFilter(Filter $filter): FilterChain
    {
        $this->filterList->addFilter($filter);
        return $this;
    }

    public function processFilter($request, MethodList $methods, MethodList &$filteredMethodList): void
    {
        foreach ($this->filterList->getFilters() as $filter) {
            $filter->applyFilter($request, $methods, $filteredMethodList);


        }
    }


}