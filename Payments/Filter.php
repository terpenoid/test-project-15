<?php

namespace Payments;

abstract class Filter extends Entity implements ApplyMethodFilterInterface
{
    protected int $priority;
    protected string $filterType;
    protected array $filterConfig;
    protected string $applyType;
    protected array $conditions;
    protected string $conditionsGlue;

    public function getPriority(): int
    {
        return $this->priority;
    }
    public function setPriority(int $priority): Filter
    {
        $this->priority = $priority;
        return $this;
    }

    public function getFilterType(): string
    {
        return $this->filterType;
    }
    public function setFilterType(string $filterType): Filter
    {
        $this->filterType = $filterType;
        return $this;
    }

    public function getFilterConfig(): array
    {
        return $this->filterConfig;
    }
    public function setFilterConfig(array $filterConfig): Filter
    {
        $this->filterConfig = $filterConfig;
        return $this;
    }

    public function getApplyType(): string
    {
        return $this->applyType;
    }
    public function setApplyType(string $applyType): Filter
    {
        $this->applyType = $applyType;
        return $this;
    }

    public function getConditions(): array
    {
        return $this->conditions;
    }
    public function setConditions(array $conditions): Filter
    {
        $this->conditions = $conditions;
        return $this;
    }

    public function getConditionsGlue(): string
    {
        return $this->conditionsGlue;
    }
    public function setConditionsGlue(string $conditionsGlue): Filter
    {
        $this->conditionsGlue = $conditionsGlue;
        return $this;
    }

}