<?php

require_once 'Elem.php';

// Create a valid HTML structure
$html = new Elem('html');
$head = new Elem('head');
$head->pushElement(new Elem('title', [], 'My Page'));
$head->pushElement(new Elem('meta', ['charset' => 'UTF-8']));
$html->pushElement($head);

$body = new Elem('body');
$body->pushElement(new Elem('p', [], 'This is a paragraph.'));
$html->pushElement($body);

// Validate the HTML structure
if ($html->validPage()) {
    echo "The HTML page is valid.\n";
} else {
    echo "The HTML page is invalid.\n";
}

// Create an invalid HTML structure (missing <meta> tag)
$invalidHtml = new Elem('html');
$invalidHead = new Elem('head');
$invalidHead->pushElement(new Elem('title', [], 'Invalid Page'));
$invalidHtml->pushElement($invalidHead);

$invalidBody = new Elem('body');
$invalidBody->pushElement(new Elem('p', [], 'This is an invalid page.'));
$invalidHtml->pushElement($invalidBody);

// Validate the invalid HTML structure
if ($invalidHtml->validPage()) {
    echo "The invalid HTML page is valid.\n";
} else {
    echo "The invalid HTML page is invalid.\n";
}