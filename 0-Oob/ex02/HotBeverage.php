<?php

class HotBeverage {
    public function __construct(
        protected string $name,
        protected float $price,
        protected string $resistence
    ) {}

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getResistence(): string {
        return $this->resistence;
    }
}