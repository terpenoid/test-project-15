<?php

namespace Payments;

class Request extends Entity
{
    private string $productType;
    private float $amount;
    private string $lang;
    private string $countryCode;
    private string $userOs;

    public function setProductType(string $productType): Request
    {
        $this->productType = $productType;
        return $this;
    }

    public function getProductType(): string
    {
        return $this->productType;
    }

    public function setAmount(float $amount): Request
    {
        $this->amount = $amount;
        return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setLang(string $lang): Request
    {
        $this->lang = $lang;
        return $this;
    }

    public function getLang(): string
    {
        return $this->lang;
    }

    public function setCountryCode(string $countryCode): Request
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setUserOs(string $userOs): Request
    {
        $this->userOs = $userOs;
        return $this;
    }

    public function getUserOs(): string
    {
        return $this->userOs;
    }

}
