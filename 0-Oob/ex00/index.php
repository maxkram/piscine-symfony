<?php
require_once 'TemplateEngine.php';

// Sample data
$parameters = [
    'nom' => 'Le Petit Prince',
    'auteur' => 'Antoine de Saint-Exupéry',
    'description' => 'Un conte poétique et philosophique pour enfants.',
    'prix' => '12.50'
];

// Instantiate the TemplateEngine class
$templateEngine = new TemplateEngine();

// Call the createFile method
try {
    $templateEngine->createFile('book_description_output.html', 'book_description.html', $parameters);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>