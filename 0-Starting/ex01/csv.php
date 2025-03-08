<?php
// Read the contents of the file
$fileContent = file_get_contents('ex01.txt');

// Split the content by commas
$values = explode(',', $fileContent);

// Display each value on a new line
foreach ($values as $value) {
    echo trim($value) . "\n";
}
?>