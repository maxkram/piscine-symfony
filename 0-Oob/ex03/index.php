<?php
require_once 'Elem.php';
require_once 'TemplateEngine.php';

// Create Elem objects
$html = new Elem('html');
$head = new Elem('head');
$title = new Elem('title', 'My Website');
$body = new Elem('body');
$h1 = new Elem('h1', 'Welcome to My Website');
$p = new Elem('p', 'This is a sample paragraph.');

// Build the HTML structure
$head->pushElement($title);
$body->pushElement($h1);
$body->pushElement($p);
$html->pushElement($head);
$html->pushElement($body);

// Instantiate the TemplateEngine class
$templateEngine = new TemplateEngine($html);

// Call the createFile method to generate the HTML file
try {
    $templateEngine->createFile('output.html');
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>