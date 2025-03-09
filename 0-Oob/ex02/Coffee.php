<?php

require_once 'HotBeverage.php';

class Coffee extends HotBeverage {
    private string $description;
    private string $comment;

    public function __construct() {
        parent::__construct("Coffee", 2.5, "Moderate");
        $this->description = "A rich and aromatic coffee.";
        $this->comment = "Perfect for a morning boost!";
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getComment(): string {
        return $this->comment;
    }
}