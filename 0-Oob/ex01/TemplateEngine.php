<?php
class TemplateEngine {
    // Method to create a new file with content rendered by the Text object
    public function createFile($fileName, Text $text) {
        // Generate the HTML content
        $htmlContent = $text->readData();

        // Write the HTML content to the output file
        if (file_put_contents($fileName, $htmlContent)) {
            echo "File '$fileName' created successfully.\n";
        } else {
            throw new Exception("Failed to create file: $fileName");
        }
    }
}
?>