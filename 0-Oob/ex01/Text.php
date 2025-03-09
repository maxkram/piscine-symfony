<?php
class Text {
    private $strings = [];

    // Constructor to initialize the Text object with an array of strings
    public function __construct(array $strings = []) {
        $this->strings = $strings;
    }

    // Method to append new strings to the array
    public function append(string $string) {
        $this->strings[] = $string;
    }

    // Method to return all strings embedded in <p> tags
    public function readData(): string {
        $html = '';
        foreach ($this->strings as $string) {
            $html .= "<p>$string</p>";
        }
        return $html;
    }
}
?>