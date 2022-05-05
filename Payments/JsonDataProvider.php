<?php

namespace Payments;

class JsonDataProvider
{
    private array $dataArray;

    public function __construct(string $jsonFile)
    {
        $this->dataArray = json_decode(file_get_contents($jsonFile), true);
    }

    public function getData() {
        return $this->dataArray;
    }
}