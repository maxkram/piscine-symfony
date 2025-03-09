<?php
require_once 'Text.php';
require_once 'TemplateEngine.php';

// Create a Text object with initial strings
$text = new Text([
    "This is the first paragraph.",
    "This is the second paragraph."
]);

// Append additional strings
$text->append("This is the third paragraph.");
$text->append("This is the fourth paragraph.");

// Instantiate the TemplateEngine class
$templateEngine = new TemplateEngine();

// Call the createFile method to generate the HTML file
try {
    $templateEngine->createFile('output.html', $text);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>