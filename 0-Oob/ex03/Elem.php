<?php
class Elem {
    private $tag;
    private $content;
    private $children = [];

    // Constructor to initialize the HTML tag and optional content
    public function __construct(string $tag, $content = null) {
        $this->tag = $tag;
        $this->content = $content;
    }

    // Method to add a child element
    public function pushElement(Elem $element) {
        $this->children[] = $element;
    }

    // Method to render the element and its children as HTML
    public function getHTML(): string {
        $html = "<{$this->tag}>";

        // Add content if it exists
        if ($this->content !== null) {
            $html .= $this->content;
        }

        // Add child elements
        foreach ($this->children as $child) {
            $html .= $child->getHTML();
        }

        // Close the tag if it's not a self-closing tag
        if (!in_array($this->tag, ['meta', 'img', 'hr', 'br'])) {
            $html .= "</{$this->tag}>";
        }

        return $html;
    }
}
?>