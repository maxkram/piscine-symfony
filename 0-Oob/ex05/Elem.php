<?php

require_once 'MyException.php';

class Elem {
    private $tag;
    private $content;
    private $attributes;

    public function __construct(string $tag, array $attributes = []) {
        $this->tag = $tag;
        $this->attributes = $attributes;
        $this->content = [];
    }

    public function pushElement($element): void {
        $this->content[] = $element;
    }

    public function getHTML(): string {
        $html = "<{$this->tag}";
        foreach ($this->attributes as $key => $value) {
            $html .= " $key=\"$value\"";
        }
        $html .= ">";
        foreach ($this->content as $element) {
            $html .= is_string($element) ? $element : $element->getHTML();
        }
        $html .= "</{$this->tag}>";
        return $html;
    }

    public function validPage(): bool {
        try {
            $this->validateHTMLStructure($this);
            return true;
        } catch (MyException $e) {
            echo "Validation Error: " . $e->getMessage() . "\n";
            return false;
        }
    }

    private function validateHTMLStructure(Elem $element): void {
        if ($element->tag !== 'html') {
            throw new MyException("Root element must be <html>.");
        }

        $children = $element->content;
        if (count($children) !== 2 || $children[0]->tag !== 'head' || $children[1]->tag !== 'body') {
            throw new MyException("<html> must contain exactly one <head> followed by one <body>.");
        }

        $this->validateHead($children[0]);
        $this->validateBody($children[1]);
    }

    private function validateHead(Elem $head): void {
        $children = $head->content;
        if (count($children) !== 2 || $children[0]->tag !== 'title' || $children[1]->tag !== 'meta') {
            throw new MyException("<head> must contain exactly one <title> and one <meta charset>.");
        }

        if (!isset($children[1]->attributes['charset'])) {
            throw new MyException("<meta> tag must have a charset attribute.");
        }
    }

    private function validateBody(Elem $body): void {
        foreach ($body->content as $element) {
            if ($element instanceof Elem) {
                $this->validateElement($element);
            }
        }
    }

    private function validateElement(Elem $element): void {
        switch ($element->tag) {
            case 'p':
                $this->validateParagraph($element);
                break;
            case 'table':
                $this->validateTable($element);
                break;
            case 'ul':
            case 'ol':
                $this->validateList($element);
                break;
            default:
                throw new MyException("Invalid tag <{$element->tag}> in <body>.");
        }
    }

    private function validateParagraph(Elem $paragraph): void {
        foreach ($paragraph->content as $content) {
            if (!is_string($content)) {
                throw new MyException("<p> tags can only contain text, not other tags.");
            }
        }
    }

    private function validateTable(Elem $table): void {
        foreach ($table->content as $row) {
            if ($row->tag !== 'tr') {
                throw new MyException("<table> can only contain <tr> tags.");
            }
            foreach ($row->content as $cell) {
                if ($cell->tag !== 'th' && $cell->tag !== 'td') {
                    throw new MyException("<tr> can only contain <th> or <td> tags.");
                }
            }
        }
    }

    private function validateList(Elem $list): void {
        foreach ($list->content as $item) {
            if ($item->tag !== 'li') {
                throw new MyException("<{$list->tag}> can only contain <li> tags.");
            }
        }
    }
}