<?php
class TemplateEngine {
    private $elem;

    // Constructor to accept an Elem object
    public function __construct(Elem $elem) {
        $this->elem = $elem;
    }

    // Method to render the HTML output and save it to a file
    public function createFile($fileName) {
        $htmlContent = $this->elem->getHTML();

        // Write the HTML content to the output file
        if (file_put_contents($fileName, $htmlContent)) {
            echo "File '$fileName' created successfully.\n";
        } else {
            throw new Exception("Failed to create file: $fileName");
        }
    }
}
?>