<?php
require_once 'Elem.php';
require_once 'TemplateEngine.php';
require_once 'MyException.php';

try {
    // Create Elem objects with attributes
    $html = new Elem('html');
    $body = new Elem('body');
    $p = new Elem('p', 'Lorem ipsum', ['class' => 'text-muted']);
    $body->pushElement($p);
    $html->pushElement($body);

    // Instantiate the TemplateEngine class
    $templateEngine = new TemplateEngine($html);

    // Call the createFile method to generate the HTML file
    $templateEngine->createFile('output.html');

    // Attempt to create an element with an unauthorized tag
    $invalidElem = new Elem('undefined'); // This will throw MyException
} catch (MyException $e) {
    echo "Error: " . $e->getMessage() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>