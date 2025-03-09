<?php

require_once 'HotBeverage.php';

class Tea extends HotBeverage {
    private string $description;
    private string $comment;

    public function __construct() {
        parent::__construct("Tea", 1.5, "Light");
        $this->description = "A soothing and refreshing tea.";
        $this->comment = "Great for relaxation!";
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getComment(): string {
        return $this->comment;
    }
}