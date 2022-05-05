<?php

namespace Payments;

class JsonDataProvider extends DataProvider
{
    public function __construct(string $jsonFile)
    {
        $this->dataArray = json_decode(file_get_contents($jsonFile), true);
    }
}