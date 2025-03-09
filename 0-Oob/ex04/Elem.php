<?php
class Elem {
    private $tag;
    private $content;
    private $attributes;
    private $children = [];

    // List of allowed HTML tags
    private static $allowedTags = [
        'meta', 'img', 'hr', 'br', 'html', 'head', 'body', 'title',
        'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'span', 'div',
        'table', 'tr', 'th', 'td', 'ul', 'ol', 'li'
    ];

    // Constructor to initialize the HTML tag, optional content, and optional attributes
    public function __construct(string $tag, $content = null, array $attributes = []) {
        if (!in_array($tag, self::$allowedTags)) {
            throw new MyException("Unauthorized HTML tag: $tag");
        }

        $this->tag = $tag;
        $this->content = $content;
        $this->attributes = $attributes;
    }

    // Method to add a child element
    public function pushElement(Elem $element) {
        $this->children[] = $element;
    }

    // Method to render the element and its children as HTML
    public function getHTML(): string {
        $html = "<{$this->tag}";

        // Add attributes if they exist
        if (!empty($this->attributes)) {
            foreach ($this->attributes as $name => $value) {
                $html .= " $name=\"$value\"";
            }
        }

        $html .= ">";

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