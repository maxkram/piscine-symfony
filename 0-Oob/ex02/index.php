<?php

require_once 'HotBeverage.php';
require_once 'Coffee.php';
require_once 'Tea.php';
require_once 'TemplateEngine.php';

// Create instances of Coffee and Tea
/** @var Coffee $coffee */
$coffee = new Coffee();
/** @var Tea $tea */
$tea = new Tea();

// Create an instance of TemplateEngine
$templateEngine = new TemplateEngine();

// Generate HTML files for Coffee and Tea
$templateEngine->createFile($coffee);
$templateEngine->createFile($tea);

echo "HTML files created successfully!\n";