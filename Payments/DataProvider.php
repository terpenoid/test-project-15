<?php

namespace Payments;

abstract class DataProvider
{
    protected array $dataArray;

    public function getData(): array
    {
        return $this->dataArray;
    }
}