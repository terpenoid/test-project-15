<?php

namespace Payments;

class FilterList
{
    /** @var Filter[]  */
    private array $filters = [];

    public function addFilter (Filter $filter): FilterList
    {
        $this->filters[] = $filter;

        usort($this->filters, function ($f1, $f2) {
            /**
             * @var Filter $f1
             * @var Filter $f2
             */
            if ($f1->getPriority() == $f2->getPriority()) {
                return 0;
            }
            return ($f1->getPriority() < $f2->getPriority()) ? -1 : 1; // set desc order. lower priority will process first
        });

        return $this;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

}