<?php

namespace Payments;

class Method extends Entity
{
    private string $provider;
    private string $name;
    private string $commission;
    private string $imageUrl;
    private string $payUrl;

    public function getProvider(): string
    {
        return $this->provider;
    }
    public function setProvider(string $provider): Method
    {
        $this->provider = $provider;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): Method
    {
        $this->name = $name;
        return $this;
    }

    public function getCommission(): string
    {
        return $this->commission;
    }
    public function setCommission(string $commission): Method
    {
        $this->commission = $commission;
        return $this;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }
    public function setImageUrl(string $imageUrl): Method
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    public function getPayUrl(): string
    {
        return $this->payUrl;
    }
    public function setPayUrl(string $payUrl): Method
    {
        $this->payUrl = $payUrl;
        return $this;
    }



}